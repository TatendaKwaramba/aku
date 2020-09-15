<?php

namespace App\Http\Controllers;


use App\Client;
use App\Netone;
use App\Transaction;
use ErrorException;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use League\Flysystem\Exception;

class AngularAPIController extends Controller
{

    public function getClients(Request $request){
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/client_crud/get_client', ['json' => [
            "mobile"   => $request->input('mobile'),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info($request->input('name') . 'edited by  ' . Auth::user()->name);

    }

    public function getClientNumber(Request $request){

        return Client::count();

    }

    public function resetPin(Request $request){


        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/client_crud/web_reset_pin', ['json' => [
            "client_id" => $request->input('id'),
            "admin_id"  => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info('Client with id ' . $request->input('client_id') . 'pin reset by' . Auth::user()->name);


    }

    public function settleClient(Request $request){


        $client = new GuzzleHttp\Client(['exceptions' => false]);

        //return $request->input();

        $res = $client->post('http://192.168.1.171:8092/middleware/api/redeem/client', ['json' => [
            "clientId" => (int)$request->input('id'),
            "amount"   => $request->input('amount'),
            "adminId"  => Auth::user()->id,
            "action"   => $request->input('action'),
        ]]);

        echo $res->getBody();
        Log::info('Client with id ' . $request->input('client_id') . 'funds of' . $request->input('amount') . 'settled by' . Auth::user()->name);


    }

    public function settleProduct(Request $request){


        $client = new GuzzleHttp\Client(['exceptions' => false]);

        $res = $client->post('http://192.168.1.171:8092/middleware/api/redeem/product', ['json' => [
            "productId" => $request->input('id'),
            "amount"    => $request->input('amount'),
            "adminId"   => Auth::user()->id,
            "action"    => $request->input('action'),
        ]]);

        echo $res->getBody();
        Log::info('Product with id ' . $request->input('id') . 'funds of' . $request->input('amount') . 'settled by' . Auth::user()->name);


    }

    public function getUpdateClients(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/client_crud/get_for_update');
        echo $res->getBody();

    }

    public function updateClient(Request $request){

        $data = array(
            'mobile'                 => $request->input('mobile'),
            'firstname'              => $request->input('firstname'),
            'lastname'               => $request->input('lastname'),
            'address'                => $request->input('address'),
            'state'                  => $request->input('state'),
            'email'                  => $request->input('email'),
            'deposit'                => $request->input('deposit'),
            'clientClassOfServiceId' => array('id' => $request->input('clientClassOfServiceId')),

        );

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/client_crud/update', ['json' => [
            "clients"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info($request->input('name') . 'edited by  ' . Auth::user()->name);

    }

