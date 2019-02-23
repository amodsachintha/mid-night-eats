<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'user_id',
        'address_id',
        'driver_id',
        'payment_type',
        'payment_status',
        'amount',
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'order_code' => 'required',
            'user_id' => 'required',
            'address_id' => 'required',
            'driver_id' => 'required',
            'payment_type' => 'required',
            'payment_status' => 'required',
            'amount' => 'required'
        ]);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function orderMenus(){
        return $this->hasMany(OrderMenu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
