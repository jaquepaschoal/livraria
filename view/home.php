<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <style>
    li {list-style:none;}
    a:hover {color:blue; font-weight:bold}
  </style>
</head>
<body>
  <ul>
    <li><a href='index.php?controller=c_livro&method=list'>Listar Livros</a></li>
    <li><a href="index.php?controller=c_genero&method=listAll"> Listar Generos </a></li> 
    <li><a href="index.php?controller=c_autor&method=listAll"> Listar Autores </a></li><br>  
    <li><a href='index.php?controller=c_autor&method=list'>Listar livros por autor</a></li>
    <li><a href='index.php?controller=c_genero&method=list'> Listar livros por genero </a></li>
    <li><a href='index.php?controller=c_editora&method=list'> Listar livros por editora </a></li><br>
    <li><a href='index.php?controller=c_genero&method=insert'> Inserir Genero </a></li>
    <li><a href='index.php?controller=c_livro&method=insert'> Inserir Livro </a></li><br>
    <li><a href='index.php?controller=c_livro&method=listarLivrosRest'> Listar Livro Rest </a></li>
    <li><a href='index.php?controller=c_genero&method=insertRest'> Inserir Genero Rest </a></li>

  </ul>
</body>
</html>