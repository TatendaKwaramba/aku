<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DeviceController extends Controller
{
    //
    public function getViewDevices(){
        return view('device.view');
    }

    public function  getAddDevice(){
        return view('device.add');
    }
}
