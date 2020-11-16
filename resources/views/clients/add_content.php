<div class="card" class="addSingleClientForm" ng-controller="addClientController" ng-cloak>
    <div class="card-content with-padding blue-text" style="font-size: large">
        <h5><strong><i class="fa fa-user-plus "></i> ADD SUBSCRIBER</strong></h5>
    </div>
    <script>
        function removeSpaces(string) {
            return string.split(' ').join('');
        }
    </script>

    <div class="card-content lighten-3 with-padding">
        <div class="row">
            <form class="col s12" ng-submit="submitClient()" name="addClientForm" id="addClientForm">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="first_name" type="text" class="validate" ng-model="first_name"
                               required>
                        <label for="first_name">First Name</label>
                        <div ng-messages="addClientForm.first_name.$error"
                             ng-if="addClientForm.first_name.$dirty || addClientForm.first_name.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                    First Name is Required</strong></div>
                        </div>
                    </div>
                    <div class="input-field col s6">
                        <input name="last_name" id="last_name" type="text" class="validate" ng-model="last_name"
                               required>
                        <label for="last_name">Last Name</label>
                        <div ng-messages="addClientForm.last_name.$error"
                             ng-if="addClientForm.last_name.$dirty || addClientForm.last_name.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                    Last Name is Required</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="id" name="id" type="text" class="validate" ng-model="id" pattern="^\d{8,9}\S\d{2}$" required>
                        <label for="id">I.D Number</label>
                        <div ng-messages="addClientForm.id.$error"
                             ng-if="addClientForm.id.$dirty || addClientForm.id.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                    I.D Number is Required</strong></div>
                        </div>
                        <div ng-messages="addClientForm.id.$error"
                             ng-if="addClientForm.id.$dirty || addClientForm.id.$touched ">
                            <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please Enter a Valid I.D Number</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="address" name="address" ng-model="address" type="text" class="validate" required>
                        <label for="address">Address</label>
                        <div ng-messages="addClientForm.address.$error"
                             ng-if="addClientForm.address.$dirty || addClientForm.address.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                    Address Number is Required</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" ng-model="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="mobile" name="mobile" ng-model="mobile" type="text" class="validate"
                               pattern="^(263|234|0)7([1-9])(\d{7})$" onblur="this.value=removeSpaces(this.value)" required>
                        <label for="mobile">Mobile</label>
                        <div ng-messages="addClientForm.mobile.$error"
                             ng-if="addClientForm.mobile.$dirty || addClientForm.mobile.$touched ">
                            <div ng-message="required" style="font-size: x-small" class="red-text"><strong>The
                                    Mobile is Required</strong></div>
                            <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Please Enter a
                                    Valid Cellphone Number</strong></div>
                        </div>
                    </div>
                </div>
                <div class="row" ng-show="!submit_progress">
                    <button type="submit"
                            class=" btn col s12  waves-effect waves-light blue">
                        <strong>SUBMIT DETAILS</strong>
                    </button>
                </div>
                <div class="progress" ng-show="submit_progress">
                    <div class="indeterminate"></div>
                </div>
                <div></div>
            </form>
        </div>
    </div>

</div>