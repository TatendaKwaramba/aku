<span id="70003" class="<?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"><button ng-if="productInfo.state == 'ACTIVE'"
              class=" modal-action modal-close waves-effect  btn-flat red white-text"
              ng-click="deleteProduct(productInfo)">
    <span class="fa fa-trash-o" aria-hidden="true"></span>
    DELETE
</button>
<button ng-if="productInfo.state == 'DEACTIVATED'"
        class=" modal-action modal-close waves-effect  btn-flat green accent-4 white-text"
        ng-click="activateProduct(productInfo)">
    <span class="fa fa-check" aria-hidden="true"></span>
    ACTIVATE
</button>
</span>