

//angular.module('tkmcApp', ['uiGmapgoogle-maps'])
//    .controller('mainCtrl', function($scope) {
//        $scope.map = {center: {latitude: 45.474920, longitude: 76.687719}, zoom: 14 };
//        $scope.options = {scrollwheel: false};
//    });

angular.module('tkmcApp', [])
    .controller('TKMCFormController',function($scope) {
        $scope.contactName = 'Trevor Pereira';
        console.log('Reached form controller');
    
});
