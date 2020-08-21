<div ng-controller="viewAgentSupervisorController" ng-cloak>
    <div class="card" class="bankInfoTable" ng-show="supervisorInfoTable">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-male blue-text"></i> SUPERVISORS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshSupervisors()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="supervisorSearch = !supervisorSearch"><i
                        class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Supervisors...</span>
        </div>

        <div class="card-content">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="supervisor_name">Name</th>
                    <th data-field="supervisor_surname">Surname</th>
                    <th data-field="supervisor_email">Email</th>
                    <th data-field="supervisor_contact">Contact</th>


                </tr>
                </thead>
                <thead ng-show="supervisorSearch">
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
                        <input type="text" placeholder="Search Contact" ng-model="searchResult.cellphone">
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="supervisor in results =  (supervisors  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                    ng-dblclick="open(supervisor)" ng-class="{
                    'red-text':bank.state === 'DEACTIVATED',
                    'strike':bank.state === 'DEACTIVATED'
                    }">
                    <td>{{$index + 1}}</td>
                    <td>{{supervisor.firstname |uppercase}}</td>
                    <td>{{supervisor.lastname |uppercase}}</td>
                    <td>{{supervisor.email}}</td>
                    <td>{{supervisor.cellphone}}</td>
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

    <div id="supervisorInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h4>{{supervisorInfo.firstname}} {{supervisorInfo.lastname}}</h4>
            <p>
                E-mail Address: {{supervisorInfo.email}}<br/>
                Address: {{supervisorInfo.address}}<br>
                Cellphone: {{supervisorInfo.cellphone}}<br>
                Balance: {{supervisorInfo.balance | currency}}<br>
                Commission: {{supervisorInfo.commission | currency}}<br>

            </p>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat blue white-text"
                    ng-click="viewSupervisorFile()"><i class="fa fa-file-text-o"></i> VIEW FULL FILE
            </button>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat green white-text"
                    ng-click="editSupervisor()"><i class="fa fa-edit"></i> EDIT
            </button>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat red white-text"
                    ng-click="deleteSupervisor()"><i class="fa fa-trash"></i> DELETE SUPERVISOR
            </button>
        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div class="bankFile" ng-show="supervisorFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToListFromFile()">
            <i class="fa fa-arrow-left"></i> Back To Supervisor List
        </div>
        <br/>

        <h2><i class="blue-text fa fa-male"></i> {{supervisorInfo.firstname}} {{supervisorInfo.lastname}} </h2>

        <div class="card">
            <div class="card-content with-padding" style="font-size: x-large">
                <strong> <i class="blue-text fa fa-file-text-o"></i> GENERAL INFORMATION
                </strong>

            </div>
            <div class="card-content with-padding">

            </div>
        </div>
        <div class="card">
            <div class="card-content with-padding" style="font-size: x-large">
                <strong> <i class="blue-text fa fa-bar-chart"></i> ACTIVITY
                </strong>

            </div>
            <div class="card-content with-padding">

            </div>
        </div>

    </div>

    <div class="editSupervisorFile" ng-show="editSupervisorFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToSupervisorList()">
            <i class="fa fa-arrow-left"></i> Back To Supervisor List
        </div>
        <br/>

        <h3><i class="blue-text fa fa-male"></i> {{supervisorInfo.firstname | uppercase}} {{supervisorInfo.lastname |
            uppercase}}</h3>

        <div class="card">
            <div class="card-content with-padding" style="font-size: x-large">
                <i class="blue-text fa fa-edit"></i> EDIT SUPERVISOR INFORMATION
            </div>

            <div class="card-content with-padding">
                <form name="submitAgentSupervisor" ng-submit="submitUpdatedSupervisor()">

                    <div class="row">
                        <div class="col s6">
                            <label for="first_name"><b>FIRST NAME</b></label>
                            <div class="input-field">
                                <input id="firstName" name="firstName" ng-model="supervisorInfo.firstname"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                       class="validate" required>
                                <div ng-messages="submitAgentSupervisor.firstName.$error"
                                     ng-if="submitAgentSupervisor.firstName.$dirty || submitAgentSupervisor.firstName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The First Name Is
                                            Required!</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="col s6">
                            <label for="last_name"><b>LAST NAME</b></label>
                            <div class="input-field">
                                <input id="lastName" name="lastName" ng-model="supervisorInfo.lastname"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                       class="validate" required>
                                <div ng-messages="submitAgentSupervisor.lastName.$error"
                                     ng-if="submitAgentSupervisor.lastName.$dirty || submitAgentSupervisor.lastName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The Last Name Is
                                            Required!</strong></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field">
                                <label for="address">ADDRESS</label>
                                <input id="address" name="address" placeholder="" ng-model="supervisorInfo.address"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text" required>
                                <div ng-messages="submitAgentSupervisor.address.$error"
                                     ng-if="submitAgentSupervisor.address.$dirty || submitAgentSupervisor.address.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The Address Is
                                            Required!</strong></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <label for="email">EMAIL ADDRESS</label>
                            <input name="email" id="email" ng-model="supervisorInfo.email"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="email" required>
                            <div ng-messages="submitAgentSupervisor.email.$error"
                                 ng-if="submitAgentSupervisor.email.$dirty || submitAgentSupervisor.email.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The e-mail address Is
                                        Required!</strong></div>
                                <div ng-message="email" style="font-size: x-small" class="red-text"><strong>Please Enter A Valid E-mail Address</strong></div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <label for="cellphone">CELLPHONE</label>
                            <input id="cellphone" name="cellphone" pattern="(\+263|263|0|00263)?7((1[2-6]\d{6}$)|(7[1-9]|8[1|2])\d{6}$|(3[3-9]\d{6}$))" ng-model="supervisorInfo.cellphone"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text" required>
                            <div ng-messages="submitAgentSupervisor.cellphone.$error"
                                 ng-if="submitAgentSupervisor.cellphone.$dirty || submitAgentSupervisor.cellphone.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The Supervisor Cellphone Number Is
                                        Required!</strong></div>
                                <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please Enter A Valid Cellphone Number</strong></div>
                            </div>

                        </div>
                        <div class="col s6">
                            <label for="landline">LANDLINE</label>
                            <input id="landline" name="landline" ng-model="supervisorInfo.landline"
                                   ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <label for="balance"><b>BALANCE</b></label>
                            <div class="input-field">
                                <input id="balance" name="balance" type="text" pattern="^\d{1,}((\.\d{1,2})?$)"
                                       ng-model="supervisorInfo.balance"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                                <div ng-messages="submitAgentSupervisor.balance.$error"
                                     ng-if="submitAgentSupervisor.balance.$dirty || submitAgentSupervisor.balance.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Supervisor Balance Is
                                            Required!</strong></div>
                                    <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please
                                            Enter A Valid Balance</strong></div>
                                </div>

                            </div>
                        </div>
                        <div class="col s6">
                            <label for="commission"><b>COMMISSION</b></label>
                            <div class="input-field">
                                <input id="commission" name="commission" type="text" pattern="^\d{1,}((\.\d{1,2})?$)"
                                       ng-model="supervisorInfo.commission"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                                <div ng-messages="submitAgentSupervisor.commission.$error"
                                     ng-if="submitAgentSupervisor.commission.$dirty || submitAgentSupervisor.commission.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The Supervisor Commission Is
                                            Required!</strong></div>
                                    <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please Enter A Valid Commission</strong></div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <button type="submit" ng-show="update_supervisor_submit"
                            class=" ui waves-effect waves-light ui fluid primary button">
                        UPDATE SUPERVISOR INFORMATION
                    </button>
                    <div class="progress" ng-show="update_supervisor_progress">
                        <div class="indeterminate"></div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>


