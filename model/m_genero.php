<?php
  class m_genero
  {
    private $idgenero;
    private $descricao;

    function __construct($idgenero=null,$descricao=null) {
      $this->idgenero = $idgenero;
      $this->descricao = $descricao;
    }

    function getIdgenero() {
      return $this->idgenero;
    }

    function getDescricao() {
      return $this->descricao;
    }
  }
?>