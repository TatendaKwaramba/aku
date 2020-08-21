<div ng-controller="activityLogsController" ng-cloak>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="center">
                    <h5 class="blue-text">
                        <i class="fa fa-group"></i>
                        Activity Logs
                    </h5>
                </div>
                <div>
                    <form name="searchUserLogs" id="searchUserLogs" ng-submit="searchLog()">
                        <div class="row">
                            <div class="input-field col s12">
                                <select class="select2-select" ng-model="adminUser"
                                        ng-options="user.name for user in users track by user.id">
                                </select>

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

    <div style="margin: 10px" ng-if="logs[0] != null" class="card">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-bars"></i> LOG [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="businessSearch = !businessSearch"><i
                            class="fa fa-search right "></i></a></span>
        </div>

        <div class="card-content with-padding">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th data-field="name">NAME</th>
                    <th data-field="action">ACTION <a ng-click="sort('action')"><i class="fa fa-sort"></i></a></th>
                    <th data-field="email">DATE <a ng-click="sort('created_at')"><i class="fa fa-sort"></i></a></th>
                    <th data-field="mobile">IP ADDRESS<a ng-click="sort('ip')"><i class="fa fa-sort"></i></a></th>
                </tr>
                </thead>
                <thead ng-show="businessSearch">
                <tr>

                    <th class="search-box">
                        <input type="text" placeholder="Search Name" ng-model="searchResult.name"
                               ng-model-options="{debounce: 500}" disabled>
                    </th>

                    <th class="search-box">
                        <input type="text" placeholder="Search Action" ng-model="searchResult.action"
                               ng-model-options="{debounce: 500}">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Date" ng-model="searchResult.deposit"
                               ng-model-options="{debounce: 500}" disabled>
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search By IP ADDRESS" ng-model="searchResult.commission"
                               ng-model-options="{debounce: 500}">
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr dir-paginate="log in results =  (logs  | filter:searchResult)|  orderBy:OrderBy:reverse | itemsPerPage:20 " pagination-id="log_table"
                    ng-dblclick="open(client)"
                >
                    <td>{{::log.name}}</td>
                    <td>{{::log.action}}</td>
                    <td>{{::log.created_at | date: 'medium'}}</td>
                    <td>{{::log.ip}}</td>
                    <td ng-if="results === 0">NO RESULTS FOUND</td>

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