<?php
/**
 * Created by PhpStorm.
 * User: MedicineMavhondo
 * Date: 15/10/2016
 * Time: 15:39
 */

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use GuzzleHttp;


use App\Client;
use App\Transaction;


class DashboardController extends Controller
{
    //
    public function getDashboard()
    {
        return view('reports.dashboard.dashboard');
    }

    public function getSubscriberGeneralReports()
    {
        $subCount = Client::count();

    }
    public function getAgentGeneralReports()
    {
        return Agent::count();

    }

    public function getSubscriberP2PReports()
    {
        $client = new GuzzleHttp\Client();

        $res = $client->get('http://192.168.1.80:8093/mitas-reporting/api/p2p');

        echo $res->getBody();

    }

    public function getSubscriberProductReports(Request $request)
    {
        return Transaction::where('client_id', '<>', null)
            ->where('transaction.description','like','%Pay Bills%')
            ->where('transaction.description','not like','%Preauth%')
            ->where('transaction.description','not like','%Reversal%')
            ->where('transaction.description','not like','%REVERSED%')
            ->where('product_id', '<>', null)
            ->groupBy('product_id')
            ->join('product', 'product.id', 'product_id')
            ->selectRaw('product_id, sum(amount) as sumAmount,count(*) as transactions, product.name as product')
            ->get();

    }

    public function getAgentProductReports(Request $request)
    {
        return Transaction::where('agent_id', '<>', null)
            ->where('transaction.description','like','%Pay Bills%')
            ->where('transaction.description','not like','%Preauth%')
            ->where('transaction.description','not like','%Reversal%')
            ->where('transaction.description','not like','%REVERSED%')
            ->where('product_id', '<>', null)
            ->groupBy('product_id')
            ->join('product', 'product.id', 'product_id')
            ->selectRaw('product_id, sum(amount) as sumAmount,count(*) as transactions, product.name as product')
            ->get();

    }

    public function getBillerGeneralReports()
    {
        $client = new GuzzleHttp\Client();

        $res = $client->post('http://192.168.1.80:8093/mitas-reporting/api/billers',['json'=>[
            'startDate'=>'2010-02-10',
            'endDate'=>'2100-01-01'
        ]]);

        echo $res->getBody();

    }

    public function getDeviceGeneralReports()
    {
        $client = new GuzzleHttp\Client();

        $res = $client->get('http://192.168.1.80:8093/mitas-reporting/api/devices');

        echo $res->getBody();

    }

    public function getZesaSales(){

        $client = new GuzzleHttp\Client();

        $res = $client->get('https://dashboard.getcash.co.zw/zesa');

        echo $res->getBody();

    }

    public function getEconetSales(){

        $client = new GuzzleHttp\Client();

        $res = $client->get('https://dashboard.getcash.co.zw/econet');

        echo $res->getBody();

    }

    public function getTelecelSales(){

        $client = new GuzzleHttp\Client();

        $res = $client->get('https://dashboard.getcash.co.zw/telecel');

        echo $res->getBody();

    }

    public function getNetoneSales(){

        $client = new GuzzleHttp\Client();

        $res = $client->get('https://dashboard.getcash.co.zw/netone');

        echo $res->getBody();

    }

    public function getZolSales(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/zol');
        echo $res->getBody();
    }

    public function getTeloneSales(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/telone');
        echo $res->getBody();
    }

    public function getCashIns(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/cashin');
        echo $res->getBody();
    }

    public function getCashOuts(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/cashout');
        echo $res->getBody();
    }

    public function getSendMoney(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/sendmoney');
        echo $res->getBody();
    }

    public function getPowertelMobile(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/powertel-mobile');
        echo $res->getBody();
    }

    public function getPowertelAccount(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/powertel-account');
        echo $res->getBody();
    }

    public function getClients(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/clients');
        echo $res->getBody();
    }

    public function getAgents(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/agents');
        echo $res->getBody();
    }

    public function getInsurance(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/insurance');
        echo $res->getBody();
    }

    public function getCityCouncils(){
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://dashboard.getcash.co.zw/city-councils');
        echo $res->getBody();
    }

}
