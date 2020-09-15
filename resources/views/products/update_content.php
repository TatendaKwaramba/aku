<div class="card" class="clientInfoTable" ng-controller="updateProductController" ng-cloak>
    <div class="card-content with-padding">
        <strong><i class="fa fa-users"></i> PRODUCTS [ {{ results.length }} ]</strong>
        <span><a href="" ng-click="refreshClients()"><i class="fa fa-refresh"></i></a></span>
        <span><a href="" ng-click="clientSearch = !clientSearch"><i class="fa fa-search right"></i></a></span>
        <span class="right" ng-show="loading"><strong class="black-text "><i class="fa fa-refresh fa-spin"></i></strong> Fetching Products...</span>
    </div>

    <div class="card-content ">
        <table class="highlight bordered striped">
            <thead>
            <tr>
                <th data-field="product_id">ID</th>
                <th data-field="product_name">Biller Name</th>
                <th data-field="product_account">Account</th>
                <th data-field="product_category">Category</th>
                <th data-field="product_state">State</th>
                <th data-field="product_billidFormat">BillID Format</th>
                <th data-field="product_billidLabel">Label</th>
                <th data-field="product_billidMask">Mask</th>
            </tr>
            </thead>
            <thead ng-show="clientSearch">
            <tr>
                <th><i class="fa fa-search"></i></th>
                <th class="search-box">
                    <input type="text" placeholder="ID" ng-model="searchResult.id">
                </th>
                <th class="search-box">
                    <input type="text" placeholder="Biller" ng-model="searchResult.billerName">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Company" ng-model="searchResult.company">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Email" ng-model="searchResult.email">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Mobile" ng-model="searchResult.mobile">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Landline" ng-model="searchResult.landline">
                </th>

                <th class="search-box">
                    <input type="date" class="datepicker" placeholder="Search By Date"
                           ng-model="searchResult.registrationDate">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="State" ng-model="searchResult.state">
                </th>

                <th class="search-box">
                    <input type="text" placeholder="Status" ng-model="searchResult.status">
                </th>

            </tr>
            </thead>
            <tbody>
            <tr dir-paginate="product in results =  (products  | filter:searchResult)| orderBy: 'id' | itemsPerPage:20 "
                ng-dblclick="open(client)">
                <td>{{product.id}}</td>
                <td>{{product.name}}</td>
                <td>{{product.account}}</td>
                <td>{{product.category}}</td>
                <td>{{product.state}}</td>
                <td>{{product.billidFormat}}</td>
                <td>{{product.billidLabel}}</td>
                <td>{{product.billidMask}}</td>

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

    <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
        <a class="btn-floating btn-large red animated pulse infinite">
            <i class="fa fa-download"></i>
        </a>
    </div>
</div>

<div id="clientInfo" class="modal bottom-sheet">
    <div class="modal-content">
        <img src="public/img/gc/ico.png" alt="" style="width: 50px; height:auto;">
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
        <i class="fa fa-arrow-left"></i> Back To Products List
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

