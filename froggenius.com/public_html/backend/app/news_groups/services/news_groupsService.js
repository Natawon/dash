angular.module('newApp').factory('news_groupsFactory', ['$http', 'settingsFactory', function ($http, settingsFactory) {

    return {
        query: function(queryString) {
            return $http.get(settingsFactory.get('news_groups') + '?' + queryString);
        },
        get: function(theNewsGroups) {
            return $http.get(settingsFactory.get('news_groups') + '/' + theNewsGroups.id);
        },
        update: function(theNewsGroups) {
            return $http(
                {
                    url: settingsFactory.get('news_groups') + '/' + theNewsGroups.id,
                    method: "PUT",
                    data: theNewsGroups,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        create: function(theNewsGroups) {
            return $http(
                {
                    url: settingsFactory.get('news_groups'),
                    method: "POST",
                    data: theNewsGroups,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        delete: function(theNewsGroups) {
            return $http.delete(settingsFactory.get('news_groups') + '/' + theNewsGroups.id);
        },
        search: function(queryString) {
            return $http.get(settingsFactory.get('news_groups') + '/search?' + queryString);
        },
        all: function() {
            return $http.get(settingsFactory.get('news_groups') + '/all');
        }
    }
}]);




