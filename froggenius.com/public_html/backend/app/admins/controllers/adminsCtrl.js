'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('adminsCtrl', ['$scope', '$routeParams', '$location',  '$route', '$filter', 'adminsFactory', 'admins_groupsFactory', 'settingsFactory', function ($scope, $routeParams, $location, $route, $filter, adminsFactory, admins_groupsFactory, settingsFactory) {

        $scope.admins = {};
        $scope.admins_groups = {};
        $scope.admins_data = {}

        $scope.mode = "Create";

        $scope.base_admins_avatar = settingsFactory.getURL('base_admins_avatar');

        $scope.max_size = 5;
        $scope.page = 1;
        $scope.per_page = 10;
        $scope.current_page = 1;
        $scope.sorting_order = 'id';
        $scope.sorting_direction = 'desc';
        $scope.keyword = "";

        var set_pagination = function(pagination_data) {
            $scope.total = pagination_data.total;
            $scope.last_page = pagination_data.last_page;
            $scope.current_page = pagination_data.current_page;
            $scope.per_page = pagination_data.per_page;
        };

        var success_callback = function(resp) {
            $scope.admins = resp.data;
            for(var i=0; i<$scope.admins.length; i++) {
                var newAdminsLastLogin = new Date($scope.admins[i].last_login).toISOString();
                $scope.admins[i].last_login = $filter('date')(newAdminsLastLogin, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var admins_query = function(page, per_page) {
            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction;
            var query = adminsFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(theAdmins) {
            theAdmins.admin_id = $scope.admin.id;
            theAdmins.status = !theAdmins.status;
            adminsFactory.update(theAdmins)
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

        $scope.$watch('current_page', function(new_page, old_page) {
            if (new_page != old_page) {
                admins_query(new_page, $scope.per_page);
            }
        });

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            admins_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        admins_query($scope.page, $scope.per_page);

        if (!angular.isUndefined($routeParams.id)) {
            adminsFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.admins_data = data;
                    $scope.admins_data.admins_groups_id = {id:$scope.admins_data.admins_groups_id};
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        admins_groupsFactory.all().success(function(data) {
            $scope.admins_groups = data;
        })

        $scope.submitAdmins = function(theAdmins) {
            theAdmins.admin_id = $scope.admin.id;
            if (!angular.isUndefined(theAdmins.admins_groups_id.id)) {
                theAdmins.admins_groups_id = theAdmins.admins_groups_id.id;
            }
            if ($scope.mode == "Edit") {
                adminsFactory.update(theAdmins)
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
            }else{
                adminsFactory.create(theAdmins)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('admins');
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function() {
                        notification("error"," No Access-Control-Allow-Origin");
                    });
            }
        }

        $scope.deleteAdmins = function(theAdmins) {
            var id = theAdmins.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                adminsFactory.delete(theAdmins)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $route.reload();
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function() {
                        notification("error"," No Access-Control-Allow-Origin");
                    });
            }
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
