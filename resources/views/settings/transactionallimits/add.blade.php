@extends('layouts.app')
@section('content')
    @verbatim
    <div style="margin:10px;" ng-controller="addFeesandCommissionsController">
        <form name="addTransactionalLimitForm" id="addTransactionalLimitForm" class="col s12">
            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-balance-scale "></i> ADD TRANSACTION LIMITS </strong>
                </div>

                <div class="card-content with-padding">


                    <div class="row">
                        <div class="col s12">
                            <label for="transactionTypeId">Transaction Type</label>

                            <select id="transactionTypeId" name="transactionTypeId" class="select2-select"
                            >
                                <option ng-repeat="type in trans_types" value="{{type.id}}">{{type.description }}</option>
                            </select>
                        </div>
                    </div>


                </div>

            </div>
            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-check "></i>LIMITS</strong>
                </div>

                <div class="card-content with-padding">
                    <div class="row">

                        <div class="row">
                            <div class="col s12">
                                <label for="clientClassOfServiceId">Client Class Of Service</label>

                                <select id="clientClassOfServiceId" name="clientClassOfServiceId" class="select2-select"  >4
                                    <option value="" selected></option>
                                    <option ng-repeat="client in clientClassOfServices" value="{{client.id}}">{{client.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="agentClassOfServiceId">Business Class Of Service</label>
                                <select id="agentClassOfServiceId" name="agentClassOfServiceId" class="select2-select"
                                >
                                    <option value="" selected></option>

                                    <option ng-repeat="agent in agentClassOfServices" value="{{agent.id}}">{{agent.name}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="bankClassOfServiceId">Bank Class Of Service</label>
                                <select id="bankClassOfServiceId" name="bankClassOfServiceId" class="select2-select"
                                >
                                    <option ng-repeat="bank in bankClassOfServices" value="{{bank.id}}">{{bank.name}}</option>
                                </select>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-briefcase "></i> TRANSACTION TYPE</strong>
                </div>


            </div>
            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-briefcase "></i> PROFILES</strong>
                </div>

                <div class="card-content with-padding">


                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>CSV FILE</span>
                                <input type="file" name="csv" id="csv">
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" pattern="(.*?\.csv)" class="file-path validate" required>
                            </div>
                        </div>
                        <button type="submit" class="btn col s12" ng-disabled="addFeesAndCommissionsForm.$invalid">ADD FEES AND COMMISSIONS</button>

                    </div>


                </div>

            </div>

        </form>
    </div>

    @endverbatim
@stop