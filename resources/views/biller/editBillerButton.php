<button id="30001"
        class=" modal-action modal-close waves-effect  btn-flat blue white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="editBiller()"><i class="fa fa-edit"></i> EDIT BILLER
</button>