<?php

require_once "Tablas.class.php";

class Consultas {

    CONST ElIMINAR_USUARIO = "UPDATE  Tablas::USUARIOS SET USUA_VIGENTE=0 where id_persona=?";
    CONST ELIMINAR_PERSONA = "UPDATE  Tablas::PERSONAS  SET PERS_VIGENTE=0 WHERE ID_PERSONA=?";
    CONST LIST_USUARIOS = "SELECT p.id_persona, p.pers_nombrecompleto,p.pers_email,p.pers_telefono,p.pers_celular,p.pers_rut,u.usua_nombre_usuario FROM tg_personas p INNER JOIN ca_usuarios u ON p.id_persona=u.id_persona WHERE p.pers_vigente=1 AND u.USUA_VIGENTE=1";
    CONST CARGAR_USUARIOS = "SELECT p.id_persona,p.pers_nombrecompleto, p.pers_nombres,p.pers_paterno,p.pers_materno,p.pers_email,u.usua_nombre_usuario FROM tg_personas p INNER JOIN ca_usuarios u ON p.id_persona=u.id_persona WHERE p.pers_vigente=1 AND u.USUA_VIGENTE=1 AND p.id_persona=?";

}
