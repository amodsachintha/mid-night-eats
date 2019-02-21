<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ItemImage extends Model
{
    protected $table = 'item_images';

    protected $fillable = [
        'item_id',
        'url'
    ];

    public function validate($data){
        return Validator::make($data,[
           'item_id' => 'required',
           'url' => 'required'
        ]);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
