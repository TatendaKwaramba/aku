<div style="margin: 20px" ng-controller="dashboardController" ng-cloak>
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="row card-content white-text">
                    <div class="row col sm-12">&nbsp
                        <div class="white-text"><strong>TODAY</strong></div>
                        <div style="font-size: xx-small">&nbsp</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text">
                            <strong>{{insurance.insuranceSalesToday +zesa.zesaSalesToday + econet.econetSalesToday +
                                netone.netoneSalesToday + telecel.telecelSalesToday + zol.zolSalesToday +
                                councils.cityCouncilSalesToday + powertelAccount.powertelAccountSalesToday +
                                powertelMobile.powertelMobileSalesToday | currency}}</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp CURRENT</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-bullseye"
                                                                             aria-hidden="true"></i> <strong>{{platformTodayTarget
                                | currency}}</strong>
                        </div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp TARGET</div>
                    </div>


                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-line-chart"
                                                                             aria-hidden="true"></i> <strong>{{(insurance.insuranceSalesToday
                                +zesa.zesaSalesToday + econet.econetSalesToday + netone.netoneSalesToday +
                                telecel.telecelSalesToday + zol.zolSalesToday + councils.cityCouncilSalesToday +
                                powertelAccount.powertelAccountSalesToday + powertelMobile.powertelMobileSalesToday)/
                                platformTodayTarget | percentage}}</strong>
                        </div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp &nbsp REACHED</div>
                    </div>
                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div></div>
                    </div>
                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div></div>
                    </div>
                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div></div>
                    </div>
                    <div class="row col sm-12">&nbsp
                        <div class="white-text"><strong>MTD</strong></div>
                        <div style="font-size: xx-small">&nbsp</div>
                    </div>
                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text">
                            <strong>{{insurance.insuranceSalesMTD +zesa.zesaSalesMTD + econet.econetSalesMTD +
                                netone.netoneSalesMTD + telecel.telecelSalesMTD + zol.zolSalesMTD +
                                councils.cityCouncilSalesMTD + powertelAccount.powertelAccountSalesMTD +
                                powertelMobile.powertelMobileSalesMTD | currency}}</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp CURRENT</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-bullseye"
                                                                             aria-hidden="true"></i> <strong>{{platformMTDTarget | currency}}</strong>
                        </div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp TARGET</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-line-chart"
                                                                             aria-hidden="true"></i> <strong>{{(insurance.insuranceSalesMTD +zesa.zesaSalesMTD + econet.econetSalesMTD +
                                netone.netoneSalesMTD + telecel.telecelSalesMTD + zol.zolSalesMTD +
                                councils.cityCouncilSalesMTD + powertelAccount.powertelAccountSalesMTD +
                                powertelMobile.powertelMobileSalesMTD)/platformMTDTarget | percentage}}</strong>
                        </div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp &nbsp REACHED</div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-content with-padding">
                <div class="row col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#clients" ng-click="subscribersget()">Subscribers</a></li>
                        <li class="tab col s3"><a href="#agents" ng-click="agentsget()">Business Wallets</a></li>
                        <li class="tab col s3"><a href="#products" ng-click="billersget()">Billers</a></li>
                        <li class="tab col s3"><a href="#devices" ng-click="devicesget()">Devices</a></li>
                        <!--                        <li class="tab col s3"><a href="#summary" ng-click="summaryget()">Summary</a></li>
                        -->                    </ul>
                </div>

                <div id="clients">
                    <div name="generalInfo">
                        <center>
                            <h2 class="blue-text">
                                General Subscriber Information
                            </h2>
                        </center>
                        <div>
                            <center>
                                <h4>
                                    Total Subscribers
                                </h4>
                                <h1>
                                    {{clients.clientCount}}
                                </h1>
                            </center>
                        </div>
                    </div>
                    <hr>
                    <div name="transactionInfo">
                        <center>
                            <h2 class="blue-text">
                                Subscriber Transaction Information
                            </h2>
                        </center>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Cash In" value="{{cashin.cashInToday}}" decimals=2
                                             min="0"
                                             max=200 human-friendly-decimal=true
                                             format-number='true' custom-sectors="{{customSectors}}"
                                             level-colors="{{levelColors}}"
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Cash In</br>Value: {{cashin.cashInToday |
                                            currency}}
                                        </center>
                                    </div>
                                </div>

                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Cash Out" value="{{cashout.cashOutToday}}" decimals=2
                                             min="0"
                                             max=200 human-friendly-decimal=true
                                             format-number='true' custom-sectors="{{customSectors}}"
                                             level-colors="{{levelColors}}"
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Cash Out</br>Value:
                                            {{cashout.cashOutToday | currency}}
                                        </center>
                                    </div>
                                </div>

                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Send Money" value="{{sendmoney.sendMoneyToday}}" decimals=2
                                             min="0"
                                             max=200 human-friendly-decimal=true
                                             format-number='true' custom-sectors="{{customSectors}}"
                                             level-colors="{{levelColors}}"
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Send Money</br>Value:
                                            {{sendmoney.sendMoneyToday | currency }}
                                        </center>
                                    </div>
                                </div>

