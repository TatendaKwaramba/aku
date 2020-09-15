<span id="10005" class="<?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"><button ng-if="clientInfo.state=='ACTIVE'"
        class=" modal-action modal-close waves-effect btn-flat red white-text"
        ng-click="blockSubscriber()"><i class="fa fa-lock"></i> BLOCK
</button>
<button ng-if="clientInfo.state=='PENDING' || clientInfo.state=='BLOCKED'"
        class=" appmodal-action modal-close waves-effect btn-flat green accent-3 white-text"
        ng-click="activateSubscriber()"><i class="fa fa-unlock"></i> ACTIVATE
</button></span>