<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $fillable = ['name','pass'];
    protected $guarded = ['id'];
    public $timestamps  = false;
}
