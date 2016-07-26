<?php
header("access-control-allow-origin: *");
include('c0n3x10n.php');
$sql = 'select * from cy_solicitud where fecha = "'.$_GET["fecha"].'" and cancha="'.$_GET["cancha"].'" order by hora asc';
$res = mysqli_query($enlace,$sql);
if(mysqli_num_rows($res)>0){
	$post = array();
	while($row = mysqli_fetch_array($res))
    {
		$post[] = $row;
    }
	$resp = '<h3>Tabla de Disponibilidad</h3>
				<h4>Mi Seleccion, Domingo 30</h4>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td><strong>Valor<strong></td>
					<td><strong>Hora<strong></td>
					<td><strong>Estado<strong></td>
				<tr>';
	$x=5;$y=0;
	while($x < 11)
	{
		if( $post[$y]['hora'] == $x )
		{
			if( $post[$y]['estado'] == 0) 
			{
				$resp.='<tr class="warning"><td>$70.000</td><td>'.$x.' pm</td><td><button type="button" class="btn btn-warning">Pendiente</button></td></tr>';
			}
			else
			{
				$resp.='<tr class="danger"><td>$70.000</td><td>'.$x.' pm</td><td><span class="label label-danger">Reservada</span></td></tr>';
			}
			$y++;
		}
		else
		{
			$resp .= '<tr>
						<td>$70.000</td>
						<td>'.$x.' pm</td>
						<td><button type="button" class="btn btn-success" onclick="prereserva('.$x.')">Disponible</button></td>
					</tr>';
		}
		$x++;
	}
}
else
{
	$resp ='<h3>Tabla de Disponibilidad</h3>
				<h4>Mi Seleccion, Domingo 30</h4>
		<div class="table-responsive">
			<table class="table">
				<tr>
					<td><strong>Valor<strong></td>
					<td><strong>Hora<strong></td>
					<td><strong>Estado<strong></td>
				<tr>';
	$x=5;
	while($x < 11)
	{
		$resp .= '<tr>
					<td>$70.000</td>
					<td>'.$x.' pm</td>
					<td><button type="button" class="btn btn-success" onclick="prereserva('.$x.')">Disponible</button></td>
					</tr>';
		$x++;
	}

}
$resp .= '</table></div>';
echo $resp;
?>