<button id="70004"
        class=" modal-action modal-close waves-effect  btn-flat teal white-text
        <?php if (Auth::user()->hasRole('admin_global')) {
            echo " uiroles ";
        } ?>"
        ng-click="showSettleProduct(productInfo)"> SETTLE PRODUCT
</button>