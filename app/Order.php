<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='product_order';
    protected $fillable = ['order_date', 'id_customer','subtotal','total','id_discount_copun','id_payment_method'];
    protected $guarded = ['id'];
    public $timestamps  = false;
}
