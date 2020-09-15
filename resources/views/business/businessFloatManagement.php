<button id="20006" class="modal-action modal-close waves-effect waves btn-flat green accent-3
            white-text <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="manageFloat()"><i class="fa fa-money" aria-hidden="true"></i> MANAGE FLOAT
</button>