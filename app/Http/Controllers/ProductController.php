<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    //
    public function getAddProduct(){
        return view('products.add');
    }
    public function viewProduct(){
        return view('products.view');
    }
    public function getAddNetoneData(){
        return view('products.addData');
    }
}
