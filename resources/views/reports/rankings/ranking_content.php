<div ng-controller="agentRankingsController" ng-cloak>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="center">
                    <h5 class="blue-text">
                        <i class="fa fa-group"></i>
                        Agent Rankings
                    </h5>
                </div>
                <div>
                    <form name="searchUserLogs" id="searchUserLogs" ng-submit="searchLog()">
                        <div class="row">
                            <div class="input-field col s6">
                                <select id="type" class="select2-select" ng-model="type">
                                    <option value="earnings">Earnings</option>
                                    <option value="transactions">Transactions</option>
                                </select>
                                <label for="type" class="active">RANK CRITERIA</label>

                            </div>
                            <div class="input-field col s6">
                                <select id="product" class="select2-select" ng-model="product"
                                        ng-options="product.name for product in products track by product.id">
                                    <option value="0">ALL PRODUCTS</option>
                                </select>
                                <label for="product" class="active">PRODUCT</label>

                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input type="date" id="start_date" ng-model="start_date"
                                       class="datepicker" ng-required="true"/>
                                <label for="start_date" class="active">START DATE</label>
                            </div>
                            <div class="input-field col s6">
                                <input type="date" id="end_date" ng-model="end_date"
                                       class="datepicker" ng-required="true"/>
                                <div class="col s4 offset-s9">
                                    <button class="waves-effect waves-light btn indigo"
                                            ng-disabled="searchUserLogs.$invalid"><i
                                            class="fa fa-search"></i> <i class="fa fa-refresh fa-spin"
                                                                         ng-show="loader"></i></button>
                                </div>
                                <label for="end_date">END DATE</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 10px" ng-if="rankings[0] != null" class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-bars"></i> AGENTS [ {{ results.length }} ]</strong>
            <br>
            <span><a href="" ng-click="businessSearch = !businessSearch"><i
                        class="fa fa-search right "></i></a></span>
        </div>

        <div class="card-content with-padding">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="name">AGENT NAME</th>
                    <th data-field="action">VALUE</th>
                </tr>
                </thead>
                <thead ng-show="businessSearch">
                <tr>

                    <th class="search-box">
                        <input type="text" placeholder="Search Name" ng-model="searchResult.name"
                               ng-model-options="{debounce: 500}">
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="Search Value" ng-model="searchResult.action"
                               ng-model-options="{debounce: 500}" disabled>
                    </th>

                </tr>
                </thead>

                <tbody>
                <tr dir-paginate="rank in results =  (rankings  | filter:searchResult)|  orderBy:'-1 * value' | itemsPerPage:1000 " pagination-id="log_table"
                    ng-dblclick="open(client)"
                >
                    <td>{{$index + 1}}</td>
                    <td>{{::rank.name}}</td>
                    <td>{{::rank.value}}</td>


                </tr>
            </table>
            <center>
                <dir-pagination-controls
                    pagination-id="log_table"
                    max-size="15"
                    direction-links="true"
                    boundary-links="true" class="red">
                </dir-pagination-controls>
            </center>

        </div>

    </div>


</div>