var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('HomeCtrl', ['$scope',
  function($scope) {
    
  }]);
  
  phonecatControllers.controller('MainMapCtrl', ['$scope',
  function($scope) {
    
  }]);
  
  phonecatControllers.controller('SubMapCtrl', ['$scope',
  function($scope) {
    
  }]);
  
  phonecatControllers.controller('GACtrl', ['$scope',
  function($scope) {
    
  }]);
  
phonecatControllers.controller('LoginCtrl', ['$scope', '$http',
  function ($scope, $http) {
    $scope.phones = [
    {'name': 'Nexus S',
     'snippet': 'Fast just got faster with Nexus S.',
     'age': 1},
    {'name': 'Motorola XOOM™ with Wi-Fi',
     'snippet': 'The Next, Next Generation tablet.',
     'age': 2},
    {'name': 'MOTOROLA XOOM™',
     'snippet': 'The Next, Next Generation tablet.',
     'age': 3}
  ];

  $scope.orderProp = 'age';
  }]);

phonecatControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams',
  function($scope, $routeParams) {
    $scope.phoneId = $routeParams.phoneId;
  }]);