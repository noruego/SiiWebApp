<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table='bill';
    protected $fillable = ['name', 'id_state'];
    protected $guarded = ['id'];
    public $timestamps  = false;
}
