angular.module('tkmcApp', [])
    .controller('RideController', function($scope){
        console.log('controller fired');
        $scope.myVar = 'Trevor was here';
})