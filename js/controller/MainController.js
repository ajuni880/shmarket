/**
 |------------------------------------
 | MainController
 |------------------------------------
  * @description controls the flow of the application.
  * @authors Junaid Aslam, Jorge Fernández
  * @version 1.0
 */
(function() {
    angular.module("marketApp").controller("MainController", ['$scope', '$window', '$http','AjaxService',
        function($scope, $window, $http,AjaxService) {

            //the url for the ajax call
            var url = "php/controllers/MainController.php";
						$scope.action = 'init';
            $scope.filterValue;
            $scope.sessionOpened = false;
            $scope.userRole = false;
            $scope.loggedUser;

            /**
              * @name sessionControl
              * @authors: Junaid Aslam , Jorge Fernandez
              * @version: 1.5
              * @date: 30/05/2017
              * @description: checks if the session is opened, also checks if is admin page is the role is not admin redirecto to
              * index
              * @params: none
              * @return: none
              */
            $scope.sessionControl = function(){
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:0,action:140,data:JSON.stringify("")}
              );
              promise.then(function(result){
                if(result[0] === true){
                  $scope.sessionOpened = true;

                }else{
                  var isAdminPage = location.href;

                  if(isAdminPage.search("admin.html") != -1){
                    window.location.replace("index.html");
                  }

                 var user = angular.fromJson(localStorage.getItem('loggedUser'));
                 if(user != null){
                   localStorage.removeItem('loggedUser');
                 }

                }
              });
            }

            /**
              * @name showMyAnnounces
              * @authors: Junaid Aslam , Jorge Fernandez
              * @version: 1.5
              * @date: 30/05/2017
              * @description: checks if the session is opened, if not redirect to login form, else show the form to add
              * @params: none
              * @return: none
              */
            $scope.showMyAnnounces = function(){
             if(!$scope.sessionOpened){
               $scope.action = 'login';
             } else{
               $scope.action = 'uploadAnnounceForm';
             }
           }
            /**
            Passes the event to child controller
            */
            $scope.getMyAnnounces = function(){

             $scope.$broadcast('myAnnounces');
            }

            /**
              * @name logOut
              * @authors: Junaid Aslam , Jorge Fernandez
              * @version: 1.5
              * @date: 30/05/2017
              * @description: destroys the user session and the localStorage item.
              * @params: none
              * @return: none
              */
            $scope.logOut = function(){
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:0,action:150,data:JSON.stringify("")}
              );
              promise.then(function(result){
                if(result[0] === true){
                  console.log(result);
                  $scope.sessionOpened = false;
                  localStorage.removeItem('loggedUser');
                  location.reload();
                }
              });
            }
        }]); //End controller

        /**
          * @name countLetters
          * @authors: Junaid Aslam , Jorge Fernandez
          * @version: 1.5
          * @date: 30/05/2017
          * @description: counts the letter to print in the short description
          * @params: description
          * @return: short description
          */
    angular.module("marketApp").filter('countLetters',function(){
      return function(sentence){
        var length = sentence.length;
        if(length > 60){
          return sentence.substr(0,57)+'...';
        }else{
          return sentence;
        }
      }
    });
})(); //End angular
