
angular.module('newApp').factory('newsFactory', ['$http', 'settingsFactory', function ($http, settingsFactory) {

    return {
        query: function(queryString) {
            return $http.get(settingsFactory.get('news') + '?' + queryString);
        },
        get: function(theNews) {
            return $http.get(settingsFactory.get('news') + '/' + theNews.id);
        },
        update: function(theNews) {
            return $http(
                {
                    url: settingsFactory.get('news') + '/' + theNews.id,
                    method: "PUT",
                    data: theNews,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        create: function(theNews) {
            return $http(
                {
                    url: settingsFactory.get('news'),
                    method: "POST",
                    data: theNews,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        orders: function(theNews) {
            return $http(
                {
                    url: settingsFactory.get('news') + '/orders',
                    method: "POST",
                    data: theNews,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        sort: function(theNews) {
            return $http(
                {
                    url: settingsFactory.get('news') + '/sort',
                    method: "PUT",
                    data: theNews,
                    headers: {'Content-Type': 'application/json'}
                }
            );
        },
        delete: function(theNews) {
            return $http.delete(settingsFactory.get('news') + '/' + theNews.id);
        },
        search: function(queryString) {
            return $http.get(settingsFactory.get('news') + '/search?' + queryString);
        },
        all: function() {
            return $http.get(settingsFactory.get('news_groups') + '/all');
        }
    }
}]);




