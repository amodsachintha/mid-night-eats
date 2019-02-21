<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class OrderMenu extends Model
{
    protected $table = 'order_menus';

    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity'
    ];

    public function validate($data){
        return Validator::make($data,[
            'order_id' => 'required',
            'menu_id' => 'required',
            'quantity' => 'required',
        ]);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
