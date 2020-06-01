/**
 * Created by m on 31/3/2558.
 */
'use strict';

angular.module('newApp')
    .factory('authenticationService', ['$http', 'sessionService', 'userStorage', 'settingsFactory', function ($http, sessionService, userStorage, settingsFactory) {
        var cacheSession = function() {
            sessionService.set('authenticated', true);
        };

        var uncacheSession = function() {
            sessionService.unset('authenticated');
        };

        var loginError = function(response) {
            //flashService.show(response.flash);
        };

        var saveUser = function(data) {
            //console.log(data);
            userStorage.setUser(data);
        };

        var deleteUser = function() {
            userStorage.deleteUser();
        };

        var getUser = function() {
            return userStorage.getUser();
        };

        return {
            login: function(credentials) {
                var login = $http.post(settingsFactory.get('auth') + '/login', credentials);
                login.success(cacheSession);
                login.success(saveUser);
                login.error(loginError);
                return login;
            },
            logout: function() {
                var logout = $http.get(settingsFactory.get('auth') + '/logout');
                logout.success(uncacheSession);
                logout.success(deleteUser);
                return logout;
            },
            isLoggedIn: function() {
                return sessionService.get('authenticated');
            },
            getUser: function() {
                return getUser();
            },
            saveUser: function(user) {
                return saveUser(user);
            }
        };
}]);