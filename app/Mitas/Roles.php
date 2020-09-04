<?php

namespace App\Mitas;

use App\Http\Controllers\UiController;
use Zizaco\Entrust\EntrustFacade;


class Roles {

    public static function hasElement($elementId){
        return  true;//EntrustFacade::ability(UiController::getRolesForElement($elementId), array(''));
    }

}