<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingsController extends Controller
{

	public function getViewAdminTerminated(){
		return view('settings.admin.view_terminated');
	}

    public function getAddAdmin(){
        return view('settings.add_admin');
    }

    public function getViewAdminPending(){
        return view('settings.admin.admin_view_pending');
    }

    public function getViewAdmin(){
        return view('settings.admin.admin_view');
    }

    public function getRolesAdmin(){
        return view('settings.admin.roles');
    }

    public function getCreateRole(){
        return view(('settings.admin.roles_create'));
    }

    public function getCreatePerm(){
        return view(('settings.admin.perms_create'));
    }

    public function addClassofService(){
        return view (('settings.classofservice.add'));
    }

    public function getRoleConfiguration(){
        return view('settings.admin.role_configurations');
    }
    public function getFeesAndCommissionsAdd(){
        return view('settings.feesandcommissions.add');
    }
    public function getTransactionalLimitsAdd(){
        return view('settings.transactionallimits.add');
    }

    public function getActivityLogs(){
        return view('settings.activitylogs.view');
    }

}
