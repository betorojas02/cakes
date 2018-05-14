$(document).ready(function () {
  $('.slider').slider();
  $('.modal').modal();
  $('.tabs').tabs();
  $('.dropdown-trigger').dropdown();


  // $(".button-collapse").sideNav();
  $(window).scroll(function () {
    if ($(document).scrollTop() > 50) {
      $('#nav').addClass('beto');
    } else {
      $('#nav').removeClass('beto');
    }
  });
});


function addProduct(code) {
  var amount = document.getElementById("cantidad").value;
  window.location.href = "datosUsuario.php?action=add&code=" + code + '&amount=' + amount;;
}