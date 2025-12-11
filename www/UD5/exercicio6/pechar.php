<?php
session_start(); /*RETOMAMOS A SESIÓN INICIADA, QUE QUEREMOS PECHAR */
session_unset(); /*ELIMINAMOS AS VARIABLES DE SESIÓN*/
session_destroy();
header("Location: sesion1a.php"); /*REDIRECCIONAMOS Á PÁXINA DE INICIO*/
?>