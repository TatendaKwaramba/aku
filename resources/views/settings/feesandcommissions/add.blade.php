@extends('layouts.app')

@section('content')
    {{--@include('settings.feesandcommissions.add_content')--}}
    <div style="margin:10px;" ng-controller="addFeesandCommissionsController">
        <form enctype="multipart/form-data" name="addFeesAndCommissionsForm" id="addFeesAndCommissionsForm"
              class="col s12"
              action="/fees-and-commissions/add" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-balance-scale "></i> ADD FEES AND COMMISSIONS </strong>
                </div>

                <div class="card-content with-padding">
                    <div class="row">

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="name" ng-model="name" id="name" type="text" class="validate"
                                       required>
                                <label for="name">Fees and Commissions Name</label>

                                <div ng-messages="addFeesAndCommissionsForm.fncName.$error"
                                     ng-if="addFeesAndCommissionsForm.fncName.$dirty || addFeesAndCommissionsForm.fncName.$touched ">
                                    <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                            Fees
                                            and Commissions Name
                                            Is
                                            Required!</strong></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input name="description" ng-model="description" id="description" type="text">
                                <label for="description">Description</label>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-check "></i> CLASS OF SERVICE</strong>
                </div>

                <div class="card-content with-padding">
                    <div class="row">

                        <div class="row">
                            <div class="col s12">
                                <label for="clientClassOfServiceId">Client Class Of Service</label>

                                <select id="clientClassOfServiceId" name="clientClassOfServiceId" class="select2-select"
                                        ng-model="clientClassOfService">
                                    <option value="NULL" selected></option>
                                    <option ng-repeat="client in clientClassOfServices"
                                            value="@{{client.id}}">@{{client.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="agentClassOfServiceId">Business Class Of Service</label>
                                <select id="agentClassOfServiceId" name="agentClassOfServiceId" class="select2-select"
                                        ng-model="agentClassOfService">
                                    <option value="NULL" selected></option>

                                    <option ng-repeat="agent in agentClassOfServices"
                                            value="@{{agent.id}}">@{{agent.name}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label for="bankClassOfServiceId">Bank Class Of Service</label>
                                <select id="bankClassOfServiceId" name="bankClassOfServiceId" class="select2-select"
                                        ng-model="bankClassOfService">
                                    <option value="NULL" selected></option>

                                    <option ng-repeat="bank in bankClassOfServices"
                                            value="@{{bank.id}}">@{{bank.name}}</option>
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

                <div class="card-content with-padding">


                    <div class="row">
                        <div class="col s12">
                            <label for="transactionTypeId">Transaction Type</label>

                            <select id="transactionTypeId" name="transactionTypeId" class="select2-select"
                                    ng-model="transactionTypeId"
                            >
                                <option value="NULL" selected></option>

                                <option ng-repeat="type in trans_types"
                                        value="@{{type.id}}">@{{type.description }}</option>
                            </select>
                        </div>
                    </div>


                </div>

            </div>

            <div class="card" ng-cloak>
                <div class="card-content teal with-padding white-text" style="font-size: large">
                    <strong><i class="fa fa-briefcase "></i> PRODUCT</strong>
                </div>

                <div class="card-content with-padding">


                    <div class="row">
                        <div class="col s12">
                            <label for="productId">Product</label>

                            <select id="productId" name="productId" class="select2-select" ng-model="productId">

                                <option value="NULL" selected></option>

                                <option ng-repeat="product in products"
                                        value="@{{product.id}}">@{{product.name }}</option>
                            </select>
                        </div>
                    </div>


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
                                <input type="file" name="csv" id="csv" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" name="csv" pattern="(.*?\.csv)" class="file-path validate" required>
                            </div>
                        </div>
                        <button type="submit" class="btn col s12" ng-disabled="addFeesAndCommissionsForm.$invalid">ADD
                            FEES AND COMMISSIONS
                        </button>

                    </div>


                </div>

            </div>

        </form>
    </div>
@endsection
@section('scripts')
    @if (session('info->invalid_format'))
        <script>
            alert('Invalid CSV FORMAT!');
        </script>
    @endif

    @if (session('response'))
        <div id="modal1" class="modal">
            <div class="modal-content">
                {{session('response')}}
            </div>
        </div>
        <script>
            $(function () {
                $('#modal1').openModal()
            })
        </script>
    @endif
@endsection
