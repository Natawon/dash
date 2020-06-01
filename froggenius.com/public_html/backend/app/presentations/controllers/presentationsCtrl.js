'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('presentationsCtrl', ['$scope', '$routeParams', '$location', '$route', '$filter', 'presentationsFactory', 'functionsFactory', 'settingsFactory',
    function ($scope, $routeParams, $location, $route, $filter, presentationsFactory, functionsFactory, settingsFactory) {

        $scope.presentations = {};
        $scope.presentations_data = {};

        $scope.mode = "Create";

        $scope.base_presentations_file = settingsFactory.getURL('base_presentations_file');

        $scope.max_size = 5;
        $scope.page = 1;
        $scope.per_page = 10;
        $scope.current_page = 1;
        $scope.sorting_order = 'order';
        $scope.sorting_direction = 'asc';
        $scope.keyword = "";

        var set_pagination = function(pagination_data) {

            $scope.total = pagination_data.total;
            $scope.last_page = pagination_data.last_page;
            $scope.current_page = pagination_data.current_page;
            $scope.per_page = pagination_data.per_page;

        };

        var success_callback = function(resp) {
            $scope.presentations = resp.data;
            for(var i=0; i<$scope.presentations.length; i++) {
                var newPresentationsModifyDatetime = new Date($scope.presentations[i].modify_datetime).toISOString();
                $scope.presentations[i].modify_datetime = $filter('date')(newPresentationsModifyDatetime, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var presentations_query = function(page, per_page) {
            var filters = angular.element('.frm-filter').serialize();
            filters = filters !== undefined ? "&"+filters : "";

            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction+filters;
            var query = presentationsFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(thePresentations, forceUpdate) {
            thePresentations.admin_id = $scope.admin.id;
            if (thePresentations.status == 1) { thePresentations.status = 0; } else { thePresentations.status = 1; }
            if ($scope.mode == "Edit" || forceUpdate === true) {
                presentationsFactory.update(thePresentations)
                    .success(function(data) {
                        notification("success",data.message);
                    })
                    .error(function() {
                        notification("error", settingsFactory.getConstant('server_error'));
                    });
            }
        };

        $scope.updateStatus = function(thePresentations) {
            if (thePresentations.status == 1) { thePresentations.status = 0; } else { thePresentations.status = 1; }
            presentationsFactory.updateStatus({'id': thePresentations.id, 'status': thePresentations.status})
                .success(function(data) {
                    if (data.is_error == false) {
                        notification("success",data.message);
                    } else {
                        notification("error",data.message);
                    }
                })
                .error(function() {
                    notification("error", settingsFactory.getConstant('server_error'));
                });
        };

        $scope.$watch('current_page', function(new_page, old_page) {
            if (new_page != old_page) {
                presentations_query(new_page, $scope.per_page);
            }
        });

        $scope.enableSortable = function() {
            angular.element('.ui-sortable').sortable( "enable" );
        };

        $scope.disableSortable = function() {
            angular.element('.ui-sortable').sortable( "disable" );
        };

        $scope.sortOrder = function(thePresentations) {
            presentationsFactory.sort(thePresentations)
                .success(function(data) {
                    notification("success",data.message);
                    // $route.reload();
                    presentations_query($scope.current_page, $scope.per_page);
                    $scope.enableSortable();
                })
                .error(function() {
                    notification("error", settingsFactory.getConstant('server_error'));
                    $scope.enableSortable();
                });
        };

        $scope.sortableOptions = {
            stop: function(e, ui) {
                var $sorted = ui.item;

                var $prev = $sorted.prev();
                var $next = $sorted.next();

                var dataSort = {
                    id: $sorted.data('id')
                };

                if ($prev.length > 0) {
                    dataSort.type = 'moveAfter';
                    dataSort.positionEntityId = $prev.data('id');
                } else if ($next.length > 0) {
                    dataSort.type = 'moveBefore';
                    dataSort.positionEntityId = $next.data('id');
                } else {
                    notification("error"," Something wrong!");
                }

                presentationsFactory.sort(dataSort).success(function() {
                    notification("success", "The presentations has been sortable.");
                    presentations_query($scope.current_page, $scope.per_page);
                });
            }
        };

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            presentations_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        presentations_query($scope.page, $scope.per_page);

        $scope.changeFilter = function() {
            presentations_query($scope.page, $scope.per_page);
        };

        if (!angular.isUndefined($routeParams.id)) {
            presentationsFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.presentations_data = data;
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error", settingsFactory.getConstant('server_error'));
                });
        }

        $scope.submitPresentations = function(thePresentations, nextAction) {
            functionsFactory.clearError(angular.element('.presentations-frm'));
            thePresentations.admin_id = $scope.admin.id;
            if ($scope.mode == "Edit") {
                presentationsFactory.update(thePresentations)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);

                            switch (nextAction) {
                                case 'continue_editing' : $route.reload(); break;
                                default                 : $location.path('presentations'); break;
                            }
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function(data) {
                        functionsFactory.handleError(data, angular.element('.presentations-frm'));
                    });
            }else{
                presentationsFactory.create(thePresentations)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);

                            switch (nextAction) {
                                case 'add_another'      : $route.reload(); break;
                                case 'continue_editing' : $location.path('presentations/'+ data.createdId +'/edit'); break;
                                default                 : $location.path('presentations'); break;
                            }
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function(data) {
                        functionsFactory.handleError(data, angular.element('.presentations-frm'));
                    });
            }
        }

        $scope.deletePresentations = function(thePresentations) {
            var id = thePresentations.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                presentationsFactory.delete(thePresentations)
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
                        notification("error", settingsFactory.getConstant('server_error'));
                    });
            }
        }

        // $scope.sortableOptions = {
        //     stop: function(e, ui) {
        //         for (var index in $scope.presentations) {
        //             $scope.presentations[index].admin_id = $scope.admin.id
        //             $scope.presentations[index].order = parseInt(index) + 1;
        //         }
        //         presentationsFactory.orders($scope.presentations).success(function() {
        //             presentations_query($scope.page, $scope.per_page);
        //             notification("success", "The presentations has been sortable.");
        //         });
        //     }
        // };

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
