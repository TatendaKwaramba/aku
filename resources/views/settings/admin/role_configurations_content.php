<div style="margin:10px;" ng-controller="rolesController" ng-cloak>
    <!--Uses uiElementController defined in app.blade-->
    <div class="card">
        <div class="card-content with-padding gc_category_heading">
            <i class="fa fa-users green-text"></i> SYSTEM ACCESS MATRIX
            <span><a href="" ng-click="clientSearch = !clientSearch"><i
                        class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong><i
                        class="fa fa-refresh fa-spin"></i></strong> Compiling...</span>
        </div>

        <div class="card-content with-padding">
            <table class="centered highlight bordered striped border" style="table-layout: fixed;">
                <thead>
                <tr>
                    <th style="border-right: 1px solid silver; border-left: 1px solid silver; border-top: 1px solid silver" ng-show="rolesMatrix.length"> Element </th>
                    <th ng-repeat="x in rolesMatrix">{{ x.display_name}}</th>
                </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="y in elements"
                        ng-dblclick="open(y)">
                        <td style="border-right: 1px solid silver; border-left: 1px solid silver">{{y.name}}</td>
                        <td ng-repeat="x in rolesMatrix" style="border-right: 1px solid silver"><i class="teal-text fa fa-check" ng-show="arrayContainsObject(y.roles, x)"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>

    <div class="clientFile" ng-show="userProfile">
        <br/>
        <div id="back" class="chip btn green white-text with-padding z-depth-1" ng-click="backToUserList()">
            <i class="fa fa-arrow-left"></i> Back To User List
        </div>
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
                <div class="chip btn grey darken-2 white-text" ng-repeat="role in availableRoles" ng-click='addRole(userInfo.id, role)'
                     ng-if="role.name != 'admin_global'">
                    {{role.display_name}}
                    <span ng-show="!role.progress">+</span>
                    <i class="fa fa-spin fa-refresh" ng-show="role.progress"></i>
                </div>
            </div>
        </div>
    </div>

</div>