'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('event_bannersCtrl', ['$scope', '$routeParams', '$location', '$route', '$filter', 'event_bannersFactory', 'functionsFactory', 'settingsFactory',
    function ($scope, $routeParams, $location, $route, $filter, event_bannersFactory, functionsFactory, settingsFactory) {

        $scope.event_banners = {};
        $scope.event_banners_data = {
            "url": "#"
        };

        $scope.mode = "Create";

        $scope.base_event_banners_picture = settingsFactory.getURL('base_event_banners_picture');

        ///Add on datepicker dateFormat
        $( "#start_date" ).datepicker({
            dateFormat: "yy-mm-dd",
            onSelect:function (date) {
                $scope.event_banners_data.start_date = date;
            }
        });

        $( "#end_date" ).datepicker({
            dateFormat: "yy-mm-dd",
            onSelect:function (date) {
                $scope.event_banners_data.end_date = date;
            }
        });
        ///

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
            $scope.event_banners = resp.data;
            for(var i=0; i<$scope.event_banners.length; i++) {
                var newEventBannersModifyDatetime = new Date($scope.event_banners[i].modify_datetime).toISOString();
                $scope.event_banners[i].modify_datetime = $filter('date')(newEventBannersModifyDatetime, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var event_banners_query = function(page, per_page) {
            var filters = angular.element('.frm-filter').serialize();
            filters = filters !== undefined ? "&"+filters : "";

            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction+filters;
            var query = event_bannersFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(theEventBanners, forceUpdate) {
            theEventBanners.admin_id = $scope.admin.id;
            if (theEventBanners.status == 1) { theEventBanners.status = 0; } else { theEventBanners.status = 1; }
            if ($scope.mode == "Edit" || forceUpdate === true) {
                event_bannersFactory.update(theEventBanners)
                    .success(function(data) {
                        notification("success",data.message);
                    })
                    .error(function() {
                        notification("error", settingsFactory.getConstant('server_error'));
                    });
            }
        };

        $scope.updateStatus = function(theEventBanners) {
            if (theEventBanners.status == 1) { theEventBanners.status = 0; } else { theEventBanners.status = 1; }
            event_bannersFactory.updateStatus({'id': theEventBanners.id, 'status': theEventBanners.status})
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
                event_banners_query(new_page, $scope.per_page);
            }
        });

        $scope.enableSortable = function() {
            angular.element('.ui-sortable').sortable( "enable" );
        };

        $scope.disableSortable = function() {
            angular.element('.ui-sortable').sortable( "disable" );
        };

        $scope.sortOrder = function(theEventBanners) {
            event_bannersFactory.sort(theEventBanners)
                .success(function(data) {
                    notification("success",data.message);
                    // $route.reload();
                    event_banners_query($scope.current_page, $scope.per_page);
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

                event_bannersFactory.sort(dataSort).success(function() {
                    notification("success", "The event_banners has been sortable.");
                    event_banners_query($scope.current_page, $scope.per_page);
                });
            }
        };

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            event_banners_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        event_banners_query($scope.page, $scope.per_page);

        $scope.changeFilter = function() {
            event_banners_query($scope.page, $scope.per_page);
        };

        if (!angular.isUndefined($routeParams.id)) {
            event_bannersFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.event_banners_data = data;
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error", settingsFactory.getConstant('server_error'));
                });
        }

        $scope.submitEventBanners = function(theEventBanners, nextAction) {
            functionsFactory.clearError(angular.element('.event_banners-frm'));
            theEventBanners.admin_id = $scope.admin.id;
            if ($scope.mode == "Edit") {
                event_bannersFactory.update(theEventBanners)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);

                            switch (nextAction) {
                                case 'continue_editing' : $route.reload(); break;
                                default                 : $location.path('event_banners'); break;
                            }
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function(data) {
                        functionsFactory.handleError(data, angular.element('.event_banners-frm'));
                    });
            }else{
                event_bannersFactory.create(theEventBanners)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);

                            switch (nextAction) {
                                case 'add_another'      : $route.reload(); break;
                                case 'continue_editing' : $location.path('event_banners/'+ data.createdId +'/edit'); break;
                                default                 : $location.path('event_banners'); break;
                            }
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function(data) {
                        functionsFactory.handleError(data, angular.element('.event_banners-frm'));
                    });
            }
        }

        $scope.deleteEventBanners = function(theEventBanners) {
            var id = theEventBanners.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                event_bannersFactory.delete(theEventBanners)
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
        //         for (var index in $scope.event_banners) {
        //             $scope.event_banners[index].admin_id = $scope.admin.id
        //             $scope.event_banners[index].order = parseInt(index) + 1;
        //         }
        //         event_bannersFactory.orders($scope.event_banners).success(function() {
        //             event_banners_query($scope.page, $scope.per_page);
        //             notification("success", "The event_banners has been sortable.");
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
