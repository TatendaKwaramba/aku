<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    public function closeAgentAccount(Request $request){

        Agent::findOrFail($request->id)
             ->update(['STATE'=>'CLOSED']);

        return 'Agent Account Closed';

    }
}
