<span id="70005" class="<?php if (Auth::user()->hasRole('admin_global')) {
    echo " uiroles ";
} ?>"><a ng-if="productInfo.id == 19"
              class=" modal-action modal-close waves-effect  btn-flat green white-text"
              href="/product/add-data/Netone">
    <span class="fa fa-plus-circle" aria-hidden="true"></span>
    LOAD DATA
</a>
</span>