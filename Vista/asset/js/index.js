$(document).ready(function(){
$('.slider').slider();
$('.modal').modal();
$('.tabs').tabs();


 $(".dropdown-trigger").dropdown();
// $(".button-collapse").sideNav();
$(window).scroll(function() {
  if($(document).scrollTop() > 50) {
    $('#nav').addClass('beto');
  }
  else {
  $('#nav').removeClass('beto');
  }
});
});
