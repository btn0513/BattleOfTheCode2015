var phonecatApp = angular.module('phonecatApp', [
  'ngRoute',
  'phonecatControllers',
  'ngMap'
]);

phonecatApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'views/home.html',
        controller: 'HomeCtrl'
      }).
      when('/map', {
        templateUrl: 'views/googlemap.html',
        controller: 'MainMapCtrl'
      }).
      when('/subloc', {
        templateUrl: 'views/sublocations.html',
        controller: 'SubMapCtrl'
      }).
      when('/ga', {
        templateUrl: 'views/gaanalytics.html',
        controller: 'GACtrl'
      }).
      when('/contact', {
        templateUrl: 'views/footer.html',
        controller: 'ContactCtrl'
      }).
              
              
              
              
      when('/login', {
        templateUrl: 'login.html',
        controller: 'LoginCtrl'
      }).
      otherwise({
        redirectTo: '/phones'
      });
  }]);