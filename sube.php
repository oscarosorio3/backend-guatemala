<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
</html>

<?php 
include_once("firma.php");
include_once("certificar.php");

$fir = new classFirma();
$cer = new classCertificar();

$nombre=$_FILES['archivo']['name'];
$guardado=$_FILES['archivo']['tmp_name'];
$tipo = $_FILES['archivo']['type'];

$nombreSinExt = pathinfo($nombre, PATHINFO_FILENAME);

if($tipo==='text/xml'){
	if(!file_exists('file')){
		mkdir('file',0777,true);
		if(file_exists('file')){
			if(move_uploaded_file($guardado, 'file/'.$nombre)){
				$ruta = 'file/'.$nombre;
				$fp = fopen($ruta, "r");
				$Content = fread($fp, filesize($ruta));
				$base64 = base64_encode($Content);

				$firmar_factura = $fir->firmarFactura($base64);
				$certiticar_factura = $cer->certificarFactura($firmar_factura->archivo);
			}else{
				echo "Archivo no se pudo guardar";
			}
		}
	}else{
		if(move_uploaded_file($guardado, 'file/'.$nombre)){
			$ruta = 'file/'.$nombre;
			$fp = fopen($ruta, "r");
			$Content = fread($fp, filesize($ruta));
			$base64 = base64_encode($Content);

			$firmar_factura = $fir->firmarFactura($base64, $nombreSinExt);
			$certiticar_factura = $cer->certificarFactura($firmar_factura->archivo);
		?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="vaidroll.css">
		<center><img src = "image/dtgt.png"/><br></center>
		<table class="table table-responsive">
			<tbody>
				<tr>
					<th>Resultado</th>
					<td><?php echo "".$certiticar_factura->descripcion ?></td>
				</tr>
			
				<tr>
					<th>uuid</th>
					<td><?php echo "".$certiticar_factura->uuid ?></td>
				</tr>
			</tbody>
		</table>
		<form method="POST" action="pag_admin.php" >   
			<center><input type="submit" name="volver" value="Volver" /></center>
		</form>
		<?php	
		}else{
			echo "Archivo no se pudo guardar";
		}
	}
}else{
	echo "<center><div class=\"alert alert-warning\">
				<strong>Cuidado! El archivo debe tener extensión .xml</strong>
			</div>";
	echo "<a href=\"pag_admin.php\">Regresar</a></center>";

}

?>