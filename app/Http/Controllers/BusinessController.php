<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BusinessController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAddBusiness()
    {
        return view('business.add');
    }

    public function getViewBusiness()
    {
        return view('business.view');
    }

    public function getAddSupervisor()
    {
        return view('business.supervisors.add');
    }

    public function getViewSupervisor()
    {
        return view('business.supervisors.view');
    }

    public function getAddManger()
    {
        return view('business.managers.add');
    }

    public function getViewManager()
    {
        return view('business.managers.view');
    }

    public function getPendingValidations()
    {
        return view('business.validation.view');
    }

    public function getPendingBankTransfers()
    {
        return view('business.bank_validation.view');

    }

}
