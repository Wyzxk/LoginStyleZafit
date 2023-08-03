<?php
session_start();
session_destroy();

 //redireccion a la parte interna del sistema
 echo"<script>window.location='index.php';</script>";
?>