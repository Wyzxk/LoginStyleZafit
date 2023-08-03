<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" href="css/login.css"
</head>
    <body bgcolor="#cccccc">
       
        <center>
            <div class="login-page">
  <div class="form">

  <form action="registrarse.php" method="post">
      <input type="text" name="user" placeholder="Usuario"/>
      <input type="password"  name="pass" placeholder="Contraseña"/>
       <input type="text"  name="doc" placeholder="Documento"/>
       <input type="email"  name="email" placeholder="Correo Electrónico"/>
      <input type="submit" name="register" value="Registrarse">
      <p class="message">¿Ya estás registrado? <a href="index.php">Inicia Sesión</a></p>
    </form>
  </div>
</div>

<?php 
include("conex.php");
if (isset($_POST['register'])) {
    if (strlen($_POST['user']) >= 4 and strlen($_POST['pass']) >= 1 )
    if (strlen($_POST['doc']) >= 1 and strlen($_POST['email']) >= 1 )  {
	    $name = trim($_POST['user']);
	    $contra = trim($_POST['pass']);
        $doc = trim($_POST['doc']);
        $email = trim($_POST['email']);
	    $consulta = "INSERT INTO `userss`(`documento`, `usuario`, `email`, `contraseña`) VALUES ('$doc','$name','$email','$contra')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="ok">¡Te has registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}
?>

</html>
