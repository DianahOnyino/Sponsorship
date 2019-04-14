var app = angular.module('app', [
    'smart-table', 'ui-notification', 'ngResource', 'ngRoute'
], [
    '$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }
]);

app.config(function (NotificationProvider) {
    NotificationProvider.setOptions({
        delay: 7000,
        startTop: 20,
        startRight: 10,
        verticalSpacing: 20,
        horizontalSpacing: 20,
        positionX: 'center',
        positionY: 'top'
    });
});

app.controller('MainController', ['$http', '$scope', 'Notification', function ($http, $scope, Notification) {
    var ChildEducationDetails = {
        init: function () {
            this.applyConditionalRequired();
            this.bindUIActions();
        },

        bindUIActions: function () {
            $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
        },

        applyConditionalRequired: function () {

            $(".require-if-active").each(function () {
                var el = $(this);
                if ($(el.data("require-pair")).is(":checked")) {
                    el.prop("required", true);
                } else {
                    el.prop("required", false);
                }
            });
        }
    };

    ChildEducationDetails.init();
}]);
