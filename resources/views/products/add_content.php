<div style="margin: 10px;" class="card" class="addProductForm" ng-controller="addProductController" ng-cloak>
    <div class="card-content with-padding teal white-text" style="font-size: large">
        <strong><i class="fa fa-shopping-bag white-text "></i> ADD PRODUCT</strong>
    </div>

    <div class="card-content with-padding">
        <div class="row">
            <form class="col s12" name="addProductForm" id="addProductForm"  ng-submit="postProduct()">

                <div class="row">
                    <div class="input-field col s12">
                        <md-select ng-model="billerID" placeholder="Select Biller" name="billerName" required
                                   ng-disabled="!billers.length">
                            <md-option ng-repeat="biller in billers" value="{{biller.id}}">{{biller.company}}
                            </md-option>
                        </md-select>

                        <div ng-messages="addProductForm.billerName.$error"
                             ng-if="addProductForm.billerName.$dirty || addProductForm.billerName.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Please select a Biller!</strong></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="productName" id="productName" ng-model="productName" type="text" class="validate"
                               required>
                        <label for="productName">Product Name</label>

                        <div ng-messages="addProductForm.productName.$error"
                             ng-if="addProductForm.productName.$dirty || addProductForm.productName.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Product Name is required!</strong></div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input name="productCategory" ng-model="productCategory" id="productCategory" type="text"
                               class="validate" required>
                        <label for="productCategory">Category</label>

                        <div ng-messages="addProductForm.productCategory.$error"
                             ng-if="addProductForm.productCategory.$dirty || addProductForm.productCategory.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Product
                                    Category is required!</strong></div>
                        </div>
                    </div>

                    <div class="input-field col s6">
                        <input name="agentCommission" ng-model="agentCommission" id="agentCommission" type="text"
                               class="validate" pattern="^\d{1,2}((\.\d{1,2})?$)" required>
                        <label for="agentCommission">Product Commission</label>
                        <div ng-messages="addProductForm.agentCommission.$error"
                             ng-if="addProductForm.agentCommission.$dirty || addProductForm.agentCommission.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Agent Commission is required!</strong></div>
                            <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Invalid Agent Commission!</strong></div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <!--<div class="input-field col s6">
                        <input name="preauthCustomerInfo" ng-model="preauthCustomerInfo" id="preauthCustomerInfo"
                               type="text" class="validate" required>
                        <label for="preauthCustomerInfo">Preauth Customer Information</label>
                        <div ng-messages="addProductForm.preauthCustomerInfo.$error"
                             ng-if="addProductForm.preauthCustomerInfo.$dirty || addProductForm.preauthCustomerInfo.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Preauth Customer Information is required!</strong></div>
                        </div>
                    </div>-->

                    <div class="input-field col s12">
                        <input name="postPayment" ng-model="postPayment" id="postPayment" type="text" class="validate" >
                        <label for="postPayment">Post Payment</label>
                    </div>
                </div>


                <div class="row ">
                    <div class="input-field col s6">
                        <input name="billReference" ng-model="billReference" id="billReference" type="text"
                               class="validate" required>
                        <label for="billReference">Bill Reference</label>

                        <div ng-messages="addProductForm.billReference.$error"
                             ng-if="addProductForm.billReference.$dirty || addProductForm.billReference.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Bill Reference is required</strong></div>
                        </div>
                    </div>

                    <div class="input-field col s6">
                        <input name="billReferenceFormat" ng-model="billReferenceFormat" id="billReferenceFormat"
                               type="text" class="validate" required>
                        <label for="billReferenceFormat">Bill Reference Format</label>

                        <div ng-messages="addProductForm.billReference.$error"
                             ng-if="addProductForm.billReference.$dirty || addProductForm.billReference.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Bill
                                    Reference
                                    Format is required</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="input-field col s12">
                        <input name="mask" ng-model="billMask" id="mask" type="text" class="validate" required>
                        <label for="mask">Mask</label>

                        <div ng-messages="addProductForm.mask.$error"
                             ng-if="addProductForm.mask.$dirty || addProductForm.mask.$touched">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Mask is required</strong></div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <label for="fandc"><b>FEES AND COMMISSION</b></label>
                        <select class="browser-default" id="fandc" required>
                            <option value="" disabled selected>Choose Fees And Commission</option>
                            <option ng-repeat="fc in fandc" value="{{fc.id}}">{{fc.name}}
                            </option>
                        </select>
                    </div>

                </div>

                <div class="row">
                        <div class="input-field col s6">
                            <input type="checkbox" name="clientSMS" id="clientSMS" ng-model="clientSMS">
                            <label for="clientSMS">Activate Client SMS</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="checkbox" name="pinless" id="pinless" ng-model="pinless">
                            <label for="pinless">Allow PIN-less Transactions</label>
                        </div>
                </div>
                <div class="row" ng-show="pinless">
                        <div class="input-field col s12">
                            <input type="number" name="maxPinless" id="maxPinless" ng-model="maxPinless" ng-required="pinless" >
                            <label for="maxPinless">Maximum Amount Allowed For PIN-less Transactions</label>
                        </div>
                </div>

                <br>
                <div class="row">
                    <center>
                        <button type="submit" ng-show="submit_button"
                                class="btn col s12 blue">
                            <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                        </button>
                        <div class="progress" ng-show="progress_indicator">
                            <div class="indeterminate"></div>
                        </div>
                    </center>
                </div>

            </form>
        </div>
    </div>

</div>