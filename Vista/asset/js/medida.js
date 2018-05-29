//ajax para registrar ingredientes
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var descripcion = $('#descripcion').val();
	//var estado =$('#estado').val();
    if($('#submit-item').val() == "add"){
    	// console.log('add ra');
	    $.ajax({
	    		url: 'addmedida.php',
	    		type: 'POST',
	    		dataType: 'json',
	    		data:'descripcion='+descripcion
				}).done(function(resp){
					console.log(resp);
					swal({
					  title: "Correcto",
					   text: "Ha sido registrada",
					    type: "success",
							button: "cerrar",
					  },
					  function(){
					    window.location.href = 'medida.php';
						});
				}
			);
		}//end if == "add"
});
