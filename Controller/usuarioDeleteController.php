<?php

require_once "../class/BD.class.php";
require_once "../class/Tablas.class.php";
require_once "../class/Mensajes.class.php";

$respuesta = "";
$estado = "";
$mensaje = "";
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
} else {
    $accion = "";
}

if (isset($_REQUEST["id_persona"])) {
    $id_persona = $_REQUEST["id_persona"];
} else {
    $id_persona = "";
}

if ($accion == "eliminar") {
    $bd = new BD();$bd->beginTransaction();
    try {
    
        $parametros = array("id_persona" => $id_persona);
        $res = $bd->delete(tablas::USUARIOS, $parametros);
        if ($bd->myException->getEstado() == 0) {
            $res1= $bd->delete(tablas::PERSONAS,$parametros);
            if ($bd->myException->getEstado() == 0) {
                $estado="ok";
                $mensaje=Mensajes::REGISTRO_ELIMINADO;
                $bd->commit();
            }else{
                $bd->rollBack();
                $estado = "error";
                $mensaje = $bd->myException->getMensaje();
            }
        } else {
            $bd->rollBack();
            $estado = "error";
            $mensaje = $bd->myException->getMensaje();
        }
    } catch (Exception $e) {
        $bd->rollBack();
        $estado = "error";
        $mensaje = $e->getMensaje();
    } catch (Exception $e) {
        $bd->rollBack();
        $estado = "error";
        $mensaje = $e->getMensaje();
    }
    $bd = NULL;
    $respuesta[] = array("estado" => $estado, "mensaje" => $mensaje);
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$respuesta = json_encode($respuesta);
echo $respuesta;
