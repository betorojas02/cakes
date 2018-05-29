//ajax para registrar ingredientes
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var nombre = $('#nombre').val();


    if($('#submit-item').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'addCategoria.php',
	    		type: 'POST',
	    		dataType: 'json',
	    		data:'nombre='+nombre
				}).done(function(resp){
					console.log(resp);
					swal({
					  title: "registar",
					   text: "Exito registrar",
					    type: "success",
							button: "cerrar",
					  },
					  function(){
					    window.location.href = 'categoriaa.php';
						});
				}
			);
		}//end if == "add"
});
