<?php

require_once "../class/BD.class.php";
require_once "../class/Tablas.class.php";
require_once "../class/Consultas.php";
require_once "../class/MyException.class.php";

$respuesta = "";
$estado = "";
$mensaje = "";
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];
} else {
    $accion = "";
}

if (isset($_REQUEST["nombre"])) {
    $nombre = $_REQUEST["nombre"];
} else {
    $nombre = "";
}

if (isset($_REQUEST["ap_paterno"])) {
    $apPaterno = $_REQUEST["ap_paterno"];
} else {
    $apPaterno = "";
}

if (isset($_REQUEST["ap_materno"])) {
    $apMaterno = $_REQUEST["ap_materno"];
} else {
    $apMaterno = "";
}

if (isset($_REQUEST["email"])) {
    $email = $_REQUEST["email"];
} else {
    $email = "";
}

if (isset($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
} else {
    $user = "";
}

if (isset($_REQUEST["pass"])) {
    $pass = $_REQUEST["pass"];
} else {
    $pass = "";
}

if (isset($_REQUEST["id_persona"])) {
    $id_persona = $_REQUEST["id_persona"];
} else {
    $id_persona = 0;
}

if ($accion == "add") {
    $bd = new BD();
    $bd->beginTransaction();
    try {

        $parametros = array($id_persona);

        $bd->select(Consultas::CARGAR_USUARIOS, $parametros);
        if ($bd->myException->getEstado() == 0) {
            $parametrosUsuario = array(
                'usua_nombre_usuario' => $user,
                'usua_clave' => $pass,
                'usua_fecha_creacion' => date("Y-m-d H:i:s"),
                'id_persona' => $bd->lastId()
            );
            $bd->insert2(tablas::USUARIOS, $parametrosUsuario);
            if ($bd->myException->getEstado() == 0) {
                $bd->commit();
                $estado = "ok";
                $mensaje = "Usuario Ingresado Exitosamente";
            } else {
                $bd->rollBack();
                $estado = "error";
                $mensaje = $e->getMensaje();
            }
        } else {
            $bd->rollBack();
            $estado = "error";
            $mensaje = $e->getMensaje();
        }
    } catch (Exception $e) {
        $bd->rollBack();
        $estado = "error";
        $mensaje = $e->getMensaje();
    }

    $bd = NULL;
    $respuesta[] = array("estado" => $estado, "mensaje" => $mensaje);
}

if ($accion == "cargar") {
    $bd = new BD();
    try {
        $parametros = array($id_persona);
        $res = $bd->select(Consultas::CARGAR_USUARIOS, $parametros);
        if ($bd->myException->getEstado() == 0) {
            while ($rs = $res->fetch()) {
                //print_r($rs);
                $estado = "ok";
                $campos = array(
                    "id_persona" => $rs["id_persona"],
                    "nombre" => $rs["pers_nombres"],
                    "email" => $rs["pers_email"],
                    "paterno"=>$rs["pers_paterno"],
                    "materno"=>$rs["pers_materno"],
                    "usuario" => $rs["usua_nombre_usuario"]);
            }
        }
    } catch (MyException $e) {
        $estado = "error";
        $mensaje = $e->getMessage();
    }
    $bd = NULL;
    $respuesta[] = array("estado" => $estado, "mensaje" => $mensaje,"campos"=>$campos);
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$respuesta = json_encode($respuesta);
echo $respuesta;
