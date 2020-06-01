
angular.module('newApp').factory('event_bannersFactory', ['$http', 'settingsFactory', function ($http, settingsFactory) {

    return {
        query: function(queryString) {
            return $http.get(settingsFactory.get('event_banners') + '?' + queryString);
        },
        get: function(theEventBanners) {
            return $http.get(settingsFactory.get('event_banners') + '/' + theEventBanners.id);
        },
        update: function(theEventBanners) {
            return $http(
                {
                    url: settingsFactory.get('event_banners') + '/' + theEventBanners.id,
                    method: "PUT",
                    data: theEventBanners,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        updateStatus: function(theEventBanners) {
            return $http(
                {
                    url: settingsFactory.get('event_banners') + '/' + theEventBanners.id + '/status',
                    method: "PUT",
                    data: theEventBanners,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        create: function(theEventBanners) {
            return $http(
                {
                    url: settingsFactory.get('event_banners'),
                    method: "POST",
                    data: theEventBanners,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        },
        sort: function(theEventBanners) {
            return $http(
                {
                    url: settingsFactory.get('event_banners') + '/sort',
                    method: "PUT",
                    data: theEventBanners,
                    headers: {'Content-Type': 'application/json'}
                }
            );
        },
        delete: function(theEventBanners) {
            return $http.delete(settingsFactory.get('event_banners') + '/' + theEventBanners.id);
        },
        search: function(queryString) {
            return $http.get(settingsFactory.get('event_banners') + '/search?' + queryString);
        },
        orders: function(theEventBanners) {
            return $http(
                {
                    url: settingsFactory.get('event_banners') + '/orders',
                    method: "POST",
                    data: theEventBanners,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }
            );
        }
    }
}]);




