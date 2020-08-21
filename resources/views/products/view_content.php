<?php use App\Http\Controllers\UiController; ?>

<div style="margin:10px;" class="productInfoTable" ng-controller="getProductsController" ng-cloak>
    <div class="card" ng-show="productInfoTable">
        <div class="card-content with-padding" style="font-size: x-large">
            <strong><i class="fa fa-shopping-bag green-text "></i> PRODUCTS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshProducts()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                            class="fa fa-refresh fa-spin"></i></strong> Fetching Products...</span>
        </div>

        <div class="card-content">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th data-field="id"></th>
                    <th data-field="product_name">PRODUCT NAME</th>
                    <!--                    <th data-field="product_account">ACCOUNT</th>
                    -->
                    <th data-field="account_name">COMPANY</th>
                    <th data-field="account_name">BALANCE</th>
                    <th data-field="product_state">STATE</th>
                    <th data-field="product_billidLabel">LABEL</th>
                </tr>
                </thead>
                <thead ng-show="clientSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Name" ng-model="searchResult.name">
                    </th>
                    <!--<th class="search-box">
                        <input type="text" placeholder="Account" ng-model="searchResult.account">
                    </th>-->

                    <th class="search-box">
                        <input type="text" placeholder="Company" ng-model="searchResult.billerId.company">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="State" ng-model="searchResult.state">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="Label" ng-model="searchResult.billidLabel">
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="product in results =  (products  | filter:searchResult)| orderBy: 'billerId.company'  | itemsPerPage:20"
                    ng-dblclick="open(product)" ng-class="{
                    'red-text':product.state === 'DEACTIVATED',
                    'strike':product.state === 'DEACTIVATED'
                    }" pagination-id="product_table">
                    <td>{{$index + 1}} {{$index.length}}</td>
                    <td>{{product.name}}</td>
                    <!--                    <td>{{product.account}}</td>
                    -->
                    <td>{{product.billerId.company}}</td>
                    <td>{{product.balance | currency}}</td>
                    <td>{{product.state}}</td>
                    <td>{{product.billidLabel}}</td>

                    <td ng-if="results === 0">NO RESULTS FOUND</td>
                </tr>
                </tbody>
            </table>
            <center>
                <dir-pagination-controls
                        pagination-id="product_table"
                        max-size="10"
                        direction-links="true"
                        boundary-links="true" class="red">
                </dir-pagination-controls>
            </center>
        </div>
        <div id="productInfo" class="modal">
            <div class="modal-content">
                <h4><strong>{{productInfo.name | uppercase}}</strong>
                </h4>
                ACCOUNT : {{productInfo.account}}<br>
                CATEGORY : {{productInfo.category}}<br>
                STATE: {{productInfo.state}}<br>
                AGENT COMMISSION: {{productInfo.commission | currency}}<br>
                BILL FORMAT: {{productInfo.billidFormat}} <br>
                LABEL: {{productInfo.billidLabel}} <br>
                MASK: {{productInfo.billidMask}}<br>

                <?php if (Entrust::ability(UiController::getRolesForElement(70001), array())) {
                    include 'editProductButton.php';
                } ?>
                <?php if (Entrust::ability(UiController::getRolesForElement(70004), array())) {
                    include 'settleProductButton.php';
                } ?>
                <?php if (Entrust::ability(UiController::getRolesForElement(70002), array())) {
                    include 'viewProductTransactionsButton.php';
                } ?>
                <br><br>
                <?php if (Entrust::ability(UiController::getRolesForElement(70003), array())) {
                    include 'addDataButton.php';
                } ?>
                <?php if (Entrust::ability(UiController::getRolesForElement(70003), array())) {
                    include 'deleteActivateProductButton.php';
                } ?>
            </div>
        </div>
<!--        <div id="productAddData" class="modal">
            <div class="modal-content">
                <h4><strong>{{productInfo.name | uppercase}} - UPLOAD DATA FILE</strong>
                </h4>
            </div>
        </div>
-->    </div>

    <div class="productUpdateInfo" ng-show="productUpdateInfo">
        <br/>
        <div id="back" class="chip red white-text z-depth-1" ng-click="backToProductList()">
            <i class="fa fa-arrow-left"></i> Back
        </div>

        <div class="card">
            <div class="card-content with-padding">
                <h4><strong>UPDATE: {{productInfo.name | uppercase}}</strong>
                </h4></div>

            <div class="card-content">
                <div class="row">
                    <form class="col s12" id="updateProduct" ng-submit="submitUpdatedProduct()">

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="productName" id="productName" ng-model="productInfo.name"
                                       type="text" class="validate"
                                       required autofocus placeholder="">
                                <label for="productName">Product Name</label>
                                <div ng-messages="addProductForm.productInfo.name.$error"
                                     ng-if="addProductForm.productInfo.name.$dirty || addProductForm.productInfo.name.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Product
                                            Name is required!</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="productCategory" ng-model="productInfo.category"
                                       id="productCategory" type="text"
                                       class="validate" required placeholder="">
                                <label for="productCategory">Category</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="preauthCustomerInfo" ng-model="productInfo.voucherLabel"
                                       id="preauthCustomerInfo"
                                       type="text" class="validate" placeholder="">
                                <label for="preauthCustomerInfo" class="active">Preauth Customer Information</label>
                                <div ng-messages="addProductForm.voucherLabel.$error"
                                     ng-if="addProductForm.voucherLabel.$dirty || addProductForm.voucherLabel.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Preauth
                                            Customer Information is required!</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="postPayment" ng-model="productInfo.apiUrl" id="postPayment" type="text"
                                       class="validate" placeholder="">
                                <label for="postPayment" class="active">Post Payment</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="billReference" ng-model="productInfo.billidLabel"
                                       id="billReference" type="text"
                                       class="validate" required placeholder="">
                                <label for="billReference" class="active">Bill Reference</label>
                                <div ng-messages="addProductForm.billRefffeeserence.$error"
                                     ng-if="addProductForm.billReference.$dirty || addProductForm.billReference.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Bill
                                            Reference is required</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="billReferenceFormat" ng-model="productInfo.billidFormat"
                                       id="billReferenceFormat"
                                       type="text" class="validate" required placeholder="">
                                <label class="active" for="billReferenceFormat">Bill Reference Format</label>
                            </div>

                            <div ng-messages="addProductForm.billReference.$error"
                                 ng-if="addProductForm.billReference.$dirty || addProductForm.billReference.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Bill
                                        Reference is required</strong></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="mask" ng-model="productInfo.billidMask" id="mask" type="text"
                                       class="validate" required placeholder="">
                                <label for="mask" class="active">Mask</label>
                                <div ng-messages="addProductForm.mask.$error"
                                     ng-if="addProductForm.mask.$dirty || addProductForm.mask.$touched">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Mask
                                            is required</strong></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col s12">
                                <label for="fandc"><b>FEES AND COMMISSION</b></label>
                                <select class="select2-select" id="fandc" ng-model="productInfo.feesAndCommissionsId.id"
                                        ng-options="fc.name for fc in fandc">
                                    <!--<option ng-repeat="fc in fandc" value="{{fc.id}}">{{fc.name}}
                                    </option>-->
                                </select>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col s12">
                                <label for="state"><b>STATE</b></label>
                                <select class="browser-default" id="state" ng-model="productInfo.state" required>
                                    <option value="PENDING">PENDING</option>
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="DEACTIVATED">DEACTIVATED</option>
                                </select>
                            </div>
                        </div>


                        <button type="submit" ng-show="submit_button"
                                class="btn blue col s12">
                            <strong>UPDATE <i class="fa fa-floppy-o"></i></strong>
                        </button>
                        <div class="progress" ng-show="progress_indicator">
                            <div class="indeterminate"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="productTransactionInfo" ng-show="productTransactionInfo">
        <br>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromTransactions()">
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
                <i class="fa fa-line-chart"></i> {{productInfo.name | uppercase}} TRANSACTIONS | {{displayedDate}}
                <a href="" style="margin-left:10px" ng-click="dateSearch = !dateSearch" class="right white-text"><i
                            class="fa fa-calendar"></i>
                </a>
                <a ng-click="transactionLimit()" class="right white-text waves-effect"><i class="fa fa-cog"></i>
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
                        <th data-field="description">DESCRIPTION</th>
                        <th data-field="amount">AMOUNT</th>
                        <th data-field="credit">CREDIT</th>
                        <th data-field="debit">DEBIT</th>
                        <th data-field="commission">COMMISSION</th>
                        <th data-field="commission">PRODUCT BALANCE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="transaction in total_transactions =  (transactions  | filter:searchResult | orderBy: '-date')| itemsPerPage:20"
                        pagination-id="product_transaction_table" ng-dblclick="openTransaction(transaction)"
                    >
                        <td style="font-size: small; ">{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                        <td>{{transaction.id}}</td>
                        <td>{{transaction.description}}</td>
                        <td>{{transaction.amount | currency}}</td>
                        <td>{{transaction.credit | currency}}</td>
                        <td>{{transaction.debit | currency}}</td>
                        <td>{{transaction.commission | currency}}</td>
                        <td>{{transaction.productBalance | currency}}</td>

                    </tr>
                </table>
                <center>
                    <dir-pagination-controls
                            pagination-id="product_transaction_table"
                            max-size="5"
                            direction-links="true"
                            boundary-links="true" class="red">
                    </dir-pagination-controls>
                </center>
            </div>
            <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red" ng-csv="makeProductTransactionListCsv(total_transactions)" lazy-load="true"
                   filename="ProductTransactionList.csv">
                    <i class="fa fa-download"></i>
                </a>
            </div>


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
                        DATE : <span
                                class="blue-text">{{transactionInfo.date | date : 'dd/MM/yyyy @ HH:mm:ss'}}</span><br>
                        FEES : <span class="blue-text">{{transactionInfo.fees | currency}}</span><br>
                        COMMISSION : <span class="blue-text">{{transactionInfo.commission  | currency}}</span><br>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="settleProduct" ng-show="settleProductPage">
        <br>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromSettle()">
            <i class="fa fa-arrow-left"></i> Back To List
        </div>
        <div class="card">
            <div class="card-content teal with-padding white-text" style="font-size: large">
                <i class="fa fa-money"></i> MANAGE FLOAT FOR {{productInfo.name | uppercase}}

            </div>
            <div class="card-content with-padding">
                <div class="row">
                    <div class="manage col s6 offset-s3">
                        <form name="manageFloatForm" id="manageFloatForm">
                            <div class="input-field">
                                <input name="float" id="float" ng-model="evalueFloat" type="text" ng-required="true">
                                <label for="float">FLOAT</label>
                            </div>
                            <button class="btn teal" ng-click="topupFloat(productInfo)"
                                    ng-disabled="manageFloatForm.$invalid"><i class="fa fa-arrow-up"></i> TOP UP
                            </button>
                            <button class="btn red" ng-click="reduceFloat(productInfo)"
                                    ng-disabled="manageFloatForm.$invalid"><i
                                        class="fa fa-arrow-down"></i> REDUCE
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>


</div>

