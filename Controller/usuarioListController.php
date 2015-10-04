<?php

require_once "../class/BD.class.php";

$respuesta=  "";

  $sql="SELECT p.id_persona, p.pers_nombrecompleto,p.pers_email,p.pers_telefono,p.pers_celular,
      p.pers_rut,u.usua_nombre_usuario FROM tg_personas p INNER JOIN ca_usuarios u ON p.id_persona=u.id_persona;";
  $parametros=array();
  $campos=array();
  $estado="error";
  $cont=0;
  try {
    $bd = new BD();
    $res=$bd->select($sql, $parametros);
    if($bd->myException->getEstado()==0){
      while($rs=$res->fetch()){
        $cont++;
        $estado="ok";
        $campos[]=array(
            "nro"=>$cont,
            "id_persona"=>$rs["id_persona"],
            "nombre"=>$rs["pers_nombrecompleto"],
            "email"=>$rs["pers_email"],
            "telefono"=>$rs["pers_telefono"],
            "celular"=>$rs["pers_celular"],
            "rut"=>$rs["pers_rut"],
            "usuario"=>$rs["usua_nombre_usuario"]);
      }
    }
  } catch (Exception $e) {
    $estado="error";
    $mensaje=$e->getMessage();
  } 

  $bd=NULL;

  
  
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
header("Content-type: application/json");
$campos=json_encode($campos);
echo $campos;
