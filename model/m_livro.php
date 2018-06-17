<?php
  class m_livro
  {
    private $idlivro;
    private $titulo;
    private $genero;
    private $editora;
    private $autor;

    function __construct($idlivro=null,$titulo=null,$genero=null,$editora=null,$autor=null) {
      $this->idlivro = $idlivro;
      $this->titulo = $titulo;
      $this->genero = $genero;
      $this->editora = $editora;
      $this->autor[] = $autor;
    }

    function getAutor() {
      return $this->autor;
    }

    function getGenero() {
      return $this->genero;
    }

    function getEditora() {
      return $this->editora;
    }

    function getTitulo() {
      return $this->titulo;
    }

    function setAutor($autor) {
      $this->autor[] = $autor;
    }
  }
?>