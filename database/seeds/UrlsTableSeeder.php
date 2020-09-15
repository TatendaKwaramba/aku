<?php

use Illuminate\Database\Seeder;
use App\Url;

class UrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urls')->delete();
        Url::create(array("id"=>1, "path"=>"/home"));

        Url::create(array("id"=>21, "path"=>"/client/list"));
        Url::create(array("id"=>22, "path"=>"/client/update"));
        Url::create(array("id"=>210, "path"=>"/api/client/get"));
        Url::create(array("id"=>220, "path"=>"/api/client/resetPin"));
        Url::create(array("id"=>230, "path"=>"/api/clients/transactions"));
        Url::create(array("id"=>240, "path"=>"/api/clients/update"));
        Url::create(array("id"=>250, "path"=>"/api/classofservice/get"));


        Url::create(array("id"=>31, "path"=>"/business/add"));
        Url::create(array("id"=>310, "path"=>"/api/business/add/agent"));

        Url::create(array("id"=>32, "path"=>"/business/view"));
        Url::create(array("id"=>33, "path"=>"/business/supervisor/add"));
        Url::create(array("id"=>34, "path"=>"/business/supervisor/view"));
        Url::create(array("id"=>35, "path"=>"/business/validation/pending"));
        Url::create(array("id"=>36, "path"=>"/business/validation/bank_transfer/pending"));

        Url::create(array("id"=>320, "path"=>"/api/business/get"));
        Url::create(array("id"=>321, "path"=>"/api/business/devices"));
        Url::create(array("id"=>322, "path"=>"/api/business/assign/device"));
        Url::create(array("id"=>323, "path"=>"/api/business/assign/employee"));
        Url::create(array("id"=>324, "path"=>"/api/employee/activate"));
        Url::create(array("id"=>325, "path"=>"/api/employee/deactivate"));
        Url::create(array("id"=>326, "path"=>"/api/business/update"));

        Url::create(array("id"=>3230, "path"=>"/api/business/employees"));
        Url::create(array("id"=>3231, "path"=>"/api/business/transactions"));


        Url::create(array("id"=>3201, "path"=>"/api/e_value/initiate"));
        Url::create(array("id"=>3202, "path"=>"/api/banks_transfer/initiate"));
        Url::create(array("id"=>3203, "path"=>"/api/transaction_type/get"));



        Url::create(array("id"=>340, "path"=>"/api/business/supervisor/get"));
        Url::create(array("id"=>350, "path"=>"/api/e_value/pending"));
        Url::create(array("id"=>360, "path"=>"/api/banks_transfer/pending"));




        Url::create(array("id"=>41, "path"=>"/billers/add"));
        Url::create(array("id"=>42, "path"=>"/billers/view"));
        Url::create(array("id"=>420, "path"=>"/api/billers/get_billers"));
        Url::create(array("id"=>430, "path"=>"/api/billers/transactions"));


        Url::create(array("id"=>51, "path"=>"/bank/add"));
        Url::create(array("id"=>52, "path"=>"/bank/view"));
        Url::create(array("id"=>520, "path"=>"/api/bank/get"));

        Url::create(array("id"=>61, "path"=>"/accounting/balance-summary"));
        Url::create(array("id"=>62, "path"=>"/accounting/statement-of-accounts"));
        Url::create(array("id"=>63, "path"=>"/accounts/adjustments"));
        Url::create(array("id"=>64, "path"=>"/account/business-settlement"));
        Url::create(array("id"=>610, "path"=>"/api/accounting/statement-of-accounts"));

        Url::create(array("id"=>71, "path"=>"/reports/dashboard"));
        Url::create(array("id"=>72, "path"=>"/reports/transactions"));
        Url::create(array("id"=>73, "path"=>"/reports/sms_logs"));
        Url::create(array("id"=>74, "path"=>"/reports/emails"));
        Url::create(array("id"=>75, "path"=>"/reports/notifications"));
        Url::create(array("id"=>720, "path"=>"/api/reports/get_transactions"));

        Url::create(array("id"=>81, "path"=>"/product/add"));
        Url::create(array("id"=>82, "path"=>"/product/view"));
        Url::create(array("id"=>810, "path"=>"/api/products/add_products/"));
        Url::create(array("id"=>820, "path"=>"/api/products/get_product/"));
        Url::create(array("id"=>821, "path"=>"/api/product/transactions"));
        Url::create(array("id"=>822, "path"=>"/api/products/deactivate/"));

        Url::create(array("id"=>91, "path"=>"/devices/add"));
        Url::create(array("id"=>92, "path"=>"/devices/view"));
        Url::create(array("id"=>910, "path"=>"/api/devices/add_devices"));
        Url::create(array("id"=>920, "path"=>"/api/devices/get_devices"));

        Url::create(array("id"=>101, "path"=>"/settings/view_admin"));
        Url::create(array("id"=>102, "path"=>"/settings/view_roles"));
        Url::create(array("id"=>103, "path"=>"/settings/admin/roles/creat"));
        Url::create(array("id"=>104, "path"=>"/settings/classofservice/add"));
        Url::create(array("id"=>105, "path"=>"/settings/admin/roles/configuration"));
        Url::create(array("id"=>107, "path"=>"/settings/fees-and-commissions/add"));
        Url::create(array("id"=>108, "path"=>"/settings/transactional-limits/add"));
        Url::create(array("id"=>1010, "path"=>"/admin/users"));
        Url::create(array("id"=>1020, "path"=>"/admin/roles"));
        Url::create(array("id"=>1050, "path"=>"/admin/elements"));

        Url::create(array("id"=>106, "path"=>"/settings/view_admin/pending", 'created_by'=>'Nyasha Marufu', 'created_by_id'=>1, 'approved_by'=>'eCanaan'));
        Url::create(array("id"=>10601, "path"=>"/api/users/approve", 'created_by'=>'Nyasha Marufu', 'created_by_id'=>1, 'approved_by'=>'eCanaan'));
        Url::create(array("id"=>10602, "path"=>"/api/users/delete_pending", 'created_by'=>'Nyasha Marufu', 'created_by_id'=>1, 'approved_by'=>'eCanaan'));



    }
}
