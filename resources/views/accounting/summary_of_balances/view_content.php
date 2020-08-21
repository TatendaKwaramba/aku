<div style="margin:10px;" ng-controller="getSummaryBalance" ng-cloak>
    <div class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-balance-scale blue-text"></i> <span>SUMMARY OF BALANCES</span></strong>

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
                    <td style="border-left:1px solid; border-top: 1px solid"> {{subscribers.value |
                        currency }}
                    </td>
                </tr>
                <tr>
                    <td>BUSINESS WALLET (BALANCES)</td>
                    <td style="border-left:1px solid">{{business.value| currency}}</td>
                </tr>
                <tr>
                    <td>BUSINESS WALLET (COMMISSIONS)</td>
                    <td style="border-left:1px solid">{{business.commissionEarned|currency}}</td>
                </tr>
                <tr>
                    <td >BILLER BALANCES</td>
                    <td style="border-left:1px solid;">
                        {{products.value|currency}}
                    </td>
                </tr>
                <tr>
                    <td >PENDING TRANSFERS</td>
                    <td style="border-left:1px solid;">
                        {{transfers.value|currency}}
                    </td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid">GETCASH COMMISSIONS</td>
                    <td style="border-left:1px solid; border-bottom: 1px solid">
                        {{gc.commissionEarned |currency}}
                    </td>
                </tr>
                <tr>
                    <th style="border-bottom: 1px solid">TOTAL</th>
                    <th style="border-left:1px solid; border-bottom: 1px solid">{{subscribers.value + business.value +
                        business.commissionEarned+ products.value + gc.commissionEarned  + transfers.value|currency}}
                    </th>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>