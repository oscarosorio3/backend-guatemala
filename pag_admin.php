<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Visacion Guatemala</title>
     <link rel="stylesheet" href="vaidroll.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/styles.css">
     <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script src="js/dropzone.js"></script>
     <script src="js/jquery-ui.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<body>
<table>


</tr>

<?php

 include('conexion.php');

?>
<tr>
<center><img src = "image/dtgt.png"/><br></center>
<form method="POST" action="sube.php" enctype="multipart/form-data">
      <font size = "3" color = "blue" face = "Helvetica">Seleccione el XML a cargar:</font>
      <input type="file" name="archivo" />
 
    <input type="submit" name="uploadBtn" value="Cargar Factura" />
  </form>
</tr>
</table>
</body>
</html>