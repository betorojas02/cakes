//ajax para registrar ingredientes
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var nombreE = $('#nombre_empresa').val();
	var nombreC = $('#nombre_contacto').val();
	var telefono = $('#telefono').val();
	var direccion= $('#direccion').val();
  var ciudad= $('#ciudad').val();
  var pais= $('#pais').val();
  var region= $('#region').val();
  var sitio= $('#sitio').val();

    if($('#submit-item').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'addProveedor.php',
	    		type: 'POST',
	    		dataType: 'json',
	    		data:'nombreE='+nombreE+'&nombreC='+nombreC+'&telefono='+telefono+'&direccion='+direccion+'&ciudad='+ciudad+'&pais='+pais+'&region='+region+'&sitio='+sitio
				}).done(function(resp){
					console.log(resp);
					swal({
					  title: "registar",
					   text: "Exito registrar",
					    type: "success",
							button: "cerrar",
					  },
					  function(){
					    window.location.href = 'ingredientes.php';
						});
				}
			);
		}//end if == "add"
});
