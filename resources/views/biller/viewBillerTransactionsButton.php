<button id="30002"
    class=" modal-action modal-close waves-effect  btn-flat purple white-text
    <?php if (Auth::user()->hasRole('admin_global')) {
        echo " uiroles ";
    } ?>"
        ng-click="viewTransactions()"><i class="fa fa-file-text-o"></i> VIEW BILLER TRANSACTIONS
</button>