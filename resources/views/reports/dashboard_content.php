<div class="card" class="addSingleBillerForm" ng-controller="dashboardController" ng-cloak>
    <div class="row col s12">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="row card-content white-text">
                    <div class="row col sm-12">&nbsp
                        <div class="white-text">Today</div>
                        <div style="font-size: xx-small">&nbsp</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div></i></div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-cog" aria-hidden="true"></i>
                            <strong>999, 996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp CURRENT</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-bullseye"
                                                                             aria-hidden="true"></i> <strong>999,
                                996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp TARGET</div>
                    </div>


                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-line-chart"
                                                                             aria-hidden="true"></i> <strong>999,
                                996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp &nbsp REACHED</div>
                    </div>

                    <div class="row col sm-12">&nbsp
                        <div class="white-text"><strong>MTD</strong></div>
                        <div style="font-size: xx-small">&nbsp</div>
                    </div>
                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-cog" aria-hidden="true"></i>
                            <strong>999, 996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp CURRENT</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-bullseye"
                                                                             aria-hidden="true"></i> <strong>999,
                                996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp TARGET</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-line-chart"
                                                                             aria-hidden="true"></i> <strong>999,
                                996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp &nbsp REACHED</div>
                    </div>

                    <div class="row col sm-12">
                        <div>&nbsp</div>
                        <div style="font-size: medium" class="white-text"><i class="fa fa-bar-chart"
                                                                             aria-hidden="true"></i> <strong>999,
                                996</strong></div>
                        <div style="font-size: xx-small">&nbsp &nbsp &nbsp &nbsp &nbsp PROJECTED</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col s12">
        <ul class="tabs">
            <li class="tab col s3"><a class="active" href="#clients">Clients</a></li>
            <li class="tab col s3"><a href="#billers">Billers</a></li>
            <li class="tab col s3"><a href="#banks">Banks</a></li>
            <li class="tab col s3"><a href="#products">Products</a></li>
            <li class="tab col s3"><a href="#devices">Devices</a></li>
            <li class="tab col s3"><a href="#transactions">Transactions</a></li>
        </ul>
    </div>
    <div id="clients">
    <div class="row">
        <div class="col s12">
            <div class="col s3">
                <div class="card-content">
                    <div justgage title="Cash In" value="67" decimals=2 min="0"
                         max=100 human-friendly-decimal=true
                         format-number='true'>
                    </div>
                    <center style="font-size: smaller">Cash In</center>
                </div>
            </div>
            <div class="col s1">
            </div>

            <div class="col s3">
                <div class="card-content">
                    <div justgage title="title" value="27" decimals=2 min="0"
                         max=100 human-friendly-decimal=true
                         format-number='true'>
                    </div>
                    <center style="font-size: smaller">Cash Out</center>
                </div>
            </div>
            <div class="col s1">
            </div>
            <div class="col s3">
                <div class="card-content">
                    <div justgage title="{{cashInTitle}}" value="90" decimals=2 min="0"
                         max=100 human-friendly-decimal=true
                         format-number='true'>
                    </div>
                    <center style="font-size: smaller">Activity Ratio</center>
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
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">MTD</th>
                            <td style="font-size: smaller">67 900</td>
                            <td style="font-size: smaller">46 300</td>
                            <td style="font-size: smaller">34 000</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">LAST MONTH</th>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">MTD LAST MONTH</th>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>
                        <tr>
                            <th>&nbsp</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> PROJECTED
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
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">MTD</th>
                            <td style="font-size: smaller">67 900</td>
                            <td style="font-size: smaller">46 300</td>
                            <td style="font-size: smaller">34 000</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">LAST MONTH</th>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>

                        <tr>
                            <th style="font-size: smaller">MTD LAST MONTH</th>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                            <td style="font-size: smaller">568, 766</td>
                        </tr>
                        <tr>
                            <th>&nbsp</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET</th>
                            <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> PROJECTED
                            </th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div id="billers" class="row col s12" ng-controller="billerDashboardController">

        <div class="row col s12">
            <div class="col s6">
                <center><strong>Ranking by number of transactions</strong></center>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-series="series" chart-options="options"
                        chart-dataset-override="datasetOverride" chart-click="onClick"
                </canvas>
            </div>

            <div class="col s6">
                <center><strong>Ranking by total amount transacted</strong></center>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-series="series" chart-options="options"
                        chart-dataset-override="datasetOverride" chart-click="onClick"
                </canvas>
            </div>
        </div>

        <div class="row col s12">
            <div class="col s6">
                <center><strong>Ranking by agents earnings</strong></center>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-series="series" chart-options="options"
                        chart-dataset-override="datasetOverride" chart-click="onClick"
                </canvas>
            </div>

            <div class="col s6">
                <center><strong>Ranking by platform earnings</strong></center>
                <canvas id="line" class="chart chart-line" chart-data="data"
                        chart-labels="labels" chart-series="series" chart-options="options"
                        chart-dataset-override="datasetOverride" chart-click="onClick"
                </canvas>
            </div>
        </div>


    </div>

    <div id="banks">
        <div class="row">
            <div class="col s12">
                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="CABS" value="67" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">CABS</center>
                    </div>
                </div>
                <div class="col s1">
                </div>

                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="title" value="27" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">ZB</center>
                    </div>
                </div>
                <div class="col s1">
                </div>
                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="{{cashInTitle}}" value="90" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">GetBucks</center>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s6">
                    <div class="card-content" style="width: 250px">
                    </div>
                </div>

                <div class="col s6">
                    <div class="card-content">
                        <table class="bordered responsive-table">
                            <thead>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller">ACTUAL</th>
                                <th style="font-size: smaller">TARGET</th>
                                <th style="font-size: smaller">%ACHIEVED</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="font-size: smaller">TODAY</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD</th>
                                <td style="font-size: smaller">67 900</td>
                                <td style="font-size: smaller">46 300</td>
                                <td style="font-size: smaller">34 000</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i>
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

    <div id="products">
        <div class="row">
            <div class="col s12">
                <div class="col s6">
                    <div class="card-content" ng-controller="productsDashboardController">
                        <canvas id="line" class="chart chart-line" chart-data="data"
                                chart-labels="labels" chart-series="series" chart-options="options"
                                chart-dataset-override="datasetOverride" chart-click="onClick"
                        </canvas>
                        <center style="font-size: smaller">Cash In</center>
                    </div>
                </div>

                <div class="col s1">
                </div>
                <div class="col s6">
                    <div class="card-content" style="width: 370px;">
                        <div justgage title="{{cashInTitle}}" value="90" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">Activity Ratio</center>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s6" ng-controller="productCOSController">
                    <div class="card-content">
                        <br/>
                        <canvas id="pie" class="chart chart-pie"
                                chart-data="data" chart-labels="labels" chart-options="">
                        </canvas>
                        <br/>
                        <center><strong>Class Of Service</strong></center>
                    </div>
                </div>

                <div class="col s6">
                    <div class="card-content">
                        <table class="bordered responsive-table">
                            <thead>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller">ACTUAL</th>
                                <th style="font-size: smaller">TARGET</th>
                                <th style="font-size: smaller">%ACHIEVED</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="font-size: smaller">TODAY</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD</th>
                                <td style="font-size: smaller">67 900</td>
                                <td style="font-size: smaller">46 300</td>
                                <td style="font-size: smaller">34 000</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i>
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

    <div id="devices" ng-controller="DevicesDoughnutController">
        <div class="row">
            <div class="col s12">
                <div class="col s5">
                    <div class="card-content">
                        <canvas id="doughnut" class="chart chart-doughnut"
                                chart-data="data" chart-labels="labels">
                        </canvas>
                        <center style="font-size: smaller">Active Devices</center>
                    </div>
                </div>
                <div class="col s1">
                </div>

                <div class="col s5">
                    <div class="card-content">
                        <div justgage title="{{cashInTitle}}" value="90" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">Activity Ratio</center>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s5">
                    <div class="card-content"><br/><br/>
                        <div class="card-content" ng-controller="DeviceActivityController">
                            <canvas id="pie" class="chart chart-pie"
                                    chart-data="data" chart-labels="labels" chart-options="">
                            </canvas>
                            <br/>
                            <center style="font-size: smaller">Device Versions</center>
                        </div>
                    </div>
                </div>

                <div class="col s5">
                    <div class="card-content">
                        <table class="bordered responsive-table">
                            <thead>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller">ACTUAL</th>
                                <th style="font-size: smaller">TARGET</th>
                                <th style="font-size: smaller">%ACHIEVED</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="font-size: smaller">TODAY</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD</th>
                                <td style="font-size: smaller">67 900</td>
                                <td style="font-size: smaller">46 300</td>
                                <td style="font-size: smaller">34 000</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i>
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

    <div id="transactions">
        <div class="row">
            <div class="col s12">
                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="Cash In" value="67" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">Cash In</center>
                    </div>
                </div>
                <div class="col s1">
                </div>

                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="title" value="27" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">Cash Out</center>
                    </div>
                </div>
                <div class="col s1">
                </div>
                <div class="col s3">
                    <div class="card-content">
                        <div justgage title="{{cashInTitle}}" value="90" decimals=2 min="0"
                             max=100 human-friendly-decimal=true
                             format-number='true'>
                        </div>
                        <center style="font-size: smaller">Activity Ratio</center>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="col s6">
                    <div class="card-content" style="width: 250px">
                    </div>
                </div>

                <div class="col s6">
                    <div class="card-content">
                        <table class="bordered responsive-table">
                            <thead>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller">ACTUAL</th>
                                <th style="font-size: smaller">TARGET</th>
                                <th style="font-size: smaller">%ACHIEVED</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="font-size: smaller">TODAY</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD</th>
                                <td style="font-size: smaller">67 900</td>
                                <td style="font-size: smaller">46 300</td>
                                <td style="font-size: smaller">34 000</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>

                            <tr>
                                <th style="font-size: smaller">MTD LAST MONTH</th>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                                <td style="font-size: smaller">568, 766</td>
                            </tr>
                            <tr>
                                <th>&nbsp</th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> ACTUAL
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i> TARGET
                                </th>
                                <th style="font-size: smaller"><i class="fa fa-caret-up" aria-hidden="true"></i>
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


</div>



