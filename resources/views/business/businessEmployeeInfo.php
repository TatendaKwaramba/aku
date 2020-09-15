<button id="20003" class=" modal-action modal-close waves-effect waves btn-flat amber white-text
                <?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"
        ng-click="updateEmployeePage()"><i class="fa fa-female" aria-hidden="true"></i> EMPLOYEES
</button>