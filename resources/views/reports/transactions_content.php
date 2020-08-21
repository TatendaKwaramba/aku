<div style="margin: 10px;" ng-controller="reportTransactionsController" ng-cloak>
    <div class="card" class="transactionInfoTable" ng-show="transactionInfoTable">
        <div class="card-content  with-padding " style="font-size: x-large">
            <strong><i class="fa fa-line-chart indigo-text"></i> TRANSACTIONS [ {{ results.length }} ] | <span
                        class="blue-text">{{displayedDate}}</span></strong>
            <span>
                <a href="" ng-click="transactionSearch = !transactionSearch"><i class="fa fa-search right"></i></a><br>
                <a href="" ng-click="dateSearch = !dateSearch" class="right blue-text"><i
                            class="fa fa-calendar"></i></a>
            </span>


            <span class="right" ng-show="loading"><strong><i class="fa fa-refresh fa-spin"></i></strong> Fetching Transactions...</span>
        </div>

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


        <div class="card-content  with-padding">
            <table class="bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="date">DATE</th>
                    <th data-field="ref">REF.</th>
                    <th data-field="description">DESCRIPTION</th>
                    <th data-field="debit">CREDIT</th>
                    <th data-field="credit">DEBIT</th>
                    <th data-field="agent">AGENT</th>
                    <th data-field="agent">PRODUCT</th>

                </tr>
                </thead>
                <thead ng-show="transactionSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="date" placeholder="" ng-model="searchResult.firstname" disabled>
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.id">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.description">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.debit">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.credit">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.agentId.name">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="" ng-model="searchResult.productId.name">
                    </th>


                </tr>
                </thead>
                <tbody style="font-size: small">
                <tr dir-paginate="transaction in results = (transactions  | filter:searchResult | orderBy: '-date' ) | itemsPerPage:20 "
                    ng-dblclick="open(transaction)">
                    <td style="width: 30px">{{$index + 1}} {{$index.length}}</td>
                    <td style="font-size: small; ">{{transaction.date | date:'dd/MM/yyyy @ h:mma'}}</td>
                    <td>{{transaction.id}}</td>
                    <td style="font-size: x-small; ">{{transaction.description}}
                        <span
                                ng-if="transaction.productId"><b class="blue-text">({{transaction.productId.name | uppercase}})</b>
                        </span>
                    </td>
                    <td><strong>{{transaction.debit | currency }}</strong></td>
                    <td><strong>{{transaction.credit | currency}}</strong></td>
                    <td><strong>{{transaction.agentId.name}}</strong></td>
                    <td><strong>{{transaction.productId.name}}</strong></td>
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


        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red animated pulse infinite" ng-csv="makeBusinessListCsv(results)"
               lazy-load="true"
               filename="TransactionList.csv">
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
                        BALANCE AFTER TRANSACTION : <span
                                class="blue-text">{{transactionInfo.agentBalance | currency}}</span>
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
                        BALANCE AFTER TRANSACTION : <span
                                class="blue-text">{{transactionInfo.clientBalance | currency}}</span>

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

                <div ng-if="transactionInfo.transactionTypeId.id == 66">
                    <div class="row">
                        <h5><u>INITIATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 67">
                    <div class="row">
                        <h5><u>INITIATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 11">
                    <div class="row">
                        <h5><u>INITIATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 8">
                    <div class="row">
                        <h5><u>INITIATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>

                <div ng-if="transactionInfo.transactionTypeId.id == 12">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 13">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 10">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 9">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 69">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 68">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
                    </div>


                </div>
                <div ng-if="transactionInfo.transactionTypeId.id == 70">
                    <div class="row">
                        <h5><u>VALIDATOR INFORMATION</u></h5>
                    </div>
                    <div class="row">
                        NAME : <span class="blue-text">{{transactionInfo.administratorId.name}}</span><br>
                        EMAIL : <span class="blue-text">{{transactionInfo.administratorId.email}}</span><br>
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
                        AMOUNT : <span class="blue-text">{{transactionInfo.amount | currency}}</span> <span
                                ng-if="transactionInfo.transactionTypeId.id == 66" class="blue-text">{{transactionInfo.credit | currency}}</span><br>
                        DEBIT : <span class="blue-text">{{transactionInfo.credit | currency}}</span><br>
                        CREDIT : <span class="blue-text">{{transactionInfo.debit | currency}}</span><br>
                        DATE : <span
                                class="blue-text">{{transactionInfo.date | date : 'dd/MM/yyyy @ HH:mm:ss'}}</span><br>

                        FEES : <span class="blue-text">{{transactionInfo.fees | currency}}</span><br>
                        COMMISSION : <span class="blue-text">{{transactionInfo.commission  | currency}}</span><br>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>