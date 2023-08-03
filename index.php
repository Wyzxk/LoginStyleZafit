<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesion</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="login-page">
		<div class="form">
		  <form action="index.php" method="post">
			<input type="text" name="usuario"  required placeholder="USUARIO"/>
			<input type="password" name="contraseña"  pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g"  required placeholder="CONTRASEÑA"/>
			<input type="submit" name="btn_ingresar" value="INGRESAR" class="boton">
			<p class="message">¿Aún no te has registrado? <a href="registrarse.php">Resgistrate</a></p>
		  </form>
		</div>
	  </div>
	  <?php
                if(isset($_POST['btn_ingresar'])){
                    // incluyo la conexion
                    include "conex.php";
                    // Iniciar la sesión
                   session_start();
                    // Rescato los campos
                    $usuario = $_POST['usuario'];
                    $contraseña = $_POST['contraseña'];
                    // Consulta de clave y documento
                    $consulta=mysqli_query($conex,"SELECT * FROM userss WHERE usuario='$usuario' AND contraseña='$contraseña'") or die ($conex."Error en la consulta");
                    //verificar si la consulta obtuvo un 1 o un 0
                    $numero = mysqli_num_rows($consulta);
                    // Verificar Resultado d ela consulta
                    if ($numero != 0){
                        // Traer los datos que se necesita para las SESSIONES del sistema
                        while ($fila=mysqli_fetch_array($consulta)){
                            //Crear SESSIONES del sistema
                            $_SESSION['usuario'] = $fila['usuario'];
                            $_SESSION['p_n'] = $fila['primer_nombre'];
                            $_SESSION['p_a'] = $fila['primer_apellido'];
                        }
                        //redireccion a la parte interna del sistema
                        echo"<script>window.location='../index.html';</script>";
                    }else{
                        // Mensaje de alerta
                       // echo "<script>alert('Usuario y/o Clave incorrectos');</script>";
                        echo "<br> Usuario y/o Clave incorrectos <br>";
                    }
                }
            ?>
            
           
        </center>
</body>
</html>