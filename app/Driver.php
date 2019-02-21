<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Driver extends Model
{
    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'phone',
        'image'
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'phone' => 'required',
            'image' => 'nullable'
        ]);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
