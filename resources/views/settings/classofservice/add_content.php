<br>
<div ng-controller="addClassofServiceController">
    <div class="row">
        <div class="col s12">
            <ul class="tabs z-depth-1">
                <li class="tab col s3 "><a href="#business"><i class="fa fa-shopping-cart"></i>Business Class of
                        Service</a></li>
                <li class="tab col s3 "><a class="active" href="#bank"><i class="fa fa-bank"></i>Bank Class
                        of Service</a>
                </li>
                <li class="tab col s3 "><a href="#personal"><i class="fa fa-group"></i>Personal
                        Class of Service</a>
                </li>
            </ul>
        </div>


        <!--Business Class of Service Tab-->
        <div id="business" class="col s12" style="margin-top:20px">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <form name="addBusinessClassofService" id="addBusinessClassofService" ng-submit="business_class_of_service_submit()">
                            <div>
                                <p><label for="name">NAME</label>
                                    <input placeholder="Enter Name Here" id="name" ng-model="business_name" type="text"
                                           class="validate"
                                           required></p>

                                <p><label for="description">DESCRIPTION</label>
                                    <input placeholder="Enter Description Here" id="description"
                                           ng-model="business_description" type="text"
                                           class="validate"
                                           required></p>


                                <label>FEES AND COMMISSION </label>
                                <select id="fnc_id" ng-model="business_fnc_id" class="select2-select">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option ng-repeat="fc in fandc" value="{{fc.id}}">{{fc.name}}</option>
                                </select>
                                <br/>

                                <p><label for="a_banking">AGENCY BANKING</label>

                                <div id="a_banking" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="agency_banking" ng-model="business_agency_banking"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="c_in">CASH IN</label>

                                <div id="c_in" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="cash_in" ng-model="business_cash_in"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="c_out">CASH OUT</label>

                                <div id="c_out" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="cash_out" ng-model="business_cash_out"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="d_management">DEPOSIT MANAGEMENT</label>

                                <div id="d_management" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="deposit_management"
                                               ng-model="business_deposit_management" class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="d_ment">DISBURSEMENT</label>

                                <div id="d_ment" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="disbursement" ng-model="business_disbursement"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="e_ment">ENROLLMENT</label>

                                <div id="e_ment" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="enrollment" ng-model="business_enrollment"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="personal_bill">PAY BILL</label>

                                <div id="personal_bill" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="paybill" ng-model="business_paybill"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="personal_merchant">PAY MERCHANT</label>

                                <div id="personal_merchant" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="paymerchant" ng-model="business_paymerchant"
                                               class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p><label for="e_reference">EXTERNAL REFERENCE</label>

                                <div id="e_reference" class="switch">
                                    <label>
                                        NO
                                        <input type="checkbox" id="external_reference"
                                               ng-model="business_external_reference" class="red darken-4">
                                        <span class="lever"></span>
                                        YES
                                    </label>
                                </div>
                                </p>
                                <br/>

                                <p id="url" ng-show="business_external_reference">
                                    <label for="business_external_url">EXTERNAL URL</label>
                                    <input
                                        placeholder="Enter URL Here"
                                        id="external_url" type="text"
                                        class="validate"
                                        ng-required="business_external_reference"
                                        ng-model="business_external_url">
                                </p>
                                <br/><br/>

                                <button class="btn waves-effect waves-light btn-large" id="business_submit" type="submit"
                                        name="action" ng-show="business_submit">
                                    Submit
                                    <i class="material-icons right">send</i>
                                </button>
                                <div class="progress" ng-show="business_submit_progress">
                                    <div class="indeterminate"></div>
                                </div>


                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

        <!--Bank Class of Service Tab-->
        <div id="bank" class="col s12" style="margin-top:20px">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <form name="addBankClassofService" id="addBankClassofService" ng-submit="bank_class_of_service_submit()">
                            <p><label for="bank_name">NAME</label>
                                <input placeholder="Enter Name Here" id="bank_name" ng-model="bank_name" type="text"
                                       class="validate"
                                       required></p>

                            <p><label for="bank_external_url">EXTERNAL URL</label>
                                <input placeholder="Enter URL" id="bank_external_url" ng-model="bank_external_url"
                                       type="text" class="validate"
                                       required></p>

                            <label>FEES AND COMMISSION </label>
                            <select id="bank_fnc_id" ng-model="bank_fnc_id" placeholder="Choose Your Option" class="select2-select">
                                <option value="" disabled selected>Choose your option</option>
                                <option ng-repeat="fc in fandc" value="{{fc.id}}">{{fc.name}}</option>

                            </select>
                            <br/>

                            <p><label for="bank_enquiry">BALANCE ENQUIRY</label>

                            <div id="bank_enquiry" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="balance_enquiry" ng-model="bank_enquiry"
                                           class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/>

                            <p><label for="bank_deposit">DEPOSIT</label>

                            <div id="bank_deposit" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="bank_deposit" ng-model="bank_deposit"
                                           class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/>

                            <p><label for="bank_withdrawal">WITHDRAWAL</label>

                            <div id="bank_withdrawal" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="bank_withdrawal" ng-model="bank_withdrawal"
                                           class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/>

                            <p><label for="bank_statement">STATEMENT</label>

                            <div id="bank_statement" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="bank_statement" ng-model="bank_statement"
                                           class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/>

                            <p><label for="bank_transfer">TRANSFER</label>

                            <div id="bank_transfer" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="bank_transfer" ng-model="bank_transfer"
                                           class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/><br/>
                            <button class="btn waves-effect waves-light btn-large" id="business_submit" type="submit"
                                    name="action" ng-show="bank_submit">
                                Submit
                                <i class="material-icons right">send</i>
                            </button>
                            <div class="progress" ng-show="bank_submit_progress">
                                <div class="indeterminate"></div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Personal Class of Service Tab-->
        <div id="personal" class="col s12" style="margin-top:20px">
            <div class="container">
                <div class="card">
                    <div class="card-content">
                        <form name="addPersonalClassofService" id="addPersonalClassofService" ng-submit="personal_class_of_service_submit()">
                            <p><label for="personal_name">NAME</label>
                                <input placeholder="Enter Name Here" id="personal_name" ng-model="personal_name"
                                       type="text" class="validate"
                                       required></p>

                            <p><label for="personal_description">DESCRIPTION</label>
                                <input placeholder="Enter Description Here" id="personal_description"
                                       ng-model="personal_description" type="text"
                                       class="validate"
                                       required></p>

                            <label>FEES AND COMMISSION </label>
                            <select id="personal_fnc_id" ng-model="personal_fnc_id" class="select2-select">
                                <option value="" disabled selected>Choose your option</option>
                                <option ng-repeat="fc in fandc" value="{{fc.id}}">{{fc.name}}</option>
                            </select>
                            <br/>
                            <p><label for="personal_e_reference">EXTERNAL REFERENCE</label>

                            <div id="personal_e_reference" class="switch">
                                <label>
                                    NO
                                    <input type="checkbox" id="personal_external_reference"
                                           ng-model="personal_e_reference" class="red darken-4">
                                    <span class="lever"></span>
                                    YES
                                </label>
                            </div>
                            </p>
                            <br/>

                            <p id="personal_url" ng-show="personal_e_reference"><label for="personal_external_url">EXTERNAL URL</label>
                                <input placeholder="Enter URL Here" id="personal_external_url"
                                       ng-model="personal_external_url" type="text" class="validate"
                                       ng-required="personal_e_reference"></p><br/><br/>

                            <button class="btn waves-effect waves-light btn-large" id="personal_submit" type="submit"
                                    name="action" ng-show="personal_submit">
                                Submit
                                <i class="material-icons right">send</i>
                            </button>
                            <div class="progress" ng-show="personal_submit_progress">
                                <div class="indeterminate"></div>
                            </div>



                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
