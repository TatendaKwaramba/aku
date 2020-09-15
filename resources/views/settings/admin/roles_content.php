<div ng-controller="rolesController" ng-cloak>
    <div class="card" class="clientInfoTable" ng-show="roleInfoTable">
        <div class="card-content with-padding gc_category_heading">
            <i class="fa fa-users teal-text"></i> ROLES [ {{ results.length }} ]
            <span><a href="" ng-click="refreshRoles()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Roles...</span>
        </div>

        <div class="card-content with-padding">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="display_name">Role</th>
                    <th data-field="description">Description</th>
                    <th data-field="created_at">Created At</th>
                    <th data-field="updated_at">Updated At</th>

                </tr>
                </thead>
                <thead ng-show="clientSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Name" ng-model="searchResult.display_name">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Description" ng-model="searchResult.description">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Created At" ng-model="searchResult.created_at">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Updated At" ng-model="searchResult.updated_at">
                    </th>

                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="role in results =  (roles  | filter:searchResult)| orderBy: 'created_at' | itemsPerPage:10 "
                    ng-dblclick="open(role)">
                    <td>{{$index + 1}} {{$index.length}}</td>
                    <td>{{role.display_name}}</td>
                    <td>{{role.description}}</td>
                    <td>{{role.created_at}}</td>
                    <td>{{role.updated_at}}</td>
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


        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red animated pulse infinite">
                <i class="fa fa-download"></i>
            </a>

        </div>
    </div>

    <div class="clientFile" ng-show="roleProfile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="close()">
            <i class="fa fa-arrow-left"></i> Back To Role List
        </div>
        <br/>

        <div class="row">
            <h5 class="left"><i class="fa fa-book"></i> Role - {{roleInfo.display_name}}</h5>

            <div id="deleteRole" class="chip btn red white-text z-depth-1 right" ng-click="deleteRole()" ng-show="! adm_gbl">
                Delete Role <spin ng-show="!deleteRoleProgress">&#10006</spin>
                <i class="fa fa-refresh fa-spin" ng-show="deleteRoleProgress"></i>
            </div>
        </div>

        <div class="card">
            <div class="card-content with-padding">
                <strong> <i class="fa fa-file-text-o"></i> Profile
                </strong>

            </div>
            <div class="card-content grey lighten-3 with-padding">
                <p>
                    Name : {{roleInfo.display_name}} <br>
                    Description : {{roleInfo.description}} <br>
                    created at : {{roleInfo.created_at }} <br>
                    updated At : {{roleInfo.updated_at}} <br>

                </p>
            </div>
        </div>


        <div class="card" ng-show="!adm_gbl">
            <div class="card-content with-padding">
                <strong> <i class="fa fa fa-plus "></i> Add Permission
                </strong>

            </div>
            <div class="card-content grey lighten-3 with-padding">
                <form ng-submit="addPerm()">
                    <md-select ng-model="role_perms" id="role_perms"
                               placeholder="Select Permission" required>
                        <md-option></md-option>
                        <md-option ng-repeat="perm in perms" value="{{perm}}">{{perm.category + ' ' +
                            perm.display_name}}
                        </md-option>
                    </md-select>

                    <button type="submit" class="btn red">
                        Commit
                        <i class="fa fa-spin fa-refresh" ng-show="addPermSubmitProgress"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>