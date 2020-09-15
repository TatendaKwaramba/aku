<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Netone extends Model
{
    public $timestamps = false;
    protected $connection = 'netone';
    protected $table = 'pins';
    protected $guarded = [];
}
