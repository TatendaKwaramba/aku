<button id="20005" class=" modal-action modal-close waves-effect waves btn-flat indigo accent-3 white-text
                    <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="viewTransactionsPage()"><i class="fa fa-line-chart" aria-hidden="true"></i>
    TRANSACTIONS
</button>