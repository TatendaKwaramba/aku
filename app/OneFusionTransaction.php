<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneFusionTransaction extends Model
{
    public $timestamps = false;
    protected $connection = 'netone';
    protected $table = 'onefusion_transactions';
    protected $guarded = [];
}
