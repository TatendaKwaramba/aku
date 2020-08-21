<div style="margin:10px;"  class="card addSingleBankForm" ng-controller="addBanksController" ng-cloak>
    <div class="card-content teal with-padding white-text" style="font-size: large">
        <strong><i class="fa fa-bank "></i> ADD BANK</strong>
    </div>

    <div class="card-content with-padding">
        <div class="row">
            <form name="addBankForm" id="addBankForm" class="col s12" ng-submit="postBank()">
                <div class="row">
                    <div class="input-field col s12">
                        <input name="bankName" ng-model="bankName" id="bank_name" type="text" class="validate" required>
                        <label for="bank_name">Bank Name</label>

                        <div ng-messages="addBankForm.bankName.$error"
                             ng-if="addBankForm.bankName.$dirty || addBankForm.bankName.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Bank Name Is
                                    Required!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="bankDeposit" ng-model="bankDeposit" id="bankDeposit" type="text"
                               pattern="^\d{1,}((\.\d{1,2})?$)" ng-maxlength="13" class="validate" required>
                        <label for="bankMobile">Deposit</label>

                        <div ng-messages="addBankForm.bankDeposit.$error"
                             ng-if="addBankForm.bankDeposit.$dirty || addBankForm.bankDeposit.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Deposit Is
                                    Required!</strong></div>
                            <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Invalid
                                    Deposit
                                    Amount. Please check!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <md-select ng-model="bankClassofService" id="bank_class_of_service" class=""
                                   placeholder="Choose Class of Service" required>
                            <md-option disabled selected>Choose your option</md-option>
                            <md-option ng-repeat="bankclassofservice in bankClassOfServices" value="{{bankclassofservice.id}}">{{bankclassofservice.name}}</md-option>

                        </md-select>
                        <label for="bank_class_of_service" class="active"><strong>BANK CLASS OF SERVICE</strong></label>
                    </div>

                </div>

                <div class="row">
                    <button type="submit" ng-show="submit_button"
                            class="btn col s12">
                        <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                    </button>
                    <div class="progress" ng-show="progress_indicator">
                        <div class="indeterminate"></div>
                    </div>
                </div>

            </form>
        </div>


    </div>

</div>