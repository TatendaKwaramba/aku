<div style="margin: 10px;" ng-controller="addAgentSupervisorController" ng-cloak="">
    <div class="card" class="addAgentSupervisorForm">
        <div class="card-content teal with-padding white-text" style="font-size: large">
            <strong><i class="fa fa-male"></i> ADD AGENT SUPERVISOR</strong>
        </div>

        <div class="card-content  with-padding">
            <div class="row">
                <form name="addAgentSupervisorForm" id="addAgentSupervisorForm" class="col s12"
                      ng-submit="postAgentSupervisor()">
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="supervisor_firstname" ng-model="supervisor_firstname" id="supervisor_firstname"
                                   type="text" class="validate" required>
                            <label for="supervisor_firstname">FIRST NAME</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_firstname.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_firstname.$dirty || addAgentSupervisorForm.supervisor_firstname.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Agent
                                        Supervisor First Name is required</strong></div>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <input name="supervisor_lastname" ng-model="supervisor_lastname" id="supervisor_lastname"
                                   type="text" class="validate" required>
                            <label for="supervisor_lastname">LAST NAME</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_lastname.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_lastname.$dirty || addAgentSupervisorForm.supervisor_lastname.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Agent
                                        Supervisor Last Name is required</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="supervisor_address" name="supervisor_address" type="text"
                                   ng-model="supervisor_address" class="validate">
                            <label for="supervisor_address">ADDRESS</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="supervisor_cellphone"

                                   name="supervisor_cellphone" type="text"
                                   ng-model="supervisor_cellphone" class="validate" required>
                            <label for="supervisor_cellphone">CELLPHONE</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_cellphone.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_cellphone.$dirty || addAgentSupervisorForm.supervisor_cellphone.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                        Supervisor Cellphone Number Is
                                        Required!</strong></div>
                                <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please
                                        Enter A Valid Cellphone Number</strong></div>
                            </div>

                        </div>
                        <div class="input-field col s6">
                            <input id="supervisor_landline" name="supervisor_landline" type="text"
                                   ng-model="supervisor_landline" class="validate">
                            <label for="supervisor_landline">LANDLINE</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="supervisor_email" name="supervisor_email" type="email"
                                   ng-model="supervisor_email" class="validate" required>
                            <label for="supervisor_email">EMAIL ADDRESS</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_email.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_email.$dirty || addAgentSupervisorForm.supervisor_email.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>Agent
                                        Supervisor e-mail is required</strong></div>
                                <div ng-message="email" style="font-size: x-small" class="red-text"><strong>
                                        Please Enter A valid e-mail address </strong></div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="supervisor_balance" pattern="^\d{1,}((\.\d{1,2})?$)"
                                   id="supervisor_balance" ng-model="supervisor_balance" required>
                            <label for="supervisor_balance">BALANCE</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_balance.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_balance.$dirty || addAgentSupervisorForm.supervisor_balance.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                        Supervisor Balance Is
                                        Required!</strong></div>
                                <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please
                                        Enter A Valid Balance</strong></div>
                            </div>

                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="supervisor_commission" pattern="^\d{1,}((\.\d{1,2})?$)"
                                   id="supervisor_commission" ng-model="supervisor_commission" required>
                            <label for="supervisor_commission">COMMISSION</label>
                            <div ng-messages="addAgentSupervisorForm.supervisor_commission.$error"
                                 ng-if="addAgentSupervisorForm.supervisor_commission.$dirty || addAgentSupervisorForm.supervisor_commission.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                        Supervisor Balance Is
                                        Required!</strong></div>
                                <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please
                                        Enter A Valid Balance</strong></div>
                            </div>

                        </div>
                    </div>
                    <div class="col s12">
                        <button type="submit" ng-show="submit_button"
                                class=" col s12 btn waves-effect waves-light blue">
                            <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                        </button>
                        <div class="progress" ng-show="loader">
                            <div class="indeterminate"></div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>