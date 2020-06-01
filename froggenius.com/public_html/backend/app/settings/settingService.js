
angular.module('newApp').factory('settingsFactory', [function() {

    const _CONSTANTS = {};
    _CONSTANTS.server_error = "Something went wrong. Please try again or contact system administrator.";

    // For service laravel
    var BASE_SERVICE_URL = "https://froggenius.com/api/";
    var SERVICE_URL = {
        auth: BASE_SERVICE_URL + "auth",
        admins: BASE_SERVICE_URL + "admins",
        admins_groups: BASE_SERVICE_URL + "admins_groups",
        configuration: BASE_SERVICE_URL + "configuration",
        highlights: BASE_SERVICE_URL + "highlights",
        news: BASE_SERVICE_URL + "news",
        news_groups: BASE_SERVICE_URL + "news_groups",
        showcases: BASE_SERVICE_URL + "showcases",
        careers: BASE_SERVICE_URL + "careers",
        applicants: BASE_SERVICE_URL + "applicants",
        clients: BASE_SERVICE_URL + "clients",
        testimonials: BASE_SERVICE_URL + "testimonials",
        categories: BASE_SERVICE_URL + "categories",
        event_banners: BASE_SERVICE_URL + "event_banners",
        presentations: BASE_SERVICE_URL + "presentations",
    };

    // For dir images
    var BASE_DIR_URL = "https://froggenius.com/data-file/";
    var DIR_URL = {
        base_admins_avatar: BASE_DIR_URL + "admins/",
        base_configuration_logo: BASE_DIR_URL + "configuration/logo/",
        base_configuration_event_banner: BASE_DIR_URL + "configuration/event_banner/",
        base_configuration_file_present: BASE_DIR_URL + "configuration/file_present/",
        base_highlights_picture: BASE_DIR_URL + "highlights/",
        base_news_picture: BASE_DIR_URL + "news/picture/",
        base_news_thumbnail: BASE_DIR_URL + "news/thumbnail/",
        base_showcases_picture: BASE_DIR_URL + "showcases/picture/",
        base_showcases_thumbnail: BASE_DIR_URL + "showcases/thumbnail/",
        base_applicants_resume: BASE_DIR_URL + "applicants/resume/",
        base_clients_picture: BASE_DIR_URL + "clients/picture/",
        base_testimonials_picture: BASE_DIR_URL + "testimonials/picture/",
        base_testimonials_thumbnail: BASE_DIR_URL + "testimonials/thumbnail/",
        base_event_banners_picture: BASE_DIR_URL + "event_banners/picture/",
        base_presentations_file: BASE_DIR_URL + "presentations/file/",
    };

    // For upload images
    var BASE_UPLOAD_URL = "https://froggenius.com/data-file/";
    var UPLOAD_URL = {
        upload_configuration_logo: BASE_UPLOAD_URL + "configuration_logo_upload.php",
        upload_configuration_event_banner: BASE_UPLOAD_URL + "configuration_event_banner_upload.php",
        upload_configuration_file_present: BASE_UPLOAD_URL + "configuration_file_present_upload.php",
        upload_admins_avatar: BASE_UPLOAD_URL + "admins_avatar_upload.php",
        upload_highlights_picture: BASE_UPLOAD_URL + "highlights_picture_upload.php",
        upload_news_picture: BASE_UPLOAD_URL + "news_picture_upload.php",
        upload_news_thumbnail: BASE_UPLOAD_URL + "news_thumbnail_upload.php",
        upload_showcases_picture: BASE_UPLOAD_URL + "showcases_picture_upload.php",
        upload_showcases_thumbnail: BASE_UPLOAD_URL + "showcases_thumbnail_upload.php",
        upload_applicants_resume: BASE_UPLOAD_URL + "applicants_resume_upload.php",
        upload_clients_picture: BASE_UPLOAD_URL + "clients_picture_upload.php",
        upload_testimonials_picture: BASE_UPLOAD_URL + "testimonials_picture_upload.php",
        upload_testimonials_thumbnail: BASE_UPLOAD_URL + "testimonials_thumbnail_upload.php",
        upload_event_banners_picture: BASE_UPLOAD_URL + "event_banners_picture_upload.php",
        upload_presentations_file: BASE_UPLOAD_URL + "presentations_file_upload.php",
    };

    return {
		get: function(name) {
			return SERVICE_URL[name];
		},
        getUpload: function(name) {
            return UPLOAD_URL[name];
        },
        getURL: function(name) {
            return DIR_URL[name];
        },
        getConstant: function (name) {
            return _CONSTANTS[name];
        }
    }
}]);
