$ (document).ready (function () {
  $ ('.slider').slider ();
  $ ('.modal').modal ();
  $ ('.tabs').tabs ();
  $ ('.dropdown-trigger').dropdown ();

  // $(".button-collapse").sideNav();
  $ (window).scroll (function () {
    if ($ (document).scrollTop () > 50) {
      $ ('#nav').addClass ('beto');
    } else {
      $ ('#nav').removeClass ('beto');
    }
  });
});

function addProduct (code) {
  var amount = document.getElementById (code).value;

  if (amount <= 0) {
    swal ('Error', 'No Puedes Meter Numeros Negativos En  la cantidad', 'info');
  } else {
    window.location.href =
      'datosUsuario.php?action=add&code=' + code + '&amount=' + amount;
  }
}

function deleteProduct (code) {
  window.location.href = 'datosUsuario.php?action=remove&code=' + code;
}
