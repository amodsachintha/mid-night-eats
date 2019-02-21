<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'delivery_charge'
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'delivery_charge' => 'required'
        ]);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
