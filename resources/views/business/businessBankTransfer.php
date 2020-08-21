<button id="20007" class=" modal-action modal-close waves-effect waves btn-flat red white-text
                <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="closeBusiness()"><i class="fa fa-trash-o" aria-hidden="true"></i> CLOSE BUSINESS
</button>