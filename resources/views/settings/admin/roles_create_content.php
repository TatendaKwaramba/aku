<div class="card" class="addRoleForm" ng-controller="rolesController" ng-cloak>
    <div class="card-content with-padding teal white-text" style="font-size: large">
        <strong><i class="fa fa-wrench "></i> ADD ROLE</strong>
    </div>

    <div class="card-content  with-padding">

        <div class="row">
            <div class="col s8">
                <div class="row">
                    <form class="col s12" name="addRoleForm" id="addRoleForm" ng-submit="submitRole()">

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="display_name" id="productName" ng-model="display_name" type="text"
                                       class="validate"
                                       required>
                                <label for="productName">Role Display Name</label>

                                <div ng-messages="addProductForm.productName.$error"
                                     ng-if="addProductForm.productName.$dirty || addProductForm.productName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Permission
                                            Name is required!</strong></div>
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
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Preauth
                                            Customer Information is required!</strong></div>
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

            <div class="col s4">
                <div class="card">
                    <div class="card-content with-padding">
                        <strong> <i class="fa fa fa-plus "></i> Add Permission
                        </strong>

                    </div>
                    <div class="card-content grey lighten-5 with-padding">
                        <div class="btn chip cyan white-text z-depth-1" ng-repeat="x in tempPerms"
                             ng-click="removeTempPerm(x)">
                            {{ x.category + ' ' + x.display_name }}
                            <span ng-show="!x.progress">&#10006</span>
                            <i class="fa fa-spin fa-refresh" ng-show="x.progress">
                            </i>
                        </div>
                    </div>
                    <div class="card-content grey lighten-3 with-padding">
                        <form ng-submit="addTempPerm()">
                            <md-select ng-model="temp_role" id="role_perms"
                                       placeholder="Select Permission" required>
                                <md-option></md-option>
                                <md-option ng-click='addTempPerm(perm)' ng-repeat="perm in perms" value="{{perm}}">{{perm.category + ' ' +
                                    perm.display_name}}
                                </md-option>
                            </md-select>

                           <!-- <button type="submit" class="btn red">
                                Commit
                                <i class="fa fa-spin fa-refresh" ng-show="addPermSubmitProgress"></i>
                            </button>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>