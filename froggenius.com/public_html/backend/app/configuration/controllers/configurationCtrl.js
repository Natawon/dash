'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('configurationCtrl', ['$scope', '$routeParams', '$route', '$filter', 'settingsFactory', 'configurationFactory',
        function ($scope, $routeParams, $route, $filter, settingsFactory, configurationFactory) {

        $scope.configuration = {};
        $scope.configuration_data = {};

        configurationFactory.get().success(function(data) {
            $scope.configuration_data = data;
            $scope.mode = "Edit";
        });

        $scope.base_configuration_logo = settingsFactory.getURL('base_configuration_logo');
        $scope.base_configuration_event_banner = settingsFactory.getURL('base_configuration_event_banner');
        $scope.base_configuration_file_present = settingsFactory.getURL('base_configuration_file_present');

        $scope.submitConfiguration = function(theConfiguration) {
            theConfiguration.admin_id = $scope.admin.id;
            if ($scope.mode == "Edit") {
                configurationFactory.update(theConfiguration)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function() {
                        notification("error"," No Access-Control-Allow-Origin");
                    });
            }
        };

        $scope.toggleEventBannerStatus = function(theConfiguration) {
            theConfiguration.admin_id = $scope.admin.id;
            if (theConfiguration.event_banner_status == 1) { theConfiguration.event_banner_status = 0; } else { theConfiguration.event_banner_status = 1; }
            configurationFactory.update(theConfiguration)
                .success(function(data) {
                    notification("success",data.message);
                    $location.path('configuration');
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        };

        //notification
        var notification = function (status,alert) {
            if(status == "success") {
                var n = noty({
                    text        : '<div class="alert alert-success"><p><strong> '+ alert +' </strong></p></div>',
                    layout      : 'topRight',
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000
                });
            } else {
                var n = noty({
                    text        : '<div class="alert alert-danger"><p><strong> '+ alert +' </strong></p></div>',
                    layout      : 'topRight',
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000
                });
            }
        }

    }]);
