function soloNumeros( event ) {
	if (event.keyCode < 48 || event.keyCode > 57)
		event.returnValue = false;

}

function preguntaEliminacion( event ){ 
    if ( ! confirm('¿Estas seguro que deseas eliminar este registro?')){ 
       event.preventDefault();
    } 
} 