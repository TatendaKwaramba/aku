"use strict";
var adminApp = angular.module('adminApp', [
    'ngRoute',
    'angularUtils.directives.dirPagination',
    'ngMaterial',
    'ngMessages',
    'ngSanitize',
    'ngAria',
    'chart.js',
    'frapontillo.gage',
    'ngCsv'
]);


adminApp.factory('dataHandler', function ($http, $q, $rootScope) {

    var dataHandler = {};
    //Get all Clients
    dataHandler.getClient = function (params) {
        var defer = $q.defer();
        $http.post('/api/client/get', params)
            .success(function (data) {
                dataHandler.clients = data;
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });
        return defer.promise;
    };


    dataHandler.getUiElements = function () {
        var defer = $q.defer();
        $http.get('/admin/elements')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };


    //Get Clients to be Updated
    dataHandler.getClientsforUpdate = function () {
        var defer = $q.defer();
        $http.get('/api/clients/get/update')
            .success(function (data) {
                dataHandler.clients = data;
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Update Client
    dataHandler.updateClient = function (post) {
        var defer = $q.defer();

        $http.post('/api/clients/update', post)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.addClient = function (post) {
        var defer = $q.defer();

        $http.post('/api/clients/add', post)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.getClientTransactions = function (params) {
        var defer = $q.defer();

        $http.post('/api/client/transactions', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getClientNumber = function (params) {
        var defer = $q.defer();

        $http.get('/api/client/number')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.resetPin = function (params) {
        var defer = $q.defer();

        $http.post('/api/client/resetPin', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.settleClient = function (params) {
        var defer = $q.defer();

        $http.post('/api/client/settle', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.resolve(err)
            });

        return defer.promise;

    };


    //Get Fees and Commissions
    dataHandler.getfandc = function () {
        var defer = $q.defer();
        $http.get('/api/feesandcommission/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });


        return defer.promise;
    };


    //Add Business
    dataHandler.addBusiness = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/add/agent', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.addBusinessMerchant = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/add/merchant', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Get Business
    dataHandler.getBusiness = function () {
        var defer = $q.defer();

        $http.get('/api/business/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Get Business for Update
    dataHandler.getBusinessForUpdate = function () {
        var defer = $q.defer();

        $http.get('/api/business/get_for_update')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Delete Business
    dataHandler.updateBusiness = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/update', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.grantWebAccess = function (params) {
        var defer = $q.defer();

        $http.post('' +
            '', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.deactivateBusiness = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/deactivate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.closeBusiness = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/close', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getAgentDevices = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/devices', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getAgentEmployees = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/employees', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getAgentTransactions = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/transactions', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.assignDeviceToAgent = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/assign/device', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.assignEmployeeToAgent = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/assign/employee', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.activateEmployee = function (params) {
        var defer = $q.defer();

        $http.post('/api/employee/activate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.deactivateEmployee = function (params) {
        var defer = $q.defer();

        $http.post('/api/employee/deactivate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };


    //Add Agent Supervisor
    dataHandler.addAgentSupervisor = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/supervisor/add', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //Get Agent Supervisor
    dataHandler.getAgentSupervisor = function () {
        var defer = $q.defer();

        $http.get('/api/business/supervisor/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //Update Agent Supervisor
    dataHandler.updateAgentSupervisor = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/supervisor/update', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //Delete Agent Supervisor
    dataHandler.deleteAgentSupervisor = function (params) {
        var defer = $q.defer();

        $http.post('/api/business/supervisor/delete', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Get Transactions
    dataHandler.getTransactions = function (params) {

        var defer = $q.defer();

        $http.get('/api/reports/get_transactions', {params: params})
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //ADD DEVICE
    dataHandler.addDevice = function (params) {
        var defer = $q.defer();

        $http.post('/api/devices/add_device', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.deleteDevice = function (params) {
        var defer = $q.defer();

        $http.post('/api/devices/delete', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getAllUsers2 = function () {
        var defer = $q.defer();

        $http.get('/api/users_all')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;

    };


    //GET DEVICES
    dataHandler.getDevices = function () {
        var defer = $q.defer();
        $http.get('/api/devices/get_devices')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //GET PENDING DEVICES
    dataHandler.getPendingDevices = function () {
        var defer = $q.defer();
        $http.get('/api/devices/get_pending_devices')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Get Filtered Devices

    dataHandler.getFilteredDevices = function () {
        var defer = $q.defer();

        $http.get()
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };


    //Add devices

    dataHandler.addDevices = function (data) {
        var defer = $q.defer();
        $http({
            method          : 'POST',
            url             : '/api/device/add_csv',
            headers         : {
                'Content-Type': 'multipart/form-data'
            },
            data            : {

                upload: $scope.file
            },
            transformRequest: function (data, headersGetter) {
                var formData = new FormData();
                angular.forEach(data, function (value, key) {
                    formData.append(key, value);
                });

                var headers = headersGetter();
                delete headers['Content-Type'];

                return formData;
            }
        })
            .success(function (data) {

            })
            .error(function (data, status) {

            });

        return defer.promise;
    };

    //GET BILLERS
    dataHandler.getBillers = function () {
        var defer = $q.defer();
        $http.get('/api/billers/get_billers')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };


    //ADD BILLER
    dataHandler.addBiller = function (params) {
        var defer = $q.defer();

        $http.get('/api/billers/add_biller/' + params)
            .success(function (data) {
                defer.resolve(data);
                $scope.submit_button = true;
                $scope.progress_indicator = false;

            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //DELETE BILLER
    dataHandler.deleteBiller = function (params) {
        var defer = $q.defer();

        $http.post('/api/billers/delete', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.updateBiller = function (params) {
        var defer = $q.defer();

        $http.post('/api/billers/update', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Adds Transaction Limits
    dataHandler.addTransactionLimits = function (params) {
        var defer = $q.defer();

        $http.post('/api/settings/transactional-limits/add', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };
    dataHandler.getBillerTransactions = function (params) {
        var defer = $q.defer();

        $http.post('/api/billers/transactions', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.getProductTransactions = function (params) {
        var defer = $q.defer();

        $http.post('/api/product/transactions', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //GET BANKS
    dataHandler.getBanks = function () {
        var defer = $q.defer();

        $http.get('/api/bank/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //ADD BANK
    dataHandler.addBanks = function (params) {
        var defer = $q.defer();

        $http.post('/api/bank/add', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;

    };

    //UPDATE BANK
    dataHandler.updateBank = function (params) {
        var defer = $q.defer();

        $http.post('/api/bank/update', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //DELETE BANK
    dataHandler.deleteBank = function (params) {
        var defer = $q.defer();

        $http.post('/api/bank/delete', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err, status) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //ADD PRODUCT
    dataHandler.addProduct = function (params) {
        var defer = $q.defer();
        $http.post('/api/products/add_product', params)
            .success(function (data) {
                defer.resolve(data);

            })
            .error(function (err, status) {
                defer.reject(err);
                alert(err.toString() + status.toString());
                

            });

        return defer.promise;
    };


    //GET PRODUCTS
    dataHandler.getProducts = function () {
        var defer = $q.defer();
        $http.get('/api/products/get_products')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getTransactionTypes = function () {
        var defer = $q.defer();
        $http.get('/api/transaction_type/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getBalances = function () {
        var defer = $q.defer();
        $http.get('/api/accounting/summary-of-balances')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getTransactionVolumes = function (params) {
        var defer = $q.defer();
        $http.post('/api/accounting/bands', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getProductVolumes = function (params) {
        var defer = $q.defer();
        $http.post('/api/accounting/bands/products', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getCommissionVolumes = function (params) {
        var defer = $q.defer();
        $http.post('/api/accounting/bands/commissions', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //GET USERS
    dataHandler.getUsers = function () {
        var defer = $q.defer();
        $http.get('/admin/users')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //GET TERMINATED USERS
    dataHandler.getTerminatedUsers = function () {
        var defer = $q.defer();
        $http.get('/admin/users/terminated')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getPendingUsers = function () {
        var defer = $q.defer();
        $http.get('/admin/users/pending')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.approveUser = function (params) {
        var defer = $q.defer();
        $http.post('/api/users/approve', params)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (err, status) {
                defer.reject(err);
            });
        return defer.promise;
    };

    dataHandler.terminateUser = function (params) {
        var defer = $q.defer();
        $http.post('/admin/users/terminate', params)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (err, status) {
                defer.reject(err);
            });
        return defer.promise;
    };

    dataHandler.deletePendingUser = function (params) {
        var defer = $q.defer();
        $http.post('/api/users/delete_pending', params)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (err, status) {
                defer.reject(err);
            });
        return defer.promise;
    };

    //GET ROLES
    dataHandler.getRoles = function () {
        var defer = $q.defer();
        $http.get('/admin/roles')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getRolesForMatrix = function () {
        var defer = $q.defer();
        $http.get('/admin/matrix/roles')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //GET PERMISSIONS
    dataHandler.getPermissions = function () {
        var defer = $q.defer();
        $http.get('/admin/perms')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //GET ROLES FOR UI ELEMENT
    dataHandler.getUiElementRoles = function (id) {
        var defer = $q.defer();
        $http.get('/ui/element/get_roles2/' + id)
            .success(function (data) {
                defer.resolve(data);
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };
    //UPDATE PRODUCT
    dataHandler.updateProduct = function (params) {
        var defer = $q.defer();

        $http.post('/api/products/update', params)
            .success(function (data) {
                defer.resolve(data);
                //
            })
            .error(function (err, status) {
                defer.reject(err);
                //
            });

        return defer.promise;
    };

    //DEACTIVATE PRODUCT
    dataHandler.deactivateProduct = function (params) {
        var defer = $q.defer();
        $http.post('/api/products/deactivate', params)
            .success(function (data) {
                defer.resolve(data);
                //swal(" ", (JSON.stringify(data.description).replace(/['"]+/g, '')) , "info");
                // alert('Alerting data: ' + JSON.stringify(data.description));
            })
            .error(function (err, status) {
                defer.reject(err);
                //
            });
        return defer.promise;
    };

    dataHandler.settleProduct = function (params) {
        var defer = $q.defer();
        $http.post('/api/products/settle', params)
            .success(function (data) {
                defer.resolve(data);
                //swal(" ", (JSON.stringify(data.description).replace(/['"]+/g, '')) , "info");
                // alert('Alerting data: ' + JSON.stringify(data.description));
            })
            .error(function (err, status) {
                defer.reject(err);
                //
            });
        return defer.promise;
    };


    //GET CLASS OF SERVICE

    dataHandler.getClassofService = function () {
        var defer = $q.defer();
        $http.get('/api/classofservice/get')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    //ADD CLIENT CLASS OF SERVICE

    dataHandler.addClientClassofService = function (params) {
        var defer = $q.defer();
        $http.post('/api/classofservice/add/client', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    //ADD BUSINESS CLASS OF SERVICE
    dataHandler.addBusinessClassofService = function (params) {
        var defer = $q.defer();
        $http.post('/api/classofservice/add/business', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    //ADD BANK CLIENT CLASS OF SERVICE
    dataHandler.addBankClassofService = function (params) {
        var defer = $q.defer();
        $http.post('/api/classofservice/add/bank', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.initiateAdjustment = function (params) {
        var defer = $q.defer();
        $http.post('/api/adjustment/initiate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.validateAdjustment = function (params) {
        var defer = $q.defer();
        $http.post('/api/adjustment/validate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.reverseAdjustment = function (params) {
        var defer = $q.defer();
        $http.post('/api/adjustment/reverse', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getPendingAdjustments = function (params) {
        var defer = $q.defer();
        $http.get('/api/adjustment/get-pending')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.settleCommissions = function (params) {
        var defer = $q.defer();
        $http.post('/api/business/commissions/settle', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    //Search for a transaction
    dataHandler.searchForTransaction = function (params) {
        var defer = $q.defer();
        $http.post('/api/transaction/search', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.reverseTransaction = function (params) {
        var defer = $q.defer();
        $http.post('/api/transaction/reverse', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };


    //GET STATEMENT OF ACCOUNT

    dataHandler.getStatementOfAccounts = function (params) {
        var defer = $q.defer();
        $http.post('/api/accounting/statement-of-accounts', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };
    dataHandler.getClosingBalances = function (params) {
        var defer = $q.defer();
        $http.post('/api/accounting/closing-balances', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;
    };

    dataHandler.getPendingEValueTransactions = function () {
        var defer = $q.defer();

        $http.get('/api/e_value/pending')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.validateEvalueTransactions = function (params) {

        var defer = $q.defer();
        $http.post('/api/e_value/validate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.initiateEvalueTransactions = function (params) {

        var defer = $q.defer();
        $http.post('/api/e_value/initiate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.initiateBankTransfer = function (params) {
        var defer = $q.defer();
        $http.post('/api/banks_transfer/initiate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.getPendingBankTransfers = function () {
        var defer = $q.defer();

        $http.get('/api/banks_transfer/pending')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.validateBankTransfer = function (params) {
        var defer = $q.defer();
        $http.post('/api/banks_transfer/validate', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.getAllUsers = function () {
        var defer = $q.defer();

        $http.get('/api/users/all')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;

    };

    dataHandler.getActiveDevices = function () {
        var defer = $q.defer();

        $http.get('/api/devices/stats')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };


//STATS
    dataHandler.getBillerStats = function () {
        var defer = $q.defer();
        $http.get('/api/billers/stats')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Activity Logs
    dataHandler.getActivityLogs = function (params) {
        var defer = $q.defer();
        $http.post('/api/get/logs', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    //Agent Rankings
    dataHandler.getAgentRankings = function (params) {
        var defer = $q.defer();
        $http.post('/api/reports/rank', params)
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    //Subscriber Reports
    dataHandler.getSubscriberReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/subscribers')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Agent Reports
    dataHandler.getAgentReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/agents')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    //Product Reports
    dataHandler.getProductsReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/products')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });

        return defer.promise;
    };

    dataHandler.getSubscriberProductReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/subscribers/products')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };
    dataHandler.getSubscriberP2PReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/subscribers/p2p')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };
    dataHandler.getAgentProductReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/agents/products')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.getBillerReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/billers')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };

    dataHandler.getDeviceReports = function () {
        var defer = $q.defer();
        $http.get('/api/reports/devices')
            .success(function (data) {
                defer.resolve(data)
            })
            .error(function (err) {
                defer.reject(err)
            });
        return defer.promise;

    };


    return dataHandler;
});

//Displays Date on Navbar
adminApp.controller('dateController', function ($scope) {
    $scope.now = new Date().toDateString();
});


////controller("LineCtrl", function ($scope) {

adminApp.filter('percentage', ['$filter', function ($filter) {
    return function (input, decimals) {
        return $filter('number')(input * 100, decimals) + '%';
    };
}]);

adminApp.controller('dashboardController', function ($scope, dataHandler, $http) {

    var a = new Date();
    $scope.date = a.getDate();

    $scope.platformTodayCurrent = 0;
    $scope.platformTodayTarget = 33000;
    $scope.platformTodayReached = 0;

    $scope.platformMonthCurrent = 0;
    $scope.platformMTDTarget = 33000 * $scope.date;
    $scope.platformMonthReached = 0;
    $scope.platformProjected = 0;


    $http.get('/api/reports/zesa')
        .then(function (data) {
            "use strict";
            $scope.zesa = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/cashin')
        .then(function (data) {
            "use strict";
            $scope.cashin = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/cashout')
        .then(function (data) {
            "use strict";
            $scope.cashout = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/sendmoney')
        .then(function (data) {
            "use strict";
            $scope.sendmoney = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/econet')
        .then(function (data) {
            "use strict";
            $scope.econet = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/telecel')
        .then(function (data) {
            "use strict";
            $scope.telecel = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/netone')
        .then(function (data) {
            "use strict";
            $scope.netone = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/zol')
        .then(function (data) {
            "use strict";
            $scope.zol = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/insurance')
        .then(function (data) {
            "use strict";
            $scope.insurance = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/powertelMobile')
        .then(function (data) {
            "use strict";
            $scope.powertelMobile = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/powertelAccount')
        .then(function (data) {
            "use strict";
            $scope.powertelAccount = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/city-councils')
        .then(function (data) {
            "use strict";
            $scope.councils = data.data
        }, function (error) {
            
        });
    $http.get('/api/reports/clients')
        .then(function (data) {
            "use strict";
            $scope.clients = data.data
        }, function (error) {
            
        });

    var d = new Date();
    $scope.date = d.getDate();
    $scope.symbol = '$';
    $scope.min = 0;
    $scope.textRenderer = function (val) {
        return ('$' + val);
    };
    $scope.levelColors = ['#d50000', '#fb8c00 ', '#FFAF2E', '#00c853'];

    $scope.subscribersget = function () {

        dataHandler.getSubscriberP2PReports()
            .then(function (data) {
                $scope.cashIn = data.filter(function (d) {
                    return d.transactionType === 'cashIn'
                });
                $scope.cashOut = data.filter(function (d) {
                    return d.transactionType === 'cashOut'
                });
                $scope.sendMoney = data.filter(function (d) {
                    return d.transactionType === 'sendMoney'
                });
            }, function (error) {
                
            });

        dataHandler.getSubscriberProductReports()
            .then(function (data) {
                $scope.subProdlabels = data.map(function (d) {
                    return d.product
                });
                var transactions = data.map(function (d) {
                    return d.transactions
                });
                var amount = data.map(function (d) {
                    return d.sumAmount
                });
                $scope.subProdseries = 'Transactions';
                $scope.subProddata = transactions;
            }, function (error) {
                
            })

        dataHandler.getSubscriberReports()
            .then(function (data) {
                $scope.subs = data
            }, function (error) {
                
            })

    }();

    $scope.agentsget = function () {

        dataHandler.getAgentProductReports()
            .then(function (data) {
                $scope.agentProdlabels = data.map(function (d) {
                    return d.product
                });
                var transactions = data.map(function (d) {
                    return d.transactions
                });
                var amount = data.map(function (d) {
                    return d.sumAmount
                });
                $scope.agentProdseries = 'Transactions';
                $scope.agentProddata = transactions;
            }, function (error) {
                
            })

        dataHandler.getAgentReports()
            .then(function (data) {
                $scope.agents = data

            }, function (error) {
                
            })

    }();

    $scope.billersget = function () {
        dataHandler.getBillerReports()
            .then(function (data) {
                $scope.transactionCount = data.filter(function (d) {
                    return d.type == 'rankingByTransactionCount'
                });
                $scope.transactionCountLabels = Object.keys($scope.transactionCount[0].billers);
                $scope.transactionCountValues = Object.values($scope.transactionCount[0].billers);

                $scope.transactionSum = data.filter(function (d) {
                    return d.type == 'rankByTransactionSum'
                });
                $scope.transactionSumLabels = Object.keys($scope.transactionSum[0].billers);
                $scope.transactionSumValues = Object.values($scope.transactionSum[0].billers);

                $scope.agentEarnings = data.filter(function (d) {
                    return d.type == 'rankByAgentEarnings'
                });
                $scope.agentEarningsLabels = Object.keys($scope.agentEarnings[0].billers);
                $scope.agentEarningsValues = Object.values($scope.agentEarnings[0].billers);

                $scope.platformEarnings = data.filter(function (d) {
                    return d.type == 'rankByPlatformEarnings'
                });
                $scope.platformEarningsLabels = Object.keys($scope.platformEarnings[0].billers);
                $scope.platformEarningsValues = Object.values($scope.platformEarnings[0].billers);

            }, function (error) {
                
            })

    }();

    $scope.devicesget = function () {
        $scope.loading = true
        dataHandler.getDeviceReports()
            .then(function (data) {
                $scope.loading = false

                $scope.devices = data

                $scope.devicePlatformsLabels = Object.keys(data.platforms)
                $scope.devicePlatformsValues = Object.values(data.platforms)


                $scope.deviceStateLabels = Object.keys(data.states)
                $scope.deviceStateValues = Object.values(data.states)
            }, function (error) {
                

            })
    }();
});

adminApp.controller('billerDashboardController', function ($scope) {
    $scope.labels = ["Zinara", "Telone", "ZOL", "NMB", "UFIC"];
    //$scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
    $scope.series = ['Amount', 'Amount'];
    $scope.data = [
        [6803, 5000, 1700, 3456, 2000]
    ];
    $scope.onClick = function (points, evt) {
        
    };
    $scope.datasetOverride = [{yAxisID: 'y-axis-1'}, {yAxisID: 'y-axis-2'}];
    $scope.options = {
        scales: {
            yAxes: [
                {
                    id      : 'y-axis-1',
                    type    : 'linear',
                    display : true,
                    position: 'left'
                },
                {
                    id      : 'y-axis-2',
                    type    : 'linear',
                    display : true,
                    position: 'right'
                }
            ]
        }
    };
    $scope.colours = ['#E91E63', '#1EF9A1', '#7FFD1F', '#68F000'];

});


adminApp.controller('productsDashboardController', function ($scope) {
    $scope.labels = ["DSTV Compact", "ADSL", "Old Mutual", "COH", "UFIC"];
    //$scope.labels = ["January", "February", "March", "April", "May", "June", "July"];
    $scope.series = ['Amount', 'Amount'];
    $scope.data = [
        [2803, 5000, 2700, 6456, 5000]
    ];
    $scope.onClick = function (points, evt) {
        
    };
    $scope.datasetOverride = [{yAxisID: 'y-axis-1'}, {yAxisID: 'y-axis-2'}];
    $scope.options = {
        scales: {
            yAxes: [
                {
                    id      : 'y-axis-1',
                    type    : 'linear',
                    display : true,
                    position: 'left'
                },
                {
                    id      : 'y-axis-2',
                    type    : 'linear',
                    display : true,
                    position: 'right'
                }
            ]
        }
    };
    $scope.colours = ['#E91E63', '#1EF9A1', '#7FFD1F', '#68F000'];

});

adminApp.controller('productCOSController', function ($scope) {
    $scope.labels = ["Platinum", "Silver", "Silver with Electricity"];
    $scope.data = [500, 200, 100];
});

//Handles Viewing Subscribers and their Files
adminApp.controller('clientListController', function ($scope, dataHandler, $location, $rootScope, $window) {
    $scope.clientSearch = false;
    $scope.searchResult = {};
    $scope.clientFile = false;
    $scope.clientInfoTable = true;
    $scope.loading = true;
    $scope.clientTransactionInfo = false;
    $scope.subMobile = '';
    $scope.clients = [];
    $scope.transactionFile = false;
    $scope.settleClientPage = false;


    dataHandler.getClassofService()
        .then(function (data) {
            $scope.clientClassOfServices = data.clientClassOfServices;

        }, function (error) {
            // alert(error)
        });
    dataHandler.getClientNumber()
        .then(function (data) {
            $scope.clientNumber = data;

        }, function (error) {
            // alert(error)
        });


    $scope.searchSubscriber = function () {
        $scope.transactionFile = false;
        $scope.clientFile = false;
        $scope.clientTransactionInfo = false;
        $scope.settleClientPage = false;
        $scope.clientInfoTable = true;

        $scope.clients = [];
        var subMobile = '';
        var pre = '263';
        if (($scope.subMobile.startsWith('263')) && ($scope.subMobile.length == 12)) {
            subMobile = $scope.subMobile
        }
        if (($scope.subMobile.startsWith('0')) && ($scope.subMobile.length == 10)) {
            var subMobil = $scope.subMobile.substring(1);
            subMobile = pre.concat(subMobil);
        }
        if (($scope.subMobile.startsWith('7')) && ($scope.subMobile.length == 9)) {
            subMobile = pre.concat($scope.subMobile)
        }
        var params = {
            mobile: subMobile
        };
        dataHandler.getClient(params)
            .then(function (data) {
                
                $scope.clients.push(data.client);
                if ($scope.clients[0] == null) {
                    swal('', 'No Subscriber Found!', 'warning');
                }
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            })
    };

    $scope.open = function (client) {
        $('#clientInfo').openModal();
        $scope.clientInfo = client;
        $scope.clientInfo.state = $scope.clientInfo.state.toUpperCase()

        $scope.updatedClient = {
            firstname: function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.firstname = newName) : $scope.clientInfo.firstname;
            },
            lastname : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.lastname = newName) : $scope.clientInfo.lastname;
            },
            address  : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.address = newName) : $scope.clientInfo.address;
            },
            email    : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.email = newName) : $scope.clientInfo.email;
            }
        };

        $scope.submitUpdatedClient = function () {
            var post = {
                id       : $scope.clientInfo.id,
                address  : $('#address').val(),
                email    : $('#email').val(),
                firstname: $('#firstname').val(),
                lastname : $('#last_name').val(),
                mobile   : $scope.clientInfo.mobile
            };

            dataHandler.updateClient(post)
                .then(function (data) {
                }, function (err) {
                    swal('', 'Something Went Wrong, Please Try Again', 'warning');
                });
        }


        $scope.viewClientFile = function () {
            $scope.clientFile = true;
            $scope.clientInfoTable = false;
        };

        $scope.backToSubscriberList = function () {
            $scope.clientFile = false;
            $scope.clientInfoTable = true;
        }
    };

    $scope.viewClientTransactions = function () {
        $scope.clientInfoTable = false;
        $scope.clientTransactionInfo = true;
        ///////////////////////////////////////////////////////////////////////////////////////
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        var end = yyyy + '-' + mm + '-' + (dd + 1);
        $scope.displayedDate = new Date().toDateString();
        $scope.todayParams = {
            id        : $scope.clientInfo.id,
            start_date: today,
            end_date  : end,
            mobile    : $scope.clientInfo.mobile
        };
        dataHandler.getClientTransactions($scope.todayParams)
            .then(function (data) {
                $scope.transactions = data.transactions;
                
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            });
        /////////////////////////////////////////////////////////////////////////////////////////
        $scope.searchByDate = function () {
            $scope.loader = true;
            $scope.search_icon = false;

            $scope.statement = '';

            if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
                $scope.loader = false;
                $scope.search_icon = true;

                swal('', 'Invalid Date Range!', 'warning');
            }
            if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
                /////////////////////////////////////////////
                var sd = $scope.start_date.getDate();
                var ed = $scope.end_date.getDate() + 1;
                var sm = $scope.start_date.getMonth() + 1; //January is 0!
                var em = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyy = $scope.start_date.getFullYear();
                var eeyy = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sd < 10) {
                    sd = '0' + sd
                }
                if (sm < 10) {
                    sm = '0' + sm
                }
                if (ed < 10) {
                    ed = '0' + ed
                }
                if (em < 10) {
                    em = '0' + em
                }
                ////////////////////////////////////////////
                var start = ssyy + '-' + sm + '-' + sd;
                var end = eeyy + '-' + em + '-' + (ed);
                ///////////////////////////////////////

                var params = {
                    id        : $scope.clientInfo.id,
                    start_date: start,
                    end_date  : end,
                    mobile    : $scope.clientInfo.mobile
                };
                dataHandler.getClientTransactions(params)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;
                        $scope.transactions = data.transactions;
                        


                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }
            if ($scope.start_date.getTime() == $scope.end_date.getTime()) {



                /////////////////////////////////////////////
                var sde = $scope.start_date.getDate();
                var ede = $scope.end_date.getDate();
                var sme = $scope.start_date.getMonth() + 1; //January is 0!
                var eme = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyye = $scope.start_date.getFullYear();
                var eeyye = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sde < 10) {
                    sde = '0' + sde
                }
                if (sme < 10) {
                    sme = '0' + sme
                }
                if (ede < 10) {
                    ede = '0' + ede
                }
                if (eme < 10) {
                    eme = '0' + eme
                }
                ////////////////////////////////////////////
                var starte = ssyye + '-' + sme + '-' + sde;
                var ende = eeyye + '-' + eme + '-' + (ede + 1);
                ///////////////////////////////////////

                var paramse = {
                    id        : $scope.clientInfo.id,
                    start_date: starte,
                    end_date  : ende,
                    mobile    : $scope.clientInfo.mobile
                };
                dataHandler.getClientTransactions(paramse)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;
                        $scope.transactions = data.transactions;
                        


                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }

        };
    };

    $scope.backToListFromTransactions = function () {
        $scope.clientInfoTable = true;
        $scope.clientTransactionInfo = false;
        $('#dateSearchForm').trigger('reset');
        $scope.dateSearch = false;

    };

    $scope.refreshClients = function () {
        $scope.loading = true;
        dataHandler.getClients()
            .then(function (data) {

                $scope.clients = data.clients;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });
    };

    $scope.openTransaction = function (transaction) {
        $('#transactionInfo').openModal();
        $scope.transactionInfo = transaction;
    };

    $scope.viewTransactionFile = function () {
        $scope.clientTransactionInfo = false;
        $scope.transactionFile = true;
    }

    $scope.backToTransactionList = function () {
        $scope.clientTransactionInfo = true;
        $scope.transactionFile = false;
    }

    $scope.resetPin = function () {

        var params = {
            id: $scope.clientInfo.id
        };
        swal({
                title              : "PIN RESET",
                text               : "Reset Pin : " + $scope.clientInfo.firstname.toUpperCase() + " " + $scope.clientInfo.lastname.toUpperCase() + "?",
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
            },
            function () {
                dataHandler.resetPin(params)
                    .then(function (data) {
                        swal("", data.description, "info")
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };

    $scope.showSettleClient = function () {
        $scope.clientInfoTable = false;
        $scope.settleClientPage = true;
    };

    $scope.backToListFromSettle = function () {
        $scope.clientInfoTable = true;
        $scope.settleClientPage = false;
    };

    $scope.settleClient = function () {

        var params = {
            id: $scope.clientInfo.id
        };
        swal({
                title              : "Settle?",
                text               : $scope.clientInfo.firstname.toUpperCase() + " " + $scope.clientInfo.lastname.toUpperCase() +
                "<br>" + formatter.format($scope.clientInfo.deposit),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true,
                allowEscKey        : true,
                allowOutsideClick  : true
            },
            function () {
                dataHandler.settleClient(params)
                    .then(function (data) {
                        swal("", data.description, "info")
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };

    $scope.updateSubscriber = function () {
        var post = {
            id                    : $scope.clientInfo.id,
            address               : $scope.updatedClient.address(),
            email                 : $scope.clientInfo.email,
            firstname             : $scope.updatedClient.firstname(),
            lastname              : $scope.updatedClient.lastname(),
            mobile                : $scope.clientInfo.mobile,
            state                 : $scope.clientInfo.state,
            clientClassOfServiceId: $scope.clientInfo.clientClassOfServiceId.id,
            deposit               : $scope.clientInfo.deposit

        };

        dataHandler.updateClient(post)
            .then(function (data) {
                swal(data[0].description)
                var params = {
                    mobile: $scope.clientInfo.mobile
                };
                dataHandler.getClient(params)
                    .then(function (data) {
                        $scope.clients = []
                        $scope.clients.push(data.client);
                    }, function (error) {
                        swal('', 'Something Went Wrong, Please Try Again', 'warning');
                    })
            }, function (err) {
                alert(err)
            })

    };

    $scope.blockSubscriber = function () {
        var post = {
            id                    : $scope.clientInfo.id,
            address               : $scope.updatedClient.address(),
            email                 : $scope.clientInfo.email,
            firstname             : $scope.updatedClient.firstname(),
            lastname              : $scope.updatedClient.lastname(),
            mobile                : $scope.clientInfo.mobile,
            state                 : 'blocked',
            clientClassOfServiceId: $scope.clientInfo.clientClassOfServiceId.id,
            deposit               : $scope.clientInfo.deposit

        };
        swal({
                title              : "BLOCK ACCOUNT?",
                text               : '',
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
            },
            function () {
                dataHandler.updateClient(post)
                    .then(function (data) {
                        if (data[0].code == '00') {
                            swal('', 'CLIENT BLOCKED', 'info')
                            var params = {
                                mobile: $scope.clientInfo.mobile
                            };
                            dataHandler.getClient(params)
                                .then(function (data) {
                                    $scope.clients = []
                                    $scope.clients.push(data.client);
                                }, function (error) {
                                    swal('', 'Something Went Wrong, Please Try Again', 'warning');
                                })
                        }
                        else {
                            swal(data[0].description)
                        }
                    }, function (err) {
                        swal('', 'Something Went Wrong. Please Try Again')
                    })
            });


    };

    $scope.activateSubscriber = function () {
        var post = {
            id                    : $scope.clientInfo.id,
            address               : $scope.updatedClient.address(),
            email                 : $scope.clientInfo.email,
            firstname             : $scope.updatedClient.firstname(),
            lastname              : $scope.updatedClient.lastname(),
            mobile                : $scope.clientInfo.mobile,
            state                 : 'active',
            clientClassOfServiceId: $scope.clientInfo.clientClassOfServiceId.id,
            deposit               : $scope.clientInfo.deposit

        };
        swal({
                title              : "ACTIVATE ACCOUNT?",
                text               : '',
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
            },
            function () {
                dataHandler.updateClient(post)
                    .then(function (data) {
                        if (data[0].code == '00') {
                            swal('', 'CLIENT ACTIVATED', 'info')
                            var params = {
                                mobile: $scope.clientInfo.mobile
                            };
                            dataHandler.getClient(params)
                                .then(function (data) {
                                    $scope.clients = []
                                    $scope.clients.push(data.client);
                                }, function (error) {
                                    swal('', 'Something Went Wrong, Please Try Again', 'warning');
                                })
                        }
                        else {
                            swal(data[0].description)
                        }
                    }, function (err) {
                        swal('', 'Something Went Wrong. Please Try Again')
                    })
            });

    }

    $scope.topupFloat = function () {
        swal({
                title              : "Confirm Topup Transaction",
                text               : "Client Name : " + $scope.clientInfo.firstname + " " + $scope.clientInfo.lastname +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    action: 'topup',
                    amount: $scope.evalueFloat,
                    id    : $scope.clientInfo.id
                };
                dataHandler.settleClient(params)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $('#manageFloatForm').trigger('reset')
                    }, function (error, status) {
                        
                        

                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };
    $scope.reduceFloat = function () {
        swal({
                title              : "Confirm Reduction Transaction",
                text               : "Client Name : " + $scope.clientInfo.firstname + " " + $scope.clientInfo.lastname +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    action: 'reduce',
                    amount: $scope.evalueFloat,
                    id    : $scope.clientInfo.id
                };
                dataHandler.settleClient(params)
                    .then(function (data) {
                        
                        swal('', data.description, 'info');
                        $('#manageFloatForm').trigger('reset')
                    }, function (error) {
                        

                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };


});

//Handles Updating Subscribers
adminApp.controller('clientListForUpdateController', function ($scope, dataHandler, $rootScope) {
    $scope.clientSearch = false;
    $scope.searchResult = {};
    $scope.clientTable = true;
    $scope.clientUpdateInfo = false;
    $scope.loader = false;
    $scope.updateButton = true;
    $scope.clientInfo = {};
    $scope.loading = true;

    dataHandler.getClientsforUpdate()
        .then(function (data) {
            $scope.loading = false;
            $scope.clients_for_update = data.clients;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');

        });

    dataHandler.getClassOfService()
        .then(function (data) {

            $scope.clientClassOfServices = data.clientClassOfServices;

        }, function (error) {
            // alert(error)
        });

    $scope.refreshClients = function () {
        $scope.loading = true;
        dataHandler.getClientsforUpdate()
            .then(function (data) {
                $scope.clients_for_update = data.clients;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;

            });
    };

    $scope.open = function (client) {
        $('#clientInfo').openModal();

        $scope.clientInfo = client;

        $scope.updatedClient = {
            name    : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.firstname = newName) : $scope.clientInfo.firstname;
            },
            lastname: function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.lastname = newName) : $scope.clientInfo.lastname;
            },
            address : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.address = newName) : $scope.clientInfo.address;
            },
            email   : function (newName) {
                return angular.isDefined(newName) ? ($scope.clientInfo.email = newName) : $scope.clientInfo.email;
            }
        };

        $scope.submitUpdatedClient = function () {
            var post = {
                id       : $scope.clientInfo.id,
                address  : $('#address').val(),
                card_id  : $scope.clientInfo.cardId,
                deposit  : $scope.clientInfo.deposit,
                account  : $scope.clientInfo.account,
                email    : $('#email').val(),
                firstname: $('#firstname').val(),
                lastname : $('#last_name').val(),
                mobile   : $scope.clientInfo.mobile
            };

            dataHandler.updateClient(post)
                .then(function (data) {

                }, function (err) {
                    alert(err)
                });
        }
    };

    $scope.backToUpdateList = function () {
        $scope.clientTable = true;
        $scope.clientUpdateInfo = false;
        dataHandler.getClientsforUpdate()
            .then(function (data) {
                $scope.clients_for_update = data.clients;
            }, function (error) {

            });
    };

    $scope.updateClient = function () {
        $scope.clientTable = false;
        $scope.clientUpdateInfo = true;
        $scope.updatedEmail = $scope.clientInfo.email;
    };
});

//Handles Adding Subscribers
adminApp.controller('addClientController', function ($scope, dataHandler) {
    $scope.submit_progress = false
    $scope.submitClient = function () {
        $scope.submit_progress = true;
        var subMobile = '';
        var pre = '263';

        if (($scope.mobile.startsWith('263')) && ($scope.mobile.length === 12)) {
            subMobile = $scope.mobile
        }
        if (($scope.mobile.startsWith('0')) && ($scope.mobile.length === 10)) {
            subMobile = $scope.mobile;
            subMobile = subMobile.replace(subMobile.charAt(0), pre);
        }
        if (($scope.mobile.startsWith('7')) && ($scope.mobile.length === 9)) {
            subMobile = pre.concat($scope.mobile)
        }

        var params = {
            firstname: $scope.first_name,
            lastname : $scope.last_name,
            mobile   : subMobile,
            address  : $scope.address,
            id       : $scope.id,
            email    : $scope.email
        };
        
        dataHandler.addClient(params)
            .then(function (data) {
                $scope.submit_progress = false
                $('#addClientForm').trigger('reset');
                
                swal('', data[0].description, 'info')
            }, function (error) {
                $scope.submit_progress = false
                swal('', 'Something Went Wrong, Please Try Again', 'warning');

            })
    }


});


//Handles Adding A Business
adminApp.controller('addBusinessController', function ($scope, dataHandler, $filter) {
    dataHandler.getDevices()
        .then(function (data) {
            $scope.terminals = data.devices;
        }, function (error) {
            $scope.loading = false;
            console.error(error)
        });
    dataHandler.getClassofService()
        .then(function (data) {
            $scope.classOfServices = data.agentClassOfServices;
        }, function (error) {
            swal('', 'Something Went Wrong, Please Try Again', 'warning');
        });
    dataHandler.getAgentSupervisor()
        .then(function (data) {
            $scope.supervisors = data.agentSupervisors;
        }, function (error) {
            swal('', 'Something Went Wrong, Please Try Again', 'warning');
        });

    //Agent Data
    $scope.agent_first_name = '';
    $scope.agent_last_name = '';
    $scope.agent_dob = '';
    $scope.agent_registration_date = '';
    $scope.agent_commission = '';
    $scope.agent_deposit = '';
    $scope.agent_address = '';
    $scope.email_address = '';
    $scope.agent_gender = '';
    $scope.agent_id_number = '';
    $scope.agent_class_of_services = '';
    $scope.agent_cellphone = '';
    $scope.agent_supervisor = '';
    $scope.country = '';
    $scope.external_reference = '';
    $scope.type_of_company = '';
    $scope.business_activities = '';
    $scope.branchName = '';
    $scope.accountNumber = '';
    $scope.tax_reg_number = '';
    $scope.tax = false;
    $scope.merchant_landline = '';
    $scope.bankBranch = '';
    $scope.bankName = '';
    $scope.submit_progress = false;


    $scope.terminals = '';
    $scope.sales_rep = '';
    $scope.employees = [];
    $scope.terminalList = [];
    $scope.addEmployee = function () {
        $scope.employees.push({
            name: ""
        });
    };
    $scope.removeEmployee = function () {
        var lastItem = $scope.employees.length - 1;
        $scope.employees.splice(lastItem)
    };
    $scope.removeTerminal = function () {
        var lastItem = $scope.terminalList.length - 1;
        $scope.terminalList.splice(lastItem)
    };


    $scope.submitBusinessDetails = function () {
        $scope.submit_progress = true;

        var dd = $scope.agent_dob.getDate();
        var mm = $scope.agent_dob.getMonth() + 1; //January is 0!
        var yyyy = $scope.agent_dob.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var agent_dob = yyyy + '-' + mm + '-' + dd;

        var params = {
            firstname         : $scope.agent_first_name,
            lastname          : $scope.agent_last_name,
            address           : $scope.agent_address,
            cellphone         : $scope.agent_cellphone,
            email             : $scope.email_address,
            deposit           : $scope.agent_deposit,
            commission        : $scope.agent_commission,
            registrationDate  : $scope.agent_registration_date,
            dob               : $scope.agent_dob,
            gender            : $scope.agent_gender,
            id_number         : $scope.agent_id_number,
            class_of_service  : $scope.agent_class_of_services,
            tax_reg_number    : $scope.tax_reg_number,
            landline          : $scope.merchant_landline,
            country           : $scope.country,
            supervisor        : $scope.agent_supervisor,
            business_type     : $scope.type_of_company,
            external_reference: $scope.external_reference,
            accountNumber     : $scope.accountNumber,
            bankName          : $scope.bankName,
            bankBranch        : $scope.bankBranch,
            withhold_tax      : $scope.tax,
            tax_expiry        : $scope.tax_expiry

        };
        
        dataHandler.addBusiness(params)
            .then(function (data) {
                $scope.submit_progress = false;
                console.log(data)
                
                swal('', data.description, 'info');

                var dd = {
                    content: [
                        {
                            image    : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATsAAABaCAYAAADHA/GMAAAABmJLR0QA/wD/AP+gvaeTAAAbUUlEQVR42u1dB3gc5ZmelQykAAkkJHS4xIR6QELCUY7DtAslGLVVcUfyGQI4BGzvzMgk2Z3ZXdu0BNMDDubAkMCZEkxxgIRyQCgGbGMbd1u2erHc5Crp3m93xEmrKf/Mzkry6nuf53tW9k75d2fm3a9/ksRgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMRv9jeGXs+4WKfmmRov8uKOvPBxX9bfy9EK9Lk6J9BHk/qERfgcwrkvX7ClS9oiAUPScYDu/fdZxmKbewWcpZ3SjlrGqSAosbpcCr+PvuRim3rFmSjuFvmsFg9CnC4XAOyGxYkRKZjdcVpYpWPVqJbBurhDvLld91VkDGd5OKxP+HO6/F39fidRwE23eMULTWYkXfWKRGPitStVBwSvjwZmnI5SC6T5qknAZIJwkIrw3EVw0hEpyLbS7rlKT9+EowGIyMgMgI5DYd2tnaUbK2iYhrfAqxeZUxSmRPsaLV4Pj/KJS1U+sl6QwQ25vQ9Jq6SK+bbMZ7VXidCY3vaL4yDAbDF1ylTDskKEceLVa1mjFyZO94H0kuVUgzLMV5imTtheAt4UNbpNwroNGtBrHtNCG9DpBeLV7nbJGk7/KVYjAYHtEZgKY1CX63KpioezJFcGYCU7e9SNHWFal6wUpJOgAa3u9hztabEB4k0A5CrMHfCszbHL5uDAZD3GRV44dRoGGUGtnUlySX6usrkyPNhYo2Kxh8JrchqeVVmxNeQrZTYKNBkobyFWQwGI4oVeMXIHq6HtpVR38RXQ9/nhxpg5b3z3w1/h0Q2QkgtOUgtj1WpAdCbEQEdwRfSQaDYYlCOXJjsazVVwwAkusuCIa0F6raqoKp0eM2SdK3QXhfJH125oRnBDZm8BVlMBi9gFSS6WVKpCWTAYg0Ca8zqOpVMLFPaZGkb4HwltmYtImoLUjvafbjMRiM/yc6NXpbmaK1DESS6xmtTRJenhI+nhKNQWhVDoTXCsJ7hK8wg8GQClX9l2VqekRXnkwU3gXNsAYpKuuRM7e8RNGWGbIOycN1I9RI69iE1hhOOz0FPryVV08KfxeEdyp8dPV2hAeya8ZrlK80gzGIUazGzy+Fj84LAZFfb5QSQRVEZC0CGi8XhCKjyadGkdPU81BZWJEcPQ+VEjEqJStT9IZ0kpKvTaSm6O9RNQdSUqaAzLbYER62aUQ0N8hXnMEYhAhOjR5FJmGFB5IjkxcE93mwMnbVsHB4SNcxGyXpCERCh4NcbodP7dlmKTAPry+BcHREUg/8SptUtB8XoVa2BKRX7pHwQLRbyc9Ix8M53sA52u0Jj3LxpJP4yjMYgwpIGJb1D8tdaldU1gWiqsoLhfO6ExxFPpMR0kQe3I7uPjOQzMutknSI2SqGJ0hP/wLEtc0L4aEutz5vSvhMlJd9H+fe6OC/I8JbyAELBmMQAfWnt45Utc1uiIUK94OV2v+MnnzHN+kYSAE5jogMJLPeTKvCexvrpdw8IeJVImqJEmmscEm+FUn/3RIynQ1zdruDOdvG/jsGYzCZr4peI+qnI0JBkKGxKKRPSlCTJA2B0/9Ooy7VjFRAfIGVbisZEsnMsrbBrS8PgZE2kDeViu0Ps3mNk3ZHGiA3EGAwBgPZoeecm+oImIqNCDyMpn0Nc3Fxiqnag+hAOEu8FuYPD4WPhC9vpVvCI9/j8NCMg5qk3NHQ3loFzNlX+E5gMLLbfD0VWlqtKIlQknGhEr2e9iVNDRrdOpvKBepCspQqHNIiY7SSQvDDFeHBl7gLpvDd5I/DGlY4a3c59ZS2wncEg5GtWp2ivylKImOU8I6ikJZIyEWA4V+cEnih0a0mzc+PdVL3Y+p6Uu5SuxsXDn8Na1EhuwXM2df5jmAwstJ8DR+LIECtaJIwRUknTHh4P4qkNid7ytkRRx00vx/7uV6KskLDE/Ytwne3AwR5A5WSYb0bBMiuhoIsfGcwGFmn1WkPj1PD7YJ+ujoyeQ2z8AO7HDb4yLbBvP1tJtYM8hqPKHCTm8gs7Udam4Ap294g5dzPdwaDkUWgxF9qwilcnaDqTydJI0c30jXsNKQvKUKbQdP7dVqTyNrJHxm8TYfJPeSSZPt2e8Kj6C3WHuA7hMHIEuSHIpeNkLVWEcJAXevG/Mnh75GJZ5Ne0iXN1Do9k2svqIwdEUSrdpFKj7FE1JW6RmkoxpwKJ+2uBWbvBXyHMBjZY8I+JxKYSLRRQmqKuCkY+KIv1l8Y0qfCJ7dTKFCBMjZj/R8LkB3J43yHMBjZQ3ZrBX11DYWVsdORlnEKFc87kMR2FNeP64v1U9UGAiYbhUxZVauixgM0kwKyVyDnbjnfIQxGFiBviv5Dmtgl6OBfQfvQgGoBrW59nSR9s68+R6EaeQAdWhrRhKDWTmCGt+Sr2rkwT//VmD9b6yCtiCQfzncKg7GPA4X75aMFpoPR8GqYi7dT9YNgUf07ffk5qEIiT9HOEhGaV0GBBzQpOEtQDuI7hcHYx4HuJnPLxQr9m4gokI4xEakku5zSNrDNzfztMhiMAQNy2Is59vV11AwTWt2HzikbOY2kEfG3y2AwBgzQJn2VENnJ+meUL9ckVn1QXSNJ3+Bvl8FgDAhQuRflzYmknKCQfja0tZ80O0dhiezW8rfLYDAGDGgoDdJJqgWK/jsL5MhEpJtc79Te3CA7Ttdw40q45e6vU2XHCGXaD4Ly9GO7GqAyeoKSwSkyjoYSP8AP75EbJOnr/K0whEAjB0sFWjqNliM78+XoNSC7B8UScQNf8rdrjdGoQCmVYzeWKrEXIXWQThNpg7xbosTuLFPjF1LH5sH0HVHaEmaC5EEegKClv7QV0mki2yD/gMRAgBcO9vI+fAfDkQcbTJVB70OnYn5EWeudyG6knMxNSw7IcSa7ZtbsTAHSOqlMiT8JEttjQXCWUqbEvkS35tGDgOS+h4fzDpDXZgtyc5LlkIkgvdzBeI/hs9ebfS/4Tv84qB++/MrYaSPkSL1A5URtUAkPhcb2d0GyW5fWumTtjHwlGkyVwlBkbIGq/TpV8pWIjNcZqVIoR+/KV/TZqVIg6w/RXAp0Ls4nAncSfKYn0/k81GihVI3GQFq73ZKciTw3BnmCWfqg3pAGyfUQaDLvUp9FJjsmu6/M2LLEvAmHEis5Uh1U44dRorCgGbsREYqvedY4VX1OgaJ3ZkxkvTap8uc8Lfh5PJM3GoZ+m8xRBwLbClkH+YSkRIkvwusu6+3jX4xCA4SBdC9hXct7aKJq/FwXvjj88EiP+UFyKVI/2MZjMtlZaVDQEEQCFKUgO+oOTLMZRMgBJFKbzq9qpsmuUNG7yt7eFdRUl3j5HFTVUarGPrYgraoSOf5bBCXOMvPHUf0ufoguxv5/wbbtZmYttjlwXyc78rHhYfzvDBBdl2wYTAOUmOwsYKSebBAwY2sKQuGjQWJPCpLdjmYpt3gAk92nyRsj8KWgZrfA7WegBGw89K+YkNwOEEGIWsS78PWdi/1WmxzrwX2d7GBuTsog0XXJX5nsBjnZJTQIDK9xLhWLNOZVxs5Ejt1vBNsiEUE8O4DJbjYlSDcK1Ph6nTZWpkZ/bUJO28tCscu8fCdktmL/FSnH6yiRp5+xr5Id0khOwIO4Q4Cs3iR/Hg1Borb63YjyRApGQBYJ+PCuZrIb7GSn6p85Nb4cqUS2giAuhbZWKFAX20UQKwcm2Wl70KaqHDf/T/FZmkQ+S4uUM9XN+hOpJUk/XA9iGqHGr0znWpHJmxrJRWrKI/sq2eEhnOtAUmtxnS4SMIVzDNLba0N2rzDZDXrNTv+zU+NOdPjtQIdfuplOholaJ6jZ1eJX+NgBqNnV0vxZNDSIifnrEt2Kz3el1Smx2zNlciI48VTKcbeRO2JfIzsKHEA67Hxtbv2+2Ocmm+PtdjOvGAS6X7JiKJGnNh5/TyDBccZBfuZXQjMdB8c/x8iFm2DICPz7ci+txdyQXdK6kfAsSGfiHj8NUbvDsprsimStdJSstTlPE9OeoKhZo1g788ScWBDKvQOO7OToajoHgg6LRCPLbup8yReHoEJzCiG1UrDCF1KpjF3Si0hD0Z+6M7Ep3y+mQt5OkFRyvXUU5S1Roi+XyLGbqZrDntymHV8Mbb9LsP+GHmtSo7/q/j6dM+WhjNsQUwclCLv9boy2XQttjnuNgGl9JbZ7EbLTQevcAwJ5m3yObmchkyaKfUtwjNfpOA7nWQ+ZgaqRH/pFdjTpD+t+BP/fbLLdasjtWRnUoShrsWPzzsToxIWGU3+RuN8up8rLsJ0Mkl075E5cyGNoVGImqkHwUOeZpIrc69f1umLizANK1NhrSE5+vUtATkJzPkaGZhxtJDV3COTz7YXMCk6NHmWhycmu8gPV2H0pD+Uymwfccyt8XNubbUzZyVb70Uxj7DvPYwBkM479X4LrO8ao+HB7DvJtyk4VInZkB7/SAfj7Hjtzv5u0YZ9bB2WQAoRYReYSzLq7XJDdVvj5ggOI7GootxAa50yxGt+cDvq8Ls25h1Mf9JLK2E/6+xrTGrCWJg9JzDVm60+H7EhrsHvQ8P65Xj8nuVoMjclMJprtQ1UbeG+JD1FfxW5tyWHy0ro0k6UfJc3QLdlB5kD+5uF8U7LNb/cHdCLusI3IypFm1Mf+O76As8U6n3ylGa10q90hGPIEiKkNwYTtYqJvdyQ6VdtToOpPJmsuRaOwOQ0UAXRHdtHPUxOGqVqjn4nuNGh/m0y1N+QB4r3nSfDvj8xK2WDubikJ6Sf7RXZUv2kXlOgHp/5zPqW47IGGeIZNEOUjP85jp3HZkF2Hx/PtpWBe1pBdYg4FBl87tWWHf+/xpL8hsEaU7Iy5srKb9ViVi5mWkCnRMpSA1TtrddG1VynTDgFR3w3ZLZhMvNrNuhNlYb1Lwt7pz2ubLFXrldhM1Rm/gV/ukF4/fPL0bxlEtqOHdirHPiMT2o8ABR6gkM3D9WwfE93ZDg/7FpDLZ4Zm+B6k2mH7+8zOA8Ioc9hvAeQFw1+41IGctlsFW2zILh2ZnVXaHZoCLB3vEJVFA881lO0PIpjlwpRNOPk3S9KhmVg3iCwOImuz1+r0ZpSIXYeLdpSoVgeB4zgn5kpDRkldLxNWjT3Ur1HSZHeVFKLThzntV1wZuyi1ZK1Mjl/nE9nNsHmwbutjsrNaC/m1lNSoqxFcKKLorsV+H7vUHmvNNCea4If35tuYl9d5JDv6XM+RjxHn+E+8/gL/ftAhIJNdXYwKlUjZSFXb7GDKbiq+Tb+UJnM1JidziRJeO6K4b/ndfid/cuw0DAyqdUgg3g3N78VkWVLgffLDiRI0fCyHuCK7kH6iiQk3vf+uamcg0S2lZ17eFHGijN/Wc9/4Ij/IDg/ZwzYm2vi+/IbwsL/qJUiC95+3Spmx2N7KV6dbncNoc9Vg8T095YHsmijNxeKaFNvstzO7/HbwK8FMXWOn3ZUnZ1G8aURlP3Wn3eVsgczwjehQ1wuNbrWD6dqRL+tLqRkmzh011iBqfs9xuyajrKsn2cnxSmHfGnrXee2GYlYnS33wUrZroEahwvdE0qTd1uM8avwUHzS7Z2zIrqSPNbsFFprTBIf97rHS1Cy2b7M4z6uU02dznj9BWkxkvluyI43U8mcxWaNsuW/WtcyClnTTKEXbZj94R6uhrrqNUi6czDmb3RAeCKSe9kt3nVeHw98AmS11qJRoL1CjC5N+utygG00Uvrpa5E4d55rsUArW24yN3tpfZEeNBnqaodE/eTCD30gJVoz3QbObZ2OeDe/Lex5rOZg0+FShrsg2+1D6yFqXZNdiQ0LkExzjx5xlG8LaaBfFNfa1NJuRm3eglF3oDIDwllY4zqPQXjLMwmUutTsqI6ulsjOvKyQnOfyLb0Br22VDdPTeYvKhNaAhAc5Z52KNFLzwlBc3IhQ924SIwv1FdogMvyRCVPbR5fi9Ij5Il2T3tA3ZlQ24pwLZBNQKHuvLpwAEpNXG5Ku1MJf/VyAQQH6zNyiAQ348L9qUDdnNFSD+p2wI+WAp24Dk4WFlmBFrm3MH7a4QGfH4Ei5udJWG8pXUg4TK3a4tD73hQGKfIwK717pCQquGPEaVDFjbrU3ufIsk671ORgsq04aaENHd4mZwonnAJwKyWIzsUjqlqFEdFRJBNwLNbm5q81AfzNgHbMju+v68/ynxFg/2ZVhHxMhLWytQ5SCi2d3kIQrairW8TMnQpE2mQ3aUnydAdg8NKrJLEB5STMYokZ22vjuMVkxGZhPdizs8EF4DyCiR1S2ypuGTY6fDLF1uVEGYEV0r/HNfXiNHriaVm7qu4BwtLtfUAjPbs2YRvCV8qEn1xFN+Xx8qvRIiu95la2lLmRz7uw9kF7N5wPsloEP5lEYD0a1ppmnUWmiH+1v5BwWlnZoZWAUYnMhOpBGAXZQ8a8mOnNgwZ5eX20ZmtVZsQ91DjmgSr5dN9eHtJFOYCq6t1kLBBaSOPISIap2JuboDrxuxjkV5cqw4LIVzWqTckfC5oZ4wsNflevDrHXg+ne/N6GGX2u3E93kcxWr8fGey6wx4mXUhkBz8oQ9k9yubh/pvfX2/Gx1TdvuUk1ZrdR4q7Kd62jSPj6oe6U6rzIZ0yA7PYXjQkV0iWIFhPEGHmlkEK6qp/AqzHEZ70KJ6DNWGX+2l1BbaKNr/D6zjC/jntoDYVidE1ZajnGwh/u+vBfBBkV+OcqGgkaEjRWAxjtfqZQ1INF7th4MYD/p7qa2dqDW7n9emRI0XOJEdRdcFa2DdDv552weyu9jOdEunowjtSzWkZmLW0w7/P9YF0SCaL72GB7/CpulorYP/j1rQjzESh9MhvalMdn4S3pTwlSWy9ajFa4nw1MjiZM1swmzc4Z3wElJHXYHRP+4GJx8FLsyPEOiowPZvQTY0JSs1Or1pmIF66gThj4kZndZbG/J3KlipHL1D0Ge3ued20RKqmkhHrFrBuyE7asBp5wdLJ0hhdC2xIohp3be1y2PrloA7n8qzaBRh94ABJfV6IbtupEcdWoZh+1kUKfVAdm3UvIDJzk+TqVK/BQGLFuted5GdiM6+uFIaegBIY4Fggb1I9UINDbpJtk6nTiuBRSBUhOgDmCEaWJt8n8zgtM/V0CANudw3IlLjF5hoRO/5Sna962+tyG59JknXK9kJRCcXeOmWYxz3zzbHHZfipyuxebhfpoobB9PXM9mZHO9ko18ezeOoEqyRHc9k57cPLxSpKFG0RquE49FqZGtRSHuE6vXIHPQYsOgPQT+v3FE+JyoEzOdFOJdoif34JMq4xFJPUnPkoHUOFLKza8VkiOx2DaSd22mMVPmTQgwzLbatdorI2/Tjq/Xj+zS6t9zvoAHfxWSXCZNW0a4H4TVYER6GbTei5CxKAQsQ3lIEH/YObKKjfna5GdF0qPmlCSGtcFO9YAaj0cD7whUUSiyast0Hrj+LErvfIO+EIDH5aj/Izmir1ObQbaPUBdEdTjWcNsdbbEIMz1iQyF8EyOifomRHUVSLbasECMiugcCDTHYZQpEcPQ/lYlXlFoQ3Uo1sgkn7CLV3BpksMczRgUh0tcjzuzJT3xMlPkOrWmNCSk+k0+4J5PUHV0nFJl2N3fTWo0g49mnpeYxpx/tBdg6aVfduwHc4Ze/jIb0KssahL9tkk/PPtTJhHdZ9iZtorN1MXGibp9udK/ksWX6mCJNdBlEwNXocorCLkIe3w5Tw0CygUNbnvDJ06MHwsc1zW1KWYdmbbE8l/SzT3xNpQBbE9ITbmRFJjS5+j9sKCsOkXp7qP6QUGbFASLyyZ51vbIGoGUut2J2OT51wiBwE/FMtRtXFL41eeJcaGo8O+VRg/xVmQ9uN1uRm22+zmn9B945Dsb2ZZmc3LvJjuH++Y0OsU23IrpTJLsOghy8oa3eRWWuWiwcibIOG9/4V4fDBMGcnI3DRMACIDg9MYL7beQFpEZ61JrZMdKRiYlB273SW7TTXwpnsEsGM63ufPzqbrqGt+ZpMb0lp8RQbZUN2S1P6390s8vlosAwlzGZwZiyZw8M8+A2pS8mN2OY8isQapWKPCeTj1aWex+hQbNefrtmoKrnB0FKp7dKNRgWH1X67uo+VZLLLMKjJJrS8TzFXtrWid7PPdhDeCtqGhoXAdPzIaw5c+pHdwHqQbp+XISVy3eTYszYa2XKaREZlWdShhEYl0iuIohRF/L/He0tM9mlHVLUIry+IkB1pccZgnV6EC5kQnHL74d1/xMjMpYYBvXL0EOwgTdGG7D5IIbtNCIhE6BzUB8+O3B2aeaabgDvehmhPycA5t1t8xll+nscsOMFk1yfBi0ghiG0lpahc243wKuDbg/ZXF8RNTw8KEn9HgnzW9h3pJYbqPICLeFB/fTcgof2NITd+JPXuolw5Q2tURcguSUTTju81/auntBm+uZ0WVROrSkMzjnSIxj7sZuCOCfHcKjgIRrhFOtWjCvgNX/NaxWDTIeSE1POQqepDInEX0S208mMy2fWVPy8UuQia3ltoFLBxjKLt7NL2RimR7aiE+LxwUvikZC/+3AIQ0SdGrpzfJLeLytegyT1KMzEHxjfTGaBWT5ZkIiYru49MNMxbIbJLkK48/VhDm3NbHvYxTSVzjNqGoucktE6PZNfl+HcKNAjKUlG/LNwax9u1X7IY8ziJEnptTMz5ZtU4RsT4wzQ/23sOPj4mu74EdSeBpjcezQI+APmth8bXAMLrQCR3S5Ea+SP1o6PtKO8J5ISW0IFV4sO3zdsyUesoKhdD2sstXruWZBojpugnQCN73CXpNVLHYOri0v1YI+EP7U4uTmSXIDykvtDsidSGnBZSjbVOcvLtpWh35b2jt+JkR6BrZ2h5VR6I4AMq/xJtLtFNqzzVYbRjlyzDtj/vRizv22h3ptF+o1xsok0/PCtt7nP6bAI96Zjs+jOYkUhZkbUICHBeITXdlCMzU26AADmCqZswggjvgLRWUAkYCLDGmGS2DX9vN+pvqaSsOjlLIrASMp/Kxux+7QYaqDsKfHNjQQIPGnlzDQZJkNSRjw1942bSDNpUkvPJtD4w4SdM+OairxoDeTBZLDof/rW7EJz4BZnfXo5NaTfU1++rFlFKNJ+6G7shza57grQzg/jmGFHXJkMLI4f+KopkUsUB+eXMTEeX5xti1Kw+AfmEhkVTbh6loRgm67/5OVbAmDZ2idFKikzpT40B1YnzGnl8s4ygxYnMJFkM4xf+GNzEZzZJQ5DXNITSDS6kyBjVxWZdm2gGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBgMBoPBYDAYDAaDwWAwGAwGg8FgMBiMfR//B3NXhCsBSZctAAAAAElFTkSuQmCC',
                            width    : 155,
                            height   : 50,
                            alignment: 'center'
                        },
                        {
                            text     : '\nBUSINESS INFORMATION  - ' + data[0].agent.name.toUpperCase(),
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nADDRESS  - ' + data[0].agent.address.toUpperCase(),
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'


                        },
                        {
                            text     : '\nCELLPHONE NUMBER  - ' + data[0].agent.cellphone.toUpperCase(),
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n----------------------------------------------------------------------------------',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nACCOUNT NUMBER  - ' + data[0].agent.account.toUpperCase(),
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n----------------------------------------------------------------------------------',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nQuote the Account Number above when making a deposit and you can top up your float through any of the banks below:',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n\nCABS',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 1003533450',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n*****',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nZB - ROTTEN ROW BRANCH',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 4178104971080',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n*****',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nPOSB',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 500002238144',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n*****',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nCBZ',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 66161352420018',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n*****',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nNMB',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 0000280045028',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\n*****',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : '\nGETBUCKS',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Name - COPORETI SUPPORT SERVICES',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        },
                        {
                            text     : 'Account Number - 120300003891',
                            style    : 'header',
                            bold     : true,
                            alignment: 'center'

                        }

                    ]
                };
                pdfMake.createPdf(dd).download(data[0].agent.name + '.pdf');
            }, function (error) {
                $scope.submit_progress = false;
                swal('', 'Something Went Wrong. Please Try Again', 'warning')

            })

    };


});


//Handles Getting and Updating and Deactivating Businesses
adminApp.controller('getBusinessController', function ($scope, dataHandler) {
    $scope.loading = true;
    $scope.updating = false;
    $scope.businessInfoTable = true;
    $scope.businessFile = false;
    $scope.businessUpdateInfo = false;
    $scope.businessTerminalInfo = false;
    $scope.businessEmployeeInfo = false;
    $scope.businessFloatInfo = false;
    $scope.businessBankTransfer = false;
    $scope.businessBankInfo = false;
    $scope.businessTransactionInfo = false;
    $scope.evalueFloat = 0;
    $scope.evalueCommission = 0;
    $scope.bankName = '';
    $scope.bankBranch = '';
    $scope.bankAccountNumber = '';
    $scope.bankAmount = '';
    $scope.transactionTypeId = '';
    $scope.dailyLimit = '';
    $scope.monthlyLimit = '';
    $scope.minSessionLimit = '';
    $scope.maxSessionLimit = '';
    $scope.edit = true;


    $scope.refreshBusinesses = function () {
        $scope.loading = true;
        dataHandler.getBusiness()
            .then(function (data) {
                $scope.loading = false;
                $scope.businesses = data.agents;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            })

    };

    dataHandler.getBusiness()
        .then(function (data) {
            $scope.loading = false;
            $scope.businesses = data.agents;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.makeBusinessListCsv = function (filtered) {
        var csv_filtered = [];

        var cos = function (entry) {
            try {
                return entry.partnerClassOfServiceId.name
            } catch (e) {
                return '-'
            }
        };

        csv_filtered.push(
            {
                name      : 'Name',
                address   : 'Address',
                contact   : 'Contact Number',
                email     : 'Email Address',
                account   : 'Account',
                cos       : 'Class of Service',
                state     : 'Status',
                commission: 'Commission',
                deposit   : 'Balance'

            }
        );

        filtered.forEach(function (entry) {
            csv_filtered.push(
                {
                    name      : entry.name || entry.firstname + entry.lastname,
                    address   : entry.address,
                    contact   : entry.cellphone,
                    email     : entry.email,
                    account   : entry.account,
                    cos       : cos(entry),
                    state     : entry.state,
                    commission: entry.commission,
                    deposit   : entry.deposit

                }
            );
        });

        return csv_filtered;
    };

    dataHandler.getTransactionTypes()
        .then(function (data) {
            $scope.trans_types = data.transactionTypes
        }, function (error) {
            swal('', 'Something Went Wrong, Please Try Again', 'warning');
        });

    dataHandler.getClassofService()
        .then(function (data) {
            $scope.classOfServices = data.agentClassOfServices;
        }, function (error) {
            swal('', 'Something Went Wrong, Please Try Again', 'warning');
        });

    $scope.open = function (business) {
        
        $scope.terminal_loading = true;
        $scope.employee_loading = true;

        $scope.businessInfo = business;
        $scope.pendingDevice = 'Select Terminal';
        $scope.terminalList = [];
        $scope.employee_first_name = '';
        $scope.employee_last_name = '';
        $scope.employee_cellphone = '';
        dataHandler.getDevices()
            .then(function (data) {
                $scope.pending_devices = data.devices;
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            });


        $('#businessInfo').openModal();
        $scope.updatedBusiness = {
            name      : $scope.businessInfo.name,
            lastname  : $scope.businessInfo.lastname,
            address   : $scope.businessInfo.address,
            email     : $scope.businessInfo.email,
            cellphone : $scope.businessInfo.cellphone,
            deposit   : $scope.businessInfo.deposit,
            commission: $scope.businessInfo.commission,
            coc       : $scope.businessInfo.partnerClassOfServiceId.id
        }


    };

    $scope.updateBusinessPage = function () {
        $scope.businessInfoTable = false;
        $scope.businessUpdateInfo = true;
    };

    $scope.updateTerminalPage = function () {
        $scope.businessInfoTable = false;
        $scope.businessTerminalInfo = true;

        var post = {
            id: $scope.businessInfo.id
        };


        dataHandler.getAgentDevices(post)
            .then(function (data) {
                $scope.terminal_loading = false;
                $scope.agent_devices = data.devices;
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            });


        $scope.addTerminal = function () {
            var selected_device = $scope.pendingDevice;
            swal({
                    title              : "Confirm Terminal Assignment!",
                    text               : "<b>Business Name:</b> " + $scope.businessInfo.firstname +
                    "<br><b>IMEI:</b> " + selected_device.imei +
                    "<br><b>NAME:</b> " + selected_device.name +
                    "<br><b>ACTIVATION TRIES:</b> " + selected_device.activationTries,
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    html               : true
                },
                function () {
                    var post = {
                        id             : selected_device.id,
                        name           : selected_device.name,
                        imei           : selected_device.imei,
                        status         : selected_device.status,
                        activationTries: selected_device.activationTries,
                        firstUse       : selected_device.firstUse,
                        lastUse        : selected_device.lastUse,
                        agentId        : $scope.businessInfo.id
                    };
                    $scope.terminal_loading = true;

                    dataHandler.assignDeviceToAgent(post)
                        .then(function (data) {
                            swal('', data[0].description, 'info');

                            var post = {
                                id: $scope.businessInfo.id
                            };
                            dataHandler.getAgentDevices(post)
                                .then(function (data) {
                                    $scope.terminal_loading = false;
                                    $scope.agent_devices = data.devices;
                                }, function (error) {
                                    swal('', 'Something Went Wrong, Please Try Again', 'warning');
                                })

                        }, function (error) {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')
                        })
                });

        };
    };

    $scope.updateEmployeePage = function () {
        $scope.businessInfoTable = false;
        $scope.businessEmployeeInfo = true;

        var post = {
            id: $scope.businessInfo.id
        };

        dataHandler.getAgentEmployees(post)
            .then(function (data) {
                $scope.terminal_loading = false;
                $scope.employees = data.employees;
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            });

        $scope.addEmployee = function () {
            var post = {
                firstname: $scope.employee_first_name,
                lastname : $scope.employee_last_name,
                cellphone: $scope.employee_cellphone,
                agentId  : $scope.businessInfo.id
            };
            dataHandler.assignEmployeeToAgent(post)
                .then(function (data) {
                    $('#addEmployeesForm').trigger('reset');
                    swal('', data[0].description, 'info');
                    var post = {
                        id: $scope.businessInfo.id
                    };
                    dataHandler.getAgentEmployees(post)
                        .then(function (data) {
                            $scope.employee_loading = false;
                            $scope.employees = data.employees;
                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning');
                        });

                }, function (error) {
                    
                })
        };
        $scope.activateEmployee = function (employee) {
            swal({
                    title              : "Confirm Employee Activation!",
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    html               : true
                },
                function () {
                    var params = {
                        id       : employee.id,
                        firstname: employee.firstname,
                        lastname : employee.lastname,
                        cellphone: employee.cellphone,
                        agentId  : employee.agentId.id

                    };
                    dataHandler.activateEmployee(params)
                        .then(function (data) {
                            dataHandler.getAgentEmployees(post)
                                .then(function (data) {
                                    
                                    $scope.employee_loading = false;
                                    $scope.employees = data.employees;
                                }, function (error) {
                                    
                                });

                            swal('', data[0].description, 'info');
                        }, function (error) {
                            
                        })
                });

        };
        $scope.deactivateEmployee = function (employee) {
            swal({
                    title              : "Confirm Employee deactivation!",
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    confirmButtonColor : "#DD6B55",
                    html               : true
                },
                function () {
                    var params = {
                        id: employee.id
                    };
                    dataHandler.deactivateEmployee(params)
                        .then(function (data) {
                            dataHandler.getAgentEmployees(post)
                                .then(function (data) {
                                    
                                    $scope.employee_loading = false;
                                    $scope.employees = data.employees;
                                }, function (error) {
                                    
                                });
                            
                            swal('', data.description, 'info');
                        }, function (error) {
                            
                        })
                });

        };


    };

    $scope.viewTransactionsPage = function () {
        $scope.businessInfoTable = false;
        $scope.businessTransactionInfo = true;
///////////////////////////////////////////////////////////////////////////////////////
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        var end = yyyy + '-' + mm + '-' + (dd + 1);
        $scope.displayedDate = new Date().toDateString();
        $scope.todayParams = {
            id        : $scope.businessInfo.id,
            start_date: today,
            end_date  : end
        };
        dataHandler.getAgentTransactions($scope.todayParams)
            .then(function (data) {
                $scope.transactions = data.transactions;
            }, function (error) {
                
            });
        /////////////////////////////////////////////////////////////////////////////////////////
        $scope.searchByDate = function () {
            $scope.loader = true;
            $scope.search_icon = false;

            $scope.statement = '';

            if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
                $scope.loader = false;
                $scope.search_icon = true;

                swal('', 'Invalid Date Range!', 'warning');
            }
            if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
                /////////////////////////////////////////////
                var sd = $scope.start_date.getDate();
                var ed = $scope.end_date.getDate() + 1;
                var sm = $scope.start_date.getMonth() + 1; //January is 0!
                var em = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyy = $scope.start_date.getFullYear();
                var eeyy = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sd < 10) {
                    sd = '0' + sd
                }
                if (sm < 10) {
                    sm = '0' + sm
                }
                if (ed < 10) {
                    ed = '0' + ed
                }
                if (em < 10) {
                    em = '0' + em
                }
                ////////////////////////////////////////////
                var start = ssyy + '-' + sm + '-' + sd;
                var end = eeyy + '-' + em + '-' + (ed);
                ///////////////////////////////////////

                var params = {
                    id        : $scope.businessInfo.id,
                    start_date: start,
                    end_date  : end
                };
                dataHandler.getAgentTransactions(params)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;

                        $scope.transactions = data.transactions;

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }
            if ($scope.start_date.getTime() == $scope.end_date.getTime()) {



                /////////////////////////////////////////////
                var sde = $scope.start_date.getDate();
                var ede = $scope.end_date.getDate() + 1;
                var sme = $scope.start_date.getMonth() + 1; //January is 0!
                var eme = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyye = $scope.start_date.getFullYear();
                var eeyye = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sde < 10) {
                    sde = '0' + sde
                }
                if (sme < 10) {
                    sme = '0' + sme
                }
                if (ede < 10) {
                    ede = '0' + ede
                }
                if (eme < 10) {
                    eme = '0' + eme
                }
                ////////////////////////////////////////////
                var starte = ssyye + '-' + sme + '-' + sde;
                var ende = eeyye + '-' + eme + '-' + (ede);
                ///////////////////////////////////////

                var paramse = {
                    id        : $scope.businessInfo.id,
                    start_date: starte,
                    end_date  : ende
                };
                dataHandler.getAgentTransactions(paramse)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;
                        $scope.transactions = data.transactions;

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }

        }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    };

    $scope.manageFloat = function () {
        $scope.businessInfoTable = false;
        $scope.businessFloatInfo = true;
    };

    $scope.bankTransfer = function () {
        $scope.businessBankInfo = true;
        $scope.businessInfoTable = false;
    };

    $scope.deleteBusiness = function () {
        swal({
            title              : "Are you sure you want to deactivate" + ' ' + $scope.businessInfo.firstname,
            text               : " ",
            type               : "warning",
            showCancelButton   : true,
            confirmButtonColor : "#DD6B55",
            confirmButtonText  : "Yes, Deactivate!",
            closeOnConfirm     : false,
            showLoaderOnConfirm: true
        }, function () {
            var param = {'id': $scope.businessInfo.id};
            dataHandler.deactivateBusiness(param)
                .then(function (data) {
                    swal(" ", data.description, "info");
                    dataHandler.getBusiness()
                        .then(function (data) {
                            
                            $scope.loading = false;
                            $scope.businesses = data.agents;
                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                }, function (error) {
                    swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                });

        });
    };

    $scope.closeBusiness = function () {
        swal({
            title              : "Are you sure you want to close" + ' ' + $scope.businessInfo.firstname,
            text               : "This action is not reversible",
            type               : "warning",
            showCancelButton   : true,
            confirmButtonColor : "#DD6B55",
            confirmButtonText  : "Yes, Close Account!",
            closeOnConfirm     : false,
            showLoaderOnConfirm: true
        }, function () {
            var param = {'id': $scope.businessInfo.id};
            dataHandler.closeBusiness(param)
                .then(function (data) {
                    swal(" ", data, "info");
                    dataHandler.getBusiness()
                        .then(function (data) {
                            $scope.loading = false;
                            $scope.businesses = data.agents;
                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                }, function (error) {
                    swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                });

        });
    };

    $scope.editBusinessInformation = function () {
        $scope.edit = false;
    };
    $scope.submit_progress = false;

    $scope.submitUpdatedBusiness = function () {
        $scope.submit_progress = true;
        var supervisor = function () {
            if (angular.isUndefined($scope.businessInfo.agentSupervisorId)) {
                return 1;
            } else {
                return $scope.businessInfo.agentSupervisorId.id

            }
        };
        var params = {
            id              : $scope.businessInfo.id,
            name            : $scope.updatedBusiness.name,
            lastname        : $scope.updatedBusiness.name,
            address         : $scope.updatedBusiness.address,
            cellphone       : $scope.businessInfo.cellphone,
            email           : $scope.updatedBusiness.email,
            deposit         : $scope.businessInfo.deposit,
            commission      : $scope.businessInfo.commission,
            registrationDate: $scope.businessInfo.registrationDate,
            //documentId: $scope.businessInfo.documentId.id,
            //dob: $scope.businessInfo.documentId.dob,
            //gender: $scope.businessInfo.documentId.gender,
            //id_number: $scope.businessInfo.documentId.idNumber,
            class_of_service: $scope.updatedBusiness.coc,
            //tax_reg_number: $scope.businessInfo.documentId.taxRegNumber,
            //country: $scope.businessInfo.documentId.country,
            supervisor      : 1,
            //business_type: $scope.businessInfo.documentId.businessType,
            bankName        : $scope.bankName,
            bankBranch      : $scope.bankBranch,
            state           : $scope.businessInfo.state
        };
        dataHandler.updateBusiness(params)
            .then(function (data) {
                $scope.submit_progress = false;
                swal('', data[0].description, 'info');
                $scope.updated = true;
            }, function (error) {
                $scope.submit_progress = false;
                swal('', 'Something Went Wrong Please Try Again', 'warning')
            })


    };

    $scope.backToListFromTerminals = function () {
        $scope.businessInfoTable = true;
        $scope.businessTerminalInfo = false;
        $scope.agent_devices = '';
    };
    $scope.backToListFromEmployees = function () {
        $scope.businessInfoTable = true;
        $scope.businessEmployeeInfo = false;
    };
    $scope.backToListFromEdit = function () {
        $scope.businessInfoTable = true;
        $scope.businessUpdateInfo = false;
        $scope.edit = true;
        if ($scope.updated) {
            $scope.updating = true;
            dataHandler.getBusiness()
                .then(function (data) {
                    $scope.loading = false;
                    $scope.businesses = data.agents;
                    $scope.updating = false;
                }, function (error) {
                    $scope.updating = false;
                    swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                });
        }

    };

    $scope.backToListFromBank = function () {
        $scope.businessBankInfo = false;
        $scope.businessInfoTable = true;

    };
    $scope.backToListFromTransactions = function () {
        $scope.businessTransactionInfo = false;
        $scope.businessInfoTable = true;
        $('#dateSearchForm').trigger('reset');
        $scope.dateSearch = false;

    };

    $scope.backToListFromFloat = function () {
        $scope.businessInfoTable = true;
        $scope.businessFloatInfo = false;
    };

    $scope.topupFloat = function () {
        swal({
                title              : "Confirm Topup Transaction",
                text               : "Business Name : " + $scope.businessInfo.name +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat) +
                "<br> Commission Amount: " + formatter.format($scope.evalueCommission),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    type      : 'initiate_topup',
                    commission: $scope.evalueCommission,
                    deposit   : $scope.evalueFloat,
                    agent_id  : $scope.businessInfo.id

                };
                dataHandler.initiateEvalueTransactions(params)
                    .then(function (data) {
                        
                        if (data.code == "00") {
                            swal('', 'Your request is being processed. You will be notified once the transaction has been validated', 'success')

                        } else {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')

                        }
                    }, function (error) {
                        

                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };

    $scope.reduceFloat = function () {
        swal({
                title              : "Confirm Reduction Transaction",
                text               : "Business Name : " + $scope.businessInfo.name +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat) +
                "<br> Commission Amount: " + formatter.format($scope.evalueCommission),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true

            },
            function () {
                var params = {
                    type      : 'initiate_reduction',
                    commission: $scope.evalueCommission,
                    deposit   : $scope.evalueFloat,
                    agent_id  : $scope.businessInfo.id


                };
                dataHandler.initiateEvalueTransactions(params)
                    .then(function (data) {
                        if (data.code == "00") {
                            swal('', 'Your request is being processed. You will be notified once the transaction has been validated', 'success');

                        } else {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });

    }

    $scope.makeTransfer = function () {
        swal({
                title              : "Confirm Bank Transfer",
                text               : "Business Name : " + $scope.businessInfo.name +
                "<br> Bank Name:" + $scope.bankName +
                "<br> Bank Branch: " + $scope.bankBranch +
                "<br> Account Number: " + $scope.bankAccountNumber +
                "<br> Amount: " + formatter.format($scope.bankAmount),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    type        : 'initiate',
                    bank_account: $scope.bankAccountNumber,
                    bank_branch : $scope.bankBranch,
                    bank        : $scope.bankName,
                    agent_id    : $scope.businessInfo.id,
                    amount      : $scope.bankAmount


                };
                dataHandler.initiateBankTransfer(params)
                    .then(function (data) {
                        
                        if (data.code == "00") {
                            swal('', 'Your request is being processed. You will be notified once the transaction has been validated', 'success')
                            $('#makeTransferForm').trigger('reset');
                        } else {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });

    }

    $scope.settleCommission = function () {
        swal({
                title              : "Settle Commissions for " + $scope.businessInfo.name + "?",
                text               : "Commissions: " + formatter.format($scope.businessInfo.commission),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                allowEscKeyTrue    : true
            },
            function () {
                var params = {
                    id: $scope.businessInfo.id
                };
                dataHandler.settleCommissions(params)
                    .then(function (data) {
                        swal('', data.description, 'info')
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            })
    };


    $scope.transactionLimit = function () {
        $('#modal1').openModal()
    };

    $scope.addTransactionLimit = function () {

        $scope.transactionTypeId > 0 ? $scope.type = 'single' : $scope.type = '';
        var params = {
            agentId          : $scope.businessInfo.id,
            transactionTypeId: $scope.transactionTypeId,
            dailyLimit       : $scope.dailyLimit,
            monthlyLimit     : $scope.monthlyLimit,
            minSessionLimit  : $scope.minSessionLimit,
            maxSessionLimit  : $scope.maxSessionLimit,
            type             : $scope.type
        };

        dataHandler.addTransactionLimits(params)
            .then(function (data) {
                $('#transactionLimitsForm').trigger('reset');
                swal('', data[0].description, 'info')
            }, function (error) {
                swal('', 'Something went wrong. Please Try Again', 'warning')
                
            })
    }

    $scope.openTransaction = function (transaction) {
        $('#transactionInfo').openModal();
        $scope.transactionInfo = transaction;
        
    };

    $scope.viewTransactionFile = function () {
        $scope.businessTransactionInfo = false;
        $scope.transactionFile = true;
    };

    $scope.backToTransactionListFromDetails = function () {
        $scope.businessTransactionInfo = true;
        $scope.transactionFile = false;
    };

    $scope.makeBusinessTransactionListCsv = function (filtered) {
        var csv_filtered = [];

        var product = function (entry) {
            try {
                return entry.productId.name
            } catch (e) {
                return '-';
            }

        };
        var agentName = function (entry) {
            try {
                return entry.agentId.name
            } catch (e) {
                return '-';
            }

        };
        var agentAccount = function (entry) {
            try {
                return entry.agentId.account
            } catch (e) {
                return '-';
            }

        };
        var agentBalance = function (entry) {
            try {
                return entry.agentBalance
            } catch (e) {
                return '-';
            }

        };

        var clientName = function (entry) {
            try {
                return (entry.clientId.firstname + ' ' + entry.clientId.lastname)
            } catch (e) {
                return '-';
            }

        };

        var clientMobile = function (entry) {
            try {
                return entry.clientId.mobile
            } catch (e) {
                return '-';
            }

        };

        var clientBalance = function (entry) {
            try {
                return entry.clientBalance
            } catch (e) {
                return '-';
            }

        };


        var clientAccount = function (entry) {
            try {
                return entry.clientId.account
            } catch (e) {
                return '-';
            }

        };
        var amount = function (entry) {
            try {
                return entry.amount
            } catch (e) {
                return '-';
            }

        };
        var debit = function (entry) {
            try {
                return entry.credit
            } catch (e) {
                return '-';
            }

        };
        var credit = function (entry) {
            try {
                return entry.debit
            } catch (e) {
                return '-';
            }

        };

        var commission = function (entry) {
            try {
                return entry.commission
            } catch (e) {
                return '-';
            }

        };

        var bill_reference = function (entry) {
            try {
                return ('_' + entry.billid + '_')
            } catch (e) {
                return '-';
            }

        };

        var voucher = function (entry) {
            try {
                return ('_' + entry.voucher + '_')
            } catch (e) {
                return '-';
            }

        };

        csv_filtered.push(
            {
                date          : 'Date',
                ref           : 'Reference',
                src           : 'Source Account',
                dest          : 'Destination Account',
                description   : 'Description',
                product       : 'Product',
                agent         : 'Agent',
                agent_account : 'Agent Account',
                agent_balance : 'Agent Balance',
                employee      : 'Employee',
                client        : 'Client',
                client_mobile : 'Client Mobile',
                client_account: 'Client Account',
                client_balance: 'Client Balance',
                amount        : 'Amount',
                debit         : 'Debit',
                credit        : 'Credit',
                commission    : 'Commission',
                bill_reference: 'Bill Reference',
                voucher       : 'Voucher'

            }
        );

        filtered.forEach(function (entry) {
            csv_filtered.push(
                {
                    date          : entry.date,
                    ref           : entry.id,
                    src           : entry.source,
                    dest          : entry.destination,
                    description   : entry.description,
                    product       : product(entry),
                    agent         : agentName(entry),
                    agent_account : agentAccount(entry),
                    agent_balance : agentBalance(entry),
                    client        : clientName(entry),
                    client_mobile : clientMobile(entry),
                    client_account: clientAccount(entry),
                    client_balance: clientBalance(entry),
                    amount        : amount(entry),
                    debit         : debit(entry),
                    credit        : credit(entry),
                    commission    : commission(entry),
                    bill_reference: bill_reference(entry),
                    voucher       : voucher(entry)


                }
            );

        });

        return csv_filtered;
    }

    $scope.grantWebAccess = function () {


        swal({
                title              : "Grant Web Access to " + $scope.businessInfo.name + "?",
                text               : "",
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                allowEscKeyTrue    : true
            },
            function () {
                var params = {
                    email: $scope.businessInfo.cellphone,
                    name : $scope.businessInfo.name
                };
                dataHandler.grantWebAccess(params)
                    .then(function (data) {
                        swal('', data, 'info')
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            })
    }


});


//Handles Getting Transactions
adminApp.controller('reportTransactionsController', function ($scope, dataHandler) {
    $scope.transactionFile = false;
    $scope.transactionInfoTable = true;
    $scope.loading = true;

    ///////////////////////////////////////////////////////////////////////////////////////
    var today = new Date();
    var dd = today.getDate();
    var edd = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    var end = yyyy + '-' + mm + '-' + edd;
    $scope.displayedDate = new Date().toDateString();
    $scope.todayParams = {
        start_date: today,
        end_date  : end
    };


    dataHandler.getTransactions($scope.todayParams)
        .then(function (data) {
            $scope.loader = false;
            $scope.loading = false;
            $scope.transactions = data.transactions;
            
            dataHandler.getAllUsers2()
                .then(function (data) {
                    // 
                    $scope.loading = false;
                    $scope.allUsers = data.users;
                    $scope.transactions2 = [];

                    for (var i = 0; i < $scope.transactions.length; i++) {

                        var result = $.grep($scope.allUsers, function (e) {
                            try {
                                return e.id === $scope.transactions[i].administratorId.id;
                            } catch (ex) {
                                
                            }
                        });
                        $scope.transactions[i].administratorId = result[0];


                    }

                }, function (error) {
                    swal('', 'Something Went Wrong, Please Try Again', 'warning');
                })

        }, function (error) {
            
        });
    /////////////////////////////////////////////////////////////////////////////////////////
    $scope.searchByDate = function () {
        $scope.loader = true;
        $scope.search_icon = false;

        $scope.statement = '';

        if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
            $scope.loader = false;
            $scope.loading = false;

            $scope.search_icon = true;

            swal('', 'Invalid Date Range!', 'warning');
        }
        if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
            $scope.transactions = []

            /////////////////////////////////////////////
            var sd = $scope.start_date.getDate();
            var ed = $scope.end_date.getDate() + 1;
            var sm = $scope.start_date.getMonth() + 1; //January is 0!
            var em = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyy = $scope.start_date.getFullYear();
            var eeyy = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sd < 10) {
                sd = '0' + sd
            }
            if (sm < 10) {
                sm = '0' + sm
            }
            if (ed < 10) {
                ed = '0' + ed
            }
            if (em < 10) {
                em = '0' + em
            }
            ////////////////////////////////////////////
            var start = ssyy + '-' + sm + '-' + sd;
            var end = eeyy + '-' + em + '-' + (ed);
            ///////////////////////////////////////

            var params = {
                start_date: start,
                end_date  : end
            };
            
            dataHandler.getTransactions(params)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    //


                    $scope.transactions = data.transactions;
                    dataHandler.getAllUsers2()
                        .then(function (data) {
                            // 
                            $scope.loading = false;
                            $scope.allUsers = data.users;
                            $scope.transactions2 = [];

                            for (var i = 0; i < $scope.transactions.length; i++) {

                                var result = $.grep($scope.allUsers, function (e) {
                                    try {
                                        return e.id === $scope.transactions[i].administratorId.id;
                                    } catch (ex) {
                                        
                                    }
                                });
                                $scope.transactions[i].administratorId = result[0];


                            }

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning');
                        })

                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }
        if ($scope.start_date.getTime() === $scope.end_date.getTime()) {
            $scope.transactions = []


            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate() + 1;
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede);
            ///////////////////////////////////////

            var paramse = {
                start_date: starte,
                end_date  : ende
            };
            dataHandler.getTransactions(paramse)
                .then(function (data) {

                    $scope.displayedDate = $scope.start_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    //
                    $scope.transactions = data.transactions;


                    dataHandler.getAllUsers2()
                        .then(function (data) {
                            // 
                            $scope.loading = false;
                            $scope.allUsers = data.users;
                            $scope.transactions2 = [];

                            for (var i = 0; i < $scope.transactions.length; i++) {

                                var result = $.grep($scope.allUsers, function (e) {
                                    try {
                                        return e.id === $scope.transactions[i].administratorId.id;
                                    } catch (ex) {
                                        
                                    }
                                });
                                $scope.transactions[i].administratorId = result[0];


                            }

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning');
                        })

                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }

    };
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $scope.refreshTransactions = function () {
        $scope.loading = true;
        dataHandler.getTransactions()
            .then(function (data) {
                
                $scope.transactions = data.transactions;
                $scope.loading = false;

            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });
    };


    $scope.open = function (transaction) {
        $('#transactionInfo').openModal();
        $scope.transactionInfo = transaction;


        $scope.viewTransactionFile = function () {
            $scope.transactionFile = true;
            $scope.transactionInfoTable = false;
        };

        $scope.backToTransactionList = function () {
            $scope.transactionFile = false;
            $scope.transactionInfoTable = true;
        }
    };

    $scope.makeBusinessListCsv = function (filtered) {
        var csv_filtered = [];

        var product = function (entry) {
            try {
                return entry.productId.name
            } catch (e) {
                return '-';
            }

        };
        var agentName = function (entry) {
            try {
                return entry.agentId.name
            } catch (e) {
                return '-';
            }

        };
        var agentAccount = function (entry) {
            try {
                return entry.agentId.account
            } catch (e) {
                return '-';
            }

        };
        var agentBalance = function (entry) {
            try {
                return entry.agentBalance
            } catch (e) {
                return '-';
            }

        };
        var clientName = function (entry) {
            try {
                return (entry.clientId.firstname + ' ' + entry.clientId.lastname)
            } catch (e) {
                return '-';
            }

        };
        var clientAccount = function (entry) {
            try {
                return entry.clientId.account
            } catch (e) {
                return '-';
            }

        };
        var clientMobile = function (entry) {
            try {
                return entry.clientId.mobile
            } catch (e) {
                return '-';
            }

        };
        var clientBalance = function (entry) {
            try {
                return entry.clientBalance
            } catch (e) {
                return '-';
            }

        };

        var amount = function (entry) {
            try {
                return entry.amount
            } catch (e) {
                return '-';
            }

        };
        var debit = function (entry) {
            try {
                return entry.credit
            } catch (e) {
                return '-';
            }

        };
        var credit = function (entry) {
            try {
                return entry.debit
            } catch (e) {
                return '-';
            }

        };
        var commission = function (entry) {
            try {
                return entry.commission
            } catch (e) {
                return '-';
            }

        };

        var bill_reference = function (entry) {
            try {
                return ('_' + entry.billid + '_')
            } catch (e) {
                return '-';
            }

        };

        var voucher = function (entry) {
            try {
                return ('_' + entry.voucher + '_')
            } catch (e) {
                return '-';
            }


        };

        var comment = function (entry) {
            try {
                return (entry.comments)
            } catch (e) {
                return '-';
            }


        };
        csv_filtered.push(
            {
                date          : 'Date',
                ref           : 'Reference',
                src           : 'Source Account',
                dest          : 'Destination Account',
                description   : 'Description',
                product       : 'Product',
                agent         : 'Agent',
                agent_account : 'Agent Account',
                agent_balance : 'Agent Balance',
                client        : 'Client',
                client_mobile : 'Client Mobile',
                client_account: 'Client Account',
                client_balance: 'Client Balance',
                amount        : 'Amount',
                debit         : 'Debit',
                credit        : 'Credit',
                commission    : 'Commission',
                bill_reference: 'Bill Reference',
                voucher       : 'Voucher',
                comment       : 'Comment'


            }
        );
        filtered.forEach(function (entry) {
            csv_filtered.push(
                {
                    date          : entry.date,
                    ref           : entry.id,
                    src           : entry.source,
                    dest          : entry.destination,
                    description   : entry.description,
                    product       : product(entry),
                    agent         : agentName(entry),
                    agent_account : agentAccount(entry),
                    agent_balance : agentBalance(entry),
                    client        : clientName(entry),
                    client_mobile : clientMobile(entry),
                    client_account: clientAccount(entry),
                    client_balance: clientBalance(entry),
                    amount        : amount(entry),
                    debit         : debit(entry),
                    credit        : credit(entry),
                    commission    : commission(entry),
                    bill_reference: bill_reference(entry),
                    voucher       : voucher(entry),
                    comment       : comment(entry)


                }
            );

        });
        return csv_filtered;
    }

});


//Handles Adding Devices
adminApp.controller('addDeviceController', function ($scope, dataHandler, fileUpload, $http) {
    $scope.imei = '';
    $scope.alias = '';
    $scope.device_statuses = '';
    $scope.platform = '';
    $scope.device_submit = true;
    $scope.device_loader = false;
    $scope.postDevice = function () {
        $scope.device_submit = false;
        $scope.device_loader = true;
        var post = {
            imei    : $scope.imei,
            name    : $scope.alias,
            status  : $scope.device_statuses,
            platform: $scope.platform
        };


        dataHandler.addDevice(post)
            .then(function (data) {
                $scope.device_submit = true;
                $scope.device_loader = false;
                var dataResponse = data[0];
                swal('', dataResponse.description, 'info');
                $('#addDeviceForm').trigger('reset')
            }, function (error) {
                swal('', 'Something Went Wrong, Please Try Again', 'warning');
            })
    }

});

//Handles Getting Devices
adminApp.controller('viewDevicesController', function ($scope, dataHandler) {
    $scope.loading = true;
    dataHandler.getDevices()
        .then(function (data) {
            $scope.loading = false;
            $scope.devices = data.devices;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.refreshDevices = function () {
        $scope.loading = true;
        dataHandler.getDevices()
            .then(function (data) {
                $scope.loading = false;
                $scope.devices = data.devices;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong, Please Try Again', 'warning');

            });
    }

    $scope.open = function (device) {
        if (device.status == 'ACTIVE') {
            swal({
                    title              : "BLOCK DEVICE?",
                    text               : "IMEI: " + device.imei +
                    "<br>ALIAS: " + device.name +
                    "<br>OWNER: " + device.agentId.name,
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    html               : true,
                    allowOutsideClick  : true,
                    allowEscapeKey     : true
                },
                function () {
                    var params = {
                        id: device.id
                    };
                    dataHandler.deleteDevice(params)
                        .then(function (data) {
                            
                        }, function (error) {
                            
                        })
                });
        } else {
            
        }
    }
});


//ADD PRODUCT
adminApp.controller('addProductController', function ($scope, dataHandler) {
    $scope.submit_button = true;
    $scope.progress_indicator = false;
    dataHandler.getBillers()
        .then(function (data) {
            
            $scope.billers = data.billers;

        }, function (error) {
            $scope.loading = false;
            console.error(error)
        });

    dataHandler.getfandc()
        .then(function (data) {
            
            $scope.fandc = data.feesAndCommmissions

        }, function (error) {
            
        });

    $scope.billerID = '';
    $scope.productName = '';
    $scope.productCategory = '';
    $scope.agentCommission = '';
    $scope.preauthCustomerInfo = '';
    $scope.postPayment = '';
    $scope.billReference = '';
    $scope.billReferenceFormat = '';
    $scope.billMask = '';
    $scope.addProductForm = '';
    $scope.clientSMS = false;
    $scope.pinless = false;
    $scope.maxPinless = '';
    $scope.postProduct = function () {
        $scope.submit_button = false;
        $scope.progress_indicator = true;
        var post = {
            billerID    : $scope.billerID,
            name        : $scope.productName,
            category    : $scope.productCategory,
            commission  : $scope.agentCommission,
            voucherLabel: $scope.preauthCustomerInfo,
            apiUrl      : $scope.postPayment,
            billidLabel : $scope.billReference,
            billidFormat: $scope.billReferenceFormat,
            billidMask  : $scope.billMask,
            fandc       : $('#fandc').val(),
            clientSms   : $scope.clientSMS,
            pinless     : $scope.pinless,
            maxPinless  : $scope.maxPinless
        };

        dataHandler.addProduct(post)
            .then(function (data) {
                swal('', data[0].description, 'info');
                $scope.submit_button = true;
                $scope.progress_indicator = false;
            }, function (error) {
                $scope.submit_button = true;
                $scope.progress_indicator = false;
                swal('Oops', 'Something Went Wrong. Please try again', 'error');
            })
    }
});


adminApp.controller('getProductsController', function ($scope, dataHandler) {
    $scope.loading = true;
    $scope.productUpdateInfo = false;
    $scope.productInfoTable = true;
    $scope.productTransactionInfo = false;
    $scope.progress_indicator = false;
    $scope.productState = '';
    $scope.transactionFile = false;
    $scope.settleProductPage = false;


    dataHandler.getProducts()
        .then(function (data) {
            
            $scope.loading = false;
            $scope.products = data.products;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });
    dataHandler.getfandc()
        .then(function (data) {
            
            $scope.fandc = data.feesAndCommmissions

        }, function (error) {
            
        });

    $scope.refreshProducts = function () {
        $scope.loading = true;

        dataHandler.getProducts()
            .then(function (data) {
                $scope.loading = false;
                $scope.products = data.products;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });
    };
    dataHandler.getTransactionTypes()
        .then(function (data) {
            $scope.trans_types = data.transactionTypes
        }, function (error) {
            
        });

    $scope.open = function (product) {
        $('#productInfo').openModal();
        $scope.loading = false;
        $scope.productInfo = product;
        $scope.productState = product.state;


        $scope.updatedProduct = {
            productName        : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.productName = newName) : $scope.productInfo.productName;
            },
            productCategory    : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.productCategory = newName) : $scope.productInfo.productCategory;
            },
            agentCommission    : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.agentCommission = newName) : $scope.productInfo.agentCommission;
            },
            preauthCustomerInfo: function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.preauthCustomerInfo = newName) : $scope.productInfo.preauthCustomerInfo;
            },
            postPayment        : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.postPayment = newName) : $scope.productInfo.postPayment;
            },
            billReference      : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.billReference = newName) : $scope.productInfo.billReference;
            },
            billReferenceFormat: function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.billReferenceFormat = newName) : $scope.productInfo.billReferenceFormat;
            }
            ,
            billidMask         : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.billMask = newName) : $scope.productInfo.billidMask;
            },
            fc                 : function (newName) {
                return angular.isDefined(newName) ? ($scope.productInfo.feesAndCommissionsId.id = newName) : $scope.productInfo.feesAndCommissionsId.id;
            }
        };


    };

    $scope.updateProduct = function (product) {

        $scope.productInfoTable = false;
        $scope.productUpdateInfo = true;
        $scope.productTable = false;
        $scope.productUpdateInfo = true;
        $scope.submit_button = true;
        $scope.billerID = $scope.productInfo.billerId;


    };

    $scope.submitUpdatedProduct = function () {
        $scope.progress_indicator = true;
        $scope.submit_button = false;
        var post = {
            billerId    : $scope.productInfo.billerId.id,
            id          : $scope.productInfo.id,
            name        : $scope.productInfo.name,
            category    : $scope.productInfo.category,
            commission  : $scope.productInfo.commission,
            voucherLabel: $scope.productInfo.voucherLabel,
            apiUrl      : $scope.productInfo.apiUrl,
            billidLabel : $scope.productInfo.billidLabel,
            billidFormat: $scope.productInfo.billidFormat,
            billMask    : $scope.productInfo.billidMask,
            state       : $scope.productState,
            balance     : $scope.productInfo.balance,
            clientSms   : $scope.productInfo.clientSMS,
            pinless     : $scope.productInfo.pinless,
            maxPinless  : $scope.productInfo.maxPinless,
            menuDisplay : $scope.productInfo.menuDisplay,
            billIdLength: 50
        };
        
        dataHandler.updateProduct(post)
            .then(function (data) {
                
                $scope.progress_indicator = false;
                $scope.submit_button = true;
                $('#updateProduct').trigger('reset');
                $scope.productInfoTable = true;
                $scope.productUpdateInfo = false;
                swal('', data[0].description, 'info');
                dataHandler.getProducts()
                    .then(function (data) {
                        $scope.loading = false;
                        $scope.products = data.products;
                    }, function (error) {
                        $scope.loading = false;
                        swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                    });

            }, function (error) {
                $('#updateProduct').trigger('reset');
                $scope.progress_indicator = false;
                $scope.submit_button = true;
                swal('', 'Something Went Wrong. Please Try Again');
                $scope.productInfoTable = true;
                $scope.productUpdateInfo = false;
                dataHandler.getProducts()
                    .then(function (data) {
                        $scope.loading = false;
                        $scope.products = data.products;
                    }, function (error) {
                        $scope.loading = false;
                        swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                    });

            });

    };

    $scope.viewTransactions = function () {
        $scope.productInfoTable = false;
        $scope.productTransactionInfo = true;
        ///////////////////////////////////////////////////////////////////////////////////////
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        var end = yyyy + '-' + mm + '-' + (dd + 1);
        $scope.displayedDate = new Date().toDateString();
        $scope.todayParams = {
            id        : $scope.productInfo.id,
            start_date: today,
            end_date  : end
        };
        dataHandler.getProductTransactions($scope.todayParams)
            .then(function (data) {
                
                $scope.transactions = data.transactions;
            }, function (error) {
                
            });
        /////////////////////////////////////////////////////////////////////////////////////////
        $scope.searchByDate = function () {
            $scope.loader = true;
            $scope.search_icon = false;

            $scope.statement = '';

            if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
                $scope.loader = false;
                $scope.search_icon = true;

                swal('', 'Invalid Date Range!', 'warning');
            }
            if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
                /////////////////////////////////////////////
                var sd = $scope.start_date.getDate();
                var ed = $scope.end_date.getDate() + 1;
                var sm = $scope.start_date.getMonth() + 1; //January is 0!
                var em = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyy = $scope.start_date.getFullYear();
                var eeyy = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sd < 10) {
                    sd = '0' + sd
                }
                if (sm < 10) {
                    sm = '0' + sm
                }
                if (ed < 10) {
                    ed = '0' + ed
                }
                if (em < 10) {
                    em = '0' + em
                }
                ////////////////////////////////////////////
                var start = ssyy + '-' + sm + '-' + sd;
                var end = eeyy + '-' + em + '-' + (ed);
                ///////////////////////////////////////

                var params = {
                    id        : $scope.productInfo.id,
                    start_date: start,
                    end_date  : end
                };
                
                dataHandler.getProductTransactions(params)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;

                        $scope.transactions = data.transactions;
                        

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }
            if ($scope.start_date.getTime() == $scope.end_date.getTime()) {



                /////////////////////////////////////////////
                var sde = $scope.start_date.getDate();
                var ede = $scope.end_date.getDate();
                var sme = $scope.start_date.getMonth() + 1; //January is 0!
                var eme = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyye = $scope.start_date.getFullYear();
                var eeyye = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sde < 10) {
                    sde = '0' + sde
                }
                if (sme < 10) {
                    sme = '0' + sme
                }
                if (ede < 10) {
                    ede = '0' + ede
                }
                if (eme < 10) {
                    eme = '0' + eme
                }
                ////////////////////////////////////////////
                var starte = ssyye + '-' + sme + '-' + sde;
                var ende = eeyye + '-' + eme + '-' + (ede + 1);
                ///////////////////////////////////////

                var paramse = {
                    id        : $scope.productInfo.id,
                    start_date: starte,
                    end_date  : ende
                };
                dataHandler.getProductTransactions(paramse)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;
                        
                        $scope.transactions = data.transactions;

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }

        }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $scope.openTransaction = function (transaction) {
            $('#transactionInfo').openModal();
            $scope.transactionInfo = transaction;
            
        };
        $scope.viewTransactionFile = function () {
            $scope.productTransactionInfo = false;
            $scope.transactionFile = true;
        }

        $scope.backToTransactionList = function () {
            $scope.productTransactionInfo = true;
            $scope.transactionFile = false;
        }

        $scope.transactionLimit = function () {
            $('#modal1').openModal()
        };

        $scope.addTransactionLimit = function () {

            $scope.transactionTypeId > 0 ? $scope.type = 'single' : $scope.type = '';
            var params = {
                productId        : $scope.productInfo.id,
                transactionTypeId: $scope.transactionTypeId,
                dailyLimit       : $scope.dailyLimit,
                monthlyLimit     : $scope.monthlyLimit,
                minSessionLimit  : $scope.minSessionLimit,
                maxSessionLimit  : $scope.maxSessionLimit,
                type             : $scope.type
            };

            dataHandler.addTransactionLimits(params)
                .then(function (data) {
                    $('#transactionLimitsForm').trigger('reset');
                    swal('', data[0].description, 'info')
                }, function (error) {
                    swal('', 'Something went wrong. Please Try Again', 'warning')
                    
                })
        }


    };

    $scope.makeProductTransactionListCsv = function (filtered) {
        var csv_filtered = [];

        var product = function (entry) {
            try {
                return entry.productId.name
            } catch (e) {
                return '-';
            }

        };
        var agentName = function (entry) {
            try {
                return entry.agentId.name
            } catch (e) {
                return '-';
            }

        };
        var agentAccount = function (entry) {
            try {
                return entry.agentId.account
            } catch (e) {
                return '-';
            }

        };
        var clientName = function (entry) {
            try {
                return (entry.clientId.firstname + ' ' + entry.clientId.lastname)
            } catch (e) {
                return '-';
            }

        };

        var clientMobile = function (entry) {
            try {
                return entry.clientId.mobile
            } catch (e) {
                return '-';
            }

        };

        var clientAccount = function (entry) {
            try {
                return entry.clientId.account
            } catch (e) {
                return '-';
            }

        };
        var amount = function (entry) {
            try {
                return entry.amount
            } catch (e) {
                return '-';
            }

        };
        var debit = function (entry) {
            try {
                return entry.credit
            } catch (e) {
                return '-';
            }

        };
        var credit = function (entry) {
            try {
                return entry.debit
            } catch (e) {
                return '-';
            }

        };

        var commission = function (entry) {
            try {
                return entry.commission
            } catch (e) {
                return '-';
            }

        };

        var bill_reference = function (entry) {
            try {
                return ('_' + entry.billid + '_')
            } catch (e) {
                return '-';
            }

        };

        var voucher = function (entry) {
            try {
                return ('_' + entry.voucher + '_')
            } catch (e) {
                return '-';
            }

        };

        var product_balance = function (entry) {
            try {
                return entry.productBalance
            } catch (e) {
                return '-';
            }

        };

        csv_filtered.push(
            {
                date           : 'Date',
                ref            : 'Reference',
                src            : 'Source Account',
                dest           : 'Destination Account',
                description    : 'Description',
                product        : 'Product',
                agent          : 'Agent',
                agent_account  : 'Agent Account',
                client         : 'Client',
                client_mobile  : 'Client Mobile',
                client_account : 'Client Account',
                amount         : 'Amount',
                debit          : 'Debit',
                credit         : 'Credit',
                commission     : 'Commission',
                bill_reference : 'Bill Reference',
                voucher        : 'Voucher',
                product_balance: 'Product Balance'

            }
        );

        filtered.forEach(function (entry) {
            csv_filtered.push(
                {
                    date           : entry.date,
                    ref            : entry.id,
                    src            : entry.source,
                    dest           : entry.destination,
                    description    : entry.description,
                    product        : product(entry),
                    agent          : agentName(entry),
                    agent_account  : agentAccount(entry),
                    client         : clientName(entry),
                    client_mobile  : clientMobile(entry),
                    client_account : clientAccount(entry),
                    amount         : amount(entry),
                    debit          : debit(entry),
                    credit         : credit(entry),
                    commission     : commission(entry),
                    bill_reference : bill_reference(entry),
                    voucher        : voucher(entry),
                    product_balance: product_balance(entry)


                }
            );

        });

        return csv_filtered;
    }


    $scope.settleProduct = function (product) {
        $('#productInfo').closeModal();

        swal({
            title            : "Settle?",
            text             : product.name +
            "<br>" + formatter.format(product.balance),
            type             : "info",
            showCancelButton : true,
            closeOnConfirm   : true,
            confirmButtonText: "Settle",
            html             : 'true',
            allowEscKey      : true,
            allowOutsideClick: true
        }, function () {
            var obj1 = {"product_id": product.id};
            dataHandler.settleProduct(obj1)
                .then(function (data) {
                    swal(" ", (data.description), "info");
                    dataHandler.getProducts()
                        .then(function (data) {
                            
                            $scope.loading = false;
                            $scope.products = data.products;
                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });

                }, function (error) {
                    swal(" ", 'Unknown error fetching data', "error");
                })
        });
    };

    $scope.showSettleProduct = function (product) {
        $('#productInfo').closeModal();
        $scope.productInfoTable = false;
        $scope.settleProductPage = true;

    };

    $scope.backToListFromSettle = function () {
        $scope.productInfoTable = true;
        $scope.settleProductPage = false;
    };


    $scope.deleteProduct = function (product) {
        $('#productInfo').closeModal();

        swal({
            title             : "Confirm Delete?",
            text              : "Are you sure that you want to delete " + product.name + '?',
            type              : "warning",
            showCancelButton  : true,
            closeOnConfirm    : true,
            confirmButtonText : "Yes, delete it!",
            confirmButtonColor: "#ec6c62"
        }, function () {
            var obj1 = {"product_id": product.id};
            dataHandler.deactivateProduct(obj1)
                .then(function (data) {
                    swal(" ", (data.description), "info");
                    dataHandler.getProducts()
                        .then(function (data) {
                            
                            $scope.loading = false;
                            $scope.products = data.products;
                            // alert(data.products.toString());
                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });

                }, function (error) {
                    swal(" ", 'Unknown error fetching data', "error");
                })
        });
    };

    $scope.activateProduct = function (product) {
        $('#productInfo').closeModal();
        swal({
            title              : "Confirm Activation?",
            text               : "Are you sure that you want to activate " + product.name + '?',
            type               : "info",
            showCancelButton   : true,
            closeOnConfirm     : true,
            confirmButtonText  : "Yes, activate it!",
            confirmButtonColor : "#00e676",
            showLoaderOnConfirm: true,
            allowEscapeKey     : true,
            allowOutsideClick  : true
        }, function () {
            var post = {
                billerId    : $scope.productInfo.billerId.id,
                id          : $scope.productInfo.id,
                name        : $scope.productInfo.name,
                category    : $scope.productInfo.category,
                commission  : $scope.productInfo.commission,
                voucherLabel: $scope.productInfo.voucherLabel,
                apiUrl      : $scope.productInfo.apiUrl,
                billidLabel : $scope.productInfo.billidLabel,
                billidFormat: $scope.productInfo.billidFormat,
                billMask    : $scope.productInfo.billidMask,
                state       : 'ACTIVE',
                balance     : $scope.productInfo.balance,
                clientSms   : $scope.productInfo.clientSMS,
                pinless     : $scope.productInfo.pinless,
                maxPinless  : $scope.productInfo.maxPinless,
                menuDisplay : $scope.productInfo.menuDisplay,
                billIdLength: 50


            };
            
            dataHandler.updateProduct(post)
                .then(function (data) {
                    
                    swal(" ", data[0].description, "info");
                    dataHandler.getProducts()
                        .then(function (data) {
                            
                            $scope.loading = false;
                            $scope.products = data.products;
                            // alert(data.products.toString());
                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });

                }, function (error) {
                    swal(" ", 'Unknown error fetching data', "error");
                })
        });

    };

    $scope.backToProductList = function () {
        dataHandler.getProducts()
            .then(function (data) {
                
                $scope.loading = false;
                $scope.products = data.products;
                //
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });
        $scope.productInfoTable = true;
        $scope.productUpdateInfo = false;
    }

    $scope.backToListFromTransactions = function () {
        $scope.productTransactionInfo = false;
        $scope.productInfoTable = true;
        $('#dateSearchForm').trigger('reset');
        $scope.dateSearch = false;
    }

    $scope.topupFloat = function (product) {
        swal({
                title              : "Confirm Topup Transaction",
                text               : "Product Name : " + product.name +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    action: 'topup',
                    amount: $scope.evalueFloat,
                    id    : product.id
                };
                dataHandler.settleProduct(params)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $('#manageFloatForm').trigger('reset')
                    }, function (error, status) {
                        
                        

                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };

    $scope.reduceFloat = function (product) {
        swal({
                title              : "Confirm Reduction Transaction",
                text               : "Product Name : " + product.name +
                "<br> Float Amount: " + formatter.format($scope.evalueFloat),
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                html               : true
            },
            function () {
                var params = {
                    action: 'reduce',
                    amount: $scope.evalueFloat,
                    id    : product.id
                };
                dataHandler.settleProduct(params)
                    .then(function (data) {
                        
                        swal('', data.description, 'info');
                        $('#manageFloatForm').trigger('reset')
                    }, function (error) {
                        

                        swal('', 'Something Went Wrong. Please Try Again', 'warning')

                    })
            });
    };

    $scope.addData = function (product) {
        $('#productAddData').openModal();
        $('#productInfo').closeModal();


    }


});


//Handles Adding Billers
adminApp.controller('addBillerController', function ($scope, dataHandler) {
    $scope.billerName = '';
    $scope.billerAddress = '';
    $scope.billerMobile = '';
    $scope.billerCompany = '';
    $scope.billerEmail = '';
    $scope.billerLandline = '';
    $scope.billerState = '';
    $scope.billerCompany = '';
    $scope.submit_button = true;
    $scope.progress_indicator = false;

    $scope.postBiller = function () {
        $scope.submit_button = false;
        $scope.progress_indicator = true;

        var post = {
            account  : $scope.billerName,
            address  : $scope.billerAddress,
            cellphone: $scope.billerMobile,
            email    : $scope.billerEmail,
            landline : $scope.billerLandline,
            state    : $scope.billerState
        };

        var params = $scope.billerName + '/' + $scope.billerAddress + '/' + $scope.billerMobile
            + '/' + $scope.billerEmail + '/' + $scope.billerLandline;


        dataHandler.addBiller(params)
            .then(function (data) {
                var dataResponse = data[0];
                //alert(dataResponse.code);
                
                $scope.submit_button = true;
                $scope.progress_indicator = false;
                if (dataResponse.description == 'Biller Added successfully') {
                    swal('', 'Biller Added Successfully', 'success');

                    $('#addBillerForm').trigger("reset");
                }
                else {
                    swal(" ", dataResponse.description, "error");
                }
            }, function (error) {
                swal('', 'Something Went Wrong', 'error');
                // $('#addBillerForm').trigger("reset");
                $scope.submit_button = true;
                $scope.progress_indicator = false;
            })
    }
});

//START

adminApp.controller('adjustmentsController', function ($scope, dataHandler) {
    $scope.source_mode = 0;
    $scope.dest_mode = 0;
    $scope.destsubMobile = '';
    $scope.srcclients = '';
    $scope.srcclients = [];
    $scope.destclients = [];
    $scope.subadjAmount = 0;
    $scope.busadjAmount = 0;
    $scope.billadjAmount = 0;
    $scope.dest_business = null;
    $scope.dest_biller = null;
    $scope.source_business = null;
    $scope.source_biller = null;
    $scope.loader = false;


    dataHandler.getBusiness()
        .then(function (data) {
            
            $scope.agents = data.agents
        }, function (error) {
            
        });
    dataHandler.getProducts()
        .then(function (data) {
            
            $scope.products = data.products
        }, function (error) {
            
        });
    dataHandler.getPendingAdjustments()
        .then(function (data) {
            $scope.transactions = data.transactions;
            
            dataHandler.getAllUsers2()
                .then(function (data) {
                    
                    $scope.loading = false;
                    $scope.allUsers = data.users;
                    $scope.transactions2 = [];

                    for (var i = 0; i < $scope.transactions.length; i++) {

                        var result = $.grep($scope.allUsers, function (e) {
                            return e.id == $scope.transactions[i].administratorId.id;
                        });
                        $scope.transactions[i].administratorId = result[0];

                    }

                }, function (error) {
                    
                })
        }, function (error) {
            
        });


    $scope.searchSubscriber = function () {
        $scope.srcclients = [];
        var subMobile = '';
        var pre = '263';
        if (($scope.subMobile.startsWith('263')) && ($scope.subMobile.length == 12)) {
            subMobile = $scope.subMobile
        }
        if (($scope.subMobile.startsWith('0')) && ($scope.subMobile.length == 10)) {
            subMobile = $scope.subMobile;
            subMobile = subMobile.replace(subMobile.charAt(0), pre);
        }
        if (($scope.subMobile.startsWith('7')) && ($scope.subMobile.length == 9)) {
            subMobile = pre.concat($scope.subMobile)
        }
        var params = {
            mobile: subMobile
        };
        
        dataHandler.getClient(params)
            .then(function (data) {

                
                $scope.srcclients.push(data.client);
                
                if ($scope.srcclients[0] == null) {
                    swal('', 'No Subscriber Found!', 'warning');
                }
            }, function (error) {
                
            })
    };
    $scope.searchDestSubscriber = function () {
        $scope.destclients = [];
        var subMobile = '';
        var pre = '263';
        if (($scope.destsubMobile.startsWith('263')) && ($scope.destsubMobile.length == 12)) {
            subMobile = $scope.destsubMobile
        }
        if (($scope.destsubMobile.startsWith('0')) && ($scope.destsubMobile.length == 10)) {
            subMobile = $scope.destsubMobile;
            subMobile = subMobile.replace(subMobile.charAt(0), pre);
        }
        if (($scope.destsubMobile.startsWith('7')) && ($scope.destsubMobile.length == 9)) {
            subMobile = pre.concat($scope.destsubMobile)
        } else {
            subMobile = $scope.destsubMobile
        }
        var params = {
            mobile: subMobile
        };
        
        dataHandler.getClient(params)
            .then(function (data) {

                
                $scope.destclients.push(data.client);
                
                if ($scope.destclients[0] == null) {
                    swal('', 'No Subscriber Found!', 'warning');
                }
            }, function (error) {
                
            })
    };
    $scope.confirmAdjustment = function () {
        
        if ($scope.source_mode == 'subscriber' && $scope.dest_mode == 'subscriber') {
            if ($scope.subadjAmount == 0 || $scope.subadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;
                var params1 = {
                    amount     : $scope.subadjAmount,
                    source     : $scope.srcclients[0].account,
                    destination: $scope.destclients[0].account,
                    comment    : $scope.comment
                };
                
                dataHandler.initiateAdjustment(params1)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })

            }

        }
        if ($scope.source_mode == 'subscriber' && $scope.dest_mode == 'business') {
            if ($scope.subadjAmount == 0 || $scope.subadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params2 = {
                    amount     : $scope.subadjAmount,
                    source     : $scope.srcclients[0].account,
                    destination: $scope.dest_business.account,
                    comment    : $scope.comment


                };
                
                dataHandler.initiateAdjustment(params2)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;


                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;

                    })

            }

        }
        if ($scope.source_mode == 'subscriber' && $scope.dest_mode == 'biller') {
            if ($scope.subadjAmount == 0 || $scope.subadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params3 = {
                    amount     : $scope.subadjAmount,
                    source     : $scope.srcclients[0].account,
                    destination: $scope.dest_biller.account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params3)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;

                    }, function (error) {
                        
                        $scope.loader = false;

                    })
            }
        }
        if ($scope.source_mode == 'business' && $scope.dest_mode == 'subscriber') {
            if ($scope.busadjAmount == 0 || $scope.busadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params4 = {
                    amount     : $scope.busadjAmount,
                    source     : $scope.source_business.account,
                    destination: $scope.destclients[0].account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params4)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }

        }
        if ($scope.source_mode == 'business' && $scope.dest_mode == 'business') {

            if ($scope.busadjAmount == 0 || $scope.busadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params5 = {
                    amount     : $scope.busadjAmount,
                    source     : $scope.source_business.account,
                    destination: $scope.dest_business.account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params5)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }
        }
        if ($scope.source_mode == 'business' && $scope.dest_mode == 'biller') {

            if ($scope.busadjAmount == 0 || $scope.busadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params6 = {
                    amount     : $scope.busadjAmount,
                    source     : $scope.source_business.account,
                    destination: $scope.dest_biller.account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params6)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }
        }
        if ($scope.source_mode == 'biller' && $scope.dest_mode == 'subscriber') {
            if ($scope.billadjAmount == 0 || $scope.billadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params7 = {
                    amount     : $scope.billadjAmount,
                    source     : $scope.source_biller.account,
                    destination: $scope.destclients[0].account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params7)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }
        }
        if ($scope.source_mode == 'biller' && $scope.dest_mode == 'business') {
            if ($scope.billadjAmount == 0 || $scope.billadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params8 = {
                    amount     : $scope.billadjAmount,
                    source     : $scope.source_biller.account,
                    destination: $scope.dest_business.account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params8)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }
        }
        if ($scope.source_mode == 'biller' && $scope.dest_mode == 'biller') {
            if ($scope.billadjAmount == 0 || $scope.billadjAmount == null) {

                swal('', 'Insufficient Information Supplied', 'warning')
            }
            else {
                $scope.loader = true;

                var params9 = {
                    amount     : $scope.billadjAmount,
                    source     : $scope.source_biller.account,
                    destination: $scope.dest_biller.account,
                    comment    : $scope.comment

                };
                
                dataHandler.initiateAdjustment(params8)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        $scope.loader = false;
                        $('#adjustForm').trigger('reset');
                        $scope.srcclients = [];
                        $scope.destclients = [];
                        $scope.source_mode = 0;
                        $scope.dest_mode = 0;
                        $scope.dest_business = null;
                        $scope.dest_biller = null;
                        $scope.source_business = null;
                        $scope.source_biller = null;
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning');
                        $scope.loader = false;
                    })
            }
        }
        if ($scope.source_mode == 0) {
            swal('', 'INVALID INPUT', 'error');
            $scope.loader = false;
        }

    };

    $scope.refreshAdjustments = function () {
        dataHandler.getPendingAdjustments()
            .then(function (data) {
                $scope.transactions = data.transactions;
                
                dataHandler.getAllUsers2()
                    .then(function (data) {
                        
                        $scope.loading = false;
                        $scope.allUsers = data.users;
                        $scope.transactions2 = [];

                        for (var i = 0; i < $scope.transactions.length; i++) {

                            var result = $.grep($scope.allUsers, function (e) {
                                return e.id == $scope.transactions[i].administratorId.id;
                            });
                            $scope.transactions[i].administratorId = result[0];

                        }

                    }, function (error) {
                        
                    })
            }, function (error) {
                
            });
    };

    $scope.open = function (transaction) {
        $('#transactionInfo').openModal();

        $scope.transactionInfo = transaction;
    }
    $scope.validateTransaction = function () {
        swal({
                title              : "Validate Adjustment?",
                text               : "Destination Account: " + $scope.transactionInfo.destination +
                "<br> Amount: " + formatter.format($scope.transactionInfo.amount) +
                "<br> Comment: " + $scope.transactionInfo.comments +
                "<br>Initiated By: " + $scope.transactionInfo.administratorId.name,
                type               : "input",
                inputPlaceholder   : "Comment",
                showCancelButton   : true,
                confirmButtonColor : "#4CAF50",
                confirmButtonText  : "Validate",
                showLoaderOnConfirm: true,
                closeOnConfirm     : false,
                allowOutsideClick  : true,
                allowEscKey        : true,
                html               : true
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write a comment!");
                    return false
                }
                var params = {
                    trans_id: $scope.transactionInfo.id,
                    comment : inputValue
                };

                dataHandler.validateAdjustment(params)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        dataHandler.getPendingAdjustments()
                            .then(function (data) {
                                $scope.transactions = data.transactions;
                                
                                dataHandler.getAllUsers2()
                                    .then(function (data) {
                                        
                                        $scope.loading = false;
                                        $scope.allUsers = data.users;
                                        $scope.transactions2 = [];

                                        for (var i = 0; i < $scope.transactions.length; i++) {

                                            var result = $.grep($scope.allUsers, function (e) {
                                                return e.id == $scope.transactions[i].administratorId.id;
                                            });
                                            $scope.transactions[i].administratorId = result[0];

                                        }

                                    }, function (error) {
                                        
                                    })
                            }, function (error) {
                                
                            });

                    }, function (error) {
                        dataHandler.getPendingAdjustments()
                            .then(function (data) {
                                $scope.transactions = data.transactions;
                                
                                dataHandler.getAllUsers2()
                                    .then(function (data) {
                                        
                                        $scope.loading = false;
                                        $scope.allUsers = data.users;
                                        $scope.transactions2 = [];

                                        for (var i = 0; i < $scope.transactions.length; i++) {

                                            var result = $.grep($scope.allUsers, function (e) {
                                                return e.id == $scope.transactions[i].administratorId.id;
                                            });
                                            $scope.transactions[i].administratorId = result[0];

                                        }

                                    }, function (error) {
                                        
                                    })
                            }, function (error) {
                                
                            });
                    })
            }
        )
    }
    $scope.reverseTransaction = function () {
        swal({
                title              : "Reverse Adjustment?",
                text               : "Destination Account: " + $scope.transactionInfo.destination +
                "<br> Amount: " + formatter.format($scope.transactionInfo.amount) +
                "<br> Comment: " + $scope.transactionInfo.comments +
                "<br>Initiated By: " + $scope.transactionInfo.administratorId.name,
                type               : "input",
                showCancelButton   : true,
                confirmButtonColor : "#f44336",
                confirmButtonText  : "Reverse",
                showLoaderOnConfirm: true,
                closeOnConfirm     : false,
                allowOutsideClick  : true,
                allowEscKey        : true,
                html               : true
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write a comment!");
                    return false
                }
                var params = {
                    trans_id: $scope.transactionInfo.id,
                    comment : inputValue
                };

                dataHandler.reverseAdjustment(params)
                    .then(function (data) {
                        swal('', data.description, 'info');
                        dataHandler.getPendingAdjustments()
                            .then(function (data) {
                                $scope.transactions = data.transactions;
                                
                                dataHandler.getAllUsers2()
                                    .then(function (data) {
                                        
                                        $scope.loading = false;
                                        $scope.allUsers = data.users;
                                        $scope.transactions2 = [];

                                        for (var i = 0; i < $scope.transactions.length; i++) {

                                            var result = $.grep($scope.allUsers, function (e) {
                                                return e.id == $scope.transactions[i].administratorId.id;
                                            });
                                            $scope.transactions[i].administratorId = result[0];

                                        }

                                    }, function (error) {
                                        
                                    })
                            }, function (error) {
                                
                            });
                    }, function (error) {
                        
                        dataHandler.getPendingAdjustments()
                            .then(function (data) {
                                $scope.transactions = data.transactions;
                                
                                dataHandler.getAllUsers2()
                                    .then(function (data) {
                                        
                                        $scope.loading = false;
                                        $scope.allUsers = data.users;
                                        $scope.transactions2 = [];

                                        for (var i = 0; i < $scope.transactions.length; i++) {

                                            var result = $.grep($scope.allUsers, function (e) {
                                                return e.id == $scope.transactions[i].administratorId.id;
                                            });
                                            $scope.transactions[i].administratorId = result[0];

                                        }

                                    }, function (error) {
                                        
                                    })
                            }, function (error) {
                                
                            });
                    })

            }
        )
    }


});


angular.module("ngJustGage", [])
    .directive('justGage', ['$timeout', function ($timeout) {
        alert('test');
        return {
            restrict: 'EA',
            scope   : {
                id     : '@',
                class  : '@',
                min    : '=',
                max    : '=',
                title  : '@',
                value  : '=',
                options: '='
            },
            template: '<div id="{{id}}-justgage" class="{{class}}"></div>',
            link    : function (scope, element, attrs) {
                $timeout(function () {
                    var options = {
                        id   : scope.id + '-justgage',
                        min  : scope.min,
                        max  : scope.max,
                        title: scope.title,
                        value: scope.value
                    };
                    if (scope.options) {
                        for (var key in scope.options) {
                            options[key] = scope.options[key];
                        }
                    }
                    var graph = new JustGage(options);

                    scope.$watch('max', function (updatedMax) {
                        if (updatedMax !== undefined) {
                            graph.refresh(scope.value, updatedMax);
                        }
                    }, true);

                    scope.$watch('value', function (updatedValue) {
                        if (updatedValue !== undefined) {
                            graph.refresh(updatedValue);
                        }
                    }, true);
                });
            }
        };
    }]);

//END

adminApp.controller('getBillersController', function ($scope, dataHandler) {
    $scope.loading = true;
    $scope.billerInfoTable = true;
    $scope.billerEditPage = false;
    $scope.update_biller_submit = true;
    $scope.update_biller_progress = false;
    $scope.billerTransactionInfo = false;
    $scope.transactionFile = false;

    dataHandler.getBillers()
        .then(function (data) {
            
            $scope.loading = false;
            $scope.billers = data.billers;
        }, function (error) {
            $scope.loading = false;
            console.error(error)
        });

    $scope.refreshBillers = function () {
        $scope.loading = true;

        dataHandler.getBillers()
            .then(function (data) {
                
                $scope.loading = false;
                $scope.billers = data.billers;
            }, function (error) {
                $scope.loading = false;
                console.error(error)
            });
    }

    $scope.open = function (biller) {
        $('#billerInfo').openModal();
        $scope.billerInfo = biller;
        $scope.updatedBiller = {
            company  : function (newName) {
                return angular.isDefined(newName) ? ($scope.billerInfo.company = newName) : $scope.billerInfo.company;
            },
            email    : function (newName) {
                return angular.isDefined(newName) ? ($scope.billerInfo.email = newName) : $scope.billerInfo.email;
            },
            cellphone: function (newName) {
                return angular.isDefined(newName) ? ($scope.billerInfo.cellphone = newName) : $scope.billerInfo.cellphone;
            },
            address  : function (newName) {
                return angular.isDefined(newName) ? ($scope.billerInfo.address = newName) : $scope.billerInfo.address;
            },
            landline : function (newName) {
                return angular.isDefined(newName) ? ($scope.billerInfo.landline = newName) : $scope.billerInfo.landline;
            },


        };

    };

    $scope.backToBillerList = function () {
        $scope.billerInfoTable = true;
        $scope.billerEditPage = false;
        dataHandler.getBillers()
            .then(function (data) {
                
                $scope.loading = false;
                $scope.billers = data.billers;
            }, function (error) {
                $scope.loading = false;
                console.error(error)
            });

    }

    $scope.deleteBiller = function () {
        swal({
            title              : "Are you sure you want to delete " + $scope.billerInfo.company + " ?",
            text               : "",
            type               : "warning",
            showCancelButton   : true,
            confirmButtonColor : "#DD6B55",
            confirmButtonText  : "Yes, delete it!",
            showLoaderOnConfirm: true,
            closeOnConfirm     : false
        }, function () {
            var post = {
                'id': $scope.billerInfo.id
            };

            dataHandler.deleteBiller(post)
                .then(function (data) {
                    
                    swal('', data.description, 'info');
                    dataHandler.getBillers()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.billers = data.billers;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                }, function (error) {
                    
                    swal('', 'Something went wrong. Please try again', 'error');
                    dataHandler.getBillers()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.billers = data.billers;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                })
        });
    }

    $scope.editBiller = function () {
        $scope.billerInfoTable = false;
        $scope.billerEditPage = true;

    }

    $scope.submitUpdatedBiller = function () {
        $scope.update_biller_submit = false;
        $scope.update_biller_progress = true;

        var post = {
            id       : $scope.billerInfo.id,
            company  : $scope.billerInfo.company,
            address  : $scope.billerInfo.address,
            cellphone: $scope.billerInfo.cellphone,
            email    : $scope.billerInfo.email,
            landline : $scope.billerInfo.landline,
            state    : $scope.billerInfo.state
        };

        dataHandler.updateBiller(post)
            .then(function (data) {
                $scope.billerInfoTable = true;
                $scope.billerEditPage = false;
                $scope.update_biller_submit = true;
                $scope.update_biller_progress = false;
                swal('', data[0].description, 'info');
                dataHandler.getBillers()
                    .then(function (data) {
                        
                        $scope.loading = false;
                        $scope.billers = data.billers;
                    }, function (error) {
                        $scope.loading = false;
                        console.error(error)
                    });

            }, function (error) {

                $scope.billerInfoTable = true;
                $scope.billerEditPage = false;
                $scope.update_biller_submit = true;
                $scope.update_biller_progress = false;
                swal('', 'Something Went Wrong, Please Try Again', 'error');
                dataHandler.getBillers()
                    .then(function (data) {
                        
                        $scope.loading = false;
                        $scope.billers = data.billers;
                    }, function (error) {
                        $scope.loading = false;
                        console.error(error)
                    });

            })

    }

    $scope.viewTransactions = function () {
        $scope.billerTransactionInfo = true;
        $scope.billerInfoTable = false;


///////////////////////////////////////////////////////////////////////////////////////
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        var end = yyyy + '-' + mm + '-' + (dd + 1);
        $scope.displayedDate = new Date().toDateString();
        $scope.todayParams = {
            id        : $scope.billerInfo.id,
            start_date: today,
            end_date  : end
        };
        dataHandler.getBillerTransactions($scope.todayParams)
            .then(function (data) {
                
                $scope.transactions = data.transactions;
            }, function (error) {
                
            });
        /////////////////////////////////////////////////////////////////////////////////////////
        $scope.searchByDate = function () {
            $scope.loader = true;
            $scope.search_icon = false;

            $scope.statement = '';

            if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
                $scope.loader = false;
                $scope.search_icon = true;

                swal('', 'Invalid Date Range!', 'warning');
            }
            if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
                /////////////////////////////////////////////
                var sd = $scope.start_date.getDate();
                var ed = $scope.end_date.getDate() + 1;
                var sm = $scope.start_date.getMonth() + 1; //January is 0!
                var em = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyy = $scope.start_date.getFullYear();
                var eeyy = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sd < 10) {
                    sd = '0' + sd
                }
                if (sm < 10) {
                    sm = '0' + sm
                }
                if (ed < 10) {
                    ed = '0' + ed
                }
                if (em < 10) {
                    em = '0' + em
                }
                ////////////////////////////////////////////
                var start = ssyy + '-' + sm + '-' + sd;
                var end = eeyy + '-' + em + '-' + (ed);
                ///////////////////////////////////////

                var params = {
                    id        : $scope.billerInfo.id,
                    start_date: start,
                    end_date  : end
                };
                
                dataHandler.getBillerTransactions(params)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;

                        $scope.transactions = data.transactions;

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }
            if ($scope.start_date.getTime() == $scope.end_date.getTime()) {



                /////////////////////////////////////////////
                var sde = $scope.start_date.getDate();
                var ede = $scope.end_date.getDate();
                var sme = $scope.start_date.getMonth() + 1; //January is 0!
                var eme = $scope.end_date.getMonth() + 1; //January is 0!
                var ssyye = $scope.start_date.getFullYear();
                var eeyye = $scope.end_date.getFullYear();
                /////////////////////////////////////////////
                if (sde < 10) {
                    sde = '0' + sde
                }
                if (sme < 10) {
                    sme = '0' + sme
                }
                if (ede < 10) {
                    ede = '0' + ede
                }
                if (eme < 10) {
                    eme = '0' + eme
                }
                ////////////////////////////////////////////
                var starte = ssyye + '-' + sme + '-' + sde;
                var ende = eeyye + '-' + eme + '-' + (ede + 1);
                ///////////////////////////////////////

                var paramse = {
                    id        : $scope.billerInfo.id,
                    start_date: starte,
                    end_date  : ende
                };
                dataHandler.getBillerTransactions(paramse)
                    .then(function (data) {
                        $scope.displayedDate = $scope.start_date.toDateString();
                        $scope.loader = false;
                        $scope.search_icon = true;
                        
                        $scope.transactions = data.transactions;

                    }, function (error) {
                        swal('', 'Something Went Wrong, Please try Again', 'warning');
                    });
            }

        }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    };

    $scope.openTransaction = function (transaction) {
        $('#transactionInfo').openModal();
        $scope.transactionInfo = transaction;
        
    };

    $scope.viewTransactionFile = function () {
        $scope.billerTransactionInfo = false;
        $scope.transactionFile = true;
    }

    $scope.backToTransactionList = function () {
        $scope.billerTransactionInfo = true;
        $scope.transactionFile = false;
    }

    $scope.backToListFromTransactions = function () {
        $scope.billerTransactionInfo = false;
        $scope.billerInfoTable = true;
        $('#dateSearchForm').trigger('reset');
        $scope.dateSearch = false;
    }

    $scope.makeBusinessListCsv = function (filtered) {
        var csv_filtered = [];

        var product = function (entry) {
            try {
                return entry.productId.name
            } catch (e) {
                return '-';
            }

        };
        var agentName = function (entry) {
            try {
                return entry.agentId.name
            } catch (e) {
                return '-';
            }

        };
        var agentAccount = function (entry) {
            try {
                return entry.agentId.account
            } catch (e) {
                return '-';
            }

        };
        var clientName = function (entry) {
            try {
                return entry.clientId.name
            } catch (e) {
                return '-';
            }

        };
        var clientAccount = function (entry) {
            try {
                return entry.clientId.account
            } catch (e) {
                return '-';
            }

        };
        var amount = function (entry) {
            try {
                return entry.amount
            } catch (e) {
                return '-';
            }

        };
        var debit = function (entry) {
            try {
                return entry.credit
            } catch (e) {
                return '-';
            }

        };
        var credit = function (entry) {
            try {
                return entry.debit
            } catch (e) {
                return '-';
            }

        };
        var commission = function (entry) {
            try {
                return entry.commission
            } catch (e) {
                return '-';
            }

        };
        csv_filtered.push(
            {
                date          : 'Date',
                ref           : 'Reference',
                src           : 'Source Account',
                dest          : 'Destination Account',
                description   : 'Description',
                product       : 'Product',
                agent         : 'Agent',
                agent_account : 'Agent Account',
                client        : 'Client',
                client_account: 'Client Account',
                amount        : 'Amount',
                debit         : 'Debit',
                credit        : 'Credit',
                commission    : 'Commission'

            }
        );

        filtered.forEach(function (entry) {
            csv_filtered.push(
                {
                    date          : entry.date,
                    ref           : entry.id,
                    src           : entry.source,
                    dest          : entry.destination,
                    description   : entry.description,
                    product       : product(entry),
                    agent         : agentName(entry),
                    agent_account : agentAccount(entry),
                    client        : clientName(entry),
                    client_account: clientAccount(entry),
                    amount        : amount(entry),
                    debit         : debit(entry),
                    credit        : credit(entry),
                    commission    : commission(entry)


                }
            );

        });

        return csv_filtered;
    }

});

//Handles Getting, Updating, Deleting Banks
adminApp.controller('getBanksController', function ($scope, dataHandler) {
    $scope.loading = true;
    $scope.bankInfoTable = true;
    $scope.bankFile = false;
    $scope.editBankFile = false;
    $scope.update_bank_submit = true;
    $scope.update_bank_progress = false;
    dataHandler.getBanks()
        .then(function (data) {
            

            $scope.loading = false;
            $scope.banks = data.banks;

        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.refreshBanks = function () {
        $scope.loading = true;
        dataHandler.getBanks()
            .then(function (data) {
                
                $scope.loading = false;
                $scope.banks = data.banks;

            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            })
    };
    dataHandler.getClassofService()
        .then(function (data) {

            $scope.bankClassOfServices = data.bankClassOfServices;
            
        }, function (error) {
            
        });


    $scope.open = function (bank) {
        
        $('#bankInfo').openModal();

        $scope.bankInfo = bank;

        $scope.updatedBank = {
            name   : function (newName) {
                return angular.isDefined(newName) ? ($scope.bankInfo.name = newName) : $scope.bankInfo.name;
            },
            deposit: function (newName) {
                return angular.isDefined(newName) ? ($scope.bankInfo.deposit = newName) : $scope.bankInfo.deposit;
            }

        };


        $scope.submitUpdatedBank = function () {
            $scope.update_bank_submit = false;
            $scope.update_bank_progress = true;
            var post = {
                id                  : $scope.bankInfo.id,
                name                : $('#bankName').val(),
                deposit             : $('#bankDeposit').val(),
                account             : $scope.bankInfo.account,
                state               : $scope.bankInfo.state,
                bankClassOfServiceId: $('#class_of_service').val()

            };
            
            dataHandler.updateBank(post)
                .then(function (data) {
                    $scope.update_bank_submit = true;
                    $scope.update_bank_progress = false;
                    
                    swal('', data[0].description, 'info');
                    dataHandler.getBanks()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.banks = data.banks;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                    $scope.bankInfoTable = true;
                    $scope.editBankFile = false;

                }, function (err) {
                    $scope.update_bank_submit = true;
                    $scope.update_bank_progress = false;
                    swal('', 'Something Went Wrong, Please Try Again', 'error');
                    $scope.bankInfoTable = true;
                    $scope.editBankFile = false;
                    dataHandler.getBanks()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.banks = data.banks;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                });
        };

        $scope.viewBankFile = function () {
            $scope.bankFile = true;
            $scope.bankInfoTable = false;
        };
        $scope.editBank = function () {
            $scope.bankInfoTable = false;
            $scope.editBankFile = true;


        };
        $scope.deleteBank = function () {
            var post = {
                'id': $scope.bankInfo.id
            };
            
            swal({
                title             : "Are you sure you want to delete " + $scope.bankInfo.name + " ?",
                text              : "",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                closeOnConfirm    : false
            }, function () {
                dataHandler.deleteBank(post)
                    .then(function (data) {
                        
                        swal('', data.description, 'info');
                        dataHandler.getBanks()
                            .then(function (data) {
                                

                                $scope.loading = false;
                                $scope.banks = data.banks;

                            }, function (error) {
                                $scope.loading = false;
                                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                            });
                    }, function (error) {
                        
                        swal('', 'Something went wrong. Please try again', 'error');
                        dataHandler.getBanks()
                            .then(function (data) {
                                

                                $scope.loading = false;
                                $scope.banks = data.banks;

                            }, function (error) {
                                $scope.loading = false;
                                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                            });
                    })
            });

        };
        $scope.backToBankList = function () {
            $scope.bankFile = false;
            $scope.editBankFile = false;
            $scope.bankInfoTable = true;
        }
    };


});

//Handles Adding Banks
adminApp.controller('addBanksController', function ($scope, dataHandler) {
    dataHandler.getClassofService()
        .then(function (data) {

            $scope.bankClassOfServices = data.bankClassOfServices;
            
        }, function (error) {
            
        });

    $scope.submit_button = true;
    $scope.progress_indicator = false;
    $scope.bankName = '';
    $scope.bankDeposit = '';
    $scope.bankClassofService = '';

    $scope.postBank = function () {
        $scope.submit_button = false;
        $scope.progress_indicator = true;

        var post = {
            'name'                : $scope.bankName,
            'deposit'             : $scope.bankDeposit,
            'bankClassOfServiceId': $scope.bankClassofService
        };

        
        dataHandler.addBanks(post)
            .then(function (data) {
                
                $scope.submit_button = true;
                $scope.progress_indicator = false;
                $('#addBankForm').trigger('reset');
                swal('', data.description, 'info')
            }, function (error) {
                $('#addBankForm').trigger('reset');
                $scope.submit_button = true;
                $scope.progress_indicator = false;
                
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');

            })
    }


});

//Handles Adding Class of Service

adminApp.controller('addClassofServiceController', function ($scope, dataHandler) {
    dataHandler.getfandc()
        .then(function (data) {
            
            $scope.fandc = data.feesAndCommmissions

        }, function (error) {
            
        });

    $scope.personal_submit_progress = false;
    $scope.personal_submit = true;
    $scope.business_submit_progress = false;
    $scope.business_submit = true;
    $scope.bank_submit_progress = false;
    $scope.bank_submit = true;

    $scope.business_name = '';
    $scope.business_description = '';
    $scope.business_agency_banking = false;
    $scope.business_cash_in = false;
    $scope.business_cash_out = false;
    $scope.business_deposit_management = false;
    $scope.business_disbursement = false;
    $scope.business_enrollment = false;
    $scope.business_paybill = false;
    $scope.business_fnc_id = '';
    $scope.business_paymerchant = false;
    $scope.business_external_reference = false;
    $scope.business_external_url = '';

    $scope.bank_name = '';
    $scope.bank_external_url = '';
    $scope.bank_fnc_id = '';
    $scope.balance_enquiry = false;
    $scope.bank_deposit = false;
    $scope.bank_withdrawal = false;
    $scope.bank_statement = false;
    $scope.bank_transfer = false;

    $scope.personal_name = '';
    $scope.personal_description = '';
    $scope.personal_fnc_id = '';
    $scope.personal_e_reference = false;
    $scope.personal_external_url = '';


    $scope.business_class_of_service_submit = function () {
        $scope.business_submit = false;
        $scope.business_submit_progress = true;

        var business_class_of_service = {
            business_name              : $scope.business_name,
            business_description       : $scope.business_description,
            business_fnc_id            : $scope.business_fnc_id,
            business_agency_banking    : $scope.business_agency_banking,
            business_cash_in           : $scope.business_cash_in,
            business_cash_out          : $scope.business_cash_out,
            business_deposit_management: $scope.business_deposit_management,
            business_disbursement      : $scope.business_disbursement,
            business_enrollment        : $scope.business_enrollment,
            business_paybill           : $scope.business_paybill,
            business_paymerchant       : $scope.business_paymerchant,
            business_external_reference: $scope.business_external_reference,
            business_external_url      : $scope.business_external_url
        };

        
        dataHandler.addBusinessClassofService(business_class_of_service)
            .then(function (data) {
                
                $('#addBusinessClassofService').trigger('reset');
                $scope.business_submit_progress = false;
                $scope.business_submit = true;
                swal('', data.description, 'info');

            }, function (error) {
                $scope.business_submit_progress = false;
                $scope.business_submit = true;
                $('#addBusinessClassofService').trigger('reset');
                swal('', 'Something Went Wrong, Please Try Again', 'error');

                
            })
    };
    $scope.bank_class_of_service_submit = function () {
        $scope.bank_submit = false;
        $scope.bank_submit_progress = true;
        var bank_class_of_service = {
            bank_name        : $scope.bank_name,
            bank_external_url: $scope.bank_external_url,
            bank_fnc_id      : $scope.bank_fnc_id,
            bank_enquiry     : $scope.bank_enquiry,
            bank_deposit     : $scope.bank_deposit,
            bank_withdrawal  : $scope.bank_withdrawal,
            bank_statement   : $scope.bank_statement,
            bank_transfer    : $scope.bank_transfer
        };
        
        dataHandler.addBankClassofService(bank_class_of_service)
            .then(function (data) {
                $scope.bank_submit = true;
                $scope.bank_submit_progress = false;
                swal('', data.description, 'info');
                $('#addBankClassofService').trigger('reset');

                
            }, function (error) {
                
                $scope.bank_submit = true;
                $scope.bank_submit_progress = false;
                $('#addBankClassofService').trigger('reset');
                swal('', 'Something Went Wrong, Please Try Again', 'error');

            })

    };
    $scope.personal_class_of_service_submit = function () {
        $scope.personal_submit_progress = true;
        $scope.personal_submit = false;
        var personal_class_of_service = {
            personal_name              : $scope.personal_name,
            personal_description       : $scope.personal_description,
            personal_external_reference: $scope.personal_e_reference,
            personal_external_url      : $scope.personal_external_url,
            personal_fnc_id            : $scope.personal_fnc_id
        };
        
        dataHandler.addClientClassofService(personal_class_of_service)
            .then(function (data) {
                swal('', data.description, 'info');
                $scope.personal_submit_progress = false;
                $scope.personal_submit = true;
                $('#addPersonalClassofService').trigger('reset');
                
            }, function (error) {
                $scope.personal_submit_progress = false;
                $scope.personal_submit = true;
                $('#addPersonalClassofService').trigger('reset');
                swal('', 'Something Went Wrong, Please Try Again', 'error')
            })
    }


});


adminApp.controller('addAgentSupervisorController', function ($scope, dataHandler) {
    $scope.supervisor_firstname = '';
    $scope.supervisor_lastname = '';
    $scope.supervisor_address = '';
    $scope.supervisor_cellphone = '';
    $scope.supervisor_landline = '';
    $scope.supervisor_balance = '';
    $scope.supervisor_commission = '';
    $scope.supervisor_email = '';
    $scope.loader = false;
    $scope.submit_button = true;

    $scope.postAgentSupervisor = function () {
        $scope.loader = true;
        $scope.submit_button = false;
        var params = {
            firstname : $scope.supervisor_firstname,
            lastname  : $scope.supervisor_lastname,
            address   : $scope.supervisor_address,
            cellphone : $scope.supervisor_cellphone,
            landline  : $scope.supervisor_landline,
            balance   : $scope.supervisor_balance,
            email     : $scope.supervisor_email,
            commission: $scope.supervisor_commission
        };

        dataHandler.addAgentSupervisor(params)
            .then(function (data) {
                $scope.submit_button = true;
                $scope.loader = false;
                swal('', data[0].description, 'info');
                $('#addAgentSupervisorForm').trigger('reset');
                
            }, function (error) {
                $scope.submit_button = true;
                $scope.loader = false;
                
                swal('', 'Something Went Wrong Please Try Again', 'error');
                $('#addAgentSupervisorForm').trigger('reset');

            })

    }
});


adminApp.controller('viewAgentSupervisorController', function ($scope, dataHandler) {
    $scope.supervisorInfoTable = true;
    $scope.editSupervisorFile = false;
    $scope.loading = true;
    $scope.update_supervisor_submit = true;
    $scope.update_supervisor_progress = false;
    $scope.searchResult = {};


    dataHandler.getAgentSupervisor()
        .then(function (data) {
            $scope.loading = false;
            $scope.supervisors = data.agentSupervisors;
            
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            
        });

    $scope.refreshSupervisors = function () {
        $scope.loading = true;
        dataHandler.getAgentSupervisor()
            .then(function (data) {
                
                $scope.loading = false;
                $scope.supervisors = data.agentSupervisors;

            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            })
    };

    $scope.open = function (supervisor) {
        
        $('#supervisorInfo').openModal();

        $scope.supervisorInfo = supervisor;

        $scope.updatedSupervisor = {
            firstname : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.firstname = newName) : $scope.supervisorInfo.firstname;
            },
            lastname  : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.lastname = newName) : $scope.supervisorInfo.lastname;
            },
            address   : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.address = newName) : $scope.supervisorInfo.address;
            },
            cellphone : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.cellphone = newName) : $scope.supervisorInfo.cellphone;
            },
            landline  : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.landline = newName) : $scope.supervisorInfo.landline;
            },
            balance   : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.balance = newName) : $scope.supervisorInfo.balance;
            },
            commission: function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.commission = newName) : $scope.supervisorInfo.commission;
            },
            email     : function (newName) {
                return angular.isDefined(newName) ? ($scope.supervisorInfo.email = newName) : $scope.supervisorInfo.email;
            }
        };

        $scope.submitUpdatedSupervisor = function () {
            $scope.update_supervisor_submit = false;
            $scope.update_supervisor_progress = true;
            var post = {
                id        : $scope.supervisorInfo.id,
                firstname : $('#firstName').val(),
                lastname  : $('#lastName').val(),
                commission: $('#commission').val(),
                balance   : $('#balance').val(),
                email     : $('#email').val(),
                cellphone : $('#cellphone').val(),
                landline  : $('#landline').val(),
                address   : $('#address').val()
            };
            dataHandler.updateAgentSupervisor(post)
                .then(function (data) {
                    $scope.update_supervisor_submit = true;
                    $scope.update_supervisor_progress = false;
                    
                    swal('', data[0].description, 'info');
                    dataHandler.getAgentSupervisor()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.supervisors = data.agentSupervisors;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                    $scope.supervisorInfoTable = true;
                    $scope.editSupervisorFile = false;

                }, function (err) {
                    $scope.update_supervisor_submit = true;
                    $scope.update_supervisor_submit = false;
                    swal('', 'Something Went Wrong, Please Try Again', 'error');
                    $scope.supervisorInfoTable = true;
                    $scope.editSupervisorFile = false;
                    dataHandler.getAgentSupervisor()
                        .then(function (data) {
                            

                            $scope.loading = false;
                            $scope.supervisors = data.agentSupervisors;

                        }, function (error) {
                            $scope.loading = false;
                            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                        });
                });
        };

        $scope.backToSupervisorList = function () {
            $scope.supervisorInfoTable = true;
            $scope.editSupervisorFile = false;
            dataHandler.getAgentSupervisor()
                .then(function (data) {
                    

                    $scope.loading = false;
                    $scope.supervisors = data.agentSupervisors;

                }, function (error) {
                    $scope.loading = false;
                    swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                });
        };

        $scope.backToListFromFile = function () {
            $scope.supervisorFile = false;
            $scope.supervisorInfoTable = true;
            dataHandler.getAgentSupervisor()
                .then(function (data) {
                    

                    $scope.loading = false;
                    $scope.supervisors = data.agentSupervisors;

                }, function (error) {
                    $scope.loading = false;
                    swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                });
        };

        $scope.viewSupervisorFile = function () {
            $scope.supervisorFile = true;
            $scope.supervisorInfoTable = false;
        };
        $scope.editSupervisor = function () {
            $scope.supervisorInfoTable = false;
            $scope.editSupervisorFile = true;

        };
        $scope.deleteSupervisor = function () {
            var post = {
                'id': $scope.supervisorInfo.id
            };
            
            swal({
                title             : "Are you sure you want to delete " + $scope.supervisorInfo.firstname.toUpperCase() + " " + $scope.supervisorInfo.lastname.toUpperCase() + " ?",
                text              : "",
                type              : "warning",
                showCancelButton  : true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText : "Yes, delete it!",
                closeOnConfirm    : false
            }, function () {
                dataHandler.deleteAgentSupervisor(post)
                    .then(function (data) {
                        
                        swal('', data.description, 'info');
                        dataHandler.getBanks()
                            .then(function (data) {
                                

                                $scope.loading = false;
                                $scope.banks = data.banks;

                            }, function (error) {
                                $scope.loading = false;
                                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                            });
                    }, function (error) {
                        
                        swal('', 'Something went wrong. Please try again', 'error');
                        dataHandler.getBanks()
                            .then(function (data) {
                                

                                $scope.loading = false;
                                $scope.banks = data.banks;

                            }, function (error) {
                                $scope.loading = false;
                                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
                            });
                    })
            });

        };
    }

});

adminApp.controller('getStatementOfAccount', function ($scope, dataHandler) {
    $scope.start_date = '';
    $scope.end_date = '';
    $scope.sortType = 'biller';

    $scope.loader = false;
    $scope.search_icon = true;

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    var end = yyyy + '-' + mm + '-' + (dd + 1);
    $scope.displayedDate = new Date().toDateString();
    $scope.todayParams = {
        start_date: today,
        end_date  : end
    };
    dataHandler.getStatementOfAccounts($scope.todayParams)
        .then(function (data) {
            
            $scope.statement = data.statement;

            $scope.pay_bills = [];
            for (var i = 0; i <= data.statement.length; i++) {
                if (data.statement[i].transactionType === 'Cash In') {
                    $scope.cash_in = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Cash Out') {
                    $scope.cash_out = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Money Transfer') {
                    $scope.money_transfer = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Remittance') {
                    $scope.remittance = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Disbursement') {
                    $scope.disbursement = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Disbursement') {
                    $scope.disbursement = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Pay Bills') {
                    $scope.pay_bills.push(data.statement[i]);
                }
                if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                    $scope.b2b = data.statement[i]
                }
                if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                    $scope.c2b = data.statement[i]
                }


            }

        }, function (error) {
            swal('', 'Something Went Wrong, Please try Again', 'warning');
        });


    $scope.searchByDate = function () {
        $scope.loader = true;
        $scope.search_icon = false;

        $scope.statement = '';

        if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
            $scope.loader = false;
            $scope.search_icon = true;

            swal('', 'Invalid Date Range!', 'warning');
        }
        if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
            /////////////////////////////////////////////
            var sd = $scope.start_date.getDate();
            var ed = $scope.end_date.getDate() + 1;
            var sm = $scope.start_date.getMonth() + 1; //January is 0!
            var em = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyy = $scope.start_date.getFullYear();
            var eeyy = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sd < 10) {
                sd = '0' + sd
            }
            if (sm < 10) {
                sm = '0' + sm
            }
            if (ed < 10) {
                ed = '0' + ed
            }
            if (em < 10) {
                em = '0' + em
            }
            ////////////////////////////////////////////
            var start = ssyy + '-' + sm + '-' + sd;
            var end = eeyy + '-' + em + '-' + (ed);
            ///////////////////////////////////////

            var params = {
                start_date: start,
                end_date  : end
            };
            
            dataHandler.getStatementOfAccounts(params)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;

                    $scope.statement = data.statement;

                    $scope.pay_bills = [];
                    for (var i = 0; i <= data.statement.length; i++) {
                        if (data.statement[i].transactionType === 'Cash In') {
                            $scope.cash_in = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Cash Out') {
                            $scope.cash_out = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Money Transfer') {
                            $scope.money_transfer = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Remittance') {
                            $scope.remittance = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Disbursement') {
                            $scope.disbursement = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Disbursement') {
                            $scope.disbursement = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Pay Bills') {
                            $scope.pay_bills.push(data.statement[i]);
                        }
                        if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                            $scope.b2b = data.statement[i]
                        }
                        if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                            $scope.c2b = data.statement[i]
                        }


                    }

                }, function (error) {
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }
        if ($scope.start_date.getTime() == $scope.end_date.getTime()) {



            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate();
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede + 1);
            ///////////////////////////////////////

            var paramse = {
                start_date: starte,
                end_date  : ende
            };
            dataHandler.getStatementOfAccounts(paramse)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.statement = data.statement;

                    $scope.pay_bills = [];
                    for (var i = 0; i <= data.statement.length; i++) {
                        if (data.statement[i].transactionType === 'Subscriber Wallet') {
                            $scope.subs = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Cash In') {
                            $scope.cash_in = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Cash Out') {
                            $scope.cash_out = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Money Transfer') {
                            $scope.money_transfer = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Remittance') {
                            $scope.remittance = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Disbursement') {
                            $scope.disbursement = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Disbursement') {
                            $scope.disbursement = data.statement[i];
                        }
                        if (data.statement[i].transactionType === 'Pay Bills') {
                            $scope.pay_bills.push(data.statement[i]);
                        }
                        if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                            $scope.b2b = data.statement[i]
                        }
                        if (data.statement[i].transactionType === 'Pay Merchant B2B') {
                            $scope.c2b = data.statement[i]
                        }


                    }

                }, function (error) {
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }

    }

});

adminApp.controller('getClosingBalance', function ($scope, dataHandler) {

    var today = new Date();
    var yday = new Date(today.setDate(today.getDate() - 1)).toDateString();
    $scope.searchDay = '';

    $scope.displayedDate = yday;
    var yesterday = new Date(yday);

    var dd = yesterday.getDate();
    var mm = yesterday.getMonth() + 1; //January is 0!
    var yyyy = yesterday.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    var day = yyyy + '-' + mm + '-' + dd;
    $scope.params = {
        date: day
    };

    dataHandler.getClosingBalances($scope.params)
        .then(function (data) {
            $scope.subscribers = data.subscriberWallet;
            $scope.business = data.businessWallet;
            $scope.businessWalletCommissions = data.businessWalletCommissions;
            $scope.billers = data.billers;
            $scope.pendingTransfers = data.pendingTransfers;
            $scope.getcashCommission = data.getcashCommission;
        }, function (error) {
            
        });

    $scope.search = function () {
        var day = new Date($scope.searchDay)

        if (day.getTime() > today.getTime()) {
            swal('', 'Invalid Date', 'warning');
            return;
        }


        var dd = day.getDate();
        var mm = day.getMonth() + 1; //January is 0!
        var yyyy = day.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var sday = yyyy + '-' + mm + '-' + dd;
        $scope.params = {
            date: sday
        };


        dataHandler.getClosingBalances($scope.params)
            .then(function (data) {
                $scope.displayedDate = new Date(sday).toDateString();
                $scope.subscribers = data.subscriberWallet;
                $scope.business = data.businessWallet;
                $scope.businessWalletCommissions = data.businessWalletCommissions;
                $scope.billers = data.billers;
                $scope.pendingTransfers = data.pendingTransfers;
                $scope.getcashCommission = data.getcashCommission;

            }, function (error) {
                
            });

    }


});

adminApp.controller('getSummaryBalance', function ($scope, dataHandler) {
    $scope.gcCommissions = 3063.38;
    $scope.def = 0;

    $scope.todayParams = {
        start_date: '2017-01-13',
        end_date  : '2020-01-13'
    };


    dataHandler.getStatementOfAccounts($scope.todayParams)
        .then(function (data) {
            
            $scope.statement = data.statement;


            $scope.pay_bills = [];
            for (var i = 0; i <= data.statement.length; i++) {
                if (data.statement[i].transactionType === 'Subcriber Wallet') {
                    $scope.subscribers = data.statement[i];
                    
                }
                if (data.statement[i].transactionType === 'Pending Transfers') {
                    $scope.transfers = data.statement[i];
                    
                }


                if (data.statement[i].transactionType === 'Business Wallet') {
                    $scope.business = data.statement[i];
                }
                if (data.statement[i].transactionType === 'GetCash Commissions') {
                    $scope.gc = data.statement[i];
                }
                if (data.statement[i].transactionType === 'Products') {
                    $scope.products = data.statement[i];
                }


            }
            


        }, function (error) {
            console.log(error);
            swal('', 'Something Went Wrong, Please try Again', 'warning');
        });


});

adminApp.controller('getVolumesValues', function ($scope, dataHandler, $timeout) {
//////////////////////////////////////////////////
    var today = new Date();
    var dd = today.getDate();
    var ed = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (ed < 10) {
        ed = '0' + ed
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    var end = yyyy + '-' + mm + '-' + ed;
    $scope.displayedDate = new Date().toDateString();
    $scope.todayParams = {
        startDate: today,
        endDate  : end
    };
    $scope.transactions = [];
    $scope.productTransactions = [];


    var getTransactionVolume = function () {
        var cashin = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'Cash In'
        };
        var cashout = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'Cash Out'
        };
        var sendMoney = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'C2C Money Transfer'
        };
        var disbursement = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'Disbursement Validation'
        };
        var pay_merchantc2b = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'Pay Merchant C2B'
        };


        dataHandler.getTransactionVolumes(cashin)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getTransactionVolumes(cashout)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getTransactionVolumes(sendMoney)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getTransactionVolumes(disbursement)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getTransactionVolumes(pay_merchantc2b)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            })

    }();

    var getCommissionVolume = function () {
        var commission = {
            startDate        : $scope.todayParams.startDate,
            endDate          : $scope.todayParams.endDate,
            'transactionName': 'Business Wallet Commmission Settlement'
        };
        dataHandler.getCommissionVolumes(commission)
            .then(function (data) {
                $scope.transactions.push(data)
            }, function (error) {
                
            })
    }();

    var getProductVolume = function () {
        var zesa = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 11,
            productName    : 'ZESA'
        };
        var africom = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 4,
            productName    : 'Africom'
        };
        var coh = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 32,
            productName    : 'City Of Harare'
        };
        var econet = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 2,
            productName    : 'Econet'
        };
        var fcf = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 1,
            productName    : 'First Choice Finance'
        };
        var netone = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 19,
            productName    : 'Netone'
        };
        var telecel = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 24,
            productName    : 'Telecel'
        };
        var homeplus = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 21,
            productName    : 'Telone ADSL HomePlus'
        };
        var infinitypro = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 35,
            productName    : 'Telone ADSL InfinityPro'
        };
        var phonebill = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 25,
            productName    : 'Telone Phonebill'
        };
        var fibroniks = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 6,
            productName    : 'ZOL-Fibroniks'
        };
        var minerva = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 27,
            productName    : 'Minerva'
        };
        var mcc = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 22,
            productName    : 'Masvingo City Council'
        };
        var zimpapers = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 23,
            productName    : 'Zim Papers'
        };
        var powertelMobile = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 5,
            productName    : 'Powertel Mobile'
        };
        var powertelAccount = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 3,
            productName    : 'Powertel Account'
        };
        var nyaradzo = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 12,
            productName    : 'Nyaradzo'
        };
        var homebasic = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 10,
            productName    : 'Telone ADSL HomeBasic'
        };
        var chiredzi = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 39,
            productName    : 'Chiredzi RDC'
        };
        var haraka = {
            startDate      : $scope.todayParams.startDate,
            endDate        : $scope.todayParams.endDate,
            transactionName: 'Pay Bills',
            product_id     : 51,
            productName    : 'HARAKA'
        };

        dataHandler.getProductVolumes(netone)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(telecel)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(econet)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(zesa)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(africom)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(coh)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })

        dataHandler.getProductVolumes(fcf)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })

        dataHandler.getProductVolumes(homeplus)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(infinitypro)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(homebasic)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(phonebill)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(fibroniks)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(mcc)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(minerva)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(zimpapers)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(powertelMobile)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getProductVolumes(powertelAccount)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            });
        dataHandler.getProductVolumes(nyaradzo)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            });

        dataHandler.getProductVolumes(chiredzi)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
        dataHandler.getProductVolumes(haraka)
            .then(function (data) {
                $scope.productTransactions.push(data)
            }, function (error) {
                
            })
    }();

    $scope.searchByDate = function () {
        $scope.loader = true;


        if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
            $scope.loader = false;
            $scope.loading = false;

            $scope.search_icon = true;

            swal('', 'Invalid Date Range!', 'warning');
        }
        if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
            $scope.transactions = [];
            $scope.productTransactions = [];


            /////////////////////////////////////////////
            var sd = $scope.start_date.getDate();
            var ed = $scope.end_date.getDate() + 1;
            var sm = $scope.start_date.getMonth() + 1; //January is 0!
            var em = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyy = $scope.start_date.getFullYear();
            var eeyy = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sd < 10) {
                sd = '0' + sd
            }
            if (sm < 10) {
                sm = '0' + sm
            }
            if (ed < 10) {
                ed = '0' + ed
            }
            if (ed > 31) {
                ed = '01';
                if (em == 12) {
                    em = '1';
                    eeyy += 1
                }
                else {
                    em += 1
                }

            }
            if (em < 10) {
                em = '0' + em
            }
            ////////////////////////////////////////////
            var start = ssyy + '-' + sm + '-' + sd;
            var end = eeyy + '-' + em + '-' + (ed);
            ///////////////////////////////////////

            var params = {
                start_date: start,
                end_date  : end
            };
            

            var cashin = {startDate: params.start_date, endDate: params.end_date, 'transactionName': 'Cash In'};
            var cashout = {startDate: params.start_date, endDate: params.end_date, 'transactionName': 'Cash Out'};
            var sendMoney = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'C2C Money Transfer'
            };
            var disbursement = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Disbursement Validation'
            };
            var pay_merchantc2b = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Pay Merchant C2B'
            };


            dataHandler.getTransactionVolumes(cashin)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();

                    $scope.transactions.push(data)
                    $scope.loader = false

                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(cashout)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(sendMoney)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(disbursement)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(pay_merchantc2b)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                })

            var zesa = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 11,
                productName    : 'ZESA'
            };
            var africom = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 4,
                productName    : 'Africom'
            };
            var coh = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 32,
                productName    : 'City Of Harare'
            };
            var econet = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 2,
                productName    : 'Econet'
            };
            var fcf = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 1,
                productName    : 'First Choice Finance'
            };
            var netone = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 19,
                productName    : 'Netone'
            };
            var telecel = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 24,
                productName    : 'Telecel'
            };
            var homeplus = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 21,
                productName    : 'Telone ADSL HomePlus'
            };
            var infinitypro = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 35,
                productName    : 'Telone ADSL InfinityPro'
            };
            var phonebill = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 25,
                productName    : 'Telone Phonebill'
            };
            var fibroniks = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 6,
                productName    : 'ZOL-Fibroniks'
            };
            var minerva = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 27,
                productName    : 'Minerva'
            };
            var mcc = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 22,
                productName    : 'Masvingo City Council'
            };
            var zimpapers = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 23,
                productName    : 'Zim Papers'
            };
            var powertelMobile = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 5,
                productName    : 'Powertel Mobile'
            };
            var powertelAccount = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 3,
                productName    : 'Powertel Account'
            };
            var nyaradzo = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 12,
                productName    : 'Nyaradzo'
            };
            var homebasic = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 10,
                productName    : 'Telone ADSL HomeBasic'
            };
            var chiredzi = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 39,
                productName    : 'Chiredzi RDC'
            };
            var infinitymaster = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 39,
                productName    : 'Telone ADSL InfinityMaster'
            };
            var haraka = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 51,
                productName    : 'HARAKA'
            };


            dataHandler.getProductVolumes(netone)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(telecel)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(econet)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(zesa)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(africom)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(coh)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            dataHandler.getProductVolumes(fcf)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            dataHandler.getProductVolumes(homeplus)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(infinitypro)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(phonebill)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(homebasic)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(fibroniks)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(mcc)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(minerva)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(zimpapers)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(powertelMobile)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(powertelAccount)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(nyaradzo)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            dataHandler.getProductVolumes(chiredzi)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(haraka)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            var commission = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Business Wallet Commmission Settlement'
            };
            dataHandler.getCommissionVolumes(commission)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                })


        }
        if ($scope.start_date.getTime() === $scope.end_date.getTime()) {
            $scope.transactions = []
            $scope.productTransactions = [];


            /////////////////////////////////////////////
            var sd = $scope.start_date.getDate();
            var ed = $scope.end_date.getDate() + 1;
            var sm = $scope.start_date.getMonth() + 1; //January is 0!
            var em = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyy = $scope.start_date.getFullYear();
            var eeyy = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sd < 10) {
                sd = '0' + sd
            }
            if (sm < 10) {
                sm = '0' + sm
            }
            if (ed < 10) {
                ed = '0' + ed
            }
            if (ed > 31) {
                ed = '01';
                if (em == 12) {
                    em = '1';
                    eeyy += 1
                }
                else {
                    em += 1
                }
            }
            if (em < 10) {
                em = '0' + em
            }
            ////////////////////////////////////////////
            var start = ssyy + '-' + sm + '-' + sd;
            var end = eeyy + '-' + em + '-' + (ed);
            ///////////////////////////////////////

            var params = {
                start_date: start,
                end_date  : end
            };
            

            var cashin = {startDate: params.start_date, endDate: params.end_date, 'transactionName': 'Cash In'};
            var cashout = {startDate: params.start_date, endDate: params.end_date, 'transactionName': 'Cash Out'};
            var sendMoney = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'C2C Money Transfer'
            };
            var disbursement = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Disbursement Validation'
            };
            var pay_merchantc2b = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Pay Merchant C2B'
            };


            dataHandler.getTransactionVolumes(cashin)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString();
                    $scope.loader = false

                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(cashout)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(sendMoney)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(disbursement)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                });
            dataHandler.getTransactionVolumes(pay_merchantc2b)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                })

            var zesa = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 11,
                productName    : 'ZESA'
            };
            var africom = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 4,
                productName    : 'Africom'
            };
            var coh = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 32,
                productName    : 'City Of Harare'
            };
            var econet = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 2,
                productName    : 'Econet'
            };
            var fcf = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 1,
                productName    : 'First Choice Finance'
            };
            var netone = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 19,
                productName    : 'Netone'
            };
            var telecel = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 24,
                productName    : 'Telecel'
            };
            var homeplus = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 21,
                productName    : 'Telone ADSL HomePlus'
            };
            var infinitypro = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 35,
                productName    : 'Telone ADSL InfinityPro'
            };
            var phonebill = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 25,
                productName    : 'Telone Phonebill'
            };
            var fibroniks = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 6,
                productName    : 'ZOL-Fibroniks'
            };
            var minerva = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 27,
                productName    : 'Minerva'
            };
            var mcc = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 22,
                productName    : 'Masvingo City Council'
            };
            var zimpapers = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 23,
                productName    : 'Zim Papers'
            };
            var powertelMobile = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 5,
                productName    : 'Powertel Mobile'
            };
            var powertelAccount = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 3,
                productName    : 'Powertel Account'
            };
            var nyaradzo = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 12,
                productName    : 'Nyaradzo'
            };
            var homebasic = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 10,
                productName    : 'Telone ADSL HomeBasic'
            };
            var chiredzi = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 39,
                productName    : 'Chiredzi RDC'
            };
            var infinitymaster = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 15,
                productName    : 'Telone ADSL Infinity Master'
            };
            var haraka = {
                startDate      : params.start_date,
                endDate        : params.end_date,
                transactionName: 'Pay Bills',
                product_id     : 51,
                productName    : 'HARAKA'
            };


            dataHandler.getProductVolumes(netone)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(telecel)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(econet)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(zesa)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(africom)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(coh)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            dataHandler.getProductVolumes(fcf)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            dataHandler.getProductVolumes(homeplus)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(infinitypro)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(homebasic)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(infinitymaster)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(phonebill)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(fibroniks)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(mcc)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(minerva)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(zimpapers)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(powertelMobile)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(powertelAccount)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(nyaradzo)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(homebasic)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(chiredzi)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })
            dataHandler.getProductVolumes(haraka)
                .then(function (data) {
                    $scope.productTransactions.push(data)
                }, function (error) {
                    
                })

            var commission = {
                startDate        : params.start_date,
                endDate          : params.end_date,
                'transactionName': 'Business Wallet Commmission Settlement'
            };
            dataHandler.getCommissionVolumes(commission)
                .then(function (data) {
                    $scope.transactions.push(data)
                }, function (error) {
                    
                })

        }
    }


});

adminApp.controller('activityLogsController', function ($scope, dataHandler) {

    $scope.sort = function (column) {
        $scope.OrderBy = column;
        $scope.reverse = !$scope.reverse;
    };

    dataHandler.getUsers()
        .then(function (data) {
            $scope.users = data.users
        }, function (error) {
            
        });

    $scope.searchLog = function () {
        $scope.loader = true;
        $scope.search_icon = false;

        $scope.statement = '';

        if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
            $scope.loader = false;
            $scope.loading = false;

            $scope.search_icon = true;

            swal('', 'Invalid Date Range!', 'warning');
        }
        if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
            $scope.transactions = [];

            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate() + 1;
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede);
            ///////////////////////////////////////


            var params = {
                id       : $scope.adminUser.id,
                startDate: starte,
                endDate  : ende
            };
            
            dataHandler.getActivityLogs(params)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    

                    $scope.logs = data;


                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }
        if ($scope.start_date.getTime() === $scope.end_date.getTime()) {
            $scope.transactions = []


            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate() + 1;
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede);
            ///////////////////////////////////////

            var paramse = {
                id       : $scope.adminUser.id,
                startDate: starte,
                endDate  : ende
            };
            dataHandler.getActivityLogs(paramse)
                .then(function (data) {

                    $scope.displayedDate = $scope.start_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    //
                    $scope.logs = data;


                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }

    };


});

adminApp.controller('agentRankingsController', function ($scope, dataHandler) {
    $scope.sort = function (column) {
        $scope.OrderBy = column;
        $scope.reverse = !$scope.reverse;
    };

    dataHandler.getProducts()
        .then(function (data) {
            var all_products = {
                id  : 0,
                name: 'All Products'
            };
            var cash_in = {
                id  : 101,
                name: 'Cash In'
            };
            var cash_out = {
                id  : 102,
                name: 'Cash Out'
            };
            var c2b = {
                id  : 103,
                name: 'Pay Merchant C2B'
            };
            $scope.products = data.products;
            $scope.products.push(all_products, cash_in, cash_out, c2b);
        }, function (error) {
            
        });

    $scope.searchLog = function () {
        $scope.loader = true;
        $scope.search_icon = false;

        $scope.statement = '';
        if ($scope.start_date.getTime() > $scope.end_date.getTime()) {
            $scope.loader = false;
            $scope.loading = false;

            $scope.search_icon = true;

            swal('', 'Invalid Date Range!', 'warning');
        }
        if ($scope.start_date.getTime() < $scope.end_date.getTime()) {
            $scope.rankings = [];

            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate() + 1;
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (ede > 31) {
                ede = '01';
                eme += 1
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede);
            ///////////////////////////////////////


            var params = {
                product  : $scope.product.id,
                type     : $scope.type,
                startDate: starte,
                endDate  : ende
            };
            dataHandler.getAgentRankings(params)
                .then(function (data) {
                    $scope.displayedDate = $scope.start_date.toDateString() + ' - ' + $scope.end_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    $scope.rankings = data;


                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }
        if ($scope.start_date.getTime() === $scope.end_date.getTime()) {
            $scope.transactions = [];


            /////////////////////////////////////////////
            var sde = $scope.start_date.getDate();
            var ede = $scope.end_date.getDate() + 1;
            var sme = $scope.start_date.getMonth() + 1; //January is 0!
            var eme = $scope.end_date.getMonth() + 1; //January is 0!
            var ssyye = $scope.start_date.getFullYear();
            var eeyye = $scope.end_date.getFullYear();
            /////////////////////////////////////////////
            if (sde < 10) {
                sde = '0' + sde
            }
            if (sme < 10) {
                sme = '0' + sme
            }
            if (ede < 10) {
                ede = '0' + ede
            }
            if (eme < 10) {
                eme = '0' + eme
            }
            if (ede > 31) {
                ede = '01';
                eme += 1
            }

            ////////////////////////////////////////////
            var starte = ssyye + '-' + sme + '-' + sde;
            var ende = eeyye + '-' + eme + '-' + (ede);
            ///////////////////////////////////////

            var paramse = {
                product  : $scope.product.id,
                type     : $scope.type,
                startDate: starte,
                endDate  : ende
            };
            dataHandler.getAgentRankings(paramse)
                .then(function (data) {

                    $scope.displayedDate = $scope.start_date.toDateString();
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.rankings = data;


                }, function (error) {
                    $scope.loader = false;
                    $scope.search_icon = true;
                    $scope.loading = false;
                    swal('', 'Something Went Wrong, Please try Again', 'warning');
                });
        }

    };


});


adminApp.controller('reversalController', function ($scope, dataHandler) {

    $scope.transactionTable = true;
    $scope.transactionFile = false;


    var today = new Date();
    var dd = today.getDate() + 1;
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    $scope.reference = '';


    $scope.searchTransaction = function () {
        $scope.transactionTable = true;
        $scope.transactionFile = false;
        var params = {
            id        : $scope.reference,
            start_date: '2016-12-31',
            end_date  : today

        };
        dataHandler.searchForTransaction(params)
            .then(function (data) {
                
                $scope.transactions = data.transactions
                if ($scope.transactions[0] == null) {
                    swal('', 'No Transactions Found!', 'warning');
                }
            }, function (error) {
                
            })
    }

    $scope.viewTransactionFile = function () {
        $scope.transactionTable = false;
        $scope.transactionFile = true;
    }

    $scope.openTransaction = function (transaction) {
        $('#transactionInfo').openModal();
        $scope.transactionInfo = transaction;
        
    };

    $scope.backToTransactionList = function () {
        $scope.transactionTable = true;
        $scope.transactionFile = false;
    }

    $scope.reverseTransaction = function () {
        if ($scope.transactionInfo.transactionTypeId.description.includes('cash_in')) {
            swal({
                    title              : "Confirm Transaction Reversal!",
                    text               : "Transaction Ref:" + $scope.transactionInfo.id +
                    "<br>Transaction Description: " + $scope.transactionInfo.description +
                    "<br>Transaction Amount: " + formatter.format($scope.transactionInfo.amount),
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    allowEscapeKey     : true,
                    allowOutsideClick  : true,
                    html               : true
                },
                function () {
                    var params = {
                        id : $scope.transactionInfo.id,
                        url: 'cash_in'
                    };
                    dataHandler.reverseTransaction(params)
                        .then(function (data) {
                            swal(data.description)

                        }, function (error) {
                            
                        })
                });
        }
        if ($scope.transactionInfo.transactionTypeId.description.includes('cash_out')) {
            swal({
                    title              : "Confirm Transaction Reversal!",
                    text               : "Transaction Ref:" + $scope.transactionInfo.id +
                    "<br>Transaction Description: " + $scope.transactionInfo.description +
                    "<br>Transaction Amount: " + formatter.format($scope.transactionInfo.amount),
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    allowEscapeKey     : true,
                    allowOutsideClick  : true,
                    html               : true
                },
                function () {
                    var params = {
                        id : $scope.transactionInfo.id,
                        url: 'cash_out'
                    };
                    dataHandler.reverseTransaction(params)
                        .then(function (data) {
                            swal('', data.description, 'info')

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning')
                        })
                });
        }
        if ($scope.transactionInfo.transactionTypeId.description.includes('pay_bills')) {
            swal({
                    title              : "Confirm Transaction Reversal!",
                    text               : "Transaction Ref:" + $scope.transactionInfo.id +
                    "<br>Transaction Description: " + $scope.transactionInfo.description +
                    "<br>Transaction Amount: " + formatter.format($scope.transactionInfo.amount),
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    allowEscapeKey     : true,
                    allowOutsideClick  : true,
                    html               : true
                },
                function () {
                    var params = {
                        id : $scope.transactionInfo.id,
                        url: 'pay_bills'
                    };
                    dataHandler.reverseTransaction(params)
                        .then(function (data) {
                            swal('', data.description, 'info')

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning')
                        })
                });
        }
        if ($scope.transactionInfo.transactionTypeId.description.includes('send_money')) {
            swal({
                    title              : "Confirm Transaction Reversal!",
                    text               : "Transaction Ref:" + $scope.transactionInfo.id +
                    "<br>Transaction Description: " + $scope.transactionInfo.description +
                    "<br>Transaction Amount: " + formatter.format($scope.transactionInfo.amount),
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    allowEscapeKey     : true,
                    allowOutsideClick  : true,
                    html               : true
                },
                function () {
                    var params = {
                        id : $scope.transactionInfo.id,
                        url: 'send_money'
                    };
                    dataHandler.reverseTransaction(params)
                        .then(function (data) {
                            swal('', data.description, 'info')

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning')
                        })
                });
        }
        if ($scope.transactionInfo.transactionTypeId.description.includes('disbursement')) {
            swal({
                    title              : "Confirm Transaction Reversal!",
                    text               : "Transaction Ref:" + $scope.transactionInfo.id +
                    "<br>Transaction Description: " + $scope.transactionInfo.description +
                    "<br>Transaction Amount: " + formatter.format($scope.transactionInfo.amount),
                    type               : "info",
                    showCancelButton   : true,
                    closeOnConfirm     : false,
                    showLoaderOnConfirm: true,
                    allowEscapeKey     : true,
                    allowOutsideClick  : true,
                    html               : true
                },
                function () {
                    var params = {
                        id : $scope.transactionInfo.id,
                        url: 'disbursement'
                    };
                    dataHandler.reverseTransaction(params)
                        .then(function (data) {
                            swal('', data.description, 'info')

                        }, function (error) {
                            swal('', 'Something Went Wrong, Please Try Again', 'warning')
                        })
                });
        }

    }

});

adminApp.controller('getPendingEvalueTransactions', function ($scope, dataHandler) {
    $scope.loading = true;
    $scope.loading = true;
    dataHandler.getPendingEValueTransactions()
        .then(function (data) {
            $scope.transactions = data.transactions;
            
            dataHandler.getAllUsers2()
                .then(function (data) {
                    
                    $scope.loading = false;
                    $scope.allUsers = data.users;
                    $scope.transactions2 = [];

                    for (var i = 0; i < $scope.transactions.length; i++) {

                        result = $.grep($scope.allUsers, function (e) {
                            return e.id == $scope.transactions[i].administratorId.id;
                        });
                        $scope.transactions[i].administratorId = result[0];

                    }

                }, function (error) {
                    
                })
        }, function (error) {
            
        });

    $scope.validate = function (transaction) {
        swal({
                title              : "Validate Transaction ",
                text               : "Business Name : " + transaction.agentId.name +
                "<br>Description : " + transaction.description +
                "<br>E-Value Amount : " + formatter.format(transaction.credit) +
                "<br>Commission Amount : " + formatter.format(transaction.commission) +
                "<br>Initiated By : " + transaction.administratorId.username,
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                confirmButtonColor : '#00e676',
                confirmButtonText  : 'VALIDATE',
                html               : true,
                allowOutsideClick  : true
            },
            function () {
                var params = {
                    type    : 'validate',
                    trans_id: transaction.id
                };
                
                dataHandler.validateEvalueTransactions(params)
                    .then(function (data) {
                        if (data.code == "00") {
                            swal('', 'Transaction Sucsessfully Validated', 'success');
                            $scope.loading = true;

                            dataHandler.getPendingEValueTransactions()
                                .then(function (data) {
                                    $scope.transactions = data.transactions;
                                    
                                    dataHandler.getAllUsers2()
                                        .then(function (data) {
                                            
                                            $scope.loading = false;
                                            $scope.allUsers = data.users;
                                            $scope.transactions2 = [];

                                            for (var i = 0; i < $scope.transactions.length; i++) {

                                                result = $.grep($scope.allUsers, function (e) {
                                                    return e.id == $scope.transactions[i].administratorId.id;
                                                });
                                                $scope.transactions[i].administratorId = result[0];

                                            }

                                        }, function (error) {
                                            
                                        })
                                }, function (error) {
                                    
                                });
                        } else {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            });
    }

    $scope.reject = function (transaction) {
        swal({
                title              : "Reject Transaction ",
                text               : "Business Name : " + transaction.agentId.name +
                "<br>Description : " + transaction.description +
                "<br>E-Value Amount : " + formatter.format(transaction.credit) +
                "<br>Commission Amount : " + formatter.format(transaction.commission) +
                "<br>Initiated By : " + transaction.administratorId.username,
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                confirmButtonColor : '#e53935',
                confirmButtonText  : 'REJECT',
                html               : true,
                allowOutsideClick  : true

            },
            function () {
                var params = {
                    type    : 'refuse',
                    trans_id: transaction.id
                };
                
                dataHandler.validateEvalueTransactions(params)
                    .then(function (data) {
                        
                        if (data.code == "00") {
                            swal('', 'Transaction successfully rejected', 'success');
                            $scope.loading = true;

                            dataHandler.getPendingEValueTransactions()
                                .then(function (data) {
                                    $scope.transactions = data.transactions;
                                    
                                    dataHandler.getAllUsers2()
                                        .then(function (data) {
                                            
                                            $scope.loading = false;
                                            $scope.allUsers = data.users;
                                            $scope.transactions2 = [];

                                            for (var i = 0; i < $scope.transactions.length; i++) {

                                                result = $.grep($scope.allUsers, function (e) {
                                                    return e.id == $scope.transactions[i].administratorId.id;
                                                });
                                                $scope.transactions[i].administratorId = result[0];

                                            }

                                        }, function (error) {
                                            
                                        })
                                }, function (error) {
                                    
                                });
                        } else {
                            swal('', data.description, 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            });
    }


});

adminApp.controller('getPendingBankTransfers', function ($scope, dataHandler) {
    dataHandler.getPendingBankTransfers()
        .then(function (data) {
            $scope.transactions = data.transactions;
        }, function (error) {

        });

    $scope.validate = function (transaction) {
        swal({
                title              : "Validate Bank Transfer ",
                text               : "Business Name : " + transaction.agentId.firstname + ' ' + transaction.agentId.lastname +
                "<br>Description : " + transaction.description +
                "<br>Bank : " + transaction.accountsId.description2 +
                "<br>Amount : " + formatter.format(transaction.accountsId.balance) +
                "<br>Initiated By : " + transaction.administratorId.username,
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                confirmButtonColor : '#00e676',
                confirmButtonText  : 'VALIDATE',
                html               : true,
                allowOutsideClick  : true
            },
            function () {
                var params = {
                    type    : 'validate',
                    trans_id: transaction.id
                };
                
                dataHandler.validateBankTransfer(params)
                    .then(function (data) {
                        if (data.code == "00") {
                            swal('', 'Transaction Sucsessfully Validated', 'success')
                            $scope.transactions.splice(transaction, 1);
                        } else {
                            swal('', 'Something Went Wrong. Please Try Again', 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            });

    };

    $scope.reject = function (transaction) {
        swal({
                title              : "Reject Transaction ",
                text               : "Business Name : " + transaction.agentId.firstname + ' ' + transaction.agentId.lastname +
                "<br>Description : " + transaction.description +
                "<br>Bank : " + transaction.accountsId.description2 +
                "<br>Amount : " + formatter.format(transaction.accountsId.balance) +
                "<br>Initiated By : " + transaction.administratorId.username,
                type               : "info",
                showCancelButton   : true,
                closeOnConfirm     : false,
                showLoaderOnConfirm: true,
                confirmButtonColor : '#e53935',
                confirmButtonText  : 'REJECT',
                html               : true,
                allowOutsideClick  : true

            },
            function () {
                var params = {
                    type    : 'refuse',
                    trans_id: transaction.id
                };
                
                dataHandler.validateBankTransfer(params)
                    .then(function (data) {
                        
                        if (data.code == "00") {
                            swal('', 'Transaction successfully rejected', 'success')
                            $scope.transactions.splice(transaction, 1);
                        } else {
                            swal('', data.description, 'warning')

                        }
                    }, function (error) {
                        swal('', 'Something Went Wrong. Please Try Again', 'warning')
                    })
            });
    }

});

adminApp.controller('addFeesandCommissionsController', function ($scope, dataHandler) {
    $scope.clientClassOfService = '';
    $scope.agentClassOfService = '';
    $scope.bankClassOfService = '';
    $scope.commissiontype = ''

    $scope.commission =
        [{
            name : 'Percentage',
            value: '(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)'
        }, {
            name : 'Fixed',
            value: '(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)'

        }];
    $scope.test = function () {
        
    };
    dataHandler.getClassofService()
        .then(function (data) {
            
            $scope.agentClassOfServices = data.agentClassOfServices;
            $scope.bankClassOfServices = data.bankClassOfServices;
            $scope.clientClassOfServices = data.clientClassOfServices;


        }, function (error) {
            
        });
    dataHandler.getTransactionTypes()
        .then(function (data) {
            $scope.trans_types = data.transactionTypes
        }, function (error) {
            
        });
    dataHandler.getProducts()
        .then(function (data) {
            
            $scope.products = data.products
        }, function (error) {
            
        })
});

adminApp.controller('usersController', function ($scope, $http, dataHandler, $q) {
    $scope.userInfoTable = true;
    $scope.userFile = false;
    $scope.loading = true;

    dataHandler.getUsers()
        .then(function (data) {
            
            $scope.users = data.users;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.terminateUser = function () {
        swal({
                title              : "Terminate User",
                text               : "",
                type               : "input",
                inputType          : "password",
                showCancelButton   : true,
                confirmButtonColor : "#995577",
                confirmButtonText  : "Terminate",
                closeOnConfirm     : false,
                showLoaderOnConfirm: true
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                var params = {
                    id      : $scope.userInfo.id,
                    password: inputValue
                };

                dataHandler.terminateUser(params)
                    .then(function (data) {
                        if (data.code == 0) {
                            $scope.users.splice($scope.users.indexOf($scope.userInfo), 1);
                            swal('', data.d, 'success');
                        } else {
                            swal('', JSON.stringify(data.data), 'error');
                        }

                    }, function (error) {
                        swal('', 'Failed to terminate User', 'error');
                    });
            });

    };

    $scope.refreshUsers = function () {
        $scope.loading = true;
        dataHandler.getUsers()
            .then(function (data) {
                
                $scope.users = data.users;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });

    };

    dataHandler.getRoles()
        .then(function (data) {
            $scope.roles = data.roles;
        });

    $scope.open = function (user) {
        $scope.userInfoTable = false;
        $scope.userProfile = true;
        $scope.userInfo = user;
    };

    $scope.backToUserList = function () {
        $scope.userInfoTable = true;
        $scope.userProfile = false;
    };

    $scope.addRole = function () {
        $scope.addRoleSubmitProgress = true;
        json = JSON.parse($scope.user_roles);

        var defer = $q.defer();

        $http.get('/admin/user/attach_role?user_id=' + $scope.userInfo.id + '&role_id=' + json.id)
            .success(function (data) {
                defer.resolve(data);

                $scope.addRoleSubmitProgress = false;
                if (data.code == '00') {
                    $scope.userInfo.roles.push(json)
                    // $scope.roles.splice(json)
                } else {
                    //alert(data.description);
                    swal('', data.description, 'warning');
                }
                
            })
            .error(function (err, status) {
                defer.reject(err);

                $scope.addRoleSubmitProgress = false;
                
                swal('', data.description, 'error');

            });

        return defer.promise;
    };

    $scope.removeRole = function (x) {
        var index = $scope.userInfo.roles.indexOf(x);
        $scope.userInfo.roles[index].progress = true;
        var defer = $q.defer();
        $http.get('/admin/user/detach_role?user_id=' + $scope.userInfo.id + '&role_id=' + x.id)
            .success(function (data) {
                defer.resolve(data);
                

                if (data.code == '00') {

                    $scope.userInfo.roles.splice(index, 1)
                } else {
                    // alert(data.description);
                    swal('', data.description, 'warning');
                }

            })
            .error(function (err, status) {
                defer.reject(err);
                //alert(err);
                
                swal('', data.description, 'error');
            });

        return defer.promise;
    };

});

adminApp.controller('pendingUsersController', function ($scope, $http, dataHandler, $q) {
    $scope.userInfoTable = true;

    $scope.userFile = false;

    $scope.loading = true;

    dataHandler.getPendingUsers()
        .then(function (data) {
            
            $scope.pendingUsers = data.users;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.refreshUsers = function () {
        dataHandler.getPendingUsers()
            .then(function (data) {
                
                $scope.pendingUsers = data.users;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });

    };

    $scope.open = function (user) {
        dataHandler.getAvailableRoles(user.id)
            .then(function (data) {
                $scope.availableRoles = data.roles;
            });
        $scope.userInfoTable = false;
        $scope.userProfile = true;
        $scope.userInfo = user;

    };

    $scope.backToUserList = function () {
        $scope.userInfoTable = true;
        $scope.userProfile = false;
    };

    $scope.approveUser = function (user) {
        swal({
                title              : "Confirm Approval",
                text               : "",
                type               : "input",
                inputType          : "password",
                showCancelButton   : true,
                confirmButtonColor : "#557799",
                confirmButtonText  : "Yes, Approve!",
                closeOnConfirm     : false,
                showLoaderOnConfirm: true
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                var params = {
                    i: user.id,
                    p: inputValue
                };
                dataHandler.approveUser(params)
                    .then(function (data) {
                        if (data.c == 0) {
                            $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
                            swal('', data.d, 'success');
                        } else {
                            swal('', data.d, 'error');
                        }

                    }, function (error) {
                        swal('', 'Failed to Approve User', 'error');
                    });
            });

    };

    $scope.ignoreUser = function (user) {
        $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
    };

    $scope.deleteUser = function (user) {
        swal({
                title              : "Confirm Deletion",
                text               : "You will not be able to recover this entry!",
                type               : "input",
                inputType          : "password",
                showCancelButton   : true,
                confirmButtonColor : "#EEDD55",
                confirmButtonText  : "Yes, delete!",
                closeOnConfirm     : false,
                showLoaderOnConfirm: true
            },
            function (inputValue) {

                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                var params = {
                    i: user.id,
                    p: inputValue
                };
                dataHandler.deletePendingUser(params)
                    .then(function (data) {
                        user.deleting = false;
                        if (data.c == 0) {
                            $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
                            swal('', data.d, 'success');
                        } else {
                            swal('', data.d, 'error');
                        }

                    }, function (error) {
                        user.deleting = false;
                        swal('', 'Failed to Delete User', 'error');
                    });
            });
    }

});

adminApp.controller('terminatedUsersController', function ($scope, $http, dataHandler, $q) {
    $scope.userInfoTable = true;

    $scope.userFile = false;

    $scope.loading = true;

    dataHandler.getTerminatedUsers()
        .then(function (data) {
            
            $scope.pendingUsers = data.users;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.refreshUsers = function () {
        dataHandler.getPendingUsers()
            .then(function (data) {
                
                $scope.pendingUsers = data.users;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;
                swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
            });

    };

    $scope.open = function (user) {
        dataHandler.getAvailableRoles(user.id)
            .then(function (data) {
                $scope.availableRoles = data.roles;
            });
        $scope.userInfoTable = false;
        $scope.userProfile = true;
        $scope.userInfo = user;

    };

    $scope.backToUserList = function () {
        $scope.userInfoTable = true;
        $scope.userProfile = false;
    };

    $scope.approveUser = function (user) {
        swal({
                title              : "Confirm Approval",
                text               : "",
                type               : "input",
                inputType          : "password",
                showCancelButton   : true,
                confirmButtonColor : "#557799",
                confirmButtonText  : "Yes, Approve!",
                closeOnConfirm     : false,
                showLoaderOnConfirm: true
            },
            function (inputValue) {
                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                var params = {
                    i: user.id,
                    p: inputValue
                };
                dataHandler.approveUser(params)
                    .then(function (data) {
                        if (data.c == 0) {
                            $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
                            swal('', data.d, 'success');
                        } else {
                            swal('', data.d, 'error');
                        }

                    }, function (error) {
                        swal('', 'Failed to Approve User', 'error');
                    });
            });

    };

    $scope.ignoreUser = function (user) {
        $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
    };

    $scope.deleteUser = function (user) {
        swal({
                title              : "Confirm Deletion",
                text               : "You will not be able to recover this entry!",
                type               : "input",
                inputType          : "password",
                showCancelButton   : true,
                confirmButtonColor : "#EEDD55",
                confirmButtonText  : "Yes, delete!",
                closeOnConfirm     : false,
                showLoaderOnConfirm: true
            },
            function (inputValue) {

                if (inputValue === false) return false;

                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                var params = {
                    i: user.id,
                    p: inputValue
                };
                dataHandler.deletePendingUser(params)
                    .then(function (data) {
                        user.deleting = false;
                        if (data.c == 0) {
                            $scope.pendingUsers.splice($scope.pendingUsers.indexOf(user), 1);
                            swal('', data.d, 'success');
                        } else {
                            swal('', data.d, 'error');
                        }

                    }, function (error) {
                        user.deleting = false;
                        swal('', 'Failed to Delete User', 'error');
                    });
            });
    }

});


adminApp.controller('rolesController', function ($scope, $http, dataHandler, $q) {
    $scope.roleInfoTable = true;
    $scope.roleFile = false;
    $scope.loading = true;

    $scope.arrayContainsObject = function (a, obj) {
        
        for (var i = 0; i < a.length; i++) {
            if (a[i].id == obj.id) {
                return true;
            }
        }
        return false;
    }

    $scope.refreshRoles = function () {
        $scope.loading = true;
        dataHandler.getRoles()
            .then(function (data) {
                
                $scope.roles = data.roles;
                $scope.loading = false;
            }, function (error) {
                $scope.loading = false;
                swal('', error, 'error');

            });
    };

    dataHandler.getRoles()
        .then(function (data) {
            
            $scope.roles = data.roles;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Failed to retrieve roles', 'error');
        });

    dataHandler.getRolesForMatrix()
        .then(function (data) {
            
            $scope.rolesMatrix = data.roles;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Failed to retrieve roles', 'error');
        });

    $scope.elements = [];

    dataHandler.getUiElements()
        .then(function (data) {
            
            $scope.elements = data.elements;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Failed to retrieve uiElements', 'error');
        });

    dataHandler.getPermissions()
        .then(function (data) {
            
            $scope.perms = data.perms;
            $scope.loading = false;
        }, function (error) {
            $scope.loading = false;
            swal('', 'Something Went Wrong While Fetching the Data. Please Refresh the Page', 'warning');
        });

    $scope.open = function (role) {
        $scope.roleProfile = true;
        $scope.roleInfoTable = false;
        $scope.roleInfo = role;
        if (role.name == 'admin_global') {
            $scope.adm_gbl = true;
        } else {
            $scope.adm_gbl = false;
        }
    };

    $scope.close = function () {
        $scope.roleProfile = false;
        $scope.roleInfoTable = true;
    };

    $scope.addPerm = function () {
        $scope.addPermSubmitProgress = true;
        json = JSON.parse($scope.role_perms);
        //alert($scope.role_perms);
        var defer = $q.defer();

        $http.get('/admin/role/attach_permission?role_id=' + $scope.roleInfo.id + '&perm_id=' + json.id)
            .success(function (data) {
                defer.resolve(data);

                $scope.addPermSubmitProgress = false;
                if (data.code == '00') {
                    $scope.roleInfo.perms.push(json)
                } else {
                    //alert(data.description);
                    swal('', data.description, 'warning')
                }
                
            })
            .error(function (err, status) {
                defer.reject(err);

                $scope.addPermSubmitProgress = false;
                //alert(err);
                //
                swal('', err, 'error')
            });

        return defer.promise;
    };

    $scope.removePerm = function (x) {
        var index = $scope.roleInfo.perms.indexOf(x);
        $scope.roleInfo.perms[index].progress = true;
        //alert($scope.roleInfo.id + 'perm_id=' + x.id);
        var defer = $q.defer();
        $http.get('/admin/role/detach_permission?role_id=' + $scope.roleInfo.id + '&perm_id=' + x.id)
            .success(function (data) {
                defer.resolve(data);
                $scope.roleInfo.perms[index].progress = false;
                
                if (data.code == '00') {
                    $scope.roleInfo.perms.splice(index, 1)
                } else {
                    alert(data.description);
                }

            })
            .error(function (err, status) {
                defer.reject(err);
                $scope.roleInfo.perms[index].progress = false;
                alert(err);
                
            });

        return defer.promise;
    };

    $scope.tempPerms = [];
    $scope.addTempPerm = function (perm) {
        //perm = $scope.temp_role;
        //alert(perm)
        //jsonObject = JSON.parse(perm);
        if ($scope.tempPerms.indexOf(perm) == -1) {
            $scope.tempPerms.push(perm)
        } else {
            alert(perm.name + ' : is already added!')
        }

    };

    $scope.removeTempPerm = function (perm) {
        $scope.tempPerms.splice($scope.tempPerms.indexOf(perm), 1);
    };

    $scope.submitRole = function () {
        var defer = $q.defer();
        var p = [];

        for (var perm in $scope.tempPerms) {
            p.push($scope.tempPerms[perm].id);
        }

        // alert(JSON.stringify(p));

        $http.get('/admin/role/create?display_name=' + encodeURIComponent($scope.display_name)
            + '&description=' + encodeURIComponent($scope.description) + '&perms=' + encodeURIComponent(JSON.stringify(p)))
            .success(function (data) {

                //Reset form and params
                $('#addRoleForm').trigger('reset');
                $scope.tempPerms = [];
                //******************************
                
                if (data.code == '00') {
                    //alert(data.description);
                    swal('', data.description, 'success')
                } else {
                    //alert('Error code '+ data.code + '(' + data.description + ')');
                    swal('', data.description, 'warning')
                }
            })
            .error(function (err, status) {

                //Reset form and params
                $('#addRoleForm').trigger('reset');
                $scope.tempPerms = [];
                //******************************

                defer.reject(err);
                // alert(err);
                swal('', err, 'error');
                
            });
        return defer.promise;
    };

    $scope.deleteRole = function () {

        var defer = $q.defer();

        $scope.deleteRoleProgress = true;

        $http.get('/admin/role/delete/' + $scope.roleInfo.id)
            .success(function (data) {
                $scope.deleteRoleProgress = false;
                
                if (data.code == '00') {
                    $scope.close();
                    $scope.refreshRoles();
                } else {
                    //alert(data);
                    swal('', data.description, 'warning');
                }
            })
            .error(function (err, status) {
                defer.reject(err);
                $scope.deleteRoleProgress = false;
                //alert(err);
                swal('', err, 'error');
                
            });
        return defer.promise;
    }
});

adminApp.controller('permsController', function ($scope, $http, dataHandler, $q) {
    $scope.submitPermission = function () {
        // alert('params = ' + $scope.display_name + ' ' + $scope.category + ' ' + $scope.description)

        var defer = $q.defer();
        $http.get('/admin/permission/create?display_name=' + encodeURIComponent($scope.display_name) + '&category=' + encodeURIComponent($scope.category) + '&description=' + encodeURIComponent($scope.description))
            .success(function (data) {
                
                $('#addPermsForm').trigger('reset');
                if (data.code == '00') {
                    //$scope.roleInfo.perms.splice(index,1)
                    //alert(data.description);
                    swal('', data.description, 'success')
                } else {
                    //alert(data.description);
                    swal('', data.description, 'warning')

                }
            })
            .error(function (err, status) {
                $('#addPermsForm').trigger('reset');
                defer.reject(err);
                //$scope.roleInfo.perms[index].progress = false;
                //alert(err);
                swal('', err, 'error');
                
            });
        return defer.promise;
    }
});

adminApp.controller('uiElementController', function ($scope, $http, $q, dataHandler) {

    $scope.ui_roles = [];
    var elementID;
    $scope.showUiRoles = function (id) {
        elementID = id;
        $scope.ui_roles = [];
        dataHandler.getUiElementRoles(id)
            .then(function (data) {
                
                $scope.ui_roles = data;
                $('#modalRoles').openModal();
            }, function (error) {
                swal('', error, 'error');
            });

        dataHandler.getRoles()
            .then(function (data) {
                
                $scope.all_roles = data.roles;
            }, function (error) {
                $scope.loading = false;
                swal('', error, 'error');
            });
    };

    $scope.removeUiRole = function (role) {
        role.progress = true;

        var defer = $q.defer();
        
        $http.get('/ui/element/remove_role/' + elementID + '/' + role.id)
            .success(function (data) {
                
                role.progress = false;
                //$('#addPermsForm').trigger('reset');
                if (data.code == '00') {
                    swal('', data.description, 'success');
                    $scope.ui_roles.splice($scope.ui_roles.indexOf(role), 1);
                    $scope.all_roles.push(role);
                } else {
                    swal('', data.description, 'warning')

                }
            })
            .error(function (err, status) {
                //  $('#addPermsForm').trigger('reset');
                defer.reject(err);
                role.progress = false;
                swal('', err, 'error');
                
            });
        return defer.promise;
    };

    $scope.addUiRole = function (role) {
        var defer = $q.defer();
        
        $http.get('/ui/element/add_role/' + elementID + '/' + role.id)
            .success(function (data) {
                
                role.progress = false;
                //$('#addPermsForm').trigger('reset');
                if (data.code == '00') {
                    swal('', data.description, 'success');
                    $scope.all_roles.splice($scope.all_roles.indexOf(role), 1);
                    $scope.ui_roles.push(role);
                } else {
                    swal('', data.description, 'warning')

                }
            })
            .error(function (err, status) {
                defer.reject(err);
                role.progress = false;
                swal('', err, 'error');
                
            });
        return defer.promise;
    };

    //Context menu for Admin roles *****
    $('.uiroles').on('contextmenu', function () {
        return false;
    });

    $(".uiroles").contextmenu(function () {
        id = $(this).attr('id');
        $scope.ui_element_text = $(this).text();
        $scope.showUiRoles(id);
    });
    //*******************************
});

Object.toparams = function ObjecttoParams(obj) {
    var p = [];
    for (var key in obj) {
        p.push(key + '=' + encodeURIComponent(obj[key]));
    }
    return p.join('&');
};
//Stuff of legend for uploading files *****************
adminApp.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function (file, uploadUrl) {
        var fd = new FormData();
        fd.append('csv_data', file);
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers         : {'Content-Type': undefined}
        })
            .success(function (data) {
                alert(data);
                
            })
            .error(function (error) {
                alert(error);
            });
    }
}]);
//****************************************************
var formatter = new Intl.NumberFormat('en-US', {
    style                : 'currency',
    currency             : 'USD',
    minimumFractionDigits: 2
});

adminApp.directive('countdown', [
    'Util',
    '$interval',
    function (Util, $interval) {
        return {
            restrict: 'A',
            scope   : {date: '@'},
            link    : function (scope, element) {
                var future;
                future = new Date(scope.date);
                $interval(function () {
                    var diff;
                    diff = Math.floor((future.getTime() - new Date().getTime()) / 1000);
                    return element.text(Util.dhms(diff));
                }, 1000);
            }
        };
    }
]);

adminApp.factory('Util', [function () {
    return {
        dhms: function (t) {
            var days, hours, minutes, seconds;
            days = Math.floor(t / 86400);
            t -= days * 86400;
            hours = Math.floor(t / 3600) % 24;
            t -= hours * 3600;
            minutes = Math.floor(t / 60) % 60;
            t -= minutes * 60;
            seconds = t % 60;
            return [
                days + 'd',
                hours + 'h',
                minutes + 'm',
                seconds + 's'
            ].join(' ');
        }
    };
}]);

adminApp.directive('dateFormat', function () {
    return {
        require: 'ngModel',
        link   : function (scope, element, attr, ngModelCtrl) {
            //Angular 1.3 insert a formater that force to set model to date object, otherwise throw exception.
            //Reset default angular formatters/parsers
            ngModelCtrl.$formatters.length = 0;
            ngModelCtrl.$parsers.length = 0;
        }
    };
});

adminApp.filter('percentage', ['$filter', function ($filter) {
    return function (input, decimals) {
        return $filter('number')(input * 100, decimals) + '%';
    };
}]);


