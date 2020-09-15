<button id="10003"
        class=" modal-action modal-close waves-effect btn-flat light-blue white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="resetPin()"><i class="fa fa-lock"></i> RESET PIN
</button>