    public function addClient(Request $request){

        $data = array(
            'mobile'                 => $request->input('mobile'),
            'firstname'              => $request->input('firstname'),
            'lastname'               => $request->input('lastname'),
            'address'                => $request->input('address'),
            'state'                  => 'ACTIVE',
            'email'                  => $request->input('email'),
            'deposit'                => 0,
            'clientClassOfServiceId' => array('id' => 14),

        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/client_crud/add', ['json' => [
            'imei' => '980005',

            "clients"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info($request->input('name') . 'added by  ' . Auth::user()->name);

    }

    public function getClientTransactions(Request $request){
        $id = $request->input('id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $mobile = $request->input('mobile');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/client_crud/get_transaction_history', ['json' => [
            'agent_id'   => $id,
            'start_date' => $start_date,
            'end_date'   => $end_date,
            'mobile'     => $mobile,
            "admin_id"   => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Client Transactions with id ' . $request->input('id') . 'retrieved by  ' . Auth::user()->name);


    }


    public function getTransactions(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/transaction_crud/get', ['json' => [
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ]]);
        echo $res->getBody();

        Log::info('Transactions Retrieved by ' . Auth::user()->name);

    }

    public function searchTransaction(Request $request){
        $id = (int)$request->input('id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/transaction_crud/get_filter', ['json' => [
            'filter'     => 'id',
            'start_date' => $start_date,
            'end_date'   => $end_date,
            'value'      => $id,
            "admin_id"   => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Transactions Retrieved by ' . Auth::user()->name);


    }

    public function reverseTransaction(Request $request){
        $id = (int)$request->input('id');
        $url = $request->input('url');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . "/$url/reversal", ['json' => [
            'trans_id' => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Transactions Reversed by ' . Auth::user()->name);


    }


    public function initiateAdjustment(Request $request){
        $amount = (string)$request->input('amount');
        $source = (string)$request->input('source');
        $destination = (string)$request->input('destination');
        $comment = $request->input('comment');


        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . "/adjustments/adjust", ['json' => [
            'type'        => 'initiate',
            'amount'      => $amount,
            'source'      => $source,
            'destination' => $destination,
            'comments'    => $comment,
            "admin_id"    => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Adjustment Initiated by' . Auth::user()->name . 'Source Account: ' . $request->input('source') . 'Destination Account: ' . $request->input('source'));


    }

    public function validateAdjustment(Request $request){
        $trans_id = $request->input('trans_id');
        $comment = $request->input('comment');

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . "/adjustments/adjust", ['json' => [
            'type'     => 'validate',
            'comments' => $comment,

            'trans_id' => $trans_id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Adjustment Validated by' . Auth::user()->name . 'Source Account: ' . $request->input('source') . 'Destination Account: ' . $request->input('source'));


    }

    public function rejectAdjustment(Request $request){
        $trans_id = $request->input('trans_id');
        $comment = $request->input('comment');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . "/adjustments/adjust", ['json' => [
            'type'     => 'reverse',
            'comments' => $comment,

            'trans_id' => $trans_id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getPendingAdjustment(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . "/adjustments/get_pending", ['json' => [
            'start_date' => '2016-12-31',
            'end_date'   => '2020-12-31',
            "admin_id"   => Auth::user()->id,
        ]]);
        echo $res->getBody();
    }

    public function getProducts(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/product_crud/get');
        echo $res->getBody();
        Log::info('Products Retrieved by ' . Auth::user()->name);

    }

    public function updateProduct(Request $request){
        $data = array(
            'name'         => $request->input('name'),
            'category'     => $request->input('category'),
            'commission'   => floatval($request->input('commission')),
            'voucherLabel' => $request->input('voucherLabel'),
            'apiUrl'       => $request->input('apiUrl'),
            'billidLabel'  => $request->input('billidLabel'),
            'billidFormat' => $request->input('billidFormat'),
            'billidLength' => $request->input('billIdLength'),
            'menuDisplay'  => $request->input('menuDisplay'),
            'billidMask'   => $request->input('billMask'),
            'billerId'     => array('id' => $request->input('billerId')),
            'state'        => $request->input('state'),
            'balance'      => $request->input('balance'),
            'id'           => $request->input('id'),

            'feesAndCommissionsId' => array('id' => $request->input('fandc')),

        );
        //return $data;
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/product_crud/update', ['json' => [
            "products" => array($data),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info($request->input('name') . 'edited by  ' . Auth::user()->name);

    }

    public function activateProduct(Request $request){
        $data = array(
            'name'         => $request->input('name'),
            'category'     => $request->input('category'),
            'commission'   => floatval($request->input('commission')),
            'voucherLabel' => $request->input('voucherLabel'),
            'apiUrl'       => $request->input('apiUrl'),
            'billidLabel'  => $request->input('billidLabel'),
            'billidFormat' => $request->input('billidFormat'),
            'billidLength' => $request->input('billIdLength'),
            'menuDisplay'  => $request->input('menuDisplay'),
            'billidMask'   => $request->input('billMask'),
            'billerId'     => array('id' => $request->input('billerId')),
            'state'        => $request->input('state'),
            'balance'      => $request->input('balance'),
            'id'           => $request->input('id'),

            'feesAndCommissionsId' => $request->input('fandc'),

        );
        //return $data;
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/product_crud/update', ['json' => [
            "products" => array($data),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
        Log::info($request->input('name') . 'edited by  ' . Auth::user()->name);

    }


    //deactivateProduct
    public function deactivateProduct(Request $request){
        $client = new GuzzleHttp\Client();
        $response = $client->post(env('BASE_URL') . '/product_crud/deactivate', [
            'json' => [
                'product_id' => $request->input('product_id'),
                "admin_id"   => Auth::user()->id,
            ]]);
        echo $response->getBody();
        Log::info('Product with id: ' . $request->input('product_id') . ' deactivated by ' . Auth::user()->name);


    }

    public function getDevices(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/device_crud/get');
        echo $res->getBody();
        Log::info('Devices Retrieved by ' . Auth::user()->name);

    }

    public function getPendingDevices(){

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/device_crud/get_filter', ['json' => [
            'filter'   => 'status',
            'value'    => 'PENDING',
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getDeviceStats(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', '192.168.1.66:8080/ProjectX_Reports/webresources/generic/device_count');
        echo $res->getBody();
        Log::info('Device stats retrieved by ' . Auth::user()->name);

    }


    public function getBillers(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/biller_crud/get');
        echo $res->getBody();
        Log::info('Billers Retrieved by ' . Auth::user()->name);

    }


    public function deleteBiller(Request $request){
        $id = $request->input('id');

        $data = array(
            'bank_id' => $id,
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/biller_crud/deactivate', ['json' => [
            'biller_id' => $id,
            "admin_id"  => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Biller with id: ' . $id . ' deactivated by ' . Auth::user()->name);


    }

    public function addBiller($billerName, $address, $mobile, $email, $landline){
        $data = array(
            'company'   => $billerName,
            'address'   => $address,
            'cellphone' => $mobile,
            'email'     => $email,
            'landline'  => $landline,
        );
        $client = new GuzzleHttp\Client();

        //return  Auth::user()->id;
        $res = $client->post(env('BASE_URL') . '/biller_crud/add', ['json' => [
            "billers"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);
        echo $res->getBody();
    }

    public function updateBiller(Request $request){

        $data = array(
            'id'        => $request->input('id'),
            'company'   => $request->input('company'),
            'address'   => $request->input('address'),
            'cellphone' => $request->input('cellphone'),
            'email'     => $request->input('email'),
            'landline'  => $request->input('landline'),
            'state'     => $request->input('state'),
        );
        $client = new GuzzleHttp\Client();

        //return  Auth::user()->id;
        $res = $client->post(env('BASE_URL') . '/biller_crud/update', ['json' => [
            "billers"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);
        echo $res->getBody();

    }

    //getBillerStats
    public function getBillerStats($request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $data = array(
            'start_date' => $start_date,
            'end_date'   => $end_date,
        );

        return 'sam';
        //return array($data);
        $client = new GuzzleHttp\Client();
        $res = $client->post('http://192.168.1.66:8080/ProjectX_Reports/webresources/generic/biller_count', ['json' => $data]);
        echo $res->getBody();
    }


    public function getBanks(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/bank_crud/get');
        echo $res->getBody();
        Log::info('Banks Retrieved by ' . Auth::user()->name);

    }

    public function addBank(Request $request){
        $name = $request->input('name');
        $deposit = $request->input('deposit');
        $bankClassOfServiceId = $request->input('bankClassOfServiceId');
        $data = array(
            'name'                 => $name,
            'deposit'              => $deposit,
            'bankClassOfServiceId' => array('id' => $bankClassOfServiceId),
        );


        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/bank_crud/add', ['json' => [
            "banks"    => array($data),
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();
    }

    public function updateBank(Request $request){
        $id = $request->input('id');
        $account = $request->input('account');
        $name = $request->input('name');
        $deposit = $request->input('deposit');
        $bankClassOfServiceId = $request->input('bankClassOfServiceId');
        $state = $request->input('state');

        $data = array(
            'id'                   => $id,
            'name'                 => $name,
            'account'              => $account,
            'deposit'              => $deposit,
            'state'                => $state,
            'bankClassOfServiceId' => array('id' => $bankClassOfServiceId),
        );

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/bank_crud/update', ['json' => [
            "banks"    => array($data),
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();
    }

    public function deleteBank(Request $request){
        $id = $request->input('id');

        $data = array(
            'bank_id' => $id,
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/bank_crud/deactivate', ['json' => [
            'bank_id'  => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Bank with id: ' . $id . ' deactivated by ' . Auth::user()->name);


    }


    public function addDevice(Request $request){
        $data = array(
            'imei'     => $request->input('imei'),
            'name'     => $request->input('name'),
            'status'   => $request->input('status'),
            'platform' => $request->input('platform'),
        );
        //return $data;
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/device_crud/add', ['json' => [
            "devices"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);
        echo $res->getBody();
    }


    public function deleteDevice(Request $request){
        $id = $request->input('id');

        return $id;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/device_crud/deactivate', ['json' => [
            'device_id' => $id,
            "admin_id"  => Auth::user()->id,

        ]]);
        echo $res->getBody();
        Log::info('Device with id: ' . $id . ' deactivated by ' . Auth::user()->name);


    }

    public function assignDeviceToAgent(Request $request){
        $id = $request->input('id');
        $imei = $request->input('imei');
        $name = $request->input('name');
        $status = $request->input('status');
        $activationTries = $request->input('activationTries');
        $firstUse = $request->input('firstUse');
        $lastUse = $request->input('lastUse');
        $agentId = $request->input('agentId');

        $data = array(
            'id'              => $id,
            'imei'            => $imei,
            'name'            => $name,
            'status'          => $status,
            'activationTries' => $activationTries,
            /*'firstUse'=>$firstUse,
            'lastUse'=>$lastUse,*/
            'agentId'         => array('id' => $agentId),
        );
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/device_crud/update', ['json' => [
            "devices"  => array($data),
            "admin_id" => Auth::user()->id,
        ]]);
        echo $res->getBody();

    }

    public function addProduct(Request $request){
        $data = array(
            'billerId'     => array('id' => $request->input('billerID')),
            'name'         => $request->input('name'),
            'category'     => $request->input('category'),
            'commission'   => floatval($request->input('commission')),
            'voucherLabel' => $request->input('voucherLabel'),
            'apiUrl'       => $request->input('apiUrl'),
            'billidLabel'  => $request->input('billidLabel'),
            'billidFormat' => $request->input('billidFormat'),
            'billidMask'   => $request->input('billidMask'),
            'balance'      => 0,
            'clientSms'    => $request->input('clientSms'),
            'pinless'      => $request->input('pinless'),
            'maxPinless'   => $request->input('maxPinless'),

            'feesAndCommissionsId' => array(
                'id' => $request->input('fandc'),
            ),
        );

        //return $data;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/product_crud/add', ['json' => [
            "products" => array($data),
            "admin_id" => Auth::user()->id,
        ]]);

        echo $res->getBody();
    }

    public function addAgentBusiness(Request $request){
        $address = $request->input('address');
        $cellphone = $request->input('cellphone');
        $landline = $request->input('landline');
        $commission = $request->input('commission');
        $firstname = $request->input('firstname');
        $email = $request->input('email');
        $deposit = $request->input('deposit');
        $registrationDate = $request->input('registrationDate');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $id_number = $request->input('id_number');
        $class_of_service = $request->input('class_of_service');
        $supervisor = $request->input('supervisor');
        $taxRegNumber = $request->input('tax_reg_number');
        $businessType = $request->input('business_type');
        $external_reference = $request->input('external_reference');
        $country = $request->input('country');
        $bankName = $request->input('bankName');
        $bankBranch = $request->input('bankBranch');
        $accountNumber = $request->input('accountNumber');
        $withHoldTax = $request->input('withhold_tax');
        $taxExpiry = $request->input('tax_expiry');

        $data = array(

            'address'                 => $address,
            'cellphone'               => $cellphone,
            'commission'              => (float)$commission,
            'landline'                => $landline,
            'firstname'               => $firstname,
            'lastname'                => $firstname,
            'name'                    => $firstname,
            'external_reference'      => $external_reference,
            'email'                   => $email,
            'deposit'                 => (float)$deposit,
            'documentId'              => array('idNumber'     => $id_number,
                                               'gender'       => $gender,
                                               'businessType' => $businessType,
                                               'taxRegNumber' => $taxRegNumber,
                                               'country'      => $country,
                                               'dob'          => $dob,
            ),
            'partnerClassOfServiceId' => array('id' => (int)$class_of_service),
            'agentSupervisorId'       => array('id' => 1),
            'tax_expiry'              => $taxExpiry,
            'withHoldTax'             => $withHoldTax,

        );
        $banks = array(
            'name'          => $bankName,
            'branch'        => $bankBranch,
            'accountNumber' => $accountNumber,
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/add', ['json' => [
            "agents"       => array($data),
            "banks"        => array($banks),
            "admin_id"     => Auth::user()->id,
            'withhold_tax' => $withHoldTax,
            'tax_expiry'   => $taxExpiry,

        ]]);
        echo $res->getBody();
    }

    public function addMerchantBusiness(Request $request){
        $name = $request->input('name');
        $cellphone = $request->input('cellphone');
        $stockExchangeName = $request->input('stockExchangeName');
        $businessRegNumber = $request->input('business_reg_number');
        $address = $request->input('address');
        $email = $request->input('email');
        $landline = $request->input('landline');
        $date_of_incorporation = $request->input('date_of_incorporation');
        $date_of_registration = $request->input('date_of_registration');
        $class_of_service = $request->input('class_of_service');
        $supervisor = $request->input('supervisor');


        $data = array(
            'name'      => $name,
            'address'   => $address,
            'email'     => $email,
            'cellphone' => $cellphone,

            'landline'                => $landline,
            'registrationDate'        => $date_of_registration,
            'partnerClassOfServiceId' => array('id' => $class_of_service),
            'documentId'              => array(
                'businessRegNumber' => $businessRegNumber,

                'dob'               => $date_of_incorporation,
                'stockExchangeName' => $stockExchangeName,
            ),
            'agentSupervisorId'       => array('id' => $supervisor),

        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/add', ['json' => [
            "agents"   => array($data),
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function deleteBusiness(Request $request){
        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/deactivate', ['json' => [
            'agent_id' => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function grantWebAccess(Request $request){
        $email = $request->input('email');
        $name = $request->input('name');
        $client = new GuzzleHttp\Client();
        $res = $client->post('https://business.getcash.co.zw/web-access', ['json' => [
            'email' => $email,
            "name"  => $name,
        ]]);
        echo $res->getBody();

    }

    public function updateBusiness(Request $request){
        $id = $request->input('id');
        $address = $request->input('address');
        $cellphone = $request->input('cellphone');
        $landline = $request->input('landline');
        $commission = $request->input('commission');
        $name = $request->input('name');
        $firstname = $request->input('name');
        $lastname = $request->input('name');
        $email = $request->input('email');
        $deposit = $request->input('deposit');
        //$registrationDate = $request->input('registrationDate');
        $dob = $request->input('dob');
        $gender = $request->input('gender');
        $id_number = $request->input('id_number');
        $class_of_service = $request->input('class_of_service');
        $supervisor = $request->input('supervisor');
        $taxRegNumber = $request->input('tax_reg_number');
        $businessType = $request->input('business_type');
        $external_reference = $request->input('external_reference');
        $country = $request->input('country');
        $state = $request->input('state');
        $bankName = $request->input('bankName');
        $bankBranch = $request->input('bankBranch');
        $accountNumber = $request->input('accountNumber');
        $documentId = $request->input('documentId');

        $data = array(
            'id'                      => $id,
            'address'                 => $address,
            'cellphone'               => $cellphone,
            'commission'              => (float)$commission,
            'landline'                => $landline,
            'name'                    => $name,
            'firstname'               => $name,
            'lastname'                => $name,
            'external_reference'      => $external_reference,
            'email'                   => $email,
            'state'                   => $state,
            'deposit'                 => (float)$deposit,
            /*'documentId' => array(
                'id' => $documentId,
                'idNumber' => $id_number,
                'gender' => $gender,
                'businessType' => $businessType,
                'taxRegNumber' => $taxRegNumber,
                'country' => $country,
                'dob' => $dob
            ),*/
            'partnerClassOfServiceId' => array('id' => $class_of_service),
            'agentSupervisorId'       => array('id' => $supervisor),

        );
        // return $data;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/update', ['json' => [
            "agents"   => array($data),
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();


    }

    public function settleBusinessCommissions(Request $request){
        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/commission_settlement', ['json' => [
            'agent_id' => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }


    public function getBusinessDevices(Request $request){
        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/get_devices', ['json' => [
            'agent_id' => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getBusinessEmployees(Request $request){
        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/get_employees', ['json' => [
            'agent_id' => $id,
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getBusinessTransactions(Request $request){
        $id = $request->input('id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/get_transaction_history', ['json' => [
            'agent_id'   => $id,
            'start_date' => $start_date,
            'end_date'   => $end_date,
            "admin_id"   => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getBillerTransactions(Request $request){
        $id = $request->input('id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/biller_crud/get_transaction_history', ['json' => [
            'biller_id'  => $id,
            'start_date' => $start_date,
            'end_date'   => $end_date,
            "admin_id"   => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getProductTransactions(Request $request){
        $id = $request->input('id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/product_crud/get_transaction_history', ['json' => [
            'product_id' => $id,
            'start_date' => $start_date,
            'end_date'   => $end_date,
            "admin_id"   => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function assignEmployeeToAgent(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $cellphone = $request->input('cellphone');
        $agentId = $request->input('agentId');

        $data = array(
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'cellphone' => (string)$cellphone,
            'agentId'   => array('id' => $agentId),
        );
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/employee_crud/add', ['json' => [
            "employees" => array($data),
            "admin_id"  => Auth::user()->id,
        ]]);
        echo $res->getBody();
    }

    public function activateEmployee(Request $request){
        $id = $request->input('id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $cellphone = $request->input('cellphone');
        $agentId = $request->input('agentId');

        $data = array(
            'id'        => $id,
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'cellphone' => (string)$cellphone,
            'agentId'   => array('id' => $agentId),
        );
        $client = new GuzzleHttp\Client();

        $res = $client->post(env('BASE_URL') . '/employee_crud/update', ['json' => [
            "employees" => array($data),
            "admin_id"  => Auth::user()->id,
        ]]);
        echo $res->getBody();
    }

    public function deactivateEmployee(Request $request){

        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/employee_crud/deactivate', ['json' => [
            'employee_id' => $id,
            "admin_id"    => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }


    public function getAgentSupervisor(){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/agent_supervisor_crud/get');
        echo $res->getBody();
        Log::info('Agent Supervisors Retrieved by ' . Auth::user()->name);

    }

    public function addAgentSupervisor(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $address = $request->input('address');
        $cellphone = $request->input('cellphone');
        $email = $request->input('email');
        $balance = $request->input('balance');
        $commission = $request->input('commission');
        $landline = $request->input('landline');


        $data = array(
            'firstname'  => $firstname,
            'lastname'   => $lastname,
            'address'    => $address,
            'cellphone'  => $cellphone,
            'landline'   => $landline,
            'email'      => $email,
            'balance'    => (float)$balance,
            'commission' => (float)$commission,
        );
        //return $data;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_supervisor_crud/add', ['json' => [
            "supervisors" => array($data),
            "admin_id"    => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function updateAgentSupervisor(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $address = $request->input('address');
        $cellphone = $request->input('cellphone');
        $email = $request->input('email');
        $balance = $request->input('balance');
        $commission = $request->input('commission');
        $landline = $request->input('landline');
        $id = $request->input('id');


        $data = array(
            'id'         => $id,
            'firstname'  => $firstname,
            'lastname'   => $lastname,
            'address'    => $address,
            'cellphone'  => $cellphone,
            'landline'   => $landline,
            'email'      => $email,
            'balance'    => (float)$balance,
            'commission' => (float)$commission,
        );
        //return $data;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_supervisor_crud/update', ['json' => [
            "supervisors" => array($data),
            "admin_id"    => Auth::user()->id,

        ]]);
        echo $res->getBody();
    }

    public function deleteAgentSupervisor(Request $request){

        $id = $request->input('id');
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_supervisor_crud/deactivate', ['json' => [
            'supervisor_id' => $id,
            "admin_id"      => Auth::user()->id,

        ]]);
        echo $res->getBody();

    }

    public function getFeesandCommission(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/fnc_operations/getFeesAndCommissionList');
        echo $res->getBody();
    }

    public function getClassOfService(){

        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/class_of_service/get');
        echo $res->getBody();

    }

    public function addClientClassOfService(Request $request){
        $name = $request->input('personal_name');
        $description = $request->input('personal_description');
        $external_reference = $request->input('personal_external_reference');
        $external_url = $request->input('personal_external_url');
        $fnc_id = $request->input('personal_fnc_id');
        $data = array(
            'type'               => 'personal',
            'name'               => $name,
            'description'        => $description,
            'external_reference' => (boolean)$external_reference,
            'external_url'       => $external_url,
            'fnc_id'             => array('id' => $fnc_id),
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/class_of_service/add', ['json' => $data]

        );
        echo $res->getBody();
    }

    public function addBusinessClassOfService(Request $request){
        $name = $request->input('business_name');
        $description = $request->input('business_description');
        $external_reference = $request->input('business_external_reference');
        $external_url = $request->input('business_external_url');
        $fnc_id = $request->input('business_fnc_id');
        $agency_banking = $request->input('business_agency_banking');
        $cashin = $request->input('business_cash_in');
        $cashout = $request->input('business_cash_out');
        $deposit_management = $request->input('business_deposit_management');
        $paybill = $request->input('business_paybill');
        $pay_merchant = $request->input('business_paymerchant');
        $enrollment = $request->input('business_enrollment');
        $disbursement = $request->input('business_disbursement');
        $data = array(
            'type'               => 'business',
            'name'               => $name,
            'description'        => $description,
            'external_reference' => (boolean)$external_reference,
            'external_url'       => $external_url,
            'fnc_id'             => array('id' => $fnc_id),
            'agency_banking'     => (boolean)$agency_banking,
            'cashin'             => (boolean)$cashin,
            'cashout'            => (boolean)$cashout,
            'deposit_management' => (boolean)$deposit_management,
            'paybill'            => (boolean)$paybill,
            'paymerchant'        => (boolean)$pay_merchant,
            'enrollment'         => (boolean)$enrollment,
            'disburment'         => (boolean)$disbursement,
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/class_of_service/add', ['json' => $data]
        );
        echo $res->getBody();

    }

    public function addBankClassOfService(Request $request){
        $name = $request->input('bank_name');
        $external_url = $request->input('bank_external_url');
        $fnc_id = $request->input('bank_fnc_id');
        $balance_enquiry = $request->input('bank_enquiry');
        $deposit = $request->input('bank_deposit');
        $withdrawal = $request->input('bank_withdrawal');
        $statement = $request->input('bank_statement');
        $transfer = $request->input('bank_transfer');

        $data = array(
            'type'            => 'bank',
            'name'            => $name,
            'deposit'         => (boolean)$deposit,
            'external_url'    => $external_url,
            'fnc_id'          => array('id' => $fnc_id),
            'balance_enquiry' => (boolean)$balance_enquiry,
            'statement'       => (boolean)$statement,
            'transfer'        => (boolean)$transfer,
            'withdrawal'      => (boolean)$withdrawal,

        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/class_of_service/add', ['json' => $data]


        );
        echo $res->getBody();
    }

    public function getBusiness(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/agent_crud/get');
        echo $res->getBody();
        Log::info('Businesses Retrieved by ' . Auth::user()->name);


    }

    public function deactivateBusiness(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/deactivate', ['json' => [
            'agent_id' => $request->input('agent_id')]]);
        echo $res->getBody();

    }


    public function getBusinessForUpdate(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/agent_crud/get_for_update');
        echo $res->getBody();
    }


    public function getStatementOfAccounts(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $data = array(
            'start_date' => $start_date,
            'end_date'   => $end_date,
        );
        $client = new GuzzleHttp\Client();
        $res = $client->post('https://ssl.getcash.co.zw/live-rep/generic/accounts', ['json' => $data]);
        echo $res->getBody();
    }

    public function getClosingBalances(Request $request){
        $date = $request->input('date');
        $client = new GuzzleHttp\Client(['exceptions' => false]);
        $res = $client->post('http://192.168.1.171:8093/mitas-reporting/api/balances/getdate', ['json' => [
            'date' => $date]]);
        echo $res->getBody();
    }

    public function getSummaryOfBalances(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', '192.168.12.194:8090/summary/balances');
        echo $res->getBody();
    }

    public function getPendingEValueTransactions(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/transaction_crud/get_manage_evalue_pending');
        echo $res->getBody();
    }

    public function validateEvalueTransaction(Request $request){
        $type = $request->input('type');
        $trans_id = $request->input('trans_id');
        $data = array(
            'type'     => $type,
            'trans_id' => $trans_id,
            "admin_id" => Auth::user()->id,


        );

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/manage_evalue', ['json' => $data,
            ]

        );
        echo $res->getBody();
    }

    public function initiateEvalueTransaction(Request $request){

        $type = $request->input('type');
        $commission = $request->input('commission');
        $deposit = $request->input('deposit');
        $agent_id = $request->input('agent_id');
        $data = array(
            'type'       => $type,
            'commission' => (string)$commission,
            'deposit'    => (string)$deposit,
            'agent_id'   => $agent_id,
            "admin_id"   => Auth::user()->id,


        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/manage_evalue', ['json' => $data,
            ]

        );
        echo $res->getBody();

    }

    public function initiateBankTransaction(Request $request){
        $type = $request->input('type');
        $bank_account = $request->input('bank_account');
        $bank_branch = $request->input('bank_branch');
        $bank = $request->input('bank');
        $amount = $request->input('amount');
        $agent_id = $request->input('agent_id');
        $data = array(
            'type'         => $type,
            'bank'         => $bank,
            'bank_account' => $bank_account,
            'bank_branch'  => $bank_branch,
            'amount'       => (string)$amount,
            'agent_id'     => $agent_id,
            "admin_id"     => Auth::user()->id,


        );
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/bank_transfer', ['json' => $data,
            ]

        );
        echo $res->getBody();
    }


    public function getPendingBankTransfers(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/transaction_crud/get_bank_transfer_pending');
        echo $res->getBody();
    }

    public function validatePendingBankTransfers(Request $request){
        $type = $request->input('type');
        $trans_id = $request->input('trans_id');
        $data = array(
            'type'     => $type,
            'trans_id' => $trans_id,
            "admin_id" => Auth::user()->id,
        );

        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/agent_crud/bank_transfer', ['json' => $data]

        );
        echo $res->getBody();
    }

    public function getTransactionType(){
        $client = new GuzzleHttp\Client();
        $res = $client->request('GET', env('BASE_URL') . '/trans_type_crud/get');
        echo $res->getBody();
    }

    public function addFeesandCommissions(Request $request){

        $response = NULL;

        $fncs = array(
            'country'           => 'ZW',
            'currency'          => '840',
            'description'       => $request->input('description'),
            'name'              => $request->input('name'),
            'transactionTypeId' => array('id' => (int)$request->input('transactionTypeId')),
        );


        if ((int)$request->input('bankClassOfServiceId') == 0) {
            $bankClassOfServiceId = NULL;
        } else {
            $bankClassOfServiceId = $request->input('bankClassOfServiceId');
            $fncs['bankClassOfServiceId'] = array('id' => $bankClassOfServiceId);


        }
        if ((int)$request->input('clientClassOfServiceId') == 0) {
            $clientClassOfServiceId = NULL;
        } else {
            $clientClassOfServiceId = $request->input('clientClassOfServiceId');
            $fncs['clientClassOfServiceId'] = array('id' => $clientClassOfServiceId);
        }
        if ((int)$request->input('agentClassOfServiceId') == 0) {
            $agentClassOfServiceId = NULL;
        } else {
            $agentClassOfServiceId = $request->input('agentClassOfServiceId');
            $fncs['agentClassOfServiceId'] = array('id' => $agentClassOfServiceId);


        }
        if ((int)$request->input('productId') == 0) {
            $productId = NULL;
        } else {
            $productId = $request->input('productId');
            $fncs['productId'] = array('id' => $productId);


        }

        // return $fncs;
        global $data;
        $data = array();

        $config = new LexerConfig();
        $lexer = new Lexer($config->setIgnoreHeaderLine(true));
        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $interpreter->addObserver(function (array $row){
            try {
                $minAmount = $row[0];
                $maxAmount = $row[1];
                $commissionType = $row[2];
                $commissionPayable = $row[3];
                $taxType = $row[4];
                $taxPayable = $row[5];
                $isFeesInclusive = $row[6];
                $feesType = $row[7];
                $feesPayable = $row[8];
                $feesCharged = $row[9];

                $dataRow = array(
                    'minAmount'         => $minAmount,
                    'maxAmount'         => $maxAmount,
                    'commissionType'    => $commissionType,
                    'commissionPayable' => $commissionPayable,
                    'taxType'           => $taxType,
                    'description'       => 'TEST',
                    'taxPayable'        => $taxPayable,
                    'isFeeInclusive'    => $isFeesInclusive,
                    'feesType'          => $feesType,
                    'feesPayable'       => $feesPayable,
                    'feesCharged'       => $feesCharged,
                );

                global $data;
                array_push($data, $dataRow);


            } catch (Exception $exception) {
                global $countExceptions;
                $countExceptions = $countExceptions + 1;

            }

        });

        $lexer->parse($request->file('csv'), $interpreter);
        if (sizeof($data) == 0) {
            return redirect('/settings/fees-and-commissions/add')->with('info->invalid_format', 'INVALID CSV FORMAT');

        };


        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/fnc_operations/addFeesAndCommissions', ['json' => [
            'fncs'     => array($fncs),
            'profiles' => $data,
            "admin_id" => Auth::user()->id,
        ]]);
        $data = json_decode($res->getBody(), true);

        $description = $data[0]['description'];

        return redirect('/settings/fees-and-commissions/add')->with('response', $description);


    }

    public function addProductData(Request $request){

        global $data;
        $data = array();

        $config = new LexerConfig();
        $lexer = new Lexer($config->setIgnoreHeaderLine(true));
        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $interpreter->addObserver(function (array $row){
            try {
                $pin = $row[0];
                $reference = $row[1];
                $code = $row[2];
                $sellingPrice = $row[3];
                $expiryDate = $row[4];
                $batch = $row[5];

                Netone::create([
                    'BATCH'        => $batch,
                    'CODE'         => $code,
                    'COST'         => $sellingPrice,
                    'EXPIRYDATE'   => $expiryDate,
                    'NETWORK'      => 'Netone',
                    'PIN'          => $pin,
                    'REFERENCE'    => $reference,
                    'SELLINGPRICE' => $sellingPrice,
                    'USED'         => 0,
                ]);
                $dataRow = array(
                    'batch'        => $batch,
                    'code'         => $code,
                    'cost'         => $sellingPrice,
                    'expirydate'   => $expiryDate,
                    'network'      => 'Netone',
                    'pin'          => $pin,
                    'reference'    => $reference,
                    'sellingprice' => $sellingPrice,
                    'used'         => 0,

                );

                global $data;
                array_push($data, $dataRow);


            } catch (ErrorException $exception) {
                global $countExceptions;
                $countExceptions = $countExceptions + 1;

                return redirect('/product/view')->with('info->invalid_format', 'INVALID CSV!');


            }

        });

        $lexer->parse($request->file('csv'), $interpreter);
        if (sizeof($data) == 0) {
            return redirect('/product/view')->with('info->invalid_format', 'INVALID CSV FORMAT');

        };
        //dd(json_encode($data));

        $description = 'Success';

        return redirect('/product/view')->with('response', $description);


    }

    public function addTransactionalLimits(Request $request){

        $data = array(
            'dailyLimit'        => (double)$request->input('dailyLimit'),
            'monthlyLimit'      => (double)$request->input('monthlyLimit'),
            'minSessionLimit'   => (double)$request->input('minSessionLimit'),
            'maxSessionLimit'   => (double)$request->input('maxSessionLimit'),
            'bankId'            => array('id' => $request->input('bankId')),
            'clientId'          => array('id' => $request->input('bankId')),
            'agentId'           => array('id' => $request->input('agentId')),
            'productId'         => array('id' => $request->input('productId')),
            'transactionTypeId' => array('id' => $request->input('transactionTypeId')),


        );
        //return $data;
        $client = new GuzzleHttp\Client();
        $res = $client->post(env('BASE_URL') . '/limit_crud/add', ['json' => [
            'limits'   => array($data),
            'type'     => $request->input('type'),
            "admin_id" => Auth::user()->id,

        ]]);
        echo $res->getBody();


    }

    public function getTransactionBands(Request $request){
        function transactionBand($transactionName, $startDate, $endDate){

            //////////////
            $value0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [0, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [0, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////

            $value5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $valueTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [0, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volumeTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('amount', [0, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();

            ////////////////////////////

            return (array(
                'transactionType' => $transactionName,
                'gr0to5'          => array(
                    'volume' => $volume0to4,
                    'value'  => $value0to4,
                ),
                'gr5to10'         => array(
                    'volume' => $volume5to10,
                    'value'  => $value5to10,
                ),
                'gr11to30'        => array(
                    'volume' => $volume11to30,
                    'value'  => $value11to30,
                ),
                'gr31to50'        => array(
                    'volume' => $volume30to50,
                    'value'  => $value30to50,
                ),
                'gr51to100'       => array(
                    'volume' => $volume51to100,
                    'value'  => $value51to100,
                ),
                'gr101to200'      => array(
                    'volume' => $volume100to200,
                    'value'  => $value100to200,
                ),
                'gr201to'         => array(
                    'volume' => $volume200to10000,
                    'value'  => $value200to10000,
                ),
                'total'           => array(
                    'volume' => $volumeTotal,
                    'value'  => $valueTotal,
                ),
            ));

        }

        return transactionBand($request->transactionName, $request->startDate, $request->endDate);


    }

    public function getTransactionBandsCommissions(Request $request){
        function transactionBand($transactionName, $startDate, $endDate){

            //////////////
            $value0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [0.01, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [0.01, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////

            $value5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volume200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $valueTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [0.01, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('commission');

            $volumeTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->whereBetween('commission', [0.01, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();

            ////////////////////////////

            return (array(
                'transactionType' => $transactionName,
                'gr0to5'          => array(
                    'volume' => $volume0to4,
                    'value'  => $value0to4,
                ),
                'gr5to10'         => array(
                    'volume' => $volume5to10,
                    'value'  => $value5to10,
                ),
                'gr11to30'        => array(
                    'volume' => $volume11to30,
                    'value'  => $value11to30,
                ),
                'gr31to50'        => array(
                    'volume' => $volume30to50,
                    'value'  => $value30to50,
                ),
                'gr51to100'       => array(
                    'volume' => $volume51to100,
                    'value'  => $value51to100,
                ),
                'gr101to200'      => array(
                    'volume' => $volume100to200,
                    'value'  => $value100to200,
                ),
                'gr201to'         => array(
                    'volume' => $volume200to10000,
                    'value'  => $value200to10000,
                ),
                'total'           => array(
                    'volume' => $volumeTotal,
                    'value'  => $valueTotal,
                ),
            ));

        }

        return transactionBand($request->transactionName, $request->startDate, $request->endDate);


    }

    public function getTransactionBandsProducts(Request $request){
        //return $request->all();
        function transactionBandProduct($transactionName, $startDate, $endDate, $productId, $productName){
            //////////////
            $value0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [0, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume0to4 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [0, 4.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////

            $value5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume5to10 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [5, 10.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume11to30 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [11, 30.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume30to50 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [31, 50.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            //////////////////////////// //////////////
            $value51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume51to100 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [51, 100.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume100to200 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [101, 200.99])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();
            ////////////////////////////
            $value200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volume200to10000 = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [201, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();

            $valueTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [0, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->sum('amount');

            $volumeTotal = Transaction::where('description', 'like', "%$transactionName%")
                ->where('description', 'not like', '%Preauth%')
                ->where('description', 'not like', '%Reversal%')
                ->where('description', 'not like', '%REVERSED%')
                ->where('product_id', '=', $productId)
                ->whereBetween('amount', [0, 1000000])
                ->whereBetween('date', [$startDate, $endDate])
                ->count();

            ////////////////////////////

            return (array(
                'productName' => $productName,
                'gr0to5'      => array(
                    'volume' => $volume0to4,
                    'value'  => $value0to4,
                ),
                'gr5to10'     => array(
                    'volume' => $volume5to10,
                    'value'  => $value5to10,
                ),
                'gr11to30'    => array(
                    'volume' => $volume11to30,
                    'value'  => $value11to30,
                ),
                'gr31to50'    => array(
                    'volume' => $volume30to50,
                    'value'  => $value30to50,
                ),
                'gr51to100'   => array(
                    'volume' => $volume51to100,
                    'value'  => $value51to100,
                ),
                'gr101to200'  => array(
                    'volume' => $volume100to200,
                    'value'  => $value100to200,
                ),
                'gr201to'     => array(
                    'volume' => $volume200to10000,
                    'value'  => $value200to10000,
                ),
                'total'       => array(
                    'volume' => $volumeTotal,
                    'value'  => $valueTotal,
                ),
            ));

        }

        return transactionBandProduct($request->transactionName, $request->startDate, $request->endDate, $request->product_id, $request->productName);


    }


    public function getSubscriberReports(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://192.168.1.171:8093/mitas-reporting/api/subscribers');
        echo $res->getBody();
    }

    public function getAgentReports(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://192.168.1.171:8093/mitas-reporting/api/agents');
        echo $res->getBody();
    }

    public function getProductReports(Request $request){
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://192.168.1.171:8093/mitas-reporting/api/products');
        echo $res->getBody();
    }


}
