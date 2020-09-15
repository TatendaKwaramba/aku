<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    //
    public function getListTransactions(){
        return view('reports.transactions');
    }
    public function getVolumes(){
        return view('reports.volumes.view');
    }
    public function getDormantAccounts(){
        return view('reports.dormant.view');
    }
}
