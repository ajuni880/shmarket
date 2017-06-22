
/**
 |------------------------------------
 | AnnounceController
 |------------------------------------
  * @description contains all the implmented functionalities referenced to the announces.
  * @authors Junaid Aslam, Jorge Fernández
  * @version 1.0
 */

(function() {
    angular.module("marketApp").controller("AnnounceController", ['$scope', '$window', '$http','AjaxService','$filter',
        function($scope, $window, $http,AjaxService,$filter) {

            //the url for the ajax call
            var url = "php/controllers/MainController.php";

            //Instance of the announce obejct
            $scope.announce = new Announce();

            //Array that will contain all the announces retrieved from databse
            $scope.announcesArray = [];
            $scope.noAnnounceFound = false;
            $scope.announceUser = new User();
            $scope.searchObj = new Search();
            //Array that will contain the data
            $scope.photosArray = [];
            $scope.categoriesArray = [];
            $scope.citiesArray = [];
            $scope.imagesArrayToSend = [];

            //Variables that will contain the selected category and city,respectively.
            $scope.selectCategory = new Category();
            $scope.selectCity = new City();

            /**
             * @name loadAnnounces
             * @description makes an ajax call to get the all the announces stored
             * in the database.
             * @param none
             * @return none
             */
            $scope.loadAnnounces = function(){

              $scope.announcesArray = [];
              var promise = AjaxService.getData(url,true,"POST",
              {controllerType:1, action:100, data:JSON.stringify("")});

              promise.then(function(result){
                if(result[0] === true){
                  // console.log(result[1]);

                  angular.forEach(result[1],function(v,k){
                    $scope.announcesArray.push(toAnnounceObj(v));
                  });

                  angular.forEach(result[2],function(v,k){
                    var cat = new Category();
                    cat.construct(v.categoryId,v.name);
                    $scope.categoriesArray.push(cat);
                  });
                  $scope.selectCategory = $scope.categoriesArray[0];

                  angular.forEach(result[3],function(v,k){
                    var city = new City();
                    city.construct(v.cityId,v.name,v.provinceId);
                    $scope.citiesArray.push(city);
                  });
                  // console.log($scope.citiesArray);
                  $scope.selectCity = $scope.citiesArray[0];

                }
              });
            }

            /**
             * @name getAnnounceById
             * @description makes an ajax call to get the clicked announce with the
             * passed id via url.
             * @param none
             * @return none
             */
            $scope.getAnnounceById = function(){
              //Id of the announce to get form database
              var id = $scope.getIdFromUrl();

              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:1,action:130,data:JSON.stringify(id)}
              );

              promise.then(function(result){
                if(result[0] === true ){

                  angular.forEach(result[1],function(v,k){

                    $scope.announce = toAnnounceObj(v);

                    //Gets the data of the user who uploaded the ad and saves it in the user object
                    // userId,fullName,email,password,telephone,role,registryDate,userPhoto){
                    $scope.announceUser = new User();
                    $scope.announceUser.construct(v.userId,v.fullname,"","",v.telephone,"","",v.photo);

                    console.log($scope.announceUser);

                  });
                } else {
                  window.location.replace("404.html");
                }
              });

              //Makes an ajax call to get the photos of the announce to show
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:1,action:110,data:JSON.stringify(id)}
              );

              promise.then(function(result){
                if(result[0] === true ){

                  angular.forEach(result[1],function(v,k){
                    //Here pushes the photo src in the array
                    $scope.photosArray.push(v.url);

                  });

                  setTimeout(function(){

                     var galleryTop = new Swiper('.gallery-top', {
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        spaceBetween: 5,
                    });

                   }, 1000);

                }
              });
            }

            /**
           * Gets the id of the announce to fetch from database.
           * @param none
           * @return the id
           */
            $scope.getIdFromUrl = function(){
              var url = location.href;
              var findId = url.substr(url.search(/id/),url.lenght);
              var idArray = findId.split('=');
              return idArray[1];
            }

            $scope.sendMessage = function(){
              var user = angular.fromJson(localStorage.getItem("loggedUser"));
              var data = {
                toUser : $scope.announceUser.getUserId(),
                fromUser : user.userId,
                message : $scope.message
              };
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:0,action:160,data:JSON.stringify(data)}
              );

              promise.then(function(result){
                if(result[0] === true){
                    console.log(result[1]);
                }
              });
            }

            $scope.validateImages = function(){
              $("#uploadPhotos").on("change", function(){
                var image = $(this)[0].files[0];
                $scope.imagesArrayToSend.push(image);

                var c = 0;
                var duplicate = false;
                for (var i = 0; i < $scope.imagesArrayToSend.length; i++) {
                  if(image.name == $scope.imagesArrayToSend[i].name){
                    c++;
                    if(c==2) duplicate = true;
                  }
                }
                if(!duplicate){
                  $(".photos-details ul").append("<li>"+image.name+"</li>");

                  if($scope.imagesArrayToSend.length > 4){
                    $(this).addClass("disabled-btn");
                    $(this).prop('disabled', true);
                    $(".photos-details ul").append("<li class='has-error'>Máximo 4 fotos. Sube las mejores.</li>");
                  }
                } else {
                    $(".photos-details ul").append("<li class='has-error'>Imagen existente.</li>");
                }

              });
            }

            $scope.entryAnnounce = function(){

              var user = angular.fromJson(localStorage.getItem("loggedUser"));
              $scope.announce.setCategoryId($scope.selectCategory.categoryId);
              $scope.announce.setUserId(user.userId);

              $scope.announce = angular.copy($scope.announce);
              console.log($scope.selectCategory);
              console.log($scope.announce);
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:1,action:150,data:JSON.stringify($scope.announce)}
              );

              promise.then(function(result){

                if(result[0] === true){
                  var announceId = {announceId:result[1]};
                  $scope.uploadImages(announceId);
                } else{
                  console.log("Error uploading images");
                }
              });
          }

          $scope.uploadImages = function(announceId){

            var imagesArrayToSend = new FormData();
            for (var i = 0; i < $scope.imagesArrayToSend.length; i++) {
              var imageFile = $scope.imagesArrayToSend[i];
              imagesArrayToSend.append('images[]', imageFile);
            }
            $http({
              method: 'POST',
              url: 'php/controllers/MainController.php?controllerType=1&action=160&data='+JSON.stringify(announceId),
              headers: {'Content-Type': undefined},
              data: imagesArrayToSend,
              transformRequest: function (data, headersGetterFunction) {
                return data;
              }
            }).success(function (result) {
              if (result[0] === true) {
                $scope.loadAnnounces();
                $scope.$parent.action = 'init';
              }else{
                noAnnounceFound = true;
              }
            });
          }

          $scope.findByCategory = function(category){
            $scope.announcesArray = [];
            var catObj = new Category();
            catObj.construct(category,"");

            var promise = AjaxService.getData(
              url,true, "POST",
              {controllerType:1,action:140,data:JSON.stringify(catObj)}
            );

            promise.then(function(result){
              if(result[0] === true){
                angular.forEach(result[1],function(v,k){
                  $scope.announcesArray.push(toAnnounceObj(v));
                });
                $("#backButton").html("<a href='index.html'>Back </a>");
              } else{

                console.log("no announces found");
              }
            });
          }

          $scope.$on('myAnnounces', function(e) {
            $scope.getMyAnnounces();
          });

          $scope.getMyAnnounces = function(){

            $scope.announcesArray = [];
            var user = angular.fromJson(localStorage.getItem("loggedUser"));

            var promise = AjaxService.getData(
              url,true,"POST",
              {controllerType:1,action:170,data:JSON.stringify(user.userId)}
            );
            promise.then(function(result){
              if(result[0] === true){
                angular.forEach(result[1],function(v,k){
                  $scope.announcesArray.push(toAnnounceObj(v));
                });
                $scope.$parent.action = 'myAnnounces';
              } else{
                $scope.$parent.action = 'myAnnounces';
                $scope.announcesArray = [];
              }

            });
          }

          $scope.removeMyAnnounce = function(announceId){
            var conf = confirm("Estas seguro de borrar este anuncio?");
            if(conf){
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:1,action:190,data:JSON.stringify(announceId)}
              );
              promise.then(function(result){
                if(result[0] === true){
                  angular.forEach(result[1],function(v,k){
                    $scope.announcesArray.push(toAnnounceObj(v));
                  });
                  $scope.$parent.action = 'myAnnounces';
                } else{
                  $scope.noAnnounceFound = true;
                }

              });
            }
          }
          $scope.announceAction = 'init';
          $scope.showModifyForm = function(announceId){
            // $scope.announce = new Announce();
            var announces = $filter('filter')
            ($scope.announcesArray,
                {announceId: announceId}
              );
              console.log(announces);
              $scope.announceToModify = announces[0];
              $scope.announceAction = 'modifyMyAnnounce';


          }

          $scope.modifyMyAnnounce = function(){

            $scope.announceToModify.setCategoryId($scope.selectCategory.categoryId);
            $scope.announceToModify = angular.copy($scope.announceToModify);
            console.log($scope.announceToModify);

            var allValid = true;
            $scope.errors = [];
            if($scope.announceToModify.getTitle().length < 10 ){
              allValid = false;
              $scope.errors.push("El título minimo 10 carácteres");
            } else if($scope.announceToModify.getDescription().length < 10 ){
              allValid = false;
              $scope.errors.push("La descripción minimo 10 carácteres");

            } else if($scope.announceToModify.getDirection() == "" ){
              allValid = false;
              $scope.errors.push("La dirección no puede estar vacía");
            }

            if(allValid){
              var promise = AjaxService.getData(
                url,true,"POST",
                {controllerType:1,action:200,data:JSON.stringify($scope.announceToModify)}
              );

              promise.then(function(result){

                if(result[0] === true){
                  $scope.announceAction = 'init';
                } else{
                  $scope.noAnnounceFound = true;
                }
              });
            }

        }

        $scope.addToFavourites = function(){

          if(!$scope.$parent.sessionOpened){

            $scope.noAnnounceFound = true;

          } else {

            var promise = AjaxService.getData(
              url,true,"POST",
              {controllerType:1,action:210,data:JSON.stringify($scope.announce.announceId)}
            );
            promise.then(function(result){
              if(result[0] === true){
                console.log(result);
              }

            });
          }
        }

          $scope.searchAnnounces = function(){

            $scope.announcesArray = [];

            if($scope.searchObj.wordToSearch == null) $scope.searchObj.setWordToSearch("");

            if($scope.selectCategory == null) $scope.searchObj.setCategoryId("");
            else  $scope.searchObj.setCategoryId($scope.selectCategory.categoryId);

            if($scope.selectCity == null) $scope.searchObj.setCity("");
            else $scope.searchObj.setCity($scope.selectCity.name);

            if($scope.searchObj.minPrice == null) $scope.searchObj.setMinPrice("");

            if($scope.searchObj.maxPrice == null) $scope.searchObj.setMaxPrice("");


            $scope.searchObj = angular.copy($scope.searchObj);

            var promise = AjaxService.getData(
              url,true,"POST",
              {controllerType:1,action:180,data:JSON.stringify(angular.copy($scope.searchObj))}
            );

            promise.then(function(result){
              console.log(result);
              if(result[0] === true){
                angular.forEach(result[1],function(v,k){
                  $scope.announcesArray.push(toAnnounceObj(v));
                });
                
              } else{
                $scope.noAnnounceFound = true;
              }
            });
          }

        }]); //End controller

            //Directive for the announce summary
            angular.module("marketApp").directive("announceSummary", function() {
            return {
            restrict: 'E',
            templateUrl: "views/templates/announce-summary.html",
            controller: function() {

            },
            controllerAs: "announceSummary"
            };
            }); //End directive


            angular.module("marketApp").directive("uploadAnnounceForm", function(){
              return {
                restrict: 'E',
                templateUrl: "views/templates/upload-announce-form.html",
                controller: function(){

                },
                controllerAs: "uploadAnnounceForm"
              };
            });

            angular.module("marketApp").directive("myAnnounces", function(){
              return {
                restrict: 'E',
                templateUrl: "views/templates/my-announces.html",
                controller: function(){

                },
                controllerAs: "myAnnounces"
              };
            });

     // ;


})(); //End angular

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
