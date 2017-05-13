<?php
function autenticar() {
if (!$_SESSION){
	echo '<script language = javascript>
	alert("usuario no autenticado")
	self.location = "../../index.html"
	</script>';
	}
}
?>