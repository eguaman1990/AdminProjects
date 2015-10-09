<?php

require_once "../class/BD.class.php";
require_once "../class/Tablas.class.php";

$respuesta=  "";
$estado="";
$mensaje="";
if(isset($_REQUEST["accion"])){
  $accion=$_REQUEST["accion"];
}else{
  $accion="";
}

if(isset($_REQUEST["id_persona"])){
  $id_persona=$_REQUEST["id_persona"];
}else{
  $id_persona="";
}

if($accion=="eliminar"){
    
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$respuesta=json_encode($respuesta);
echo $respuesta;