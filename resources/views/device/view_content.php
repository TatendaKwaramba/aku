<div style="margin:10px;" ng-controller="viewDevicesController" ng-cloak>
<div class="card"  class="clientInfoTable" >
    <div class="card-content with-padding " style="font-size: x-large">
        <strong><i class="fa fa-tablet cyan-text"></i> DEVICES [ {{ results.length }} ]</strong>
        <span><a href="" ng-click="refreshDevices()"><i class="fa fa-refresh"></i></a></span>
        <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right"></i></a></span>
        <span class="right" ng-show="loading"><strong><i class="fa fa-refresh fa-spin "></i></strong> Fetching Devices...</span>
    </div>

    <div class="card-content">
        <table class="highlight bordered striped">
            <thead>
            <tr>
                <th></th>
                <th data-field="identifier">IDENTIFIER</th>
                <th data-field="alias">ALIAS</th>
                <th data-field="status">STATUS</th>
                <th data-field="version">VERSION</th>
                <th data-field="last_use">PLATFORM</th>
            </tr>
            </thead>
            <thead ng-show="clientSearch">
            <tr>
                <th><i class="fa fa-search"></i></th>
                <th class="search-box">
                    <input type="text" placeholder="Search Identifier" ng-model="searchResult.imei">
                </th>
                <th class="search-box">
                    <input type="text" placeholder="Alias" ng-model="searchResult.name">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Status" ng-model="searchResult.status">
                </th>
                <th class="search-box">
                    <input type="text" placeholder="Version" ng-model="searchResult.version">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Last Use"
                           ng-model="searchResult.platform" disabled>
                </th>



            </tr>
            </thead>
            <tbody>
            <tr dir-paginate="device in results =  (devices | filter:searchResult)| orderBy: 'status' | itemsPerPage:20 "
                ng-dblclick="open(device)  ">
                <td>{{$index + 1}} {{$index.length}}</td>
                <td>{{device.imei}}</td>
                <td>{{device.name}}</td>
                <td>{{device.status}}</td>
                <td>{{device.version}}</td>
                <td>{{device.platform.toUpperCase()}}</td>
                <td ng-if="results === 0">NO RESULTS FOUND</td>
            </tr>
        </table>
        <center>
            <dir-pagination-controls
                    max-size="15"
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

<div id="clientInfo" class="modal bottom-sheet">
    <div class="modal-content">
        <img src="/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
        <h4>{{clientInfo.firstname}} {{clientInfo.lastname}}</h4>
        <p>
            ID: {{clientInfo.account}}<br/>
            Address: {{clientInfo.address}}<br/>
            Mobile: {{clientInfo.mobile}}<br/>
            ID-Number: {{clientInfo.documentId.idNumber}} <br/>
            Email: {{clientInfo.email}}<br/>
            Agent: {{clientInfo.agentId.firstname}} {{clientInfo.agentId.lastname}}<br/>
            State: {{clientInfo.state}}
        </p>
        <button class=" modal-action modal-close waves-effect waves-green btn-flat red white-text"
                ng-click="viewClientFile()">VIEW FULL FILE
        </button>
    </div>
    <div class="modal-footer">

    </div>
</div>

<script>
    $('select').material_select();
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });
</script>

<div class="clientFile" ng-show="clientFile">
    <br/>
    <div id="back" class="chip red white-text with-padding z-depth-1" ng-click="backToSubscriberList()">
        <i class="fa fa-arrow-left"></i> Back To Biller List
    </div>
    <br/>

    <h5><i class="fa fa-book"></i> {{clientInfo.firstname | uppercase}} {{clientInfo.lastname | uppercase}}</h5>

    <div class="card">
        <div class="card-content with-padding">
            <strong> <i class="fa fa-file-text-o"></i> GENERAL INFORMATION
            </strong>
        </div>
        <div class="card-content grey lighten-3 with-padding">
        </div>
    </div>
    <div class="card">
        <div class="card-content with-padding">
            <strong> <i class="fa fa-bar-chart"></i> ACTIVITY
            </strong>
        </div>
        <div class="card-content grey lighten-3 with-padding">
        </div>
    </div>

</div>

</div>