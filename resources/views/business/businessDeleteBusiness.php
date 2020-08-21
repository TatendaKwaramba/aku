<button id="20004" class=" modal-action modal-close waves-effect waves btn-flat orange darken-3 white-text

                <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="deleteBusiness()"><i class="fa fa-close" aria-hidden="true"></i> DEACTIVATE
</button>