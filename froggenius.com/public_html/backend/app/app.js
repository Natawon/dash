'use strict';

/**
 * @ngdoc overview
 * @name newappApp
 * @description
 * # newappApp
 *
 * Main module of the application.
 */
var MakeApp = angular
    .module('newApp', [
        'ngAnimate',
        'ngCookies',
        'ngResource',
        'ngRoute',
        'ngSanitize',
        'ngTouch',
        'ui.bootstrap',
        'angularFileUpload',
        'checklist-model',
        'summernote',
        'ui.sortable',
        'ui.router'
    ]);

MakeApp.config(['$routeProvider', '$httpProvider', function ($routeProvider, $httpProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'app/dashboard/views/dashboard.html',
            controller: 'dashboardCtrl'
        })
        .when('/admins', {
            templateUrl: 'app/admins/views/list.html',
            controller: 'adminsCtrl'
        })
        .when('/admins/create', {
            templateUrl: 'app/admins/views/create-edit.html',
            controller: 'adminsCtrl'
        })
        .when('/admins/:id/edit', {
            templateUrl: 'app/admins/views/create-edit.html',
            controller: 'adminsCtrl'
        })
        .when('/configuration', {
            templateUrl: 'app/configuration/views/edit.html',
            controller: 'configurationCtrl'
        })
        .when('/news_groups', {
            templateUrl: 'app/news_groups/views/list.html',
            controller: 'news_groupsCtrl'
        })
        .when('/news_groups/create', {
            templateUrl: 'app/news_groups/views/create-edit.html',
            controller: 'news_groupsCtrl'
        })
        .when('/news_groups/:id/edit', {
            templateUrl: 'app/news_groups/views/create-edit.html',
            controller: 'news_groupsCtrl'
        })
        .when('/news', {
            templateUrl: 'app/news/views/list.html',
            controller: 'newsCtrl'
        })
        .when('/news/create', {
            templateUrl: 'app/news/views/create-edit.html',
            controller: 'newsCtrl'
        })
        .when('/news/:id/edit', {
            templateUrl: 'app/news/views/create-edit.html',
            controller: 'newsCtrl'
        })
        .when('/event_banners', {
            templateUrl: 'app/event_banners/views/list.html',
            controller: 'event_bannersCtrl'
        })
        .when('/event_banners/create', {
            templateUrl: 'app/event_banners/views/create-edit.html',
            controller: 'event_bannersCtrl'
        })
        .when('/event_banners/:id/edit', {
            templateUrl: 'app/event_banners/views/create-edit.html',
            controller: 'event_bannersCtrl'
        })
        .when('/presentations', {
            templateUrl: 'app/presentations/views/list.html',
            controller: 'presentationsCtrl'
        })
        .when('/presentations/create', {
            templateUrl: 'app/presentations/views/create-edit.html',
            controller: 'presentationsCtrl'
        })
        .when('/presentations/:id/edit', {
            templateUrl: 'app/presentations/views/create-edit.html',
            controller: 'presentationsCtrl'
        })
        .otherwise({
            redirectTo: '/'
        });

    var logsOutUserOn401 = function ($location, $q, sessionService) {
        return {
            'response': function (response) {
                return response;
            },
            'responseError': function (rejection) {
                if (rejection.status === 401) {
                    sessionService.unset('authenticated');
                    window.location.href = "login.html";
                    return $q.reject(rejection);
                }
                return $q.reject(rejection);
            }
        }
    };
    $httpProvider.interceptors.push(logsOutUserOn401);
    $httpProvider.defaults.withCredentials = true;
}]);

// Route State Load Spinner(used on page or content load)
MakeApp.directive('ngSpinnerLoader', ['$rootScope',
    function ($rootScope) {
        return {
            link: function (scope, element, attrs) {
                // by defult hide the spinner bar
                element.addClass('hide'); // hide spinner bar by default
                // display the spinner bar whenever the route changes(the content part started loading)
                $rootScope.$on('$routeChangeStart', function () {
                    element.removeClass('hide'); // show spinner bar
                });
                // hide the spinner bar on rounte change success(after the content loaded)
                $rootScope.$on('$routeChangeSuccess', function () {
                    setTimeout(function () {
                        element.addClass('hide'); // hide spinner bar
                    }, 500);
                    $("html, body").animate({
                        scrollTop: 0
                    }, 500);
                });
            }
        };
    }
]);

MakeApp.directive('ckEditor', function () {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);
            if (!ngModel) return;
            ck.on('instanceReady', function () {
                setTimeout(function() {
                    ck.setData(ngModel.$viewValue);
                }, 300);
            });
            function updateModel() {
                scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            }
            ck.on('change', updateModel);
            ck.on('key', updateModel);
            // ck.on('dataReady', updateModel);
            ck.on('pasteState', updateModel);

            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});

var redirectToLogin = function () {
    window.location.href = "login.html";
};

MakeApp.run(function ($rootScope, $location, authenticationService) {

    $rootScope.$on('$routeChangeStart', function (event, next, current) {

        if (authenticationService.isLoggedIn() !== "true" ||
            typeof authenticationService.getUser() == "undefined" ||
            authenticationService.getUser() == "" ||
            authenticationService.getUser() == null) {
            redirectToLogin();
        }


    });
});
