<button id="70002"
    class=" modal-action modal-close waves-effect  btn-flat purple white-text
    <?php if (Auth::user()->hasRole('admin_global')) {
        echo " uiroles ";
    } ?>"
        ng-click="viewTransactions()">
    <span class="fa fa-file-text-o" aria-hidden="true"></span>
    VIEW PRODUCT TRANSACTIONS
</button>