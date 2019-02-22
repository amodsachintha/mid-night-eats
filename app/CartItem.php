<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CartItem extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
    ];

    public function validate($data){
        return Validator::make($data,[
           'user_id' => 'required',
           'item_id' => 'required',
           'quantity' => 'required'
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
