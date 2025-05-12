<?php

namespace App\Http\Controllers\Ecommerce;

use App\Models\City;
use App\Models\Order;
use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\CustomerRegisterMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
// use Kavist\RajaOngkir\Facades\RajaOngkir;

class CartController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('js-carts'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;
    }

    public function addToCart(Request $request)
    {
        $product = Product::with(['category'])->where('id', $request->product_id)->first();
        $this->validate($request, [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer'
        ]);

        if ($request->qty > $product->qty) {
            return back()->withErrors([
                'qty' => 'Pesanan anda melebihi stock yang tersedia.'
            ])->onlyInput('qty');
        }

        $carts = json_decode($request->cookie('js-carts'), true);

        if ($carts && array_key_exists($request->product_id, $carts)) {
            $carts[$request->product_id]['qty'] += $request->qty;
        } else {
            $product = Product::find($request->product_id);
            $carts[$request->product_id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
                'weight' => $product->weight
            ];
        }

        $cookie = cookie('js-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie)->with(['success' => 'Cart added successfully']);
    }

    public function listCart()
    {
        $carts = $this->getCarts();
        $message = false;
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });

        if ($carts) {
            $product = Product::with(['category'])->where('id', $carts[array_keys($carts)[0]]['product_id'])->first();

            if ($carts[array_keys($carts)[0]]['qty'] > $product->qty) {
                $message = 'Pesanan anda melebihi stock yang tersedia.';
                return view('ecommerce.cart', compact('carts', 'subtotal', 'message'));
            }
        }
        return view('ecommerce.cart', compact('carts', 'subtotal', 'message'));
    }

    public function updateCart(Request $request)
    {
        $carts = $this->getCarts();
        foreach ($request->product_id as $key => $row) {
            if ($request->qty[$key] == 0) {
                unset($carts[$row]);
            } else {
                $carts[$row]['qty'] = $request->qty[$key];
            }
        }
        $cookie = cookie('js-carts', json_encode($carts), 2880);
        return redirect()->back()->cookie($cookie)->with(['success' => 'Cart updated successfully']);;
    }

    public function checkout()
    {
        $provinces = Province::orderBy('created_at', 'DESC')->get();
        $carts = $this->getCarts();
        $customer = auth()->guard('customer')->user();

        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['product_price'];
        });

        $weight = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['weight'];
        });
        return view('ecommerce.checkout', compact('provinces', 'carts', 'subtotal', 'customer', 'weight'));
    }

    public function getCost()
    {
        // $this->validate($request, [
        //     'destination' => 'required',
        //     'weight' => 'required|integer',
        //     'courier' => 'required'
        // ]);

        $destination = request()->destination;
        $weight = request()->weight;
        $origin = 156;
        $courier = request()->courier;

        $tujuan =  "origin=$origin&destination=$destination&weight=$weight&courier=$courier";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            // CURLOPT_POSTFIELDS => "origin='$origin'&destination='$destination'&weight=10&courier=jne",
            CURLOPT_POSTFIELDS => $tujuan,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: b5eac45ab0fe11aa75b6d56096e90e55"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        echo $err;
        curl_close($curl);


        if ($err) {
                dd($err);
        } else {
            return json_decode($response);
        }
    }

    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function processCheckout(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'courier' => 'required',
            'ongkir' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $customer = Customer::where('email', $request->email)->first();

            if (!auth()->guard('customer')->check() && $customer) {
                return redirect()->back()->with(['error' => 'Please log in first']);
            }

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['product_price'];
            });

            if (!auth()->guard('customer')->check()) {
                $password = Str::random(8);
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => $password,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }

            $shipping = explode('-', $request->courier);
            $order = Order::create([
                'invoice' => Str::random(4) . '-' . time(),
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'district_id' => $request->district_id,
                'subtotal' => $subtotal,
                'cost' => $request->ongkir,
                'courier' => $request->courier,
            ]);

            foreach ($carts as $row) {
                $product = Product::find($row['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $row['product_id'],
                    'price' => $row['product_price'],
                    'qty' => $row['qty'],
                    'weight' => $product->weight
                ]);
            }

            DB::commit();

            $carts = [];
            $cookie = cookie('js-carts', json_encode($carts), 2880);

            if (!auth()->guard('customer')->check()) {
                Mail::to($request->email)->send(new CustomerRegisterMail($customer, $password));
            }
            return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
        } catch (\Exception $e) {

            dd($e);
            // DB::rollback();
            // return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function checkoutFinish($invoice)
    {
        $order = Order::with(['district.city'])->where('invoice', $invoice)->first();
        return view('ecommerce.checkout_finish', compact('order'))->with(['success' => 'Successfully']);
    }
}
