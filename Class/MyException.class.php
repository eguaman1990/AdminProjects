<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyException
 *
 * @author Edwin_Guaman
 */
class MyException extends Exception {

  private $_estado;
  private $_mensaje;

  const NO_ERROR = 0;
  const ERROR = 1;

  public function getEstado() {
    return $this->_estado;
  }

  public function getMensaje() {
    return $this->_mensaje;
  }

  public function setEstado($estado) {
    $this->_estado = $estado;
  }

  public function addError($value) {
    $this->_mensaje[] = $value;
  }

  public function __construct() {
    parent::__construct();
  }

}
