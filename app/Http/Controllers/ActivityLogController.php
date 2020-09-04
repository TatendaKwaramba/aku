<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityLogController extends Controller
{
    public function getReport(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        if($validator->fails()){
            return array('code'=>1, $validator->errors());
        }

        return ActivityLog::whereUserId($request->id)
            ->whereBetween('created_at', [(new Carbon($request->startDate))->toDateTimeString(),
                (new Carbon($request->endDate))->toDateTimeString()])
            ->get();

    }
}
