  $(".city").hover( 
    function(){ 
    var region = $(this).attr("data-region");
    $("svg #"+region).attr("class","active");
  },
  
  function(){
     $("svg .active").attr("class",""); 
  }
  ); 
  
/*  
$(function(){var a=$(".nav-new");$(window).scroll(function(){var b=$(window).scrollTop();b>=140?a.removeClass("nav-new").addClass("navbar-bg"):a.removeClass("navbar-bg").addClass("nav-new")})});
*/



  $(".city").hover( 
    function(){ 
    var region = $(this).attr("data-region");
    $("svg #"+region).attr("class","active");
  },
  
  function(){
     $("svg .active").attr("class","");
  }
  ); 



$('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true
});



$(function() {
    $('.lazy').Lazy();
});
            
            
$(function() {
    $(".search-icon").hover(function() {
    $(".search input").show();
});
});