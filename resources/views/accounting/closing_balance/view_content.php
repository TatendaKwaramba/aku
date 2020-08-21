<div style="margin:10px;" ng-controller="getClosingBalance" ng-cloak>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong>
                <i class="fa fa-balance-scale blue-text"></i>
                <span>Closing Balance |
                    <span class="blue-text">{{displayedDate}}
                    </span>
                </span>
                <a class="right blue-text" ng-click="dateSearch = !dateSearch"><i class="fa fa-calendar"></i></a>
            </strong>

            <div class="row" ng-show="dateSearch">
                <div class="col s4 col push-s4">
                    <form >

                        <input type="text" class="datepicker" ng-model="searchDay">
                        <br>
                        <button class="blue white-text waves btn-flat col s3 offset-s9" ng-click="search()"><i class="fa fa-search"></i>
                        </button>
                    </form>

                </div>
            </div>

        </div>
        <div class="card-content with-padding">
            <table class="bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>AMOUNT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="border-top: 1px solid">SUBSCRIBER WALLET(BALANCES)</td>
                    <td style="border-left:1px solid; border-top: 1px solid"> {{subscribers |
                        currency }}
                    </td>
                </tr>
                <tr>
                    <td>BUSINESS WALLET (BALANCES)</td>
                    <td style="border-left:1px solid">{{business| currency}}</td>
                </tr>
                <tr>
                    <td>BUSINESS WALLET (COMMISSIONS)</td>
                    <td style="border-left:1px solid">{{businessWalletCommissions|currency}}</td>
                </tr>
                <tr>
                    <td>BILLER BALANCES</td>
                    <td style="border-left:1px solid;">
                        {{billers|currency}}
                    </td>
                </tr>
                <tr>
                    <td>PENDING TRANSFERS</td>
                    <td style="border-left:1px solid;">
                        {{pendingTransfers|currency}}
                    </td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid">GETCASH COMMISSIONS</td>
                    <td style="border-left:1px solid; border-bottom: 1px solid">
                        {{getcashCommission
                        |currency}}
                    </td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid">TOTAL</th>
                    <th style="border-left:1px solid; border-bottom: 1px solid">{{subscribers + business +
                        businessWalletCommissions+ billers + getcashCommission  +
                        pendingTransfers|currency}}
                    </th>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>