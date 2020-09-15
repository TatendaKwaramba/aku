<?php

namespace App\Http\Controllers;

use App\OneFusion;
use App\OneFusionTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class OneFusionController extends Controller
{
    public function sendVoucher(Request $request){
        $validator = $this->sendVoucherRules($request->all());
        if ($validator->fails()) {
            return response()->json(['code' => '01', 'description' => 'Invalid Request!']);
        }

        if ($request->type == 'PREAUTH') {
            return array('code'        => '00',
                         'description' => 'Success');
        }

        if ($request->type == 'TRANSACTION') {
            $onefusion = OneFusion::where('USED', '=', 0)
                ->where('COST', '=', $request->amount)
                ->first();
            if (sizeof($onefusion) == 0) {
                return array('code'        => '99',
                             'description' => 'Service not available, please contact customer care.');
            }

            DB::beginTransaction();
            try {


                $onefusion->USED = (boolean)1;
                $voucher = $onefusion->PIN;
                $onefusion->PIN = 'XXX_' . $onefusion->PIN;

                OneFusionTransaction::create([
                    'amount'     => $request->amount,
                    'mobile'     => $request->bill_id,
                    'trans_date' => Carbon::now(),
                    'pin_id'     => $onefusion->ID,
                ]);
                $onefusion->save();

                DB::commit();

                return array('code'           => '0',
                             'transactionId'  => '00',
                             'voucherCode'    => $voucher,
                             'additionalData' => 'false',
                             'info'           => 'false');

            } catch (\Exception $exception) {
                DB::rollback();
                Log::debug('Netone Integration: ' . $exception->getMessage());

                return array('code'        => '99',
                             'description' => 'Service not available, please contact customer care.');

            }
        }

    }

    public function sendVoucherRules(array $data){
        return Validator::make($data, [
            'type'    => 'required',
            'bill_id' => 'required',
            'amount'  => 'required',
        ]);


    }

}