<!--                                <div class="col s3">
                                    <div class="card-content">
                                        <div justgage title="Bill Payments" value="{{insurance.insuranceSalesMTD +zesa.zesaSalesMTD + econet.econetSalesMTD +
                                            netone.netoneSalesMTD + telecel.telecelSalesMTD + zol.zolSalesMTD +
                                            councils.cityCouncilSalesMTD + powertelAccount.powertelAccountSalesMTD +
                                            powertelMobile.powertelMobileSalesMTD}}" decimals=2 min="0"
                                             max=33000 human-friendly-decimal=true
                                             format-number='true' custom-sectors="{{customSectors}}"
                                             level-colors="{{levelColors}}"
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Bill Payments<br>Value:
                                            {{insurance.insuranceSalesMTD +zesa.zesaSalesMTD + econet.econetSalesMTD +
                                            netone.netoneSalesMTD + telecel.telecelSalesMTD + zol.zolSalesMTD +
                                            councils.cityCouncilSalesMTD + powertelAccount.powertelAccountSalesMTD +
                                            powertelMobile.powertelMobileSalesMTD | currency}}
                                        </center>
                                    </div>
                                </div>
-->                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="red-text" style="font-size: smaller">CASH IN</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{cashin.cashInToday | currency}}</td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{cashin.cashInToday/200 |
                                                    percentage}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">{{cashin.cashInMTD |
                                                    currency}}
                                                </td>
                                                <td style="font-size: smaller">{{200 * date | currency}}</td>
                                                <td style="font-size: smaller">{{cashin.cashInMTD / (200*date)
                                                    | percentage }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">{{cashin.cashInLastMonthToday | currency}}</td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{cashin.cashInLastMonthToday /200 | percentage}}</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">{{cashin.cashInLastMonthMTD | currency}}</td>
                                                <td style="font-size: smaller">{{200 * date | currency}}</td>
                                                <td style="font-size: smaller">{{cashin.cashInLastMonthMTD / (200*date)
                                                    | percentage }}</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="green-text" style="font-size: smaller">CASH OUT</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{cashout.cashOutToday | currency}}</td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{cashout.cashOutToday / 200 |
                                                    percentage}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">{{cashout.cashOutMTD |
                                                    currency}}
                                                </td>
                                                <td style="font-size: smaller">{{5000 * date | currency}}</td>
                                                <td style="font-size: smaller">{{cashout.cashOutMTD /
                                                    (200*date) | percentage }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">{{cashout.cashOutLastMonthToday | currency}}</td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{cashout.cashOutLastMonthToday /200 | percentage}}</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">{{cashout.cashOutLastMonthMTD | currency}}</td>
                                                <td style="font-size: smaller">{{200 * date | currency}}</td>
                                                <td style="font-size: smaller">{{cashout.cashOutLastMonthMTD /
                                                    (200*date) | percentage }}</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="red-text" style="font-size: smaller">SEND MONEY</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyToday | currency}}
                                                </td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyToday/200 |
                                                    percentage}}
                                                </td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyMTD |
                                                    currency}}
                                                </td>
                                                <td style="font-size: smaller">{{200 * date | currency}}</td>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyMTD /
                                                    (200*date) | percentage }}
                                                </td>
                                            </tr>


                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyLastMonthToday |
                                                    currency}}</td>
                                                <td style="font-size: smaller">$200</td>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyLastMonthToday / 200 | percentage}}</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyLastMonthMTD |
                                                    currency}}</td>
                                                <td style="font-size: smaller">{{200 * date | currency}}</td>
                                                <td style="font-size: smaller">{{sendmoney.sendMoneyLastMonthMTD /
                                                    (200*date) | percentage }}</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div name="subProductInfo">
                        <center>
                            <h2 class="blue-text">
                                Subscriber Product Sales
                            </h2>
                        </center>
                        <div class="row">
                            <div class="col s12">
                                <center><strong>Number of transactions</strong></center>
                                <canvas id="bar" class="chart chart-bar" chart-data="subProddata"
                                        chart-labels="subProdlabels" chart-series="subProdseries"
                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                </canvas>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="agents">
                    <div name="generalInfo">
                        <center>
                            <h2 class="green-text">
                                General Business Wallet Information
                            </h2>
                        </center>

                        <div>
                            <center>
                                <h4>
                                    Total Business Wallets
                                </h4>
                                <h1 class="blue-text">
                                    {{agents.total}}
                                </h1>

                            </center>
                        </div>
                    </div>
                    <hr>
                    <!--<div name="transactionInfo">
                        <center>
                            <h2 class="green-text">
                                Agent Transaction Information
                            </h2>
                        </center>
                        <div class="row">
                            <div class="col s12">
                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Cash In" value="{{cash_in.volume}}" decimals=2 min="0"
                                             max=5000 human-friendly-decimal=true
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Cash In</br>Value: ${{cash_in_value}}
                                        </center>
                                    </div>
                                </div>

                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Cash Out" value="{{cash_out.volume}}" decimals=2 min="0"
                                             max=5000 human-friendly-decimal=true
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Cash Out</br>Value: ${{cash_out_value}}
                                        </center>
                                    </div>
                                </div>

                                <div class="col s4">
                                    <div class="card-content">
                                        <div justgage title="Bill Payments" value="90" decimals=2 min="0"
                                             max=100 human-friendly-decimal=true
                                             format-number='true'>
                                        </div>
                                        <center style="font-size: smaller">Bill Payments</center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="red-text" style="font-size: smaller">CASH IN</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{cash_in_value}}</td>
                                                <td style="font-size: smaller">5, 000</td>
                                                <td style="font-size: smaller">{{cash_in_value/5000}} %</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="green-text" style="font-size: smaller">CASH OUT</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{cash_out_value}}</td>
                                                <td style="font-size: smaller">5, 000</td>
                                                <td style="font-size: smaller">{{cash_out_value/5000}} %</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s12">

                                <div class="col s6">
                                    <div class="card-content">
                                        <table class="bordered responsive-table">
                                            <thead>
                                            <tr>
                                                <th class="purple-text" style="font-size: smaller">BILL PAYEMENTS</th>
                                                <th style="font-size: smaller">ACTUAL</th>
                                                <th style="font-size: smaller">TARGET</th>
                                                <th style="font-size: smaller">%ACHIEVED</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th style="font-size: smaller">TODAY</th>
                                                <td style="font-size: smaller">{{cash_out_value}}</td>
                                                <td style="font-size: smaller">5, 000</td>
                                                <td style="font-size: smaller">{{cash_out_value/5000}} %</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>

                                            <tr>
                                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                                <td style="font-size: smaller">0</td>
                                            </tr>
                                            <tr>
                                                <th>&nbsp</th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    ACTUAL
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    TARGET
                                                </th>
                                                <th style="font-size: smaller"><i class="fa fa-caret-up"
                                                                                  aria-hidden="true"></i>
                                                    PROJECTED
                                                </th>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>-->
                    <div name="agentProductInfo">
                        <center>
                            <h2 class="green-text">
                                Business Wallet Product Sales
                            </h2>
                        </center>
                        <div class="row">
                            <div class="col s12">
                                <center><strong>Number of transactions</strong></center>
                                <canvas id="bar" class="chart chart-bar" chart-data="agentProddata"
                                        chart-labels="agentProdlabels" chart-series="agentProdseries"
                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                </canvas>
                            </div>

                        </div>
                    </div>

                </div>

                <div id="products">
                    <div class="row">
                        <div class="col s6">
                            <center><strong>Ranking by number of transactions</strong></center>
                            <canvas id="line" class="chart chart-bar" chart-data="transactionCountValues"
                                    chart-labels="transactionCountLabels" chart-series="series" chart-options="options"
                            </canvas>
                        </div>

                        <div class="col s6">
                            <center><strong>Ranking by total amount transacted</strong></center>
                            <canvas id="line" class="chart chart-bar" chart-data="transactionSumValues"
                                    chart-labels="transactionSumLabels" chart-series="series" chart-options="options"
                            </canvas>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <center><strong>Ranking by agents earnings</strong></center>
                            <canvas id="line" class="chart chart-bar" chart-data="agentEarningsValues"
                                    chart-labels="agentEarningsLabels" chart-series="series" chart-options="options"
                            </canvas>
                        </div>

                        <div class="col s6">
                            <center><strong>Ranking by platform earnings</strong></center>
                            <canvas id="line" class="chart chart-bar" chart-data="platformEarningsValues"
                                    chart-labels="platformEarningsLabels" chart-series="series" chart-options="options"
                            </canvas>
                        </div>
                    </div>
                </div>

                <div id="devices">
                    <div class="row">
                        <div ng-show="loading">
                            <center>
                                <h3>
                                    Loading...
                                </h3>
                            </center>
                        </div>
                        <div>
                            <center>
                                <h4>
                                    Total Devices
                                </h4>

                                <h2 class="blue-text">
                                    {{devices.deviceCount}}
                                </h2>
                            </center>
                        </div>
                        <div class="col s12">
                            <div class="col s6">
                                <canvas id="doughnut" class="chart chart-doughnut"
                                        chart-data="deviceStateValues" chart-labels="deviceStateLabels">
                                </canvas>
                                <br/>
                                <center style="font-size: smaller">Active Devices</center>
                            </div>

                            <div class="col s6">
                                <canvas id="pie" class="chart chart-pie"
                                        chart-data="devicePlatformsValues" chart-labels="devicePlatformsLabels"
                                        chart-options="">
                                </canvas>
                                <br/>
                                <center style="font-size: smaller">Device Versions</center>
                            </div>
                        </div>
                    </div>

                    <!--                    <div class="row">
                                            <div class="col s6">
                                                <br/>
                                                <table class="bordered responsive-table">
                                                    <thead>
                                                    <tr>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th style="font-size: smaller">TOTAL DEVICES</th>
                                                        <td style="font-size: smaller">{{totaldevicescount}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th style="font-size: smaller">ADDED TODAY</th>
                                                        <td style="font-size: smaller">0</td>
                                                    </tr>

                                                    <tr>
                                                        <th style="font-size: smaller">ACTIVITY RATIO</th>
                                                        <td style="font-size: smaller">0</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                    -->

                </div>

                <!--                <div id="summary">
                                    <div class="row">
                                        <div class="col s12">
                                            <div class="col s3">
                                                <div class="card-content">

                                                </div>
                                            </div>
                                            <div class="col s1">
                                            </div>

                                            <div class="col s3">
                                                <div class="card-content">
                                                </div>
                                            </div>
                                            <div class="col s1">
                                            </div>
                                            <div class="col s3">
                                                <div class="card-content">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s12">
                                            <div class="col s6">
                                                <center><strong>Number of transactions</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>

                                            <div class="col s6">
                                                <center><strong>Number of customers</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>
                                        </div>


                                        <div class="col s12">
                                            <div class="col s6">
                                                <center><strong>Transactional Float per active customer</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>

                                            <div class="col s6">
                                                <center><strong>Active customers by number of transactions*, last 90 days</strong>
                                                </center>
                                                <canvas id="bar" class="chart chart-bar" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>
                                        </div>


                                        <div class="col s12">
                                            <div class="col s6">
                                                <center><strong>Transactions and float per agent</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>

                                            <div class="col s6">
                                                <center><strong>Agents by average number of transactions */day, last 90 days</strong>
                                                </center>
                                                <canvas id="bar" class="chart chart-bar"
                                                        chart-data="data" chart-labels="labels"> chart-series="series"
                                                </canvas

                                            </div>
                                        </div>


                                        <div class="col s12">
                                            <div class="col s6">
                                                <center><strong>Customer / Agent balance</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>

                                            <div class="col s6">
                                                <center><strong>Transaction Patterns</strong></center>
                                                <canvas id="line" class="chart chart-line" chart-data="data"
                                                        chart-labels="labels" chart-series="series" chart-options="options"
                                                        chart-dataset-override="datasetOverride" chart-click="onClick"
                                                </canvas>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                -->            </div>
        </div>
    </div>

</div>


