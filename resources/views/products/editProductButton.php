<button id="70001"
    class=" modal-action modal-close waves-effect  btn-flat blue white-text
    <?php if (Auth::user()->hasRole('admin_global')) {
        echo " uiroles ";
    } ?>"
        ng-click="updateProduct(productInfo)">
    <span class="fa fa-pencil-square-o" aria-hidden="true"></span>
    EDIT
</button>