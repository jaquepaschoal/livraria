<?php
  class m_autor
  {
    private $idautor;
    private $nome;
    private $nacionalidade;

    function __construct($idautor=null,$nome=null,$nacionalidade=null) {
      $this->idautor = $idautor;
      $this->nome = $nome;
      $this->nacionalidade = $nacionalidade;
    }

    function getIdautor() {
      return $this->idautor;
    }
  }
?>