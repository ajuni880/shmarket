/**
 |------------------------------------
 | MainController
 |------------------------------------
  * @description contains all the implmented functionalities referenced to the user.
  * @authors Junaid Aslam, Jorge Fernández
  * @version 1.0
 */

(function(){
  angular.module("marketApp").controller("UserController", ['$scope',
  '$window','$http', 'AjaxService',function($scope, $window,$http, AjaxService){

    //the url for the ajax call
    var url = "php/controllers/MainController.php";
    $scope.user = new User();
    $scope.conversations = [];
    $scope.logginError = false;
    $scope.userAction = 'init';
    $scope.emailExists = false;

    var user = angular.fromJson(localStorage.getItem('loggedUser'));

    if(user != null){
      $scope.user.construct(user.userId,user.fullName,user.email,user.password,
      user.telephone,user.role,user.registryDate,user.userPhoto);
      console.log(localStorage.getItem('loggedUser'));
      $scope.$parent.userRole = user.role;
      // console.log(  $scope.$parent.userRole );
    }

    /**
      * @name hideForm
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: hides the form and puts the action to init
      * @params: none
      * @return: none
      */
		$scope.hideForm = function(){
			$scope.$parent.action = 'init';
		}

    /**
      * @name gotToRegisterForm
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: shows the register form when the user is in login form.
      * @params: none
      * @return: none
      */
    $scope.gotToRegisterForm = function(){
			$scope.$parent.action = 'register';
		}

    /**
      * @name doLogin
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection and checks if the user exists, if exists opens the session,
      * and saves user data in localStorage.
      * @params: none
      * @return: none
      */
    $scope.doLogin = function(){
      $scope.user = angular.copy($scope.user);

      var promise = AjaxService.getData(url,true,"POST",
      {controllerType:0, action:100, data:JSON.stringify($scope.user)});

      promise.then(function(result){
        if(result[0] === true){
          // $scope.$parent.loggedUser = new User();
          // function(userId,fullName,email,password,telephone,role,registryDate){
          $scope.user.construct(result[1].userId, result[1].fullName,result[1].email,result[1].password,
          result[1].telephone,result[1].role,result[1].registryDate,result[1].photo);
          $scope.$parent.userRole = $scope.user.role;
          localStorage.setItem('loggedUser',JSON.stringify($scope.user));
          $scope.$parent.action = "init";
          $scope.$parent.sessionOpened = true;

        } else{
          $scope.logginError = true;
        }
      });
		}

    /**
      * @name doRegister
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection and resgiters the users, shows the errors if are.
      * and saves user data in localStorage.
      * @params: none
      * @return: none
      */
    $scope.doRegister = function(){

      $scope.user = angular.copy($scope.user);
      $scope.registerSucces = false;
      var promise = AjaxService.getData(url,true,"POST",
      {controllerType:0, action:110, data:JSON.stringify($scope.user)});

      promise.then(function(result){
        if(result[0]=== true){
          // $scope.registerForm.$setPristine();
          $scope.registerSucces = true;
          $('.register-success-message').removeClass('hide-elem').fadeIn(400);

          $scope.user = new User();
          $scope.$parent.action = 'login';

        } else if (result[0] == -1) {

          $scope.emailExists = true;

          console.log("email");
        }else {
          $scope.registerSucces = false;
          $('.register-success-message').html('Try again later. We are updating...');
        }
      });
    }

    /**
      * @name getUserAnnouncesData
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection and gets the user announces details, how much announces he have,
      * how much sold
      * and saves user data in localStorage.
      * @params: none
      * @return: none
      */
    $scope.getUserAnnouncesData = function(){
      $scope.userAnnouncesData = [];
      var userObj = new User();
      userObj.setUserId($scope.user.getUserId());

      var promise = AjaxService.getData(
        url,true,"POST",
        {controllerType:0,action:200,data:JSON.stringify(userObj)}
      );

      promise.then(function(result){
        if(result[0] === true){
          $scope.userAnnouncesData = result[1];
        }
      });
    }

    /**
      * @name getMyFavouritesAnnounces
      * @authors: Junaid Aslam , Jorge Fernandez
      * @version: 1.5
      * @date: 30/05/2017
      * @description: makes a ajax connection and gets the user favourites announces from database.
      * how much sold
      * and saves user data in localStorage.
      * @params: none
      * @return: none
      */
    $scope.getMyFavouritesAnnounces = function(){
      $scope.favouritesArray = []
      var userObj = new User();
      userObj.setUserId($scope.user.getUserId());

      var promise = AjaxService.getData(
        url,true,"POST",
        {controllerType:0,action:210,data:JSON.stringify(userObj)}
      );

      promise.then(function(result){
        if(result[0] === true){
          angular.forEach(result[1],function(v,k){
            $scope.favouritesArray.push(toAnnounceObj(v));
          });
          // $scope.userAction = 'favourites';
        } else{
          $scope.favouritesArray.push("No hay favoritos.");
        }
      });
    }

  $scope.correctData = false;

  /**
    * @name changePassword
    * @authors: Junaid Aslam , Jorge Fernandez
    * @version: 1.5
    * @date: 30/05/2017
    * @description: changes the user password
    * how much sold
    * and saves user data in localStorage.
    * @params: none
    * @return: none
    */
  $scope.changePassword = function(){
    $scope.user = angular.copy($scope.user);
    console.log($scope.user.getPassword());
    var promise = AjaxService.getData(
      url,true,"POST",
      {controllerType:0,action:220,data:JSON.stringify($scope.user)}
    );

    promise.then(function(result){
      if(result[0]=== true){
        $scope.correctData = true;

     }
    });
  }

  /**
    * @name doUpdate
    * @authors: Junaid Aslam , Jorge Fernandez
    * @version: 1.5
    * @date: 30/05/2017
    * @description: updates the user information
    * how much sold
    * and saves user data in localStorage.
    * @params: none
    * @return: none
    */
  $scope.doUpdate = function (){

      $scope.user = angular.copy($scope.user);

      var promise = AjaxService.getData(
        url,true,"POST",
        {controllerType:0,action:230,data:JSON.stringify($scope.user)}
      );

      promise.then(function(result){
        if(result[0]=== true){
            $scope.correctData = true;
       }
      });
  }

  }]); //End controller

  // Templates
	angular.module("marketApp").directive("loginForm", function(){
			return {
				restrict:'E',
				templateUrl:"views/templates/login-form.html",
				controller: function(){

				},
				controllerAs:"loginForm"
			};
	});//End directive

	angular.module("marketApp").directive("registryForm", function(){
			return {
				restrict:'E',
				templateUrl:"views/templates/registry-form.html",
				controller: function(){

				},
				controllerAs:"registryForm"
			};
	});//End directive

  angular.module("marketApp").directive("userProfile", function(){
      return {
        restrict:'E',
        templateUrl:"views/templates/user-profile.html",
        controller: function(){

        },
        controllerAs:"userProfile"
      };
  });//End directive

})();//End angular
function toAnnounceObj(v){

    var announce = new Announce();

    var date = v.uploadDate;
    var shortDate = date.substr(0, 10);
    announce.construct(
      v.announceId,v.title,v.description,shortDate,
      v.price,v.operation,v.userId,v.valorationId,
      v.categoryId,v.direction,v.fullname,v.catName,v.photoUrl
    );

    return announce;
}
