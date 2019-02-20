<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','address_id','payment_type','amount','driver_id', 'has_menu'];

    public function orderlines(Order $order){
        $result = array();
        if($order->hasMenu){
            $result['orderMenus'] = $this->getOrderMenus();
        }
        $result['OrderItems'] = $this->getOrderItems();
        return $result;
    }

    private function getOrderMenus(){
        return $this->hasMany(OrderMenu::class);
    }

    private function getOrderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
