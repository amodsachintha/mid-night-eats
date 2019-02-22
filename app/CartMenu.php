<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CartMenu extends Model
{
    protected $table = 'cart_menus';

    protected $fillable = [
        'user_id',
        'menu_id',
        'quantity',
    ];

    public function validate($data){
        return Validator::make($data,[
            'user_id' => 'required',
            'menu_id' => 'required',
            'quantity' => 'required'
        ]);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
