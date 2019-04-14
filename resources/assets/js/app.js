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

app.factory('TableState', ['$http', function ($http) {

    var state = {};

    state.getPage = function (tableState, url) {
        return $http({
            url: url,
            method: 'GET',
            params: {tableState: tableState},
            paramSerializer: '$httpParamSerializerJQLike'
        });
    };

    return state;
}]);

app.factory('FilteredTableState', ['$http', function ($http) {
    var state = {};

    state.getPage = function (tableState, filters, url) {
        return $http({
            url: url,
            method: 'GET',
            params: {tableState: tableState, filter: filters},
            paramSerializer: '$httpParamSerializerJQLike'
        });
    };

    return state;
}]);

app.factory('ChildRecords', ['$http', 'FilteredTableState', function ($http, FilteredTableState) {
    var childRecords = {};

    childRecords.getPage = function (tableState, filterData) {
        return FilteredTableState.getPage(tableState, filterData, '/api/get-children-data');
    };

    return childRecords;
}]);


app.controller('MainController', ['$http', '$scope', 'Notification', 'ChildRecords', function ($http, $scope, Notification, ChildRecords) {
    $scope.children_records = [];
    $scope.itemsByPage = 10;

    $scope.callServer = function callServer(tableState) {
        $scope.tableState = tableState;
        $scope.isLoading = false;
        var pagination = tableState.pagination;
        var start = pagination.start || 0;
        var number = pagination.number || 10;
        $scope.filterData = {};

        $scope.getChildrenRecords(tableState, $scope.filterData);
    };

    $scope.getChildrenRecords = function (status, filterData) {
        ChildRecords.getPage($scope.tableState, filterData).then(function (result) {
            console.log(result, 'results over here');
            tableState = $scope.tableState;
            $scope.children_records = result.data.data;
            $scope.meta = result.data.meta;
            tableState.pagination.numberOfPages = result.data.meta.pagination.total_pages;
            $scope.perPage = tableState.pagination.number;
            $scope.isLoading = false;
        });
    };

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

    $scope.saveChildEducationDetails = function () {
        var child_education_data = {
            first_name: $scope.first_name,
            middle_name: $scope.middle_name,
            last_name: $scope.last_name,
            date_of_birth: $scope.date_of_birth,
            age: $scope.age,
            gender: $scope.gender,
            country: $scope.country,
            city: $scope.city,
            relationship_type: $scope.relationship_type,
            highest_level_of_education: $scope.highest_level_of_education,
            village: $scope.village,
            class_level: $scope.class_level,
            level: $scope.level,
            school_name: $scope.school_name,
        };

        $scope.errors = '';

        $http({
            method: 'POST',
            url: '/child/create',
            data: child_education_data,
            dataType: 'json'
        })
            .then(function (response) {
                $scope.errors = response.data.errors;

                Notification.error('The form submitted has errors, kindly correct and submit again');

                if (response.data.hasOwnProperty('duplicate_error') === true) {
                    Notification.error('An exact record already exists!');
                }

                if (response.data.hasOwnProperty('duplicate_error') === false && response.data.hasOwnProperty('errors') === false) {
                    Notification.success(response.data);

                    //Reset child details input fields and close modal
                    $("#first_name").val("");
                    $("#middle_name").val("");
                    $("#last_name").val("");
                    $("#date_of_birth").val("");
                    $("#age").val("");
                    $("#gender").val("");
                    $("#country").val("");
                    $("#city").val("");
                    $("#relationship_type").val("");
                    $("#village").val("");
                    $("#class_level").val("");
                    $("#level").val("");
                    $("#school_name").val("");

                    $(document).ready(function () {
                        $('#createChildRecordModal').foundation('close');
                    });

                    $window.location.href = '/children-view';

                    // $('#createChildRecordModal').trigger('reveal:close');

                    $scope.getChildrenRecords();

                    // $scope.relationshipTabScope = angular.element(document.querySelector('#relationshipTab')).scope();
                    //
                    // $scope.relationshipTabScope.getUserPersonalDetails(candidate_id);
                }
            })
    }
}]);
