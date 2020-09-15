<div style="margin:10px;" class="card addPermsForm" ng-controller="permsController" ng-cloak>
    <div class="card-content with-padding teal white-text" style="font-size: large">
        <strong><i class="fa fa-wrench "></i> ADD PERMISSION</strong>
    </div>

    <div class="card-content  with-padding">
        <div class="row">
            <form class="col s12" name="addPermsForm" id="addPermsForm"  ng-submit="submitPermission()">

                <div class="row">
                    <div class="input-field col s12">
                        <input name="display_name" id="productName" ng-model="display_name" type="text" class="validate"
                               required>
                        <label for="productName">Permission Display Name</label>

                        <div ng-messages="addProductForm.productName.$error"
                             ng-if="addProductForm.productName.$dirty || addProductForm.productName.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Permission Name is required!</strong></div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <input name="category" ng-model="category" id="preauthCustomerInfo"
                               type="text" class="validate" required>
                        <label for="preauthCustomerInfo">Permission Category</label>
                        <div ng-messages="addProductForm.preauthCustomerInfo.$error"
                             ng-if="addProductForm.preauthCustomerInfo.$dirty || addProductForm.preauthCustomerInfo.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Preauth Customer Information is required!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="description" ng-model="description" id="description"
                               type="text" class="validate" required>
                        <label for="description">Description</label>
                        <div ng-messages="$error"
                             ng-if="addProductForm.preauthCustomerInfo.$dirty || addProductForm.preauthCustomerInfo.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Preauth Customer Information is required!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row col s12">
                    <button type="submit"
                            class=" ui  waves-effect waves-light ui fluid primary button">
                        <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                    </button>
                    <div class="progress" ng-show="progress_indicator">
                        <div class="indeterminate"></div>
                    </div>
                </div>

                <div></div>
            </form>
        </div>
    </div>

</div>