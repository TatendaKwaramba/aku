<?php use App\Http\Controllers\UiController; ?>

<div style="margin: 10px" class="blue-text"><i class="fa fa-money brown-text"></i>ACCOUNTING <i
        class="fa fa-angle-right black-text"></i> ACCOUNT ADJUSTMENTS
</div>
<script>
    function removeSpaces(string) {
        return string.split(' ').join('');
    }
</script>
<div style="margin: 10px" ng-controller="adjustmentsController" ng-cloak>
    <form id="adjustForm" name="adjustForm">
        <div class="card">
            <div class="card-content with-padding">
                <div class="row">
                    <div class="col s6">
                        <div>
                            <center>
                                <h5 class="blue-text"><i class="fa fa-angle-double-up"></i> SOURCE ACCOUNT</h5>
                            </center>
                            <hr>
                            <form>
                                <div class="row">
                                    <div class="col s4">
                                        <input type="radio" name="source" id="sub" class="with-gap"
                                               ng-model="source_mode"
                                               value="subscriber">
                                        <label for="sub">SUBSCRIBER</label>
                                    </div>
                                    <div class="col s4">
                                        <input type="radio" name="source" id="business" class="with-gap"
                                               ng-model="source_mode"
                                               value="business">
                                        <label for="business">BUSINESS</label>
                                    </div>
                                    <div class="col s4">
                                        <input type="radio" name="source" id="biller" class="with-gap"
                                               ng-model="source_mode"
                                               value="biller">
                                        <label for="biller">BILLER</label>
                                    </div>
                                </div>
                            </form>
                            <div ng-show="source_mode == 'subscriber'">
                                <div class="row">
                                    <div class="col s12">
                                        <form name="searchSubscriberForm" id="searchSubscriberForm"
                                              ng-submit="searchSubscriber()">
                                            <input type="text" placeholder="ENTER SUBSCRIBER'S MOBILE"
                                                   ng-model="subMobile"
                                                   pattern="\d{9,12}" onblur="this.value=removeSpaces(this.value)"
                                                   required>
                                            <button class="btn right" ng-disabled="searchSubscriberForm.$invalid"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row" ng-show="srcclients[0] != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{srcclients[0].account}}</span><br>
                                    NAME : <span class="blue-text">{{srcclients[0].firstname + ' ' + srcclients[0].lastname }}</span><br>
                                    MOBILE : <span class="blue-text">{{srcclients[0].mobile }}</span><br>
                                    BALANCE : <span class="blue-text">{{srcclients[0].deposit | currency}}</span><br>
                                    ADJUSTMENT AMOUNT : <span class="blue-text">{{subadjAmount | currency}}</span>
                                    <br><br>
                                    <input type="number" placeholder="Enter Amount" ng-model="subadjAmount">


                                </div>
                            </div>
                            <div ng-show="source_mode == 'business'">
                                <div class="row">
                                    <select class="select2-select" name="source_business" id="source_business"
                                            ng-model="source_business"
                                            ng-options="agent.name for agent in agents track by agent.id">
                                    </select>
                                    <div ng-show="dest_mode == 'subscriber'"><br><br><br></div>
                                </div>
                                <div class="row" ng-show="source_business != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{source_business.account}}</span><br>
                                    NAME : <span class="blue-text">{{source_business.name}}</span><br>
                                    MOBILE : <span class="blue-text">{{source_business.cellphone}}</span><br>
                                    BALANCE : <span class="blue-text">{{source_business.deposit | currency}}</span><br>
                                    ADJUSTMENT AMOUNT : <span class="blue-text">{{busadjAmount | currency}}</span>
                                    <br><br>
                                    <input type="number" placeholder="Enter Amount" ng-model="busadjAmount">
                                </div>

                            </div>
                            <div ng-show="source_mode == 'biller'">
                                <div class="row"><select class="select2-select" name="source_biller" id="source_biller"
                                                         ng-model="source_biller"
                                                         ng-options="product.name for product in products track by product.id">
                                    </select>
                                    <div ng-show="dest_mode == 'subscriber'"><br><br><br></div>

                                </div>
                                <div class="row" ng-show="source_biller != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{source_biller.account}}</span><br>
                                    NAME : <span class="blue-text">{{source_biller.name}}</span><br>
                                    BALANCE : <span class="blue-text">{{source_biller.balance | currency}}</span><br>
                                    ADJUSTMENT AMOUNT : <span class="blue-text">{{billadjAmount | currency}}</span>
                                    <br><br>
                                    <input type="number" placeholder="Enter Amount" ng-model="billadjAmount">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div>
                            <center>
                                <h5 class="blue-text"><i class="fa fa-angle-double-down"></i> DESTINATION ACCOUNT</h5>
                            </center>
                            <hr>
                            <form>
                                <div class="row">
                                    <div class="col s4">
                                        <input type="radio" name="destination" id="_sub" class="with-gap"
                                               ng-model="dest_mode"
                                               value="subscriber">
                                        <label for="_sub">SUBSCRIBER</label>
                                    </div>
                                    <div class="col s4">
                                        <input type="radio" name="destination" id="_business" class="with-gap"
                                               ng-model="dest_mode" value="business">
                                        <label for="_business">BUSINESS</label>
                                    </div>
                                    <div class="col s4">
                                        <input type="radio" name="destination" id="_biller" class="with-gap"
                                               ng-model="dest_mode" value="biller">
                                        <label for="_biller">BILLER</label>
                                    </div>
                                </div>
                            </form>
                            <div ng-show="dest_mode == 'subscriber'">
                                <div class="row">
                                    <div class="col s12">
                                        <form name="searchDestSubscriberForm" id="searchSubscriberForm"
                                              ng-submit="searchDestSubscriber()">
                                            <input type="text" placeholder="ENTER SUBSCRIBER'S MOBILE"
                                                   ng-model="destsubMobile"
                                                   pattern="\d{9,12}" onblur="this.value=removeSpaces(this.value)"
                                                   required>
                                            <button class="btn right" ng-disabled="searchDestSubscriberForm.$invalid"><i
                                                    class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row" ng-show="destclients[0] != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{destclients[0].account}}</span><br>
                                    NAME : <span class="blue-text">{{destclients[0].firstname + ' ' + destclients[0].lastname }}</span><br>
                                    MOBILE : <span class="blue-text">{{destclients[0].mobile }}</span><br>
                                    BALANCE : <span class="blue-text">{{destclients[0].deposit | currency}}</span><br>

                                </div>

                            </div>
                            <div ng-show="dest_mode == 'business'">
                                <div class="row">
                                    <select class="select2-select" name="source_business" id="dest_business"
                                            ng-model="dest_business"
                                            ng-options="agent.name for agent in agents track by agent.id">
                                    </select>
                                    <div ng-show="source_mode == 'subscriber'"><br><br><br></div>
                                </div>
                                <div class="row" ng-show="dest_business != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{dest_business.account}}</span><br>
                                    NAME : <span class="blue-text">{{dest_business.name}}</span><br>
                                    MOBILE : <span class="blue-text">{{dest_business.cellphone}}</span><br>
                                    BALANCE : <span class="blue-text">{{dest_business.deposit | currency}}</span>
                                </div>
                            </div>
                            <div ng-show="dest_mode == 'biller'">
                                <div class="row">
                                    <select class="select2-select" name="dest_biller" id="dest_biller"
                                            ng-model="dest_biller"
                                            ng-options="product.name for product in products track by product.id">
                                    </select>
                                    <div ng-show="source_mode == 'subscriber'"><br><br><br></div>

                                </div>
                                <div class="row" ng-show="dest_biller != null">
                                    ACCOUNT NUMBER : <span class="blue-text">{{dest_biller.account}}</span><br>
                                    NAME : <span class="blue-text">{{dest_biller.name}}</span><br>
                                    BALANCE : <span class="blue-text">{{dest_biller.balance | currency}}</span><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="inititate_comment">Comment</label>
                        <input type="text" name="inititate_comment" id="inititate_comment" class="col s12" ng-model="comment" required>
                </div>
                <hr>
                <div class="row">
                    <button class="btn right" ng-click="confirmAdjustment()" >CONFIRM<span ng-show="loader"><i
                                class="fa fa-refresh fa-spin"></i></span></button>
                </div>
            </div>
        </div>
    </form>

    <div id="transactionInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h4>{{transactionInfo.description}} </h4>
            <p>
                Source Account: {{transactionInfo.source}}<br/>
                Destination Account: {{transactionInfo.destination}}<br/>
                Amount: {{transactionInfo.amount | currency}}<br/>
                Comment: {{transactionInfo.comments}}<br/>
                Initiated By: {{transactionInfo.administratorId.name}}<br>
            </p>

            <?php if (Entrust::ability(UiController::getRolesForElement(50001), array())) {
                include 'validateAdjustmentButton.php';
            }?>

            <?php if (Entrust::ability(UiController::getRolesForElement(50002), array())) {
                include 'rejectAdjustmentTransaction.php';
            }?>



        </div>
        <div class="modal-footer">

        </div>
    </div>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-archive blue-text"></i> PENDING ADJUSTMENTS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshAdjustments()"><i class="fa fa-refresh"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Adjustments...</span>
        </div>
        <div class="card-content">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="bank_name">Date</th>
                    <th data-field="bank_deposit">Destination Account</th>
                    <th data-field="bank_state">Description</th>
                    <th data-field="bank_state">Amount</th>
                    <th data-field="bank_state">Initiated By</th>



                </tr>
                </thead>
                <thead ng-show="bankSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Search ID" ng-model="searchResult.billerID">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Biller" ng-model="searchResult.billerName">
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="transaction in results =  (transactions  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                    ng-dblclick="open(transaction)">
                    <td>{{$index + 1}}</td>
                    <td>{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                    <td>{{transaction.destination}}</td>
                    <td>{{transaction.description}}</td>
                    <td>{{transaction.amount | currency}}</td>
                    <td>{{transaction.administratorId.name}}</td>
                </tr>
            </table>
            <center>
                <dir-pagination-controls
                    max-size="5"
                    direction-links="true"
                    boundary-links="true" class="red">
                </dir-pagination-controls>
            </center>
        </div>

    </div>
</div>
