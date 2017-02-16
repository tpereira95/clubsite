
angular.module('tkmcApp')
    .directive('tkmcFooter',[
        function () {
            'use strict';
            return{
                restrict: 'E',
                templateUrl:'/templates/footer.html',
                 link: function () {
                /*your code */
                     console.log('directive fired');
                }
            };
        }]);
