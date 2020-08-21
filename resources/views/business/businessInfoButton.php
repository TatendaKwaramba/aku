<button id="20001" class=" modal-action modal-close waves-effect waves btn-flat blue white-text
                    <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?> "
        ng-click="updateBusinessPage()"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>INFORMATION
</button>