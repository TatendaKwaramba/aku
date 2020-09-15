<button id="50002" class=" modal-action modal-close waves-effect waves-green btn-flat red white-text
<?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="reverseTransaction()"><i class="fa fa-times"></i> REVERSE
</button>