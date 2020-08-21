<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneFusion extends Model
{
    Protected $primaryKey = "ID";
    public $timestamps = false;
    protected $connection = 'netone';
    protected $table = 'onefusion';
    protected $guarded = [];
}
