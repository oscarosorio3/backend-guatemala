<?php

	include('conexion.php');

	$usu 	= $_POST["txtusuario"];
	$pass 	= $_POST["txtpassword"];
	$rol 	= $_POST["rol"];



	$queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario ='$usu' and pass = '$pass'");
	$nr 		= mysqli_num_rows($queryusuario);
	
	$row = $queryusuario->fetch_assoc();
	echo "<pre>**---**".$nr;
	print_r($row);

	if ($nr == 1 )  
	{ 
		if($row['rol']==="Usuario")
		{	
			header("Location: pag_user.php");
		}
		else if ($row['rol']==="Admin")
		{
			header("Location: pag_admin.php");
		}
	}
	else
	{
		echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= 'index.html' </script>";
	}

	/*VaidrollTeam*/
?>