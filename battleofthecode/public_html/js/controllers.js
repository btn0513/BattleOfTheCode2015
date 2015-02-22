var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('HomeCtrl', ['$scope',
    function($scope) {
    
}]);

phonecatControllers.controller('MainMapCtrl', ['$scope', '$http',
    function($scope, $http) {
        $scope.mainlocs = [{'name':'The Anita B Gorman Discovery & Conservation Center!',
        'info':'blah 1',
        'gps':'39.040677,-94.574427',
        'sid':'1'},
    {'name':'Plug Projects!',
        'info':'blah 2',
        'gps':'39.094057,-94.604697',
        'sid':'2'},
    {'name':'Union Station & Science City!',
        'info':'blah 3',
        'gps':'39.085255,-94.586066',
        'sid':'3'},
    {'name':'The Mid-America Arts Alliance!',
        'info':'blah 4',
        'gps':'39.088249,-94.585216',
        'sid':'4'}];

}]);

phonecatControllers.controller('SubMapCtrl', ['$scope','$routeParams',
    function($scope, $routeParams) {
          $scope.sublocs = [{'name':'The Anita B Gorman Discovery & Conservation Center!',
        'info':'blah 1',
        'gps':'39.040677,-94.574427',
        'sid':'1'},
    {'name':'Plug Projects!',
        'info':'blah 2',
        'gps':'39.094057,-94.604697',
        'sid':'2'},
    {'name':'Union Station & Science City!',
        'info':'blah 3',
        'gps':'39.085255,-94.586066',
        'sid':'3'},
    {'name':'The Mid-America Arts Alliance!',
        'info':'blah 4',
        'gps':'39.088249,-94.585216',
        'sid':'4'},
{'name':'somethin',
        'info':'blah 1',
        'gps':'39.040677,-94.574427',
        'sid':'5'},
    {'name':'Pthis way home!',
        'info':'blah 2',
        'gps':'39.094057,-94.604697',
        'sid':'6'},
    {'name':'Ulichen 4y!',
        'info':'blah 3',
        'gps':'39.085255,-94.586066',
        'sid':'7'},
    {'name':'Tdoodle buddye!',
        'info':'blah 4',
        'gps':'39.088249,-94.585216',
        'sid':'8'}];

}]);

phonecatControllers.controller('GACtrl', ['$scope',
    function($scope) {

}]);

phonecatControllers.controller('ContactCtrl', ['$scope',
    function($scope) {
        $scope.$on('mapInitialized', function(event, map) {
      map.setCenter();
    });

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