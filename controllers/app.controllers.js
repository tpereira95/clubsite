

//angular.module('tkmcApp', ['uiGmapgoogle-maps'])
//    .controller('mainCtrl', function($scope) {
//        $scope.map = {center: {latitude: 45.474920, longitude: 76.687719}, zoom: 14 };
//        $scope.options = {scrollwheel: false};
//    });
var app = angular.module('tkmcApp');

    app.controller('TKMCFormController', ['$scope', '$http', function($scope, $http) {
        $scope.url = 'submit.php';
       
        $scope.formsubmit = function(isValid){
            
            if($scope.contactName === '' || $scope.contactName === undefined || $scope.contactEmail === '' || $scope.contactEmail === undefined || $scope.contactMessage === undefined || $scope.contactMessage === ''){
                $scope.invalid = true;
                $scope.showErrorAlert = true;
                $scope.errorMessage = 'Your name, email and message are required. Please enter something before submitting.  Thank you.'
                return null;
            }
            if (isValid){
                
               $scope.req = $http.post($scope.url, {"name": $scope.contactName, "email": $scope.contactEmail, "message": $scope.contactMessage}).
                    success(function(data, status){
                           //console.log(data);
                            $scope.status = status;
                            $scope.data = data;
                            $scope.result = data; 
                            console.log($scope.result);
                            $scope.showSuccessAlert = true;
                            $scope.successMessage = 'Thank you for your interest in TKMC Canada.  We have your contact information and will get back to you';
                            //clear the form
                            $scope.contactName = '';
                            $scope.contactEmail = '';
                            $scope.contactMessage = '';
                })
            }else{
                $scope.showErrorAlert = true;
                $scope.errorMessage = 'An error occured sending your information to our database.  Please try again later, or call us directly';
                //clear the form
                $scope.contactName = '';
                $scope.contactEmail = '';
                $scope.contactMessage = '';
            }  
        }
        
        $scope.closeMessage = function(index){
            $scope.showSuccessAlert = false;
            $scope.showErrorAlert = false;
        }
}]);
