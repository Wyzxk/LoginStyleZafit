<?php
session_start();
?>
   <html lang="es">
    <head>
        <title></title>
        <meta charset="utf-8"/>
    </head>
    <body bgcolor="#44f">
        <center>
           <h1>Bienvenido <?php echo $_SESSION['p_n']," ",$_SESSION['p_a']; ?></h1>  
           <a href="salir.php">Cerrar sesión</a>        
        </center>
    </body>
</html>