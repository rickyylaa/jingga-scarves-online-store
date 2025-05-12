<?php

namespace App\Http\Controllers\Ecommerce;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderReturn;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\PDF as PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::withCount(['return'])->where('customer_id', auth()->guard('customer')->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        $customer = auth()->guard('customer')->user();
        return view('ecommerce.orders.index', compact('orders', 'customer'));
    }

    public function view($invoice)
    {
        $order = Order::with(['district.city.province', 'details', 'details.product', 'payment'])
        ->where('invoice', $invoice)->first();
        $customer = auth()->guard('customer')->user();

        if (Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)) {
            return view('ecommerce.orders.view', compact('order', 'customer'));
        }
        return redirect(route('customer.orders'))->with(['error' => 'Anda Tidak Diizinkan Untuk Mengakses Order Orang Lain']);
    }

    public function paymentForm()
    {
        $customer = auth()->guard('customer')->user();
        return view('ecommerce.orders.payment', compact('customer'));
    }

    public function storePayment(Request $request)
    {
        $this->validate($request, [
            'invoice' => 'required|exists:orders,invoice',
            'name' => 'required|string',
            'transfer_to' => 'required|string',
            'transfer_date' => 'required',
            'amount' => 'required|integer',
            'proof' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        DB::beginTransaction();
        try {
            $order = Order::where('invoice', $request->invoice)->first();
            if ($order->total != $request->amount)
                return redirect()->back()->with(['error' => 'Error, Payment Must Be The Same As Invoice']);
            if ($order->status == 0 && $request->hasFile('proof')) {
                $file = $request->file('proof');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/payment', $filename);

                Payment::create([
                    'order_id' => $order->id,
                    'name' => $request->name,
                    'transfer_to' => $request->transfer_to,
                    'transfer_date' => Carbon::parse($request->transfer_date)->format('Y-m-d'),
                    'amount' => $request->amount,
                    'proof' => $filename,
                    'status' => false
                ]);

                $order->update(['status' => 1]);
                DB::commit();
                return redirect()->back()->with(['success' => 'Order Confirmed']);
            }
            return redirect()->back()->with(['error' => 'Error, Upload Proof of Transfer']);
        } catch(\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function pdf($invoice)
    {
        $order = Order::with(['district.city.province', 'details', 'details.product', 'payment'])
            ->where('invoice', $invoice)->first();

        if (!Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)) {
            return redirect(route('customer.view_order', $order->invoice));
        }

        $pdf = PDF::loadView('ecommerce.orders.pdf', compact('order'));
        return $pdf->stream();
    }

    public function acceptOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->update(['status' => 4]);
        return redirect()->back()->with(['success' => 'Order Confirmed']);
    }

    public function returnForm($invoice)
    {
        $order = Order::where('invoice', $invoice)->first();
        $customer = auth()->guard('customer')->user();
        return view('ecommerce.orders.return', compact('order', 'customer'));
    }

    public function processReturn(Request $request, $id)
    {
        $this->validate($request, [
            'reason' => 'required|string',
            'refund_transfer' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $return = OrderReturn::where('order_id', $id)->first();
        if ($return) return redirect()->back()->with(['error' => 'Refund Request In Process']);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/return', $filename);

            OrderReturn::create([
                'order_id' => $id,
                'photo' => $filename,
                'reason' => $request->reason,
                'refund_transfer' => $request->refund_transfer,
                'status' => 0
            ]);
            $order = Order::find($id);
            $this->sendMessage($order->invoice, $request->reason);
            return redirect()->back()->with(['success' => 'Refund Request Sent']);
        }
    }
}
