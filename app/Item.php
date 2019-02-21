<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'name',
        'category_id',
        'description_sm',
        'description_lg',
        'quantity',
        'price',
        'discount',
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'category_id' => 'required',
            'description_sm' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'item_menu');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function itemImage()
    {
        return $this->hasMany(ItemImage::class);
    }

}
