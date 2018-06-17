<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lista de Generos</title>
</head>
<body>
  <h1>Escolha um gênero primeiro:</h1>
  <form action="#" method="POST">
    <select name="generos">
      <?php
          foreach ($response as $value) {
            echo "<option value='{$value->idgenero}'>{$value->descricao}</option>";
          }
      ?>
    </select>
    <input type="submit" value="OK">
  </form><br>
  <div>
    <?php
      if($response2) { 
        echo "<table border='1'>";
          echo "<th>Título</th>";
          foreach ($response2 as $value) {
            echo "<tr>";
              echo "<td>{$value->titulo}</td>";
            echo "</tr>";
          }
        echo "</table>";
      }
        
    ?>
  </div>
</body>
</html>