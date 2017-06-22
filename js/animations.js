$(document).ready(function(){

  $(window).on('scroll',function(){
    animateHeader();
  });

  function animateHeader(){
    var scrollTop = $(window).scrollTop();
    var wHeight = $(window).height();

    if(scrollTop > (wHeight / 2) ){
      $("header").css({"height":"3em"});
      $("header .navbar-header-top").css({"padding-top":"5px"});
    }else{
      $("header").css({"height":"5em"});
      $("header .navbar-header-top").css({"padding-top":"20px"});
    }

  }
});
