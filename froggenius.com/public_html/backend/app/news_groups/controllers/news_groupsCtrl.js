'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('news_groupsCtrl', ['$scope', '$routeParams', '$location', '$route', '$filter', 'news_groupsFactory', function ($scope, $routeParams, $location, $route, $filter, news_groupsFactory) {

        $scope.news_groups = {};
        $scope.news_groups_data = {};

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
            $scope.news_groups = resp.data;
            for(var i=0; i<$scope.news_groups.length; i++) {
                var newNewsGroupsModifyDatetime = new Date($scope.news_groups[i].modify_datetime).toISOString();
                $scope.news_groups[i].modify_datetime = $filter('date')(newNewsGroupsModifyDatetime, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var news_groups_query = function(page, per_page) {
            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction;
            var query = news_groupsFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(theNewsGroups) {
            theNewsGroups.admin_id = $scope.admin.id;  
            theNewsGroups.status = !theNewsGroups.status;
            news_groupsFactory.update(theNewsGroups)
                .success(function(data) {
                    notification("success",data.message);
                    $location.path('news_groups');
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        $scope.$watch('current_page', function(new_page, old_page) {
            if (new_page != old_page) {
                news_groups_query(new_page, $scope.per_page);
            }
        });

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            news_groups_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        news_groups_query($scope.page, $scope.per_page);

        if (!angular.isUndefined($routeParams.id)) {
            news_groupsFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.news_groups_data = data;
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        $scope.submitNewsGroups = function(theNewsGroups) {
            theNewsGroups.admin_id = $scope.admin.id;  
            if ($scope.mode == "Edit") {
                news_groupsFactory.update(theNewsGroups)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('news_groups');
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function() {
                        notification("error"," No Access-Control-Allow-Origin");
                    });
            }else{
                news_groupsFactory.create(theNewsGroups)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('news_groups');
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

        $scope.deleteNewsGroups = function(theNewsGroups) {
            var id = theNewsGroups.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                news_groupsFactory.delete(theNewsGroups).success(function(data) {
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
