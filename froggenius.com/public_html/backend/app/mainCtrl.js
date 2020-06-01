angular.module('newApp').controller('mainCtrl',
    ['$scope', 'applicationService', 'quickViewService', 'builderService', 'pluginsService', '$location', 'authenticationService', 'settingsFactory', 'FileUploader',
        function ($scope, applicationService, quickViewService, builderService, pluginsService, $location, authenticationService, settingsFactory, FileUploader) {

            $scope.base_admins_avatar = settingsFactory.getURL('base_admins_avatar');

            $scope.admin = authenticationService.getUser();

            $(document).ready(function () {
                applicationService.init();
                quickViewService.init();
                builderService.init();
                pluginsService.init();
                Dropzone.autoDiscover = false;
            });

            $scope.$on('$viewContentLoaded', function () {
                pluginsService.init();
                applicationService.customScroll();
                applicationService.handlePanelAction();
                $('.nav.nav-sidebar .nav-active').removeClass('nav-active active');
                $('.nav.nav-sidebar .active:not(.nav-parent)').closest('.nav-parent').addClass('nav-active active');

                if($location.$$path == '/' || $location.$$path == '/layout-api'){
                    $('.nav.nav-sidebar .nav-parent').removeClass('nav-active active');
                    $('.nav.nav-sidebar .nav-parent .children').removeClass('nav-active active');
                    if ($('body').hasClass('sidebar-collapsed') && !$('body').hasClass('sidebar-hover')) return;
                    if ($('body').hasClass('submenu-hover')) return;
                    $('.nav.nav-sidebar .nav-parent .children').slideUp(200);
                    $('.nav-sidebar .arrow').removeClass('active');
                }
                if($location.$$path == '/'){
                    $('body').addClass('dashboard');
                }
                else{
                    $('body').removeClass('dashboard');
                }

            });

            $scope.isActive = function (viewLocation) {
                return viewLocation === $location.path();
            };

            $scope.logout = function() {
                authenticationService.logout().success(function(data) {
                    window.location.href = '/backend/login.html';
                });
            };

        }]);
