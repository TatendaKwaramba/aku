<button id="10002"
        class=" modal-action modal-close waves-effect btn-flat purple white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="viewClientTransactions()"><i class="fa fa-line-chart"></i> VIEW SUBSCRIBER TRANSACTIONS
</button>