<?php use App\Http\Controllers\UiController; ?>
<div style="margin:10px;" ng-controller="clientListController" ng-cloak>
    <script>
        function removeSpaces(string) {
            return string.split(' ').join('');
        }
    </script>
    <div class="row">
        <div class=" col s6 offset-s3">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <h5 class="center blue-text"><i class="fa fa-group"></i> SUBSCRIBERS [{{clientNumber}}]</h5>
                        <form name="searchSubscriberForm" id="searchSubscriberForm" ng-submit="searchSubscriber()">
                            <input type="text" placeholder="ENTER SUBSCRIBER'S MOBILE" ng-model="subMobile"
                                   pattern="\d{7,15}" onblur="this.value=removeSpaces(this.value)" required>
                            <button class="btn right" ng-disabled="searchSubscriberForm.$invalid"><i
                                        class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div ng-if="clients[0] != null">
        <div class="card" class="clientInfoTable" ng-show="clientInfoTable">
            <div class="card-content with-padding">
                <table class="highlight bordered striped">
                    <thead>
                    <tr>
                        <th data-field="firstname">NAME</th>
                        <th data-field="lastname">SURNAME</th>
                        <th data-field="email">BALANCE</th>
                        <th data-field="mobile">MOBILE</th>
                        <th data-field="registration_date">REGISTRATION DATE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="client in results =  (clients  | filter:searchResult)| orderBy: 'registrationDate' | itemsPerPage:20 "
                        ng-dblclick="open(client)"
                    >
                        <td>{{::client.firstname}}</td>
                        <td>{{::client.lastname}}</td>
                        <td>{{::client.deposit | currency}}</td>
                        <td>{{::client.mobile}}</td>
                        <td>{{::client.registrationDate | date: 'medium'}}</td>
                        <td ng-if="results === 0">NO RESULTS FOUND</td>

                    </tr>
                </table>
            </div>

        </div>
    </div>

    <div id="clientInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h4>{{clientInfo.firstname}} {{clientInfo.lastname}}</h4>
            <p>
                Account: {{clientInfo.account}}<br/>
                Address: {{clientInfo.address}}<br/>
                Mobile: {{clientInfo.mobile}}<br/>
                ID-Number: {{clientInfo.documentId.idNumber}} <br/>
                State: {{clientInfo.state | uppercase}}
            </p>
            <?php if (Entrust::ability(UiController::getRolesForElement(10001), array())) {
                include 'viewClientFileButton.php';
            } ?>
            <?php if (Entrust::ability(UiController::getRolesForElement(10002), array())) {
                include 'viewClientTransactionsButton.php';
            } ?>
            <?php if (Entrust::ability(UiController::getRolesForElement(10003), array())) {
                include 'resetPinButton.php';
            } ?>
            <br><br>
            <?php if (Entrust::ability(UiController::getRolesForElement(10004), array())) {
                include 'blockActivateButton.php';
            } ?>
            <?php if (Entrust::ability(UiController::getRolesForElement(10005), array())) {
                include 'settleButton.php';
            } ?>

        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div class="clientFile" ng-show="clientFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToSubscriberList()">
            <i class="fa fa-arrow-left"></i> Back
        </div>
        <br/>


        <form ng-submit="updateSubscriber()">
            <div class="card">
                <div class="card-content teal white-text with-padding">
                    <p style="font-size: x-large"><strong><i class="fa fa-folder-open-o" aria-hidden="true"></i>
                            {{clientInfo.firstname | uppercase}} {{clientInfo.lastname | uppercase}} |
                            {{clientInfo.clientClassOfServiceId.name}} </strong>
                        <span class="right "><a class="white-text" ng-click="editBusinessInformation()"><i
                                        class="fa fa-edit "></i></a></span>

                    </p>
                </div>

                <div class="card-content with padding">

                    <!--NAME-->
                    <div class="row">
                        <div class="col s6">
                            <label for="first_name"><b>FIRST NAME</b></label>

                            <div class="input-field">
                                <input id="first_name" type="text" ng-model="updatedClient.firstname"
                                       ng-model-options="{ getterSetter: true, allowInvalid: true }"
                                       required ng-readonly="edit">
                            </div>
                        </div>
                        <div class="col s6">
                            <label for="last_name"><b>LAST NAME</b></label>

                            <div class="input-field">
                                <input id="last_name" type="text" ng-model="updatedClient.lastname"
                                       ng-model-options="{ getterSetter: true, allowInvalid: true }"
                                       required ng-readonly="edit">
                            </div>
                        </div>
                    </div>

                    <!--MOBILE AND ID-->
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="id_number" class="active"><b>CELLPHONE NUMBER</b></label>
                            <input id="id_number" ng-model="clientInfo.mobile" placeholder=""
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                   readonly>
                        </div>
                        <div class="input-field col s6">
                            <label for="id_number" class="active"><b>ID NUMBER</b></label>
                            <input id="id_number" ng-model="clientInfo.documentId.idNumber" placeholder=""
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                   readonly>
                        </div>
                    </div>

                    <!--ADDRESS-->
                    <div class="row">

                        <div class="input-field col s12">
                            <label for="address" class="active"><b>ADDRESS</b></label>

                            <input id="address" ng-model="updatedClient.address" placeholder=""
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" type="text"
                                   required ng-readonly="edit">

                        </div>
                    </div>

                    <!--COMMISSION AND DEPOSIT-->
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="deposit_" class="active"><b>BALANCE</b></label>
                            <input id="deposit_" placeholder="" type="text" ng-model="clientInfo.deposit"
                                   ng-model-options="{ getterSetter: true, allowInvalid: true }" readonly>
                        </div>
                    </div>


                    <!--CLASS OF SERVICE AND STATE-->
                    <div class="row">
                        <div class="input-field col s6">
                            <select ng-model="clientInfo.clientClassOfServiceId.id" id="agent_class_of_services"
                                    name="class_of_services" class="validate browser-default"
                                    required>
                                <option disabled selected>Choose your option</option>
                                <option ng-repeat="cc in clientClassOfServices" value="{{cc.id}}">{{cc.name}}
                                </option>
                            </select>
                            <label for="class_of_services" class="active"><strong>CLASS OF
                                    SERVICE</strong></label>


                        </div>
                        <div class="input-field col s6">
                            <select ng-model="clientInfo.state" name="state" id="state" placeholder="Choose a State"
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
                        <div class="input-field col s12">
                            <input id="email" type="email" placeholder=""
                                   ng-model="clientInfo.email"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" readonly>
                            <label for="email">Email Address</label>
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

    <div class="clientTransactionInfo" ng-show="clientTransactionInfo" ng-cloak>
        <br>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromTransactions()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content indigo white-text with-padding" style="font-size: large">
                <i class="fa fa-line-chart"></i> {{clientInfo.firstname | uppercase}} {{clientInfo.lastname |
                uppercase}} TRANSACTIONS | {{displayedDate}}
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
                        <th data-field="status">DEBIT</th>
                        <th data-field="status">BALANCE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="transaction in total_transactions =  (transactions  | filter:searchResult | orderBy: '-date')| itemsPerPage:20"
                        ng-dblclick="openTransaction(transaction)">
                        <td style="font-size: small; ">{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                        <td>{{transaction.id}}</td>
                        <td>{{transaction.description}} <span ng-if="transaction.productId">(<b>{{transaction.productId.name}}</b>)</span>
                        </td>
                        <td>{{transaction.amount | currency}}</td>
                        <td>{{transaction.credit | currency}}</td>
                        <td>{{transaction.clientBalance | currency}}</td>

                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                            max-size="10"
                            direction-links="true"
                            boundary-links="true" class="red">
                    </dir-pagination-controls>
                </center>
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
                COMMISSION: <span
                        class="blue-text"><strong>{{transactionInfo.commission | currency}}</strong></span><br>
                <span>VOUCHER : <span
                            class="blue-text">{{transactionInfo.voucher}}</span><br></span>
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
                        <span>VOUCHER : <span
                                    class="blue-text">{{transactionInfo.voucher}}</span><br></span>
                        DATE : <span
                                class="blue-text">{{transactionInfo.date | date : 'dd/MM/yyyy @ HH:mm:ss'}}</span><br>
                        FEES : <span class="blue-text">{{transactionInfo.fees | currency}}</span><br>
                        COMMISSION : <span class="blue-text">{{transactionInfo.commission  | currency}}</span><br>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="settleClient" ng-show="settleClientPage">
        <br>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromSettle()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content teal with-padding white-text" style="font-size: large">
                <i class="fa fa-money"></i> MANAGE FLOAT FOR {{clientInfo.firstname + ' ' + clientInfo.lastname |
                uppercase}}

            </div>
            <div class="card-content with-padding">
                <div class="row">
                    <div class="manage col s6 offset-s3">
                        <form name="manageFloatForm" id="manageFloatForm">
                            <div class="input-field">
                                <input name="float" id="float" ng-model="evalueFloat" type="text" ng-required="true">
                                <label for="float">FLOAT</label>
                            </div>
                            <button class="btn teal" ng-click="topupFloat()"
                                    ng-disabled="manageFloatForm.$invalid"><i class="fa fa-arrow-up"></i> TOP UP
                            </button>
                            <button class="btn red" ng-click="reduceFloat()" ng-disabled="manageFloatForm.$invalid"><i
                                        class="fa fa-arrow-down"></i> REDUCE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>