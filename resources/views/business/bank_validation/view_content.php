<div style="margin:10px" ng-controller="getPendingBankTransfers" ng-cloak>
    <div class="card" class="pendingTable" >
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-archive blue-text"></i> PENDING BANK TRANSFERS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshPending()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="pendingSearch = !pendingSearch"><i
                        class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Pending Transactions...</span>
        </div>

        <div class="card-content">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="business_name">BUSINESS NAME</th>
                    <th data-field="description">DESCRIPTION</th>
                    <th data-field="amount">BANK</th>
                    <th data-field="commission">AMOUNT</th>
                    <th data-field="date_added">DATE ADDED</th>
                    <th data-field="initiated_by">INITIATED BY</th>
                    <th></th>
                    <th></th>



                </tr>
                </thead>
                <thead ng-show="pendingSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Name" ng-model="searchResult.name">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Amount" ng-model="searchResult.amount">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Description" ng-model="searchResult.description">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Dare Added" ng-model="searchResult.date">
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="transaction in results =  (transactions  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                    ng-dblclick="open(supervisor)" >
                    <td>{{$index + 1}}</td>
                    <td>{{transaction.agentId.firstname + ' ' + transaction.agentId.lastname}}</td>
                    <td>{{transaction.description}}</td>
                    <td>{{transaction.accountsId.description2 }}</td>
                    <td>{{transaction.accountsId.balance | currency}}</td>
                    <td>{{transaction.date | date:medium}}</td>
                    <td>{{transaction.administratorId.username }}</td>
                    <td><a class="btn chip green accent-3" ng-click="validate(transaction)"><i class="fa fa-check"></i></a></td>
                    <td><a class="btn chip red accent-3" ng-click="reject(transaction)"><i class="fa fa-times"></i></a></td>
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


