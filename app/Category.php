<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function validate($data)
    {
        return Validator::make($data, ['name' => 'required|max:255']);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
