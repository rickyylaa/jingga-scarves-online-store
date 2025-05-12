<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['status_label', 'ref_status_label', 'commission', 'total'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->cost;
    }

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="lezada-button lezada-button--small">Baru</span>';
        } elseif ($this->status == 1) {
            return '<span class="lezada-button lezada-button--small">Dikonfirmasi</span>';
        } elseif ($this->status == 2) {
            return '<span class="lezada-button lezada-button--small">Proses</span>';
        } elseif ($this->status == 3) {
            return '<span class="lezada-button lezada-button--small">Dikirim</span>';
        }
        return '<span class="lezada-button lezada-button--small">Selesai</span>';
    }

    public function getStsLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="badge bg-secondary">Baru</span>';
        } elseif ($this->status == 1) {
            return '<span class="badge bg-info">Dikonfirmasi</span>';
        } elseif ($this->status == 2) {
            return '<span class="badge bg-info">Proses</span>';
        } elseif ($this->status == 3) {
            return '<span class="badge bg-primary">Dikirim</span>';
        }
        return '<span class="badge bg-success">Selesai</span>';
    }

    public function getRefStatusLabelAttribute()
    {
        if ($this->ref_status == 0) {
            return '<span class="lezada-button lezada-button--small">Pending</span>';
        }
        return '<span class="lezada-button lezada-button--small">Dicairkan</span>';
    }

    public function getCommissionAttribute()
    {
        $commission = ($this->subtotal * 10) / 100;
        return $commission > 10000 ? 10000:$commission;
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function return()
    {
        return $this->hasOne(OrderReturn::class);
    }
}
