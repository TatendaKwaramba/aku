<button id="10005"
        class=" modal-action modal-close waves-effect  btn-flat teal darken-1 white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="showSettleClient()">Settle Client
</button>