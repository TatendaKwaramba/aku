<button id="30003"
        class=" modal-action modal-close waves-effect  btn-flat red white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="deleteBiller()"><i class="fa fa-trash"></i> DELETE BILLER
</button>