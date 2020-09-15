<!--<span id="20004" class=" modal-action modal-close waves-effect waves btn-flat red white-text
                <?php /*if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} */?>"
        ng-click="deleteBusiness()" ng-if="false"><i class="fa fa-close" aria-hidden="true"></i> DEACTIVATE
</span>-->
<!--
<span id="20004" class="<?php /*if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} */?>"><button ng-if="business.STATE == 'ACTIVE'"
              class=" modal-action modal-close waves-effect  btn-flat red white-text"
              ng-click="deleteBusiness()">
    <span class="fa fa-trash-o" aria-hidden="true"></span>
    DEACTIVATE
</button>
<button ng-if="business.STATE == 'DEACTIVATED'"
        class=" modal-action modal-close waves-effect  btn-flat green accent-4 white-text"
        ng-click="activateProduct()">
    <span class="fa fa-check" aria-hidden="true"></span>
    ACTIVATE
</button>
</span>-->