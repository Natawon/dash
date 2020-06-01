/**
 * Created by root on 17/7/2558.
 */
'use strict';

angular.module('newApp')
    .controller('loginCtrl', ['$scope', '$location', 'authenticationService', 'adminsFactory', function ($scope, $location, authenticationService, adminsFactory) {

    $scope.credentials = { username:'', password:'', remember:false};

    $scope.login = function () {
        authenticationService.login($scope.credentials).success(function(data) {
            window.location.href = "/backend/";
        }).error(function(data) {
            notification("error",data.message);
        });
    }

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
