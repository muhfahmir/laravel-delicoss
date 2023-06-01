<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = [
        'cart_id',
        'user_id',
        'address_id',
        'payment_type_id',
        'order_type_id',
        'delivery_date',
        'deliivery_time',
        'note',
        'total_payment',
        'status_payment',
        'proof_payment'
    ];

    public function cart(){
        return $this->belongsTo('App\Models\Cart','cart_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function address(){
        return $this->belongsTo('App\Models\Address');
    }

    public function paymentType(){
        return $this->belongsTo('App\Models\PaymentType');
    }

    public function orderType(){
        return $this->belongsTo('App\Models\OrderType');
    }
}
