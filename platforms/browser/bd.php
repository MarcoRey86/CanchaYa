<?php
header("access-control-allow-origin: *");
include('c0n3x10n.php');
switch($_GET["tipo"]){
	/* Pre-reserva de la cancha, agregar numero de telefono para llamar y envia correo */
	case 1: $sql = 'insert into cy_solicitud (cancha, fecha, hora, solicitante, estado, fecha_solicitud) values ("'.$_GET["cancha"].'","'.$_GET["fechasol"].'","'.$_GET["hora"].'","'.$_GET["tel"].'","0","'.date('Y-m-d H:i:s').'")';
			$res = mysqli_query($enlace,$sql);
			break;
}
?>