<button id="10001"
        class=" modal-action modal-close waves-effect  btn-flat indigo white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="viewClientFile()">VIEW FULL FILE
</button>