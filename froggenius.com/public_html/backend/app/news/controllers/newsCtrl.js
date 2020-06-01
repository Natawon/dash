'use strict';

/**
 * @ngdoc function
 * @name newappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the newappApp
 */
angular.module('newApp')
    .controller('newsCtrl', ['$scope', '$routeParams', '$location', '$route', '$state', '$filter', 'newsFactory', 'news_groupsFactory', 'settingsFactory', function ($scope, $routeParams, $location, $route, $state, $filter, newsFactory, news_groupsFactory, settingsFactory) {

        $scope.news = {};
        $scope.news_groups = {};
        $scope.news_data = {};

        $scope.mode = "Create";

        $scope.base_news_picture = settingsFactory.getURL('base_news_picture');
        $scope.base_news_thumbnail = settingsFactory.getURL('base_news_thumbnail');

        ///Add on datepicker dateFormat
        $("#create_datetime").datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            onSelect: function (date) {
                $scope.news_data.create_datetime = date;
            }
        });

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
            $scope.news = resp.data;
            for(var i=0; i<$scope.news.length; i++) {
                var newNewsModifyDatetime = new Date($scope.news[i].modify_datetime).toISOString();
                $scope.news[i].modify_datetime = $filter('date')(newNewsModifyDatetime, 'dd MMM yyyy HH:mm:ss');
            }
            set_pagination(resp);
        };

        var news_query = function(page, per_page) {
            var query_string = "&page="+ page +"&per_page="+ per_page +"&order_by="+$scope.sorting_order+"&order_direction="+$scope.sorting_direction;
            var query = newsFactory.query(query_string);
            query.success(success_callback);
        };

        $scope.toggleStatus = function(theNews) {
            theNews.admin_id = $scope.admin.id;
            // theNews.status = !theNews.status;
            if (parseInt(theNews.status) === 1) {
                theNews.status = 0;
            } else {
                theNews.status = 1;
            }
            newsFactory.update(theNews)
                .success(function(data) {
                    notification("success",data.message);
                    $location.path('news');
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        };

        $scope.enableSortable = function() {
            angular.element('.ui-sortable').sortable( "enable" );
        };

        $scope.disableSortable = function() {
            angular.element('.ui-sortable').sortable( "disable" );
        };

        $scope.sortOrder = function(theNews) {
            newsFactory.sort(theNews)
                .success(function(data) {
                    notification("success",data.message);
                    // $route.reload();
                    news_query($scope.current_page, $scope.per_page);
                    $scope.enableSortable();
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
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

                newsFactory.sort(dataSort).success(function() {
                    notification("success", "The news has been sortable.");
                    news_query($scope.current_page, $scope.per_page);
                });
            }
        };

        $scope.$watch('current_page', function(new_page, old_page) {
            if (new_page != old_page) {
                news_query(new_page, $scope.per_page);
            }
        });

        $scope.sort_by = function(newSortingOrder) {
            if ($scope.sorting_order == newSortingOrder) {
                $scope.sorting_direction = ($scope.sorting_direction=='desc')?'asc':'desc';
            }
            $scope.sorting_order = newSortingOrder;
            news_query($scope.page, $scope.per_page);
            $('th i').each(function() {
                $(this).removeClass().addClass('fa fa-sort');
            });
            if ($scope.sorting_direction == 'desc') {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-up');
            } else {
                $('th.'+newSortingOrder+' i').removeClass().addClass('fa fa-sort-down');
            }
        };

        news_query($scope.page, $scope.per_page);

        if (!angular.isUndefined($routeParams.id)) {
            newsFactory.get({id:$routeParams.id})
                .success(function(data) {
                    $scope.news_data = data;
                    $scope.news_data.news_groups_id = {id:$scope.news_data.news_groups_id};
                    $scope.mode = "Edit";
                })
                .error(function() {
                    notification("error"," No Access-Control-Allow-Origin");
                });
        }

        news_groupsFactory.all().success(function(data) {
            $scope.news_groups = data;
        })

        $scope.submitNews = function(theNews) {

            theNews.admin_id = $scope.admin.id;
            
            if (!angular.isUndefined(theNews.news_groups_id.id)) {
                theNews.news_groups_id = theNews.news_groups_id.id;
            }

            if ($scope.mode == "Edit") {
                newsFactory.update(theNews)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('news');
                        }
                        if(data.is_error == true){
                            notification("error",data.message);
                        }
                    })
                    .error(function() {
                        notification("error"," No Access-Control-Allow-Origin");
                    });
            }else{
                newsFactory.create(theNews)
                    .success(function(data) {
                        if(data.is_error == false){
                            notification("success",data.message);
                            $location.path('news');
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

        $scope.deleteNews = function(theNews) {
            var id = theNews.id;
            var alert = confirm("Are you sure to delete #" + id + " ?");
            if(alert == true) {
                newsFactory.delete(theNews)
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
        };

        // Custom Script
        $(document).ready(function() {
            // TagsInput
            setTimeout(function() {
                $('.select-tagss').each(function () {
                    $(this).tagsinput({
                        tagClass: 'label label-primary'
                    });
                });
            },500);
        });

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
