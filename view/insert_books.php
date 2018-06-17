<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inserir Livros</title>
</head>
<body>
  <form action="#" method="POST">
    <label>Título: </label>
    <input type="text" name="titulo"><br><br>

    <label for="">Gênero:</label>
    <select name="generos">
      <?php
          foreach ($generos as $value) {
            echo "<option value='{$value->idgenero}'>{$value->descricao}</option>";
          }
      ?>
    </select><br><br>

    <label for="">Editoras:</label>
    <select name="editoras">
      <?php
          foreach ($editoras as $value) {
            echo "<option  value='{$value->ideditora}'>{$value->nome}</option>";
          }
      ?>
    </select><br><br>
    <fieldset> 
      <legend>Autores</legend>  
      <?php
          foreach ($autores as $value) {
            echo "<input type='checkbox' value='{$value->idautor}' name='autor[]'> <label>{$value->nome}</label><br>";
          }
      ?>
    </fieldset><br>
    <input type="submit" value="ENVIAR">
  </form>
</body>
</html>