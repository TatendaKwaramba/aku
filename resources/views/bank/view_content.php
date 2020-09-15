<div style="margin:10px;"  ng-controller="getBanksController" ng-cloak>
    <div class="card" class="bankInfoTable" ng-show="bankInfoTable">
        <div class="card-content with-padding " style="font-size: x-large">
            <strong><i class="fa fa-bank green-text"></i> BANKS [ {{ results.length }} ]</strong>
            <span><a href="" ng-click="refreshBanks()"><i class="fa fa-refresh"></i></a></span>
            <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right"></i></a></span>
            <span class="right" ng-show="loading"><strong class="black-text "><i
                        class="fa fa-refresh fa-spin"></i></strong> Fetching Banks...</span>
        </div>

        <div class="card-content">
            <table class="highlight bordered striped">
                <thead>
                <tr>
                    <th></th>
                    <th data-field="bank_name">Name</th>
                    <th data-field="bank_deposit">Deposit</th>
                    <th data-field="bank_state">State</th>



                </tr>
                </thead>
                <thead ng-show="bankSearch">
                <tr>
                    <th><i class="fa fa-search"></i></th>
                    <th class="search-box">
                        <input type="text" placeholder="Search ID" ng-model="searchResult.billerID">
                    </th>
                    <th class="search-box">
                        <input type="text" placeholder="Biller" ng-model="searchResult.billerName">
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr dir-paginate="bank in results =  (banks  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                    ng-dblclick="open(bank)" ng-class="{
                    'red-text':bank.state === 'DEACTIVATED',
                    'strike':bank.state === 'DEACTIVATED'
                    }">
                    <td>{{$index + 1}}</td>
                    <td>{{bank.name}}</td>
                    <td>{{bank.deposit | currency}}</td>
                    <td>{{bank.state}}</td>
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

    <div id="bankInfo" class="modal">
        <div class="modal-content">
            <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
            <h4>{{bankInfo.name}} </h4>
            <p>
                Account: {{bankInfo.account}}<br/>
                Deposit: {{bankInfo.deposit | currency}}<br/>
                State: {{bankInfo.state}}<br>
                Class Of Service: {{bankInfo.bankClassOfServiceId.name}}
            </p>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat blue white-text"
                    ng-click="viewBankFile()"><i class="fa fa-file-text-o"></i> VIEW FULL FILE
            </button>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat green white-text"
                    ng-click="editBank()"><i class="fa fa-edit"></i> EDIT
            </button>
            <button class=" modal-action modal-close waves-effect waves-green btn-flat red white-text"
                    ng-click="deleteBank()"><i class="fa fa-trash"></i> DELETE BANK
            </button>
        </div>
        <div class="modal-footer">

        </div>
    </div>

    <div class="bankFile" ng-show="bankFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToBankList()">
            <i class="fa fa-arrow-left"></i> Back To Bank List
        </div>
        <br/>

        <h2><i class="green-text fa fa-bank"></i> {{bankInfo.name | uppercase}} </h2>

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

    <div class="editBankFile" ng-show="editBankFile">
        <br/>
        <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToBankList()">
            <i class="fa fa-arrow-left"></i> Back To Bank List
        </div>
        <br/>

        <h2><i class="green-text fa fa-bank"></i> {{bankInfo.name | uppercase}} </h2>

        <div class="card">
            <div class="card-content with-padding" style="font-size: x-large">
                <i class="blue-text fa fa-edit"></i> EDIT BANK INFORMATION
            </div>

            <div class="card-content with-padding">
                <form ng-submit="submitUpdatedBank()">

                    <div class="row">
                        <div class="col s6">
                            <label for="first_name"><b>BANK NAME</b></label>
                            <div class="input-field">
                                <input id="bankName" ng-model="updatedBank.name"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }" type="text"
                                       class="validate" required>
                            </div>
                        </div>
                        <div class="col s6">
                            <label for="bankDeposit"><b>DEPOSIT</b></label>
                            <div class="input-field">
                                <input id="bankDeposit" type="text" pattern="^\d{1,}((\.\d{1,2})?$)" ng-model="updatedBank.deposit"
                                       ng-model-options="{ getterSetter: true,allowInvalid: true }"
                                       class="validate" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s6">
                            <label for="class_of_service"><b>CLASS OF SERVICE</b></label>
                            <select class="browser-default" id="class_of_service" ng-model="bankInfo.bankClassOfServiceId.name" required>
                                <option value="" disabled selected>Choose Class of Service</option>
                                <option ng-repeat="bankcoc in bankClassOfServices" value="{{bankcoc.id}}">{{bankcoc.name}}
                                </option>
                            </select>
                        </div>
                        <div class="col s6">
                            <label for="state"><b>STATE</b></label>
                            <select class="browser-default" id="state" ng-model="bankInfo.state" required>
                                <option value="" disabled selected>Choose State</option>
                                <option value="PENDING">PENDING</option>
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="DEACTIVATED">DEACTIVATED</option>

                            </select>
                        </div>
                    </div>

                    <button type="submit" ng-show="update_bank_submit" class=" ui waves-effect waves-light ui fluid primary button">
                        UPDATE BANK INFORMATION
                    </button>
                    <div class="progress" ng-show="update_bank_progress">
                        <div class="indeterminate"></div>
                    </div>
                </form>

            </div>
        </div>
    </div>


</div>


