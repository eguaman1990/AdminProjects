<?php

require_once '../Class/BD.class.php';

if (isset($_REQUEST["txtUser"])) {
  $user = $_REQUEST["txtUser"];
} else {
  $user = "";
}

if (isset($_REQUEST["accion"])) {
  $accion = $_REQUEST["accion"];
} else {
  $accion = "";
}

if ($accion == "validaUsuario") {
  try {
    $bd = new BD();
    $sql = "select usua_nombre_usuario from ca_usuarios where usua_nombre_usuario='" . $user . "'";
    $parametros = array();
    $res = $bd->select($sql, $parametros);
    if ($bd->myException->getEstado() == 0) {
      if ($rs = $res->fetch()) {
        echo "false";
      } else {
        echo "true";
      }
    } else {
      echo "error";
    }
  } catch (Exception $exc) {
    echo "error";
  }
}
