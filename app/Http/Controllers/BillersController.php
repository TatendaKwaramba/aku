<?php
/**
 * Created by PhpStorm.
 * User: MedicineMavhondo
 * Date: 29/9/2016
 * Time: 14:51
 */

namespace App\Http\Controllers;


class BillersController extends Controller
{

    public function getAddBiller(){
        return view('biller.add');
    }
    public function viewBiller(){
        return view('biller.view');
    }
    public function addBiller(Request $request){
        echo 'totot tata';
    }
}
