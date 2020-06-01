'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('admins_groupsCtrl', ['$scope', '$routeParams', '$location', '$route', '$filter', 'admins_groupsFactory', function ($scope, $routeParams, $location, $route, $filter, admins_groupsFactory) {

        $scope.admins_groups = {};
        $scope.admins_groups_data = {};

        $scope.mode = "Create";

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
            $scope.admins_groups = resp.data;
            for(var i=0; i<$scope.admins_groups.length; i++) {
                var newAdminsGroupsModifyDatetime = new Date($scope.admins_groups[i].modify_datetime).toISOString();
                $scope.admins_groups[i].modify_datetime = $filter('date')(newAdminsGroupsModifyDatetime, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var admins_groups_query = function(page, per_page) {
            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction;
            var query = admins_groupsFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(theAdminsGroups) {
            theAdminsGroups.admin_id = $scope.admin.id;
            theAdminsGroups.status = !theAdminsGroups.status;
            admins_groupsFactory.update(theAdminsGroups)
                .success(function(data) {
                    notification("success",data.message);
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        $scope.$watch('current_page', function(new_page, old_page) {
            if (new_page != old_page) {
                admins_groups_query(new_page, $scope.per_page);
            }
        });

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            admins_groups_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        admins_groups_query($scope.page, $scope.per_page);

        if (!angular.isUndefined($routeParams.id)) {
            admins_groupsFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.admins_groups_data = data;
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        $scope.submitAdminsGroups = function(theAdminsGroups) {
            theAdminsGroups.admin_id = $scope.admin.id;
            if ($scope.mode == "Edit") {
                admins_groupsFactory.update(theAdminsGroups)
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
                admins_groupsFactory.create(theAdminsGroups)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('admins_groups');
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

        $scope.deleteAdminsGroups = function(theAdminsGroups) {
            var id = theAdminsGroups.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                admins_groupsFactory.delete(theAdminsGroups).success(function(data) {
                    if(data.is_error == false){
                        notification("success",data.message);
                        $route.reload();
                    }
                    if(data.is_error == true){
                        notification("error",data.message);
                    }
                }).error(function() {
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
