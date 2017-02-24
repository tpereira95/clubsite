
angular.module('tkmcApp')
    .directive('tkmcFooter',[
        function () {
            'use strict';
            return{
                restrict: 'E',
                templateUrl:'templates/footer.html',
                 link: function () {
                /*your code */
                     
                }
            };
        }]);

angular.module('tkmcApp')
    .directive('tkmcCarousel',[
        function () {
            'use strict';
            return{
                restrict: 'E',
                templateUrl:'templates/carousel.html',
                 link: function () {
                /*your code */
                     
                }
            };
        }]);

angular.module('tkmcApp')
    .directive('tkmcContact',[
        function () {
            'use strict';
            return{
                restrict: 'E',
                templateUrl:'templates/contact.html',
                 link: function () {
                /*your code */
                     
                }
            };
        }]);
