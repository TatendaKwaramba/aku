<div style="margin:10px;"  class="card" class="addSingleBillerForm" ng-controller="addBillerController" ng-cloak>
    <div class="card-content teal with-padding white-text" style="font-size: large">
        <strong><i class="fa fa-user-plus "></i> ADD BILLER</strong>
    </div>

    <div class="card-content with-padding">
        <div class="row">
            <form name="addBillerForm" id="addBillerForm" class="col s12" ng-submit="postBiller()">
                <div class="row">
                    <div class="input-field col s12">
                        <input name = "billerName" ng-model="billerName" id="biller_name" type="text" class="validate" required>
                        <label for="biller_name">Company Name</label>
                        <div ng-messages="addBillerForm.billerName.$error"
                             ng-if="addBillerForm.billerName.$dirty || addBillerForm.billerName.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Biller Name Is Required</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name = "billerAddress" ng-model="billerAddress" id="billerAddress" type="text" class="validate" required>
                        <label for="billerAddress">Address</label>
                        <div ng-messages="addBillerForm.billerAddress.$error"
                             ng-if="addBillerForm.billerAddress.$dirty || addBillerForm.billerAddress.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Biller Address Is Required</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="billerMobile" ng-model="billerMobile" id="billerMobile" type="text"
                               pattern="^(0|263|\+263)7\d{8}$" ng-maxlength="13" class="validate">
                        <label for="billerMobile">Mobile</label>
                        <div ng-messages="addBillerForm.billerMobile.$error"
                             ng-if="addBillerForm.billerMobile.$dirty || addBillerForm.billerMobile.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Mobile Is Required</strong></div>
                            <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Invalid Mobile Number. Please check!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name ="billerEmail" ng-model="billerEmail" id="billerEmail" type="email" class="validate" required>
                        <label for="billerEmail">Email</label>

                        <div ng-messages="addBillerForm.billerEmail.$error"
                             ng-if="addBillerForm.billerEmail.$dirty || addBillerForm.billerEmail.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Email Address is required!</strong></div>
                            <div ng-message="email" style="font-size: x-small" class="red-text"><strong>Invalid Email Address. Please check!</strong></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="billerLandline" ng-model="billerLandline" id="billerLandline" type="text"
                               class="validate">
                        <label for="billerLandline">Landline</label>
                    </div>
                </div>

                <div >
                    <div class="row" >
                            <button type="submit" ng-show="submit_button"
                                class=" btn blue col s12  waves-effect waves-light " >
                            <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                        </button>
                        <div class="progress" ng-show="progress_indicator">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>