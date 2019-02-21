<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
        'image',
        'description_sm',
        'price'
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'image' => 'required',
            'description_sm' => 'required',
            'price' => 'required',
        ]);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_menu');
    }

    public function orderMenus()
    {
        return $this->hasMany(OrderMenu::class);
    }
}
