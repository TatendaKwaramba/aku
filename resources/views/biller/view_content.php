<?php use App\Http\Controllers\UiController; ?>
<div style="margin-left:10px;" ng-controller="getBillersController" ng-cloak>
    <div class="card" class="billerInfoTable" ng-show="billerInfoTable">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-credit-card pink-text"></i> BILLERS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshBillers()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="billerSearch = !billerSearch"><i class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Billers...</span>
        </div>

        <div class="card-content ">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th data-field="biller_id">ID</th>
                    <th data-field="billername">BILLER ID</th>
                    <th data-field="company">COMPANY</th>
                    <th data-field="email">EMAIL</th>
                    <th data-field="registration_date">CONTACT NUMBER</th>
                    <th data-field="state">STATE</th>
                </tr>
                </thead>
                <thead ng-show="billerSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Biller" ng-model="searchResult.billerName">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="Company" ng-model="searchResult.company">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="Email" ng-model="searchResult.email">
                    </th>


                    <th class="search-box">
                        <input type="text" placeholder="Search By Contact"
                               ng-model="searchResult.registrationDate">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="State" ng-model="searchResult.state">
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="biller in results =  (billers  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                    ng-dblclick="open(biller)" ng-class="{
                    'red-text':biller.state === 'DEACTIVATED',
                    'strike':biller.state === 'DEACTIVATED'
                    }" pagination-id="biller_table">
                    <td>{{biller.id}}</td>
                    <td>{{biller.account}}</td>
                    <td>{{biller.company}}</td>
                    <td>{{biller.email}}</td>
                    <td>{{biller.landline}}</td>
                    <td>{{biller.state}}</td>
                    <td ng-if="results.length() == 0">NO RESULTS FOUND</td>
                </tr>
            </table>
            <center>
                <dir-pagination-controls
                    pagination-id="biller_table"
                    max-size="5"
                    direction-links="true"
                    boundary-links="true" class="red">
                </dir-pagination-controls>
            </center>
        </div>
    </div>
    <div id="billerInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h4>{{billerInfo.company}} </h4>
            <p>
                Email Address: {{billerInfo.email}}<br/>
                Cellphone Number: {{billerInfo.cellphone}}<br>
                Landline Number: {{billerInfo.landline}}<br>
                State: {{billerInfo.state}}<br>

            </p>

            <?php if (Entrust::ability(UiController::getRolesForElement(30001), array())) {
                include 'editBillerButton.php';
            } ?>
            <?php if (Entrust::ability(UiController::getRolesForElement(30001), array())) {
                include 'viewBillerTransactionsButton.php';
            } ?>
            <?php if (Entrust::ability(UiController::getRolesForElement(30001), array())) {
                include 'deleteBillerButton.php';
            } ?>

            <br><br>

        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div ng-class="billerEditPage" ng-show="billerEditPage">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToBillerList()">
            <i class="fa fa-arrow-left"></i> Back To Biller List
        </div>
        <br/>

        <h2><i class="green-text fa fa-credit-card"></i> {{billerInfo.company | uppercase}} </h2>

        <div class="card">
            <div class="card-content with-padding" style="font-size: x-large">
                <i class="blue-text fa fa-edit"></i> EDIT BILLER INFORMATION
            </div>

            <div class="card-content with-padding">
                <form ng-submit="submitUpdatedBiller()">

                    <div class="row">
                        <div class="col s12">
                            <label for="first_name"><b>BILLER NAME</b></label>
                            <div class="input-field">
                                <input id="bankName" ng-model="updatedBiller.company"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                       class="validate" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label for="bankDeposit"><b>ADDRESS</b></label>
                            <div class="input-field">
                                <input id="billerAddress" type="text" ng-model="updatedBiller.address"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label for="bankDeposit"><b>EMAIL ADDRESS</b></label>
                            <div class="input-field">
                                <input id="billerAddress" type="text" ng-model="updatedBiller.email"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col s6">
                            <label for="bankDeposit"><b>LANDLINE NUMBER</b></label>
                            <div class="input-field">
                                <input id="billerAddress" type="text" ng-model="updatedBiller.landline"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                            </div>
                        </div>
                        <div class="col s6">
                            <label for="bankDeposit"><b>CELLPHONE NUMBER</b></label>
                            <div class="input-field">
                                <input id="billerAddress" type="text" ng-model="updatedBiller.cellphone"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label for="state"><b>STATE</b></label>
                            <select class="browser-default" id="state" ng-model="billerInfo.state" required>
                                <option value="" disabled selected>Choose State</option>
                                <option value="PENDING">PENDING</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVATED">DEACTIVATED</option>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" ng-show="update_biller_submit"
                                class=" btn blue col s12 waves-effect waves-light ">
                            UPDATE BILLER INFORMATION
                        </button>
                        <div class="progress" ng-show="update_biller_progress">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="billerTransactionInfo" ng-show="billerTransactionInfo">
        <br>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromTransactions()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content indigo white-text with-padding" style="font-size: large">
                <i class="fa fa-line-chart"></i> {{billerInfo.company | uppercase}} TRANSACTIONS | {{displayedDate}}
                <a href="" ng-click="dateSearch = !dateSearch" class="right white-text"><i class="fa fa-calendar"></i>
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
                        <th data-field="status">CREDIT</th>
                        <th data-field="status">DEBIT</th>
                        <th data-field="status">COMMISSION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="transaction in total_transactions =  (transactions  | filter:searchResult | orderBy: '-date')| itemsPerPage:20" ng-dblclick="openTransaction(transaction)" pagination-id="biller_transaction_table">
                        <td style="font-size: small; " >{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                        <td>{{transaction.id}}</td>
                        <td>{{transaction.description}}</td>
                        <td>{{transaction.amount | currency}}</td>
                        <td>{{transaction.credit | currency}}</td>
                        <td>{{transaction.debit | currency}}</td>
                        <td>{{transaction.commission | currency}}</td>

                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                        pagination-id="biller_transaction_table"
                        max-size="5"
                        direction-links="true"
                        boundary-links="true" class="red">
                    </dir-pagination-controls>
                </center>
            </div>

        </div>

        <div class="fixed-action-btn horizontal " style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red" ng-csv="makeBusinessListCsv(total_transactions)" lazy-load="true"
               filename="billerTransactionList.csv">
                <i class="fa fa-download"></i>
            </a>
        </div>

    </div>

    <div id="transactionInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;"><br>
            <h7><strong>TRANSACTION REF: {{transactionInfo.id}}</strong></h7>
            <p>
                DATE: <span class="blue-text">{{transactionInfo.date | date:'dd/MM/yyyy @ h:mma' }}</span><br/>
                DESCRIPTION: <span class="blue-text"><strong>{{transactionInfo.description | uppercase}}</strong></span><br/>
                COMMISSION: <span class="blue-text"><strong>{{transactionInfo.commission | currency}}</strong></span>
            <div ng-if="transactionInfo.agentId">
                AGENT : <span class="blue-text"><strong>{{transactionInfo.agentId.name}}</strong></span><br>
                Email: <span class="blue-text">{{transactionInfo.agentId.email}}</span><br/>
            </div>



            </p>

            <button class=" modal-action modal-close waves-effect btn-flat red white-text"
                    ng-click="viewTransactionFile()">VIEW FULL TRANSACTION FILE
            </button>
        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div class="transactionFile" ng-show="transactionFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToTransactionList()">
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

                <div>
                    <div class="row">
                        <h5><u>TRANSACTION INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        DESCRIPTION : <span class="blue-text">{{transactionInfo.description}}</span><br>
                        <div ng-if="transactionInfo.productId">
                            PRODUCT : <span class="blue-text">{{transactionInfo.productId.name}}</span><br>
                            BILLER : <span class="blue-text">{{transactionInfo.productId.billerId.company}}</span><br>
                        </div>
                        AMOUNT : <span class="blue-text">{{transactionInfo.amount | currency}}</span><br>
                        DATE : <span class="blue-text">{{transactionInfo.date | date : 'dd/MM/yyyy @ HH:mm:ss'}}</span><br>
                        FEES : <span class="blue-text">{{transactionInfo.fees | currency}}</span><br>
                        COMMISSION : <span class="blue-text">{{transactionInfo.commission  | currency}}</span><br>
                    </div>

                </div>
            </div>
        </div>

    </div>



</div>





