'use strict';

angular.module('newApp')
    .controller('event_bannersPictureUploadCtrl', ['$scope', 'FileUploader', 'settingsFactory', function($scope, FileUploader, settingsFactory) {

        var img_uploader = $scope.img_uploader = new FileUploader({
            url: settingsFactory.getUpload("upload_event_banners_picture")
        });

        // FILTERS
        img_uploader.filters.push({
            name: 'customFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                return this.queue.length < 2;
            }
        });
        // CALLBACKS
        img_uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
            //console.info('onWhenAddingFileFailed', item, filter, options);
        };
        img_uploader.onAfterAddingFile = function(fileItem) {
            //console.info('onAfterAddingFile', fileItem);
        };
        img_uploader.onAfterAddingAll = function(addedFileItems) {
            //console.info('onAfterAddingAll', addedFileItems);
        };
        img_uploader.onBeforeUploadItem = function(item) {
            //console.info('onBeforeUploadItem', item);
        };
        img_uploader.onProgressItem = function(fileItem, progress) {
            //console.info('onProgressItem', fileItem, progress);
        };
        img_uploader.onProgressAll = function(progress) {
            //console.info('onProgressAll', progress);
        };
        img_uploader.onSuccessItem = function(fileItem, response, status, headers) {
            //console.info('onSuccessItem', fileItem, response, status, headers);
            $scope.event_banners_data.picture = response.file_name;
        };
        img_uploader.onErrorItem = function(fileItem, response, status, headers) {
            //console.info('onErrorItem', fileItem, response, status, headers);
            alert(response.message);
            fileItem.remove();
        };
        img_uploader.onCancelItem = function(fileItem, response, status, headers) {
            //console.info('onCancelItem', fileItem, response, status, headers);
        };
        img_uploader.onCompleteItem = function(fileItem, response, status, headers) {
            //console.info('onCompleteItem', fileItem, response, status, headers);
            //console.log(response.file_name);
            // $scope.event_banners_data.picture = response.file_name;

        };
        img_uploader.onCompleteAll = function() {
            //console.info('onCompleteAll');
        };

}]);
