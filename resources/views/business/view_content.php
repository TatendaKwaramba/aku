<?php use App\Http\Controllers\UiController; ?>
<div style="margin: 10px;" ng-controller="getBusinessController" ng-cloak>
    <div class="clientTable" ng-show="businessInfoTable">
        <div class="card">
            <div class="card-content with-padding " style="font-size: x-large">
                <strong><i class="fa fa-shopping-cart purple-text"></i> BUSINESSES [ {{ results.length }} ]</strong>
                <span><a href="" ng-click="refreshBusinesses()"><i class="fa fa-refresh "></i></a></span>
                <span><a href="" ng-click="businessSearch = !businessSearch"><i
                            class="fa fa-search right "></i></a></span>
                <span class="right" ng-show="loading"><strong class="black-text "><i
                            class="fa fa-refresh fa-spin"></i></strong> Fetching Businesses...</span>
                <span class="right" ng-show="updating"><strong class="black-text "><i
                            class="fa fa-refresh fa-spin"></i></strong> Updating Businesses...</span>
            </div>

            <div class="card-content with-padding">
                <table class="highlight bordered striped">
                    <thead>
                    <tr>
                        <th>ACCOUNT</th>
                        <th data-field="name">NAME</th>
                        <th data-field="mobile">CONTACT NUMBER</th>
                        <th data-field="email">BALANCE</th>
                        <th data-field="commission">COMMISSION</th>
                    </tr>
                    </thead>
                    <thead ng-show="businessSearch">
                    <tr>
                        <th class="search-box">
                            <input type="text" placeholder="Search Account" ng-model="searchResult.account"
                                   ng-model-options="{debounce: 500}">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Name" ng-model="searchResult.firstname"
                                   ng-model-options="{debounce: 500}">
                        </th>

                        <th class="search-box">
                            <input type="text" placeholder="Search Contact" ng-model="searchResult.cellphone"
                                   ng-model-options="{debounce: 500}">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Balance" ng-model="searchResult.deposit"
                                   ng-model-options="{debounce: 500}">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search By Commission" ng-model="searchResult.commission"
                                   ng-model-options="{debounce: 500}">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="business in results =  (businesses  | filter:searchResult)| itemsPerPage:20 "
                        ng-dblclick="open(business)" pagination-id="business_table" ng-class="{'akupay-text': business.state == 'DEACTIVATED'}">
                        <td>{{business.account}}</td>
                        <td>{{business.name }}</td>
                        <td>{{business.cellphone}}</td>
                        <td>{{business.deposit | currency}}</td>
                        <td>{{business.commission | currency}}</td>
                        <td ng-if="results === 0">NO RESULTS FOUND</td>

                    </tr>


                </table>
                <center>
                    <dir-pagination-controls
                        pagination-id="business_table"
                        max-size="10"
                        direction-links="true"
                        boundary-links="true" class="akupay">
                    </dir-pagination-controls>
                </center>
            </div>
        </div>

        <div>
        </div>
        <?php if (Entrust::ability(UiController::getRolesForElement(20008), array())){
            include 'businessDownloadButton.php';
        } ?>


    </div>
    <div id="businessInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h5>{{businessInfo.name }}</h5>
            <p>
                Account: {{businessInfo.account}}<br/>
                Address: {{businessInfo.address}}<br/>
                Mobile: {{businessInfo.cellphone}}<br/>
                Email: {{businessInfo.email}}<br/>
                Commission: {{businessInfo.commission | currency}}<br/>
                Balance: {{businessInfo.deposit | currency}}<br/>
                State: {{businessInfo.state | uppercase }}
            </p>

            <?php if (Entrust::ability(UiController::getRolesForElement(20001), array())) {
                    include 'businessInfoButton.php';
            }?>

            <?php if (Entrust::ability(UiController::getRolesForElement(20002), array())) {
                    include 'businessTerminalInfo.php';
            }?>

            <?php if (Entrust::ability(UiController::getRolesForElement(20003), array())) {
                    include 'businessEmployeeInfo.php';
            }?>
            <?php if (Entrust::ability(UiController::getRolesForElement(20004), array())){
                include 'businessDeleteBusiness.php';

            } ?>
            <br> <br>

            <?php if (Entrust::ability(UiController::getRolesForElement(20005), array())){
                include 'businessTransactionInfo.php';
            } ?>

            <?php if (Entrust::ability(UiController::getRolesForElement(20006), array())){
                include 'businessFloatManagement.php';

            } ?>
            <br><br>
            <form method="post" action="/business/addtransfer">
            <input type="hidden" name="name" value="{{businessInfo.name}}">
            <input type="hidden" name="account" value="{{businessInfo.account}}">
            <input type="hidden" name="deposit" value="{{businessInfo.deposit}}">
            <input type="hidden" name="mobile" value="{{businessInfo.cellphone}}">
                <?php if (Entrust::ability(UiController::getRolesForElement(20009), array())){
                    include 'businessBankTransfers.php';
                } ?>
            </form>

            <br><br>
            <?php if (Entrust::ability(UiController::getRolesForElement(20007), array())){
                include 'businessBankTransfer.php';
            } ?>
           


        </div>
        <div class="modal-footer">

        </div>
    </div>


    <div class="businessUpdateInfo" ng-show="businessUpdateInfo">
        <br/>

        <div id="back" class="chip akupay white-text with-padding z-depth-1" ng-click="backToListFromEdit()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>

        <form class="col s12" ng-submit="submitUpdatedBusiness()">
            <div class="card">
                <div class="card-content teal white-text with-padding">
                    <p style="font-size: x-large"><strong><i class="fa fa-folder-open-o" aria-hidden="true"></i>
                            {{businessInfo.name | uppercase}} | {{businessInfo.partnerClassOfServiceId.name}} </strong>
                        <span class="right "><a class="white-text" ng-click="editBusinessInformation()"><i
                                    class="fa fa-edit "></i></a></span>

                    </p>
                </div>

                <div class="card-content with padding">

                    <!--NAME-->
                    <div class="row">
                        <div class="col s12">
                            <label for="last_name"><b>NAME</b></label>

                            <div class="input-field">
                                <input id="last_name" type="text" ng-model="updatedBusiness.name"
                                       ng-model-options="{ getterSetter: true, allowInvalid: true }"
                                       required ng-readonly="edit">
                            </div>
                        </div>
                    </div>

                    <!--GENDER AND ID-->
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="gender" class="active"><b>GENDER</b></label>
                            <input id="gender" ng-model="businessInfo.documentId.gender" placeholder=" "
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                   ng-readonly="edit">

                        </div>

                        <div class="input-field col s6">
                            <label for="id_number" class="active"><b>ID NUMBER</b></label>
                            <input id="id_number" ng-model="businessInfo.documentId.idNumber" placeholder=""
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                   >
                        </div>

                    </div>

                    <!--ADDRESS-->
                    <div class="row">

                        <div class="input-field col s12">
                            <label for="address" class="active"><b>ADDRESS</b></label>

                            <input id="address" ng-model="updatedBusiness.address" placeholder=""
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" type="text"
                                   required ng-readonly="edit">

                        </div>
                    </div>

                    <!--BANK DETAILS-->
                    <div class="row">

                        <div class="input-field col s6">
                            <label for="address" class="active"><b>BANK NAME</b></label>

                            <input id="address" placeholder=""
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" type="text"
                                   ng-readonly="edit">

                        </div>
                        <div class="input-field col s6">
                            <label for="address" class="active"><b>BANK ACCOUNT NUMBER</b></label>

                            <input id="address" placeholder=""
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" type="text"
                                   ng-readonly="edit">

                        </div>
                    </div>


                    <!--COMMISSION AND BALANCE-->
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="commission_" class="active"><b>COMMISSION</b></label>
                            <input id="commission_" placeholder="" type="text" ng-model="updatedBusiness.commission"
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" readonly>
                        </div>
                        <div class="input-field col s6">
                            <label for="deposit_" class="active"><b>BALANCE</b></label>
                            <input id="deposit_" placeholder="" type="text" ng-model="updatedBusiness.deposit"
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" readonly>
                        </div>
                    </div>

                    <!--BUSINESS TYPE AND TAX REG NUMBER-->
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="businessType"><b>BUSINESS TYPE</b></label>
                            <input id="businessType" type="text" placeholder=""
                                   ng-model="businessInfo.documentId.businessType" readonly>
                        </div>
                        <div class="input-field col s6">
                            <label for="regNumber"><b>TAX REGISTRATION NUMBER</b></label>
                            <input id="regNumber" type="text" placeholder=""
                                   ng-model="businessInfo.documentId.taxRegNumber"
                                   readonly>
                        </div>

                    </div>

                    <!--CLASS OF SERVICE AND STATE-->
                    <div class="row">
                        <div class="input-field col s6">
                            <select ng-model="updatedBusiness.coc" id="agent_class_of_services"
                                    name="agent_class_of_services" class="validate browser-default"
                                    placeholder="Choose Agent Class Of Service" required>
                                <option disabled selected>Choose your option</option>
                                <option ng-repeat="cc in classOfServices" value="{{cc.id}}">{{cc.name}}
                                </option>
                            </select>
                            <label for="agent_class_of_services" class="active"><strong>AGENT CLASS OF
                                    SERVICE</strong></label>
                            <div ng-messages="addAgentForm.agent_class_of_services.$error"
                                 ng-if="addAgentForm.agent_class_of_services.$dirty || addAgentForm.agent_class_of_services.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="akupay-text"><strong>The
                                        Agent
                                        Class of Service is Required</strong></div>
                            </div>

                        </div>
                        <div class="input-field col s6">
                            <select ng-model="businessInfo.state" name="state" id="state" placeholder="Choose a State"
                                    class="browser-default" ng-disabled="edit">
                                <option disabled selected>Choose your option</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="PENDING">PENDING</option>
                                <option value="DEACTIVATED">DEACTIVATED</option>
                            </select>
                            <label for="state" class="active"><strong>STATE</strong></label>
                        </div>

                    </div>

                    <!--EMAIL AND CELLPHONE-->
                    <div class="row">
                        <div class="input-field col s6">
                            <i class=" fa fa-envelope prefix"></i>
                            <input id="email" type="email" placeholder=""
                                   ng-model="updatedBusiness.email"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" ng-readonly="edit">
                            <label for="email">Email Address</label>
                        </div>
                        <div class="input-field col s6">
                            <i class=" fa fa-mobile prefix"></i>
                            <input id="cell" name="cell" type="text" placeholder=""
                                   ng-model="updatedBusiness.cellphone"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" readonly>
                            <label for="cell">CellPhone</label>
                        </div>
                    </div>

                    <div class="row" ng-show="!edit">
                        <button type="submit" ng-show="!submit_progress"
                                class="btn col s12 blue waves-effect waves-light ">
                            <i class="fa fa-thumb"></i> SUBMIT INFORMATION
                        </button>
                        <div class="progress" ng-show="submit_progress">
                            <div class="indeterminate"></div>
                        </div>
                    </div>


                </div>

            </div>
        </form>

    </div>

    <div class="businessTerminalInfo" ng-show="businessTerminalInfo">
        <br>
        <div id="back" class="chip light-akupay white-text with-padding z-depth-1" ng-click="backToListFromTerminals()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card" class="viewTerminals">
            <div class="card-content teal white-text with-padding">
                <p style="font-size:large"><strong><i class="fa fa-mobile" aria-hidden="true"></i>
                        {{businessInfo.name | uppercase}} TERMINALS</strong>
                    <span class="right" ng-show="terminal_loading"><strong class="white-text "><i
                                class="fa fa-refresh fa-spin"></i></strong> Fetching Terminals...</span>
                </p>

            </div>
            <div class="card-content with-padding">
                <table class="bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th data-field="name">IMEI</th>
                        <th data-field="address">ALIAS</th>
                        <th data-field="address">ACTIVATION CODE</th>
                        <th data-field="mobile">STATUS</th>
                        <th data-field="email">LAST USE</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr dir-paginate="agent_device in device_results = (agent_devices) | itemsPerPage:5 "
                        pagination-id="business_device_table">
                        <td>{{$index + 1}} {{$index.length}}</td>
                        <td>{{agent_device.imei }}</td>
                        <td>{{agent_device.name}}</td>
                        <td>*** ***</td>
                        <td>{{agent_device.status | uppercase}}</td>
                        <td>{{agent_device.lastUse | date:'dd/MM/yyyy @ h:mma'}}</td>
                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                        pagination-id="business_device_table"
                        max-size="15"
                        direction-links="true"
                        boundary-links="true" class="akupay">
                    </dir-pagination-controls>
                </center>
            </div>
        </div>
        <div class="card" class="assignTerminal">
            <div class="card-content teal white-text with-padding" style="font-size: large">
                <i class="fa fa-tablet"></i> ASSIGN TERMINAL
                <a class="right white-text" ng-click="grantWebAccess()"><i class="fa fa-laptop"></i></a>
            </div>
            <div class="card-content  with-padding ">
                <div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select class="select2-select" ng-model="pendingDevice"
                                    ng-options="terminal.name for terminal in pending_devices track by terminal.id">
                                <!--<option ng-repeat="terminal in pending_devices" value="{{terminal.id}}">
                                    {{terminal.name}}
                                </option>-->
                            </select>

                        </div>

                    </div>
                    <a class="waves-effect waves-light btn" ng-click="addTerminal()">Add Terminal</a>

                </div>
            </div>
        </div>

    </div>

    <div class="businessEmployeeInfo" ng-show="businessEmployeeInfo">
        <br>
        <div id="back" class="chip akupay white-text with-padding z-depth-1" ng-click="backToListFromEmployees()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content yellow black-text with-padding" style="font-size: large">
                <i class="fa fa-female"></i>{{businessInfo.firstname | uppercase}} EMPLOYEES
            </div>
            <div class="card-content with-padding">
                <table class="bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th data-field="name">NAME</th>
                        <th data-field="cellphone">CELLPHONE</th>
                        <th data-field="passcode">EMPLOYEE CODE</th>
                        <th data-field="status">STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="employee in employees_results = (employees) | itemsPerPage:5 "
                        pagination-id="business_employee_table" ng-class="{
                    'red-text':employee.status === 'DEACTIVATED',
                    'strike':employee.status === 'DEACTIVATED'
                    }">

                        <td>{{$index + 1}} {{$index.length}}</td>
                        <td>{{employee.firstname | uppercase }}</td>
                        <td>{{employee.cellphone}}</td>
                        <td>*** ***</td>
                        <td>{{employee.status | uppercase}}</td>
                        <td><a class="btn chip akupay accent-3" ng-click="activateEmployee(employee)"><i
                                    class="fa fa-check"></i></a></td>
                        <td><a class="btn chip akupay accent-3" ng-click="deactivateEmployee(employee)"><i
                                    class="fa fa-times"></i></a></td>

                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                        pagination-id="business_employee_table"
                        max-size="5"
                        direction-links="true"
                        boundary-links="true" class="akupay">
                    </dir-pagination-controls>
                </center>
            </div>

        </div>
        <div class="card" class="assignEmployees">
            <div class="card-content yellow black-text with-padding" style="font-size: large">
                <i class="fa fa-smile-o"></i> ADD EMPLOYEES
            </div>
            <div class="card-content with-padding">
                <form name="addEmployeesForm" id="addEmployeesForm" ng-submit="addEmployee()">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" id="employeefirstname" name="employeefirstname"
                                   ng-model="employee_first_name">
                            <label for="employeefirstname"><strong>EMPLOYEE FIRST NAME</strong></label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" id="employeelastname" name="employeelastname"
                                   ng-model="employee_last_name">
                            <label for="employeelastname"><strong>EMPLOYEE LAST NAME</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="employeecellphone" name="employeecellphone"
                                   ng-model="employee_cellphone">
                            <label for="employeecellphone">EMPLOYEE CELLPHONE</label>
                        </div>
                    </div>
                    <a class="waves-effect waves-light btn yellow black-text" ng-click="addEmployee()">Add Employee</a>
                </form>
            </div>
        </div>

    </div>

    <div class="businessTransactionInfo" ng-show="businessTransactionInfo">
        <br>
        <div id="back" class="chip akupay white-text with-padding z-depth-1" ng-click="backToListFromTransactions()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div id="modal1" class="modal">
            <div style="margin: 10px;" class="model-content ">
                <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">

                <h5>Set Transaction Limits</h5>
                <hr>
                <form name="transactionLimitsForm" id="transactionLimitsForm" ng-submit="addTransactionLimit()">
                    <div class="row">
                        <div class="col s12">
                            <label for="transactionTypeId">Transaction Type</label>

                            <select id="transactionTypeId" placeholder="Transaction Type" name="transactionTypeId"
                                    class="select2-select" ng-model="transactionTypeId" required>
                                <option value="0">ALL TRANSACTIONS</option>
                                <option ng-repeat="type in trans_types" value="{{type.id}}">{{type.description }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="dailyLimit">DAILY LIMIT</label>
                            <input id="dailyLimit" name="dailyLimit" ng-model="dailyLimit" type="number" required>
                        </div>
                        <div class="col s6">
                            <label for="monthlyLimit">MONTHLY LIMIT</label>
                            <input id="monthlyLimit" name="monthlyLimit" ng-model="monthlyLimit" type="number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <label for="minSessionLimit">MINIMUM SESSION LIMIT</label>
                            <input id="minSessionLimit" name="minSessionLimit" ng-model="minSessionLimit" type="number"
                                   required>
                        </div>
                        <div class="col s6">
                            <label for="maxSessionLimit">MAXIMUM SESSION LIMIT</label>
                            <input id="maxSessionLimit" name="maxSessionLimit" ng-model="maxSessionLimit" type="number"
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <button class="btn col s12 blue waves-effect" ng-disabled="transactionLimitsForm.$invalid">Add
                            Transaction Limit
                        </button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
        <div class="card">
            <div class="card-content indigo white-text with-padding" style="font-size: large">
                <i class="fa fa-line-chart"></i> {{businessInfo.firstname | uppercase}} TRANSACTIONS | {{displayedDate}}
                <a href="" style="margin-left:10px" ng-click="dateSearch = !dateSearch" class="right white-text"><i
                        class="fa fa-calendar"></i>
                </a>
                <a ng-click="settleCommission()" class="right white-text waves-effect"><i class="fa fa-handshake-o"></i>
                </a>
            </div>
            <div class="card-content with-padding">
                <div class="right col s12 " ng-show="dateSearch">
                    <form name="dateSearchForm" id="dateSearchForm" ng-submit="searchByDate()">
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="date" id="start_date" ng-model="start_date"
                                       class="datepicker" ng-required="true"/>
                                <label for="start_date" class="active">START DATE</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="date" id="end_date" ng-model="end_date"
                                       class="datepicker" ng-required="true"/>
                                <div class="col s4 offset-s10">
                                    <button class="waves-effect waves-light btn indigo"
                                            ng-disabled="dateSearchForm.$invalid"><i
                                            class="fa fa-search"></i> <i class="fa fa-refresh fa-spin"
                                                                         ng-show="loader"></i></button>
                                </div>
                                <label for="end_date">END DATE</label>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="bordered">
                    <thead>
                    <tr>
                        <th data-field="cellphone">DATE</th>
                        <th data-field="cellphone">REF.</th>
                        <th data-field="passcode">DESCRIPTION</th>
                        <th data-field="status">AMOUNT</th>
                        <th data-field="status">DEBIT</th>
                        <th data-field="status">CREDIT</th>
                        <th data-field="status">COMMISSION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--                    <tr ng-repeat="transaction in transactions">
                    -->
                    <tr dir-paginate="transaction in transaction_results = (transactions | orderBy: '-date') | itemsPerPage:20 "
                        ng-dblclick="openTransaction(transaction)" pagination-id="business_transaction_table">
                        <td style="font-size: small; ">{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                        <td>{{transaction.id}}</td>
                        <td>{{transaction.description}} <span
                                ng-if="transaction.productId"><b class="blue-text">({{transaction.productId.name | uppercase}})</b></span>
                        </td>
                        <td>{{transaction.amount | currency}}</td>
                        <td>{{transaction.credit | currency}}</td>
                        <td>{{transaction.debit | currency}}</td>
                        <td>{{transaction.commission | currency}}</td>

                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                        pagination-id="business_transaction_table"
                        max-size="15"
                        direction-links="true"
                        boundary-links="true" class="akupay">
                    </dir-pagination-controls>
                </center>
            </div>
            <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large green" ng-csv="makeBusinessTransactionListCsv(transaction_results)" lazy-load="true"
                   filename="BusinessTransactionList.csv">
                    <i class="fa fa-download"></i>
                </a>
            </div>

        </div>

    </div>

    <div class="businessFloatInfo" ng-show="businessFloatInfo">
        <br>
        <div id="back" class="chip akupay white-text with-padding z-depth-1" ng-click="backToListFromFloat()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>

        <div class="card">
            <div class="card-content akupay accent-3 with-padding" style="font-size: large">
                <i class="fa fa-money"></i> MANAGE FLOAT FOR {{businessInfo.name | uppercase}}

            </div>
            <div class="card-content with-padding">
                <div class="row">
                    <div class="manage col s6 offset-s3">
                        <form name="manageFloatForm" id="manageFloatForm">
                            <div class="input-field">
                                <input name="float" id="float" ng-model="evalueFloat" type="text" ng-required="true">
                                <label for="float">FLOAT</label>
                            </div>
                            <div class="input-field">
                                <input name="commission" id="commission" ng-model="evalueCommission" type="text"
                                       ng-required="true">
                                <label for="commission">COMMISSION</label>
                            </div>
                            <button class="btn akupay accent-3" ng-click="topupFloat()"
                                    ng-disabled="manageFloatForm.$invalid"><i class="fa fa-arrow-up"></i> TOP UP
                            </button>
                            <button class="btn green" ng-click="reduceFloat()" ng-disabled="manageFloatForm.$invalid"><i
                                    class="fa fa-arrow-down"></i> REDUCE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="transactionInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;"><br>
            <h7><strong>TRANSACTION REF: {{transactionInfo.id}}</strong></h7>
            <p>
                DATE: <span class="blue-text">{{transactionInfo.date | date:'dd/MM/yyyy @ h:mma' }}</span><br/>
                DESCRIPTION: <span class="blue-text"><strong>{{transactionInfo.description | uppercase}} <span
                            ng-if="transactionInfo.productId">({{transactionInfo.productId.name | uppercase}})</span></strong></span><br/>
                COMMISSION: <span class="blue-text"><strong>{{transactionInfo.commission | currency}}</strong></span>
            <div ng-if="transactionInfo.agentId">
                AGENT : <span class="blue-text"><strong>{{transactionInfo.agentId.name}}</strong></span><br>
                Email: <span class="blue-text">{{transactionInfo.agentId.email}}</span><br/>
            </div>


            </p>

            <button class=" modal-action modal-close waves-effect btn-flat akupay white-text"
                    ng-click="viewTransactionFile()">VIEW FULL TRANSACTION FILE
            </button>
        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div class="transactionFile" ng-show="transactionFile">
        <br/>
        <div id="back" class="chip akupay white-text with-padding z-depth-1" ng-click="backToTransactionListFromDetails()">
            <i class="fa fa-arrow-left"></i> Back To Transaction List
        </div>
        <br/>


        <div class="card">
            <div class="card-content with-padding">
                <strong><h5 class="blue-text"><i class="fa fa-file-text-o"></i> TRANSACTION REFERENCE :
                        {{transactionInfo.id}} | {{transactionInfo.description}}</h5>
                </strong>
                <hr>

            </div>
            <div class="card-content with-padding">
                <div ng-if="transactionInfo.agentId">
                    <div class="row">
                        <h5><u>AGENT INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.agentId.name}}</span><br>
                        MOBILE : <span class="blue-text">{{transactionInfo.agentId.cellphone}}</span><br>
                        ADDRESS : <span class="blue-text">{{transactionInfo.agentId.address}}</span><br>
                        CLASS OF SERVICE : <span
                            class="blue-text">{{transactionInfo.agentId.partnerClassOfServiceId.name}}</span><br>
                    </div>
                </div>

                <div ng-if="transactionInfo.clientId">
                    <div class="row">
                        <h5><u>CLIENT INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.clientId.firstname}} {{transactionInfo.clientId.lastname}}</span><br>
                        MOBILE : <span class="blue-text">{{transactionInfo.clientId.mobile}}</span><br>
                        CLASS OF SERVICE : <span class="blue-text">{{transactionInfo.clientId.clientClassOfServiceId.name}}</span><br>
                    </div>


                </div>

                <div ng-if="transactionInfo.deviceId">
                    <div class="row">
                        <h5><u>DEVICE INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.deviceId.name}}</span><br>
                        IMEI : <span class="blue-text">{{transactionInfo.deviceId.imei}}</span><br>
                        STATUS : <span class="blue-text">{{transactionInfo.deviceId.status}}</span><br>
                    </div>


                </div>

                <div ng-if="transactionInfo.employeeId">
                    <div class="row">
                        <h5><u>EMPLOYEE INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.employeeId.firstname}}</span><br>
                        CELLPHONE : <span class="blue-text">{{transactionInfo.employeeId.cellphone}}</span><br>
                    </div>


                </div>

                <div>
                    <div class="row">
                        <h5><u>TRANSACTION INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        DESCRIPTION : <span class="blue-text">{{transactionInfo.description}}</span><br>
                        <div ng-if="transactionInfo.productId">
                            PRODUCT : <span class="blue-text">{{transactionInfo.productId.name}}</span><br>
                            BILLER : <span class="blue-text">{{transactionInfo.productId.billerId.company}}</span><br>
                            <span ng-if="transactionInfo.productId.billerId.company == 'ZETDC'">METER NUMBER : <span
                                    class="blue-text">{{transactionInfo.billid}}</span><br></span>
                            <span>VOUCHER : <span
                                    class="blue-text">{{transactionInfo.voucher}}</span><br></span>
                        </div>
                        AMOUNT : <span class="blue-text">{{transactionInfo.amount | currency}}</span><br>
                        DATE : <span
                            class="blue-text">{{transactionInfo.date | date : 'dd/MM/yyyy @ HH:mm:ss'}}</span><br>
                        FEES : <span class="blue-text">{{transactionInfo.fees | currency}}</span><br>
                        COMMISSION : <span class="blue-text">{{transactionInfo.commission  | currency}}</span><br>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="businessBankInfo" ng-show="businessBankInfo">
        <br>
        <div id="back" class="btn chip akupay white-text with-padding z-depth-1" ng-click="backToListFromBank()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content blue accent-3 with-padding white-text" style="font-size: large">
                <i class="fa fa-bank"></i> MAKE A BANK TRANSFER FOR {{businessInfo.name | uppercase}}

            </div>
            <div class="card-content with-padding">
                <div class="row">
                    <div class="manage col s6 offset-s3">
                        <form name="makeTransferForm" id="makeTransferForm">
                            <div class="input-field">
                                <input name="bankName" id="bankName" ng-model="bankName" type="text" ng-required="true">
                                <label for="bankName">BANK</label>
                            </div>
                            <div class="input-field">
                                <input name="bankBranch" id="bankBranch" ng-model="bankBranch" type="text"
                                       ng-required="true">
                                <label for="bankBranch">BRANCH</label>
                            </div>
                            <div class="input-field">
                                <input name="bankAccountNumber" id="bankAccountNumber" ng-model="bankAccountNumber"
                                       type="text" ng-required="true">
                                <label for="bankAccountNumber">ACCOUNT NUMBER</label>
                            </div>
                            <div class="input-field">
                                <input name="bankAmount" id="bankAmount" ng-model="bankAmount" type="text"
                                       ng-required="true">
                                <label for="bankAmount">AMOUNT</label>

                                <button class="btn blue accent-3" ng-click="makeTransfer()"
                                        ng-disabled="makeTransferForm.$invalid">MAKE BANK TRANSFER
                                </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
