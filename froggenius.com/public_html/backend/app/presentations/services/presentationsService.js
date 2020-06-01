
angular.module('newApp').factory('presentationsFactory', ['$http', 'settingsFactory', function ($http, settingsFactory) {

    return {
        query: function(queryString) {
            return $http.get(settingsFactory.get('presentations') + '?' + queryString);
        },
        get: function(thePresentations) {
            return $http.get(settingsFactory.get('presentations') + '/' + thePresentations.id);
        },
        update: function(thePresentations) {
            return $http(
                {
                    url: settingsFactory.get('presentations') + '/' + thePresentations.id,
                    method: "PUT",
                    data: thePresentations,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        updateStatus: function(thePresentations) {
            return $http(
                {
                    url: settingsFactory.get('presentations') + '/' + thePresentations.id + '/status',
                    method: "PUT",
                    data: thePresentations,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        create: function(thePresentations) {
            return $http(
                {
                    url: settingsFactory.get('presentations'),
                    method: "POST",
                    data: thePresentations,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        sort: function(thePresentations) {
            return $http(
                {
                    url: settingsFactory.get('presentations') + '/sort',
                    method: "PUT",
                    data: thePresentations,
                    headers: {'Content-Type': 'application/json'}
                }
            );
        },
        delete: function(thePresentations) {
            return $http.delete(settingsFactory.get('presentations') + '/' + thePresentations.id);
        },
        search: function(queryString) {
            return $http.get(settingsFactory.get('presentations') + '/search?' + queryString);
        },
        orders: function(thePresentations) {
            return $http(
                {
                    url: settingsFactory.get('presentations') + '/orders',
                    method: "POST",
                    data: thePresentations,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        }
    }
}]);




