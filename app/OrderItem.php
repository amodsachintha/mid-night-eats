<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'item_id',
        'quantity'
    ];

    public function validate($data){
        return Validator::make($data,[
           'order_id' => 'required',
           'item_id' => 'required',
           'quantity' => 'required',
        ]);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
