<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AccountingController extends Controller
{
    public function getStatementOfAccounts()
    {
        return view('accounting.statement_of_accounts.view');
    }

    public function getBalanceSummary()
    {
        return view('accounting.summary_of_balances.view');
    }

    public function getReversal()
    {
        return view('accounting.reversals.view');
    }
    public function getAdjustment()
    {
        return view('accounting.adjustments.view');
    }
    public function getClosingBalance()
    {
        return view('accounting.closing_balance.view');
    }

}