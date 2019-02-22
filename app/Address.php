<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'phone',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city_id'
    ];

    public function validate($data)
    {
        return Validator::make($data, [
            'user_id' => 'required',
            'phone' => 'required',
            'address_line_1' => 'required',
            'city_id' => 'required'
        ]);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
