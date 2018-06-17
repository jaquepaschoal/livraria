<?php
  class m_editora
  {
    private $ideditora;
    private $nome;

    function __construct($ideditora=null,$nome=null) {
      $this->ideditora = $ideditora;
      $this->nome = $nome;
    }

    function getIdeditora() {
      return $this->ideditora;
    }

    function getNome() {
      return $this->nome;
    }
  }
?>