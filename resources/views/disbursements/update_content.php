<div style="margin:10px;">
    <div class="clientTable" >
        <div class="card">
            <div class="card-content with-padding " style="font-size: x-large">
                <strong><i class="fa fa-users teal-text"></i> SUBSCRIBERS [ 400792 ]</strong>
                <span><a href="" ng-click="refreshClients()"><i class="fa fa-refresh "></i></a></span>
                <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right "></i></a></span>
                <span class="right" ng-show="loading"><strong class="black-text "><i
                            class="fa fa-refresh fa-spin"></i></strong> Fetching Subscribers...</span>
            </div>

            <div class="card-content with-padding">
                <table class="highlight bordered striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th data-field="firstname">NAME</th>
                        <th data-field="lastname">SURNAME</th>
                        <th data-field="email">EMAIL ADDRESS</th>
                        <th data-field="mobile">MOBILE</th>
                        <th data-field="registration_date">REGISTRATION DATE</th>
                    </tr>
                    </thead>
                    <thead ng-show="clientSearch">
                    <tr>
                        <th><i class="fa fa-search"></i></th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Name" ng-model="searchResult.firstname">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Surname" ng-model="searchResult.lastname">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Email" ng-model="searchResult.email">
                        </th>
                        <th class="search-box">
                            <input type="text" placeholder="Search Mobile" ng-model="searchResult.mobile">
                        </th>

                        <th class="search-box">
                            <input type="date" class="datepicker" placeholder="Search By Date"
                                   ng-model="searchResult.registrationDate">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="client in results =  (clients_for_update  | filter:searchResult)| orderBy: 'registrationDate' | itemsPerPage:20 "
                        ng-dblclick="open(client)">
                        <td>{{$index + 1}} {{$index.length}}</td>
                        <td>{{client.firstname}}</td>
                        <td>{{client.lastname}}</td>
                        <td>{{client.email}}</td>
                        <td>{{client.mobile}}</td>
                        <td>{{client.registrationDate | date: 'medium'}}</td>
                        <td ng-if="results === 0">NO RESULTS FOUND</td>
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

        <div>
        </div>
        <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
                <i class="fa fa-download"></i>
            </a>

        </div>




    </div>
    <div id="clientInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 30px; height:auto;">
            <h5>{{clientInfo.firstname}} {{clientInfo.lastname}}</h5>
            <p>
                Account: {{clientInfo.account}}<br/>
                Address: {{clientInfo.address}}<br/>
                ID-Number: {{clientInfo.documentId.idNumber}} <br/>
                Mobile: {{clientInfo.mobile}}<br/>
                Email: {{clientInfo.email}}<br/>
                Agent: {{clientInfo.agentId.firstname}} {{clientInfo.agentId.lastname}}<br/>
                State: {{clientInfo.state}}
            </p>

            <button class=" modal-action modal-close waves-effect btn-flat red white-text"
                    ng-click="updateClient()">UPDATE
            </button>

        </div>
        <div class="modal-footer">

        </div>
    </div>


    <div class="clientUpdateInfo" ng-show="clientUpdateInfo">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToUpdateList()">
            <i class="fa fa-arrow-left"></i> Back To Update List

        </div>

        <div class="card">
            <div class="card-content with-padding">
                <p style="font-size: 18px"><strong>UPDATE: {{clientInfo.firstname | uppercase}} {{clientInfo.lastname |
                        uppercase}}</strong>
                </p></div>

            <div class="card-content with padding grey lighten-4">
                <div class="row">
                    <form class="col s12" ng-submit="submitUpdatedClient()">

                        <div class="row">
                            <div class="col s6">
                                <label for="first_name"><b>FIRST NAME</b></label>
                                <div class="input-field">
                                    <input id="first_name" ng-model="updatedClient.name"
                                           ng-model-options="{ getterSetter: true }" type="text"
                                           class="validate" required>
                                </div>
                            </div>
                            <div class="col s6">
                                <label for="last_name"><b>LAST NAME</b></label>
                                <div class="input-field">
                                    <input id="last_name" type="text" ng-model="updatedClient.lastname"
                                           ng-model-options="{ getterSetter: true }"
                                           class="validate" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="address"><b>ADDRESS</b></label>

                                <input id="address" ng-model="updatedClient.address"
                                       ng-model-options="{ getterSetter: true }" type="text" class="validate" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="dob" type="date" class="datepicker">
                                <label for="dob"><b>DATE OF BIRTH</b></label>
                            </div>
                            <div class="input-field col s6">
                                <input id="gender" type="text" class="autocomplete">
                                <label for="gender"><b>GENDER</b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" ng-model="updatedClient.email"
                                       ng-model-options="{ getterSetter: true }">
                                <label for="email"><b>EMAIL ADDRESS</b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12"><label for="profile_name" class="active"><b>CLASS OF SERVICE</b></label>
                                <select class="browser-default" id="profile_name" required>
                                    <option value="" disabled selected>Choose Class of Service</option>
                                    <option ng-repeat="coc in clientClassOfServices" value="{{coc.id}}">{{coc.name}}
                                    </option>
                                </select></div>
                        </div>

                        <button ng-show="updateButton" type="submit"
                                class=" ui  waves-effect waves-light ui fluid primary button">
                            UPDATE
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>