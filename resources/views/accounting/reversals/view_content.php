<div style="margin:10px" ng-controller="reversalController" ng-cloak>
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
                        <h5 class="center blue-text"><i class="fa fa-undo"></i> TRANSACTION REVERSAL</h5>
                        <form name="searchTransactionForm" id="searchTransactionForm" ng-submit="searchTransaction()">
                            <input type="text" placeholder="ENTER TRANSACTION REFERENCE" ng-model="reference"
                                   pattern="\d{5,12}" onblur="this.value=removeSpaces(this.value)" required>
                            <button class="btn right" ng-disabled="searchTransactionForm.$invalid"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div ng-if="transactions[0] != null" ng-show="transactionTable">
        <div class="card" class="transactionInfoTable">
            <div class="card-content with-padding">
                <table class="highlight bordered striped">
                    <thead>
                    <tr>
                        <th data-field="date">DATE</th>
                        <th data-field="reference">REF.</th>
                        <th data-field="description">DESCRIPTION</th>
                        <th data-field="amount">AMOUNT</th>
                        <th data-field="debit">DEBIT</th>
                        <th data-field="credit">CREDIT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="transaction in results =  (transactions  | filter:searchResult)| orderBy: 'registrationDate'"
                        ng-dblclick="openTransaction(transaction)"
                    >
                        <td>{{transaction.date  | date:'dd/MM/yyyy @ h:mma'}}</td>
                        <td>{{transaction.id}}</td>
                        <td>{{transaction.description}}</td>
                        <td>{{transaction.amount | currency}}</td>
                        <td>{{transaction.debit | currency}}</td>
                        <td>{{transaction.credit | currency}}</td>
                        <td ng-if="results === 0">NO RESULTS FOUND</td>

                    </tr>
                </table>
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

            <button class=" modal-action modal-close waves-effect btn-flat blue white-text"
                    ng-click="viewTransactionFile()">VIEW FULL TRANSACTION FILE
            </button>
            <button class=" modal-action modal-close waves-effect btn-flat red white-text"
                    ng-click="reverseTransaction()">REVERSE TRANSACTION
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

</div>
