<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table='purchase_order';
    protected $fillable = ['id_order','id_product_order'];
    protected $guarded = ['id'];
    public $timestamps  = false;
}
