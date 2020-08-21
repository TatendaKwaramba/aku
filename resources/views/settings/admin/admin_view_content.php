<div style="margin:10px;" ng-controller="usersController" ng-cloak>
    <div class="card" class="clientInfoTable" ng-show="userInfoTable">
        <div class="card-content with-padding gc_category_heading">
            <i class="fa fa-users green-text"></i> ADMINISTRATORS [ {{ results.length }} ]
            <span><a href="" ng-click="refreshUsers()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="clientSearch = !clientSearch"><i
                            class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong><i
                            class="fa fa-refresh fa-spin"></i></strong> Fetching Users...</span>
        </div>

        <div class="card-content with-padding">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="name">NAME</th>
                    <th data-field="email">EMAIL</th>
                    <th data-field="created_at">CREATED AT</th>
                    <th data-field="updated_at">UPDATED AT</th>
                    <th data-field="role">Roles</th>

                </tr>
                </thead>
                <thead ng-show="clientSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Name" ng-model="searchResult.name">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search E-mail" ng-model="searchResult.email">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Created At" ng-model="searchResult.created_at">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Updated At" ng-model="searchResult.updated_at">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Search Role" ng-model="searchResult.role">
                    </th>


                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="user in results =  (users  | filter:searchResult)| orderBy: 'created_at' | itemsPerPage:40 "
                    ng-dblclick="open(user)">
                    <td>{{$index + 1}} {{$index.length}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.created_at}}</td>
                    <td>{{user.updated_at}}</td>
                    <td><span ng-repeat="x in user.roles">{{x.display_name}}, </span></td>


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

    <div class="clientFile" ng-show="userProfile">
        <br/>
        <div id="back" class="chip btn red white-text with-padding z-depth-1" ng-click="backToUserList()">
            <i class="fa fa-arrow-left"></i> Back To User List
        </div>

        <button class="chip btn purple white-text pull-right" ng-click="terminateUser()">
            <i class="fa fa-user-times"></i> Terminate User
        </button>
        <br/>

        <h5>
            <i class="fa fa-book"></i> User - {{userInfo.name }} <span ng-repeat="x in userInfo.roles">[{{ x.display_name }}]</span>
        </h5>
        <div class="card">
            <div class="card-content with-padding">
                <strong> <i class="fa fa-file-text-o"></i> Profile
                </strong>
            </div>
            <div class="card-content grey lighten-3 with-padding">
                <p>
                    Name : {{userInfo.name}} <br>
                    email : {{userInfo.email}} <br>
                    created at : {{userInfo.created_at }} <br>
                    updated At : {{userInfo.updated_at}} <br>

                </p><br>
                <div>
                    <strong> Roles :</strong>
                    <hr>
                    <div class="chip btn z-depth-1 cyan white-text" ng-repeat="x in userInfo.roles"
                         ng-click="removeRole(x)">
                        {{ x.display_name}}
                        <span ng-show="!x.progress">&#10006</span>
                        <i class="fa fa-spin fa-refresh" ng-show="x.progress">
                        </i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content with-padding">
                <strong> <i class="fa fa-plus"></i> Add Role
                </strong>

            </div>
            <div class="card-content grey lighten-3 with-padding">
                <form ng-submit="addRole()">
                    <md-select ng-model="user_roles" id="user_roles"
                               placeholder="Select Role" required>
                        <md-option></md-option>
                        <md-option ng-repeat="role in roles" value="{{role}}">{{role.display_name}}</md-option>
                    </md-select>

                    <button type="submit" class="btn red">
                        Commit
                        <i class="fa fa-spin fa-refresh" ng-show="addRoleSubmitProgress"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>