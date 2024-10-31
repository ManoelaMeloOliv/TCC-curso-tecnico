<?php

session_start();
include('form.php');

$sql = "SELECT * FROM usuarioslog ORDER BY idusuarioslog DESC";
$result = $conexao->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conexao->error);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>sistema</title>
    <style>
 
 body{
    height:100vh ;
    background-color: #fff;
    background-size: 200% 200%;
    animation: float 6s linear infinite alternate;
    color: white;
    text-align: center;

 }
 h1{
    color: #000;
 }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg Snavbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">tabela de dados de cadastro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
</nav>
</div>
</button>
    <h1>Tabela advogado</h1>

    <div class="m=5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">OAB</th>
      <th scope="col">Senha</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <tbody>
<?php
while ($user_data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $user_data['nome'] . "</td>";
    echo "<td>" . $user_data['email'] . "</td>";
    echo "<td>" . $user_data['telefone'] . "</td>";
    echo "<td>" . $user_data['oab'] . "</td>";
    echo "<td>" . $user_data['senha'] . "</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
    </div>
</body>
</html>