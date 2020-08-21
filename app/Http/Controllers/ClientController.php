<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function getListClient(){
        return view('clients.list');
    }

    public function getAddClient(){
        return view('clients.add');
    }

    public function getUpdateClient(){
        return view('clients.update');
    }
}
