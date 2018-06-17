<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Listar Autores</title>
</head>
<body>
<table border='1'>
    <thead>
      <tr>
        <th>Nome</th>
        <th>Nacionalidade</th>
      </tr>
    </thead>
    <tbody>
      <?php
        foreach ($response as $value) {
          echo "<tr>";
           echo "<td>{$value->nome} </td>";
           echo "<td>{$value->nacio} </td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>