<div style="margin:10px;" ng-controller="getVolumesValues" ng-cloak>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-balance-scale blue-text"></i> <span>Volumes & Values | <span class="blue-text">{{displayedDate}}</span></span></strong>
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
            <table class="bordered" style="table-layout: fixed">
                <tr>
                    <th class="blue-text" colspan="2" style="border-bottom: hidden">Payments</th>
                    <th class="center" style="border: 1px solid; font-size: small; padding: 5px" colspan="2">$0 - $4.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$5 - $10.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$11 - $30.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$31 - $50.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$51 - $100.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$101 - $200.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$201 -  ~</th>
                    <th class="center" style="border: 1px solid;" colspan="2">Total</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>


                </tr>
                <tr ng-repeat="transaction in transactions">
                    <td colspan="2" style="font-size: small; border: 1px solid;">{{transaction.transactionType}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr0to5.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr0to5.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr5to10.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr5to10.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr11to30.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr11to30.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr31to50.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr31to50.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr51to100.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr51to100.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr101to200.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr101to200.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr201to.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr201to.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.total.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.total.value | currency}}</td>


                </tr>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-content with-padding">
            <table class="bordered" style="table-layout: fixed">
                <tr>
                    <th class="blue-text" colspan="2" style="border-bottom: hidden">Bill Payments</th>
                    <th class="center" style="border: 1px solid; font-size: small; padding: 5px" colspan="2">$0 - $4.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$5 - $10.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$11 - $30.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$31 - $50.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$51 - $100.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$101 - $200.99</th>
                    <th class="center" style="border: 1px solid;" colspan="2">$201 -  ~</th>
                    <th class="center" style="border: 1px solid;" colspan="2">Total</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Volume</span></th>
                    <th style="border: 1px solid; font-size: small"><span class="blue-text center">Value</span></th>


                </tr>
                <tr ng-repeat="transaction in productTransactions">
                    <td colspan="2" style="font-size: small; border: 1px solid;">{{transaction.productName}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr0to5.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr0to5.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr5to10.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr5to10.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr11to30.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr11to30.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr31to50.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr31to50.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr51to100.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr51to100.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr101to200.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr101to200.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr201to.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.gr201to.value | currency}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.total.volume}}</td>
                    <td style="border: 1px solid; font-size: x-small;" >{{transaction.total.value | currency}}</td>



                </tr>
            </table>
        </div>

    </div>

</div>