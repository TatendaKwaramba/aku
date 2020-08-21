<button id="20002" class=" modal-action modal-close waves-effect waves btn-flat teal white-text
                    <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="updateTerminalPage()"><i class="fa fa-mobile" aria-hidden="true"></i> TERMINALS
</button>