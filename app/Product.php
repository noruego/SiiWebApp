<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable = ['brand', 'model','description','price','id_category','id_provider','image'];
    protected $guarded = ['id'];
    public $timestamps  = false;
}
