<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'agent';

    protected $guarded = [];

    public $timestamps = false;
}
