<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('quantity');
    } // end of products


    public function productsId()
    {
        return $this->belongsToMany(Order::class,'product_order')->withPivot('porduct_id');
    } // end of products


    public function productsorders()
    {
        return $this->belongsToMany(Order::class,'product_order','order_id');
    } // end of products


}
