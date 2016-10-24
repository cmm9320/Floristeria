<?php
// Inicio de session
session_start ();
$mensaje = "";
if (! empty ( $_POST )) {
	if (! empty ( $_POST ["txtNombre"] ) && ! empty ( ["txtContrasena"] )) {
		$contrasena=strtoupper($_POST ["txtContrasena"]);
		// Indica si el usuario es válido
		$valido = FALSE;
		switch ($_POST ["txtNombre"]) {
			case "cmayorga" :
				if ($contrasena == "PASS1") {
					$valido = TRUE;
				}
				break;
			case "rcruz" :
				if ($contrasena == "PASS2") {
					$valido = TRUE;
				}
				break;
			default :
				$valido = FALSE;
				break;
		}
		if ($valido === TRUE) {
			$_SESSION ["usuario"] = $_POST ["txtNombre"];
			header ( "location:index.php" );
		} else {
			$mensaje = "Usuario/Contraseña erronea";
		}
	} else {
		$mensaje = "Usuario/Contraseña erronea";
	}
}
?>



<!DOCTYPE HTML >
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login Floristeria</title>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<form action="login.php" method="post">

		<div class="login">
			<div class="mensaje">
	<?php if(!empty($mensaje)){?>		
				<span><?php echo $mensaje;?></span>
			
		 <?php  }?>
	</div>
			<h2>Inicio de Sesion</h2>
			<div class="frm">
				<label>Usuario: </label><br> <input type="text" name="txtNombre"
					required />
			</div>
			<div class="frm">
				<label>Contraseña: </label><br> <input type="password"
					name="txtContrasena" required />
			</div>
			<div class="frm">
				<input type="submit" name="aceptar" value="Enviar" />
			</div>

		</div>
	</form>
</body>
</html>