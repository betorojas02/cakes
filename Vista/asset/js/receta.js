//ajax para registrar recetas
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var producto = $('#producto').val();
	var ingrediente = $('#ingrediente').val();
	var cantidad= $('#cantidad').val();
	var medida = $('#medida').val();

	//var estado =$('#estado').val();
    if($('#submit-item').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'addrecetas.php',
	    		type: 'POST',
	    		dataType: 'json',
	    		data:'producto='+producto+'&ingrediente='+ingrediente+'&cantidad='+cantidad+'&medida='+medida
				}).done(function(resp){
					console.log(resp);
					swal({
					  title: "registrar",
					   text: "Se registro con éxito",
					    type: "success",
							button: "cerrar",
					  },
					  function(){
					    window.location.href = 'recetas.php';
						});
				}
			);
		}//end if == "add"
});
