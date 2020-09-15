<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BankController extends Controller
{
    //
    public function getAddBank(){
        return view('bank.add');
    }

    public function getViewBank(){
        return view('bank.view');
    }
}
