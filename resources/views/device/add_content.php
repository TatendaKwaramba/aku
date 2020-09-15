<div style="margin:10px;" ng-controller="addDeviceController" ng-cloak="">
    <div class="card" class="addSingleDeviceForm">
        <div class="card-content teal with-padding white-text" style="font-size: large">
            <strong><i class="fa fa-tablet"></i> ADD SINGLE DEVICE</strong>
        </div>

        <div class="card-content  with-padding">
            <div class="row">
                <form name="addDeviceForm" id="addDeviceForm" class="col s12" ng-submit="postDevice()">
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="imei" ng-model="imei" id="imei" type="text" class="validate" required>
                            <label for="imei">Identifier (IMEI)</label>
                            <div ng-messages="addDeviceForm.imei.$error"
                                 ng-if="addDeviceForm.imei.$dirty || addDeviceForm.imei.$touched ">
                                <div ng-message="required" style="font-size: x-small" class="red-text"><strong>IMEI is
                                        required</strong></div>
                                <div ng-message="pattern" style="font-size: x-small" class="red-text"><strong>Invalid
                                        IMEI. Please check!</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="alias" type="text" ng-model="alias" class="validate">
                            <label for="alias">Alias</label>
                        </div>
                    </div>

                    <div class="row">
                        <label for="platform">PLATFORM</label>

                        <select name="platform" id="platform" class="select2-select" ng-model="platform" required>
                            <option value="mp2">MP2</option>
                            <option value="mp3">MP3</option>
                            <option value="android">ANDROID</option>
                            <option value="apple">APPLE</option>
                        </select>
                    </div>

                    <div class="input-field col s12">
                        <div class="col s12" ng-show="device_submit">
                            <button type="submit"
                                    class="btn blue col s12">
                                <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                            </button>
                        </div>
                        <div class="progress" ng-show="device_loader">
                            <div class="indeterminate"></div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card" class="addMultipleDevicesForm">
        <div class="card-content teal white-text with-padding" style="font-size: large;">
            <strong><i class="fa fa-tablet"></i> ADD MULTIPLE DEVICES</strong>

        </div>
        <div class="card-content  with-padding">
            <div class="row"><form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>CHOOSE CSV FILE</span>
                        <input type="file" pattern="/^(.*\.(?!(htm|html|class|js)$))?[^.]*$/i">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>


                </div>

               <div class="input-field col s12"> <button type="submit"
                        class="btn blue col s12">
                    <strong>SUBMIT <i class="fa fa-floppy-o"></i></strong>
                </button></div>

            </form></div>
        </div>
    </div>
</div>