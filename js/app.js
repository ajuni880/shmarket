

(function(){

   angular.module('marketApp',['ng-currency', 'ngCookies','angularUtils.directives.dirPagination']);

   angular.module("marketApp").directive("navbarTemplate", function(){
     return {
       restrict: 'E',
       templateUrl:"views/templates/navbar-template.html",
       controller:function(){

       },
       controllerAs:"navbarTemplateCtrl"
     }
   });

   //Directive for the search form
   angular.module("marketApp").directive("searchForm", function(){
       return {
         restrict:'E',
         templateUrl:"views/templates/search-form.html",
         controller: function(){

         },
         controllerAs:"searchForm"
       };
   });//End directive

   angular.module("marketApp").directive("footerTemplate", function(){
       return {
         restrict:'E',
         templateUrl:"views/templates/footer-template.html",
         controller: function(){

         },
         controllerAs:"footerTemplate"
       };
   });//End directive

   angular.module('marketApp').factory('AjaxService', function($http, $log, $q) {
    return {
      getData: function(url, async, method, params, data) {
        var deferred = $q.defer();
        $http({
          url: url,
          method: method,
          asyn: async,
          params: params,
          data: data
        })
        .success(function(response, status, headers, config)  {
          deferred.resolve(response);
        })
        .error(function(msg, code) {
          deferred.reject(msg);
          $log.error(msg, code);
          // alert("There has been an error in the server, try again later.");
        });

        return deferred.promise;
      }
    }
  });

  angular.module('marketApp').service('GetAnnounceId',function(){

    var id = "";
    return {
        getAnnounceId: function(){
            return id;
        },
        setAnnounceId: function(val){
            id = val;
        }
    };

  });

})();
