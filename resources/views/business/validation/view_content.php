<div style="margin:10px" ng-controller="getPendingEvalueTransactions" ng-cloak>
    <div class="card" class="pendingTable" >
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-archive blue-text"></i> TRANSACTIONS PENDING VALIDATION [ {{ results.length }} ]</strong>
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
                    <th data-field="amount">E-VALUE</th>
                    <th data-field="commission">COMMISSION</th>
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
                    <td>{{transaction.agentId.name}}</td>
                    <td>{{transaction.description}}</td>
                    <td>{{transaction.credit | currency}}</td>
                    <td>{{transaction.commission | currency}}</td>
                    <td>{{transaction.date | date:medium}}</td>
                    <td>{{transaction.administratorId.name }}</td>
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


