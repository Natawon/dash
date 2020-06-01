
angular.module('newApp').factory('admins_groupsFactory', ['$http', 'settingsFactory', function ($http, settingsFactory) {

    return {
        query: function(queryString) {
            return $http.get(settingsFactory.get('admins_groups') + '?' + queryString);
        },
        get: function(theAdminsGroups) {
            return $http.get(settingsFactory.get('admins_groups') + '/' + theAdminsGroups.id);
        },
        update: function(theAdminsGroups) {
            return $http(
                {
                    url: settingsFactory.get('admins_groups') + '/' + theAdminsGroups.id,
                    method: "PUT",
                    data: theAdminsGroups,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        create: function(theAdminsGroups) {
            return $http(
                {
                    url: settingsFactory.get('admins_groups'),
                    method: "POST",
                    data: theAdminsGroups,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        delete: function(theAdminsGroups) {
            return $http.delete(settingsFactory.get('admins_groups') + '/' + theAdminsGroups.id);
        },
        search: function(queryString) {
            return $http.get(settingsFactory.get('admins_groups') + '/search?' + queryString);
        },
        all: function() {
            return $http.get(settingsFactory.get('admins_groups') + '/all');
        }
    }
}]);




