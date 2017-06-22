/**
 |------------------------------------
 | AdminController
 |------------------------------------
  * @description contains all the implmented functionalities referenced to the admin user.
  * @authors Junaid Aslam, Jorge Fernández
  * @version 1.0
 */

(function(){
  angular.module("marketApp").controller("AdminController", ['$scope',
  '$window','$http', 'AjaxService',function($scope, $window,$http, AjaxService){

    //the url for the ajax call
    var url = "php/controllers/MainController.php";
    $scope.adminAction = 'init';
    $scope.user = new User();
    $scope.category = new Category();
    $scope.messages = false;
    $scope.pageSize = 5;
		$scope.currentPage = 1;

    var user = angular.fromJson(localStorage.getItem('loggedUser'));

    if(user != null){
      $scope.user.construct(user.userId,user.fullName,user.email,user.password,
      user.telephone,user.role,user.registryDate,user.userPhoto);
      console.log(localStorage.getItem('loggedUser'));
      $scope.$parent.userRole = user.role;
    }

		$scope.hideMessage = function(){
			$scope.messages = "";
		}

    /**
      * @name getAllUsers
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection and obtains the all the users from the database
      * @params: none
      * @return: none
      */

    $scope.getAllUsers = function(){

      $scope.allUsers = [];
      $scope.filteredData = [];

      var promise = AjaxService.getData(url,true,"POST",
      {controllerType:0, action:190, data:JSON.stringify("")});

      promise.then(function(result){
        if(result[0] === true){
          angular.forEach(result[1],function(v,k){
            var user = new User();
            user.construct(v.userId, v.fullName,v.email,v.password,
            v.telephone,v.role,v.registryDate,v.photo);

            $scope.allUsers.push(user);
          });
          $scope.filteredData = $scope.allUsers;
          $scope.adminAction = 'listAllUsers';
        } else{
          console.log("erer");
        }
      });
    }

    /**
      * @name addNewCategory
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection to add a new category in the database
      * @params: none
      * @return: none
      */

    $scope.addNewCategory = function(){

      $scope.category.setCategoryId(0);
      $scope.category = angular.copy($scope.category);

      var promise = AjaxService.getData(url,true,"POST",
      {controllerType:2, action:130, data:JSON.stringify($scope.category)});

      promise.then(function(result){
        if(result[0] === true){
          $scope.adminAction='init';
          $scope.messages = "Inserted successfully";
        } else{
          $scope.messages = "Error inserting "+$scope.category.getName();
        }
      });
    }

  }]); //End controller

  // Templates
  angular.module("marketApp").directive("listAllUsers",function(){
    return{
      restrict : 'E',
      templateUrl:'views/templates/list-all-users.html',
      controller: function(){

      },
      controllerAs : 'listAllUsers'
    };
  });


})();//End angular
