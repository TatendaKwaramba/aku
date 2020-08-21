<button id="50001"
    class=" modal-action modal-close waves-effect waves-green btn-flat green white-text
<?php if (Auth::user()->hasRole('admin_global')) {
        echo " uiroles ";
    } ?>"
    ng-click="validateTransaction()"><i class="fa fa-check"></i> VALIDATE
</button>