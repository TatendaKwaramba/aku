<div style="margin:10px;" ng-controller="addBusinessController" ng-cloak>
    <br>
    <div class="row">
        <div id="addAgent" class="col s12">
            <form name="addAgentForm" class="col s12" ng-submit="submitBusinessDetails()">

                <div class="card" class="addSingleAgent">
                    <div class="card-content teal white-text  with-padding " style="font-size: large">
                        <strong><i class="fa fa-archive"></i> BUSINESS PARTICULARS</strong>
                        <span
                                class="right"><strong>{{agent_first_name | uppercase}} {{agent_last_name | uppercase}}</strong></span>
                    </div>

                    <div class="card-content with-padding">
                        <div class="row">

                            <!--NAME-->
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="agent_first_name" id="agent_first_name" ng-model="agent_first_name"
                                           type="text"
                                           class="validate" required autocomplete="off">
                                    <label for="agent_first_name"><strong>NAME</strong></label>
                                    <div ng-messages="addAgentForm.agent_first_name.$error"
                                         ng-if="addAgentForm.agent_first_name.$dirty || addAgentForm.agent_first_name.$touched ">
                                        <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                                Business Name Is Required</strong></div>
                                    </div>
                                </div>
                            </div>

                            <!--ID AND GENDER-->
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="fa fa-id-card-o prefix"></i>
                                    <input name="agent_id_number" id="agent_id_number" ng-model="agent_id_number"
                                           type="text"
                                           class="validate" autocomplete="off">
                                    <label for="agent_first_name"><strong>I.D. NUMBER(if applicable)</strong></label>
                                    <div ng-messages="addAgentForm.agent_id_number.$error"
                                         ng-if="addAgentForm.agent_id_number.$dirty || addAgentForm.agent_id_number.$touched ">
                                        <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                                Agent I.D Number Is Required</strong></div>
                                        <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>
                                                Please Enter A Valid I.D Number</strong></div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select ng-model="agent_gender" id="agent_gender" class="select2-select"
                                            placeholder="Choose Agent Gender" required>
                                        <option disabled selected>Choose your option</option>
                                        <option value="MALE"><i class="fa fa-mars"></i> MALE</option>
                                        <option value="FEMALE"><i class="fa fa-venus"></i> FEMALE</option>
                                    </select>
                                    <label for="agent_gender" class="active"><strong>GENDER</strong></label>
                                </div>

                            </div>
                            <!--COUNTRY-->
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class=" fa fa-globe prefix"></i>
                                    <input name="country" id="country" type="text" ng-model="country" class="validate"
                                           required
                                           autocomplete="off">
                                    <label for="country"><strong>COUNTRY</strong></label>
                                    <div ng-messages="addAgentForm.country.$error"
                                         ng-if="addAgentForm.country.$dirty || addAgentForm.country.$touched ">
                                        <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                                Country
                                                of Incorporation is Required</strong></div>
                                    </div>

                                </div>

                                <div class="input-field col s6">
                                    <i class=" fa fa-calendar prefix"></i>
                                    <input name="dateOfIncorporation" id="date_of_incorporation"
                                           ng-model="agent_dob"
                                           type="date" class="datepicker" autocomplete="off" required>
                                    <label for="date_of_incorporation" class="active"><strong>DATE OF
                                            INCORPORATION / DATE OF BIRTH</strong></label>
                                    <div ng-messages="addAgentForm.agent_dob.$error"
                                         ng-if="addAgentForm.agent_dob.$dirty || addAgentForm.agent_dob.$touched ">
                                        <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                                Date of
                                                Incorporation is Required</strong></div>
                                    </div>
                                </div>
                            </div>
                            <!--EXTERNAL REFERENCE-->
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="fa fa-edit prefix"></i>
                                    <input type="text" name="external_reference" id="external_reference"
                                           ng-model="external_reference">
                                    <label for="external_reference">EXTERNAL REFERENCE</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card" class="businessActivities">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-truck"></i> BUSINESS
                                ACTIVITIES</strong>
                        </div>


                    </div>
                    <div class="card-content with-padding">
                        <div class="row">
                            <div class="input-field col s6">
                                <select ng-model="type_of_company" id="type_of_company" class="select2-select"
                                        placeholder="Choose Type of Company" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="private_limited_company">PRIVATE LIMITED COMPANY</option>
                                    <option value="partnership">PARTNERSHIP</option>
                                    <option value="foundation">FOUNDATION/NGO</option>
                                    <option value="trust">TRUST</option>
                                    <option value="non_resident">NON-RESIDENT/ REPRESENTATIVE OFFICE</option>
                                    <option value="sole">SOLE PROPRIETORSHIP</option>
                                    <option value="school_charity">SCHOOL/ CHARITY</option>
                                    <option value="society">SOCIETY / ASSOCIATION / CLUB</option>
                                    <option value="embassy">EMBASSY</option>
                                    <option value="private_business_corporation">PRIVATE BUSINESS CORPORATION
                                    </option>
                                </select>
                                <label for="type_of_company" class="active"><strong>TYPE OF COMPANY</strong></label>
                            </div>
                            <div class="input-field col s6">
                                <select ng-model="business_activities" id="business_activities" class="select2-select"
                                        placeholder="Choose Business Activities" required>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="manufacturing">MANUFACTURING</option>
                                    <option value="financial">FINANCIAL</option>
                                    <option value="services">SERVICES</option>
                                    <option value="trading">TRADING</option>
                                    <option value="retailing">RETAILING</option>
                                    <option value="sole">SOLE PROPRIETORSHIP</option>
                                    <option value="consultant">CONSULTANT</option>
                                    <option value="wholesale">WHOLESALE</option>
                                    <option value="commissioning_agents">COMMISSIONING AGENTS</option>
                                    <option value="other">OTHER</option>
                                </select>
                                <label for="type_of_company" class="active"><strong>BUSINESS
                                        ACTIVITIES</strong></label>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card" class="classOfService">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-check"></i>
                                CLASS OF SERVICE</strong>
                        </div>


                    </div>
                    <div class="card-content with-padding">
                        <div class="row">
                            <div class="input-field col s12">
                                <select ng-model="agent_class_of_services" id="agent_class_of_services"
                                        name="agent_class_of_services" class="validate select2-select"
                                        placeholder="Choose Class Of Service" required>
                                    <option disabled selected>Choose your option</option>
                                    <option ng-repeat="cc in classOfServices" value="{{cc.id}}">{{cc.name |
                                        uppercase}}
                                    </option>
                                </select>
                                <label for="agent_class_of_services" class="active"><strong>CLASS OF
                                        SERVICE</strong></label>
                                <div ng-messages="addAgentForm.agent_class_of_services.$error"
                                     ng-if="addAgentForm.agent_class_of_services.$dirty || addAgentForm.agent_class_of_services.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Agent
                                            Class of Service is Required</strong></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card" class="contactDetails">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-address-book"></i> CONTACT
                                DETAILS</strong>
                        </div>


                    </div>
                    <div class="card-content with-padding">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class=" fa fa-home prefix"></i>
                                <input name="agent_address" id="agent_address" ng-model="agent_address"
                                       type="text"
                                       class="validate" required autocomplete="off">
                                <label for="physical_address"><strong>PHYSICAL ADDRESS</strong></label>
                                <div ng-messages="addAgentForm.agent_address.$error"
                                     ng-if="addAgentForm.agent_address.$dirty || addAgentForm.agent_address.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Agent
                                            Address is Required</strong></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <i class=" fa fa-phone prefix"></i>
                                <input id="phone" type="text" class="validate" ng-model="merchant_landline"
                                       autocomplete="off">
                                <label for="phone"><strong>LANDLINE NUMBER</strong></label>
                            </div>
                            <div class="input-field col s6">
                                <i class=" fa fa-mobile prefix"></i>
                                <input id="agent_cellphone" name="agent_cellphone" type="text" class="validate"

                                       ng-model="agent_cellphone" autocomplete="off" required>
                                <label for="agent_cellphone"><strong>CELLPHONE NUMBER</strong></label>
                                <div ng-messages="addAgentForm.agent_cellphone.$error"
                                     ng-if="addAgentForm.agent_cellphone.$dirty || addAgentForm.agent_cellphone.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Agent Cellphone Number Is
                                            Required!</strong></div>
                                    <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please
                                            Enter A Valid Cellphone Number</strong></div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class=" fa fa-envelope prefix"></i>
                                <input name="emailAddress" id="email" type="email" ng-model="email_address"
                                       class="validate"
                                       autocomplete="off"
                                       required>
                                <label for="email"><strong>EMAIL ADDRESS</strong></label>
                                <div ng-messages="addAgentForm.emailAddress.$error"
                                     ng-if="addAgentForm.emailAddress.$dirty || addAgentForm.emailAddress.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>An
                                            Email
                                            Address is Required</strong></div>
                                    <div ng-message="email" style="font-size: x-small" class="red-text"><strong>Please
                                            Enter a
                                            valid email address</strong></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card" class="bankDetails">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-bank"></i> BANK
                                DETAILS</strong>
                        </div>


                    </div>
                    <div class="card-content with-padding">
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="branchName" id="branchName" type="text" ng-model="bankName"
                                       class="validate"
                                       required>
                                <label for="branchName"><strong>BANK NAME</strong></label>
                                <div ng-messages="addAgentForm.branchName.$error"
                                     ng-if="addAgentForm.branchName.$dirty || addAgentForm.branchName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Bank Details are Required</strong></div>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <input name="branchName" id="branchName" type="text" ng-model="bankBranch"
                                       class="validate"
                                       required>
                                <label for="branchName"><strong>BANK BRANCH</strong></label>
                                <div ng-messages="addAgentForm.branchName.$error"
                                     ng-if="addAgentForm.branchName.$dirty || addAgentForm.branchName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Bank Details are Required</strong></div>
                                </div>
                            </div>

                            <div class="input-field col s12">
                                <input name="accountNumber" id="account_number" type="text" minlength="5"
                                       ng-model="accountNumber" class="validate"
                                       required>
                                <label for="account_number"><strong>ACCOUNT NUMBER</strong></label>
                                <div ng-messages="addAgentForm.accountNumber.$error"
                                     ng-if="addAgentForm.accountNumber.$dirty || addAgentForm.accountNumber.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Bank
                                            Account Number is Required</strong></div>
                                    <div ng-message="pattern" style="font-size: x-small" class="red-text">
                                        Please enter a valid registration number
                                    </div>
                                    <div ng-message="minlength" style="font-size: x-small" class="red-text">
                                        Please enter a valid registration number
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="card" class="registrationNumbers">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-file-text-o"></i> REGISTRATION
                                NUMBERS</strong>
                        </div>


                    </div>
                    <div class="card-content with-padding">
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="taxRegistration" id="tax_reg_number" type="text" minlength="5"
                                       pattern="[-+]?[0-9]*[.,]?[0-9]+" ng-model="tax_reg_number"
                                       class="validate" required autocomplete="off">
                                <label for="tax_reg_number" class="active"><strong>TAX REGISTRATION
                                        NUMBER</strong></label>
                                <div ng-messages="addAgentForm.taxRegistration.$error"
                                     ng-if="addAgentForm.taxRegistration.$dirty || addAgentForm.taxRegistration.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Tax
                                            Registration Number is Required</strong></div>
                                    <div ng-message="pattern" style="font-size: x-small" class="red-text">
                                        Please enter a valid registration number
                                    </div>
                                    <div ng-message="minlength" style="font-size: x-small" class="red-text">
                                        Please enter a valid registration number
                                    </div>
                                </div>
                            </div>
                            <div class="input-field col s6">
                                <input id="reg_number" type="text" class="validate" required autocomplete="off">
                                <label for="reg_number" class="active"><strong>REGISTRATION NUMBER</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6"><input name="tax_expiry" id="tax_expiry" ng-model="tax_expiry" type="date"
                                                                   class="datepicker">
                                <label for="tax_expiry" class="active"><strong>Tax Expiry Date</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <input name="tax" id="tax" type="checkbox" ng-model="tax">
                                <label for="tax">Withhold Tax?</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card" class="assignSalesRep">
                    <div class="card-content teal white-text with-padding">

                        <div style="font-size:large;"><strong><i class="fa fa-user-secret"></i> SALES
                                REPRESENTATIVE</strong>
                        </div>


                    </div>
                    <div class="card-content  with-padding">
                        <div class="row">
                            <div class="input-field col s12">
                                <select ng-model="agent_supervisor" placeholder="Select Sales Rep."
                                        class="select2-select" required>
                                    <option ng-repeat="supervisor in supervisors" value="{{supervisor.id}}">
                                        {{supervisor.firstname | uppercase}} {{supervisor.lastname | uppercase}}

                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row" ng-show="!submit_progress">
                            <button type="submit"
                                    class=" btn col s12  waves-effect waves-light blue">
                                <strong>SUBMIT DETAILS <i class="fa fa-send"></i></strong>
                            </button>
                        </div>
                        <div class="progress" ng-show="submit_progress">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </div>


        </div>
        </form>

    </div>

</div>


</div>