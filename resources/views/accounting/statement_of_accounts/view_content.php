<div style="margin:10px;" ng-controller="getStatementOfAccount" ng-cloak>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-balance-scale blue-text"></i> <span>STATEMENT OF ACCOUNTS | <span class="blue-text">{{displayedDate}}</span></span></strong>
            <a href="" ng-click="dateSearch = !dateSearch" class="right blue-text"><i class="fa fa-calendar"></i> </a>
            <div class="right col s12 " ng-show="dateSearch">
                <form name="dateSearchForm" ng-submit="searchByDate()">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="date" id="start_date" ng-model="start_date"
                                   class="datepicker" ng-required = "true"/>
                            <label for="start_date" class="active">START DATE</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="date" id="end_date" ng-model="end_date"
                                   class="datepicker" ng-required = "true"/>
                            <div class="col s4 offset-s10">
                                <button class="waves-effect waves-light btn blue" ng-disabled="dateSearchForm.$invalid"><i
                                        class="fa fa-search"></i> <i class="fa fa-refresh fa-spin" ng-show="loader"></i></button>
                            </div>
                            <label for="end_date">END DATE</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-content with-padding">
            <table class="bordered" style="table-layout: fixed;">
                <thead>
                <tr>
                    <th class="blue-text">P2P</th>
                    <th class="center" style="border: 1px solid;">VOLUME</th>
                    <th class="center" style="border: 1px solid;">VALUE</th>
                    <th class="center" style="border: 1px solid;">COMMISSION EARNED</th>
                    <th class="center" style="border: 1px solid;">COMMISSION PAID</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-top: 1px solid">CASH IN</td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_in.volume}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_in.value| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_in.commissionPaid| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_in.commissionEarned| currency}}
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid">CASH OUT</td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_out.volume}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_out.value| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_out.commissionPaid| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{cash_out.commissionEarned| currency}}
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid">MONEY TRANSFER</td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{money_transfer.volume}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{money_transfer.value| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{money_transfer.commissionPaid| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{money_transfer.commissionEarned| currency}}
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid">REMITTANCES</td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{remittance.volume}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{remittance.value| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{remittance.commissionPaid| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{remittance.commissionEarned| currency}}
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid; border-bottom: 1px solid">DISBURSEMENTS</td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{disbursement.volume}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{disbursement.value| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{disbursement.commissionPaid| currency}}
                    </td>
                    <td class="center blue-text" style="border:1px solid black;">
                        {{disbursement.commissionEarned| currency}}
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <!--            <strong><i class="fa fa-balance-scale blue-text"></i> STATEMENT OF ACCOUNTS</strong>
            -->        </div>
        <div class="card-content with-padding">
            <table class="bordered" style="table-layout: fixed;">
                <thead>
                <tr>
                    <th class="blue-text">BILLERS</th>
                    <th class="center" style="border: 1px solid;">VOLUME</th>
                    <th class="center" style="border: 1px solid;">VALUE</th>
                    <th class="center" style="border: 1px solid;">COMMISSION EARNED</th>
                    <th class="center" style="border: 1px solid;">COMMISSION PAID</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="pb in pay_bills | orderBy:sortType">
                    <td style="border-top: 1px solid; border-bottom: 1px solid">{{pb.biller }}</td>
                    <td class="center blue-text" style="border:1px solid black; ">{{pb.volume}}</td>
                    <td class="center blue-text" style="border:1px solid black;  ">{{pb.value | currency}}</td>
                    <td class="center blue-text" style="border:1px solid black;  ">{{pb.commissionPaid | currency}}</td>
                    <td class="center blue-text" style="border:1px solid black; ">{{pb.commissionEarned | currency}}
                    </td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
    <!--<div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
                    </div>
        <div class="card-content with-padding">
            <table class="bordered" style="table-layout: fixed;">
                <thead>
                <tr>
                    <th class="blue-text">AIRTIME</th>
                    <th class="center" style="border: 1px solid;">VOLUME</th>
                    <th class="center" style="border: 1px solid;">VALUE</th>
                    <th class="center" style="border: 1px solid;">COMMISSION PAID</th>
                    <th class="center" style="border: 1px solid;">COMMISSION EARNED</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-top: 1px solid">ECONET</td>
                    <td style="border-left:1px solid; border-top: 1px solid"> {{statement.subscriberBalance| currency
                        }}
                    </td>
                </tr>
                <tr>
                    <td>TELECEL</td>
                    <td style="border-left:1px solid">{{statement.businessBalance|currency}}</td>
                </tr>
                <tr>
                    <td>NETONE</td>
                    <td style="border-left:1px solid">{{statement.businessCommission|currency}}</td>
                </tr>
                <tr>
                    <td>AFRICOM</td>
                    <td style="border-left:1px solid;">{{statement.getCashCommission|currency}}</td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>-->
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
                   </div>
        <div class="card-content with-padding">
            <table class="bordered" style="table-layout: fixed;">
                <thead>
                <tr>
                    <th class="blue-text">PAYMENTS</th>
                    <th class="center" style="border: 1px solid;">VOLUME</th>
                    <th class="center" style="border: 1px solid;">VALUE</th>
                    <th class="center" style="border: 1px solid;">COMMISSION EARNED</th>
                    <th class="center" style="border: 1px solid;">COMMISSION PAID</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-top: 1px solid; border-bottom: 1px solid ">Pay Merchant B2B</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{b2b.volume}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{b2b.value| currency}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{b2b.commissionPaid| currency}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{b2b.commissionEarned| currency}}
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid;">Pay Merchant C2B</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{c2b.volume}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{c2b.value| currency}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{c2b.commissionPaid| currency}}</td>
                    <td style="border:1px solid black;" class="center blue-text"> {{c2b.commissionEarned| currency}}
                    </td>
                </tr>

                </tbody>

            </table>
        </div>
    </div>

</div>