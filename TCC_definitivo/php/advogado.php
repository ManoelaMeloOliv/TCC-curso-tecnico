<?php

session_start();
include('config.php');

$sql = "SELECT * FROM usuarios ORDER BY idusuarios DESC";
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

 div a button {
      background-color: #140951; /* Cor de fundo azul */
      color: white; /* Cor do texto */
      border: none; /* Remover a borda padrão */
      border-radius: 8px; /* Bordas arredondadas */
      padding: 15px 20px; /* Espaçamento interno */
      text-decoration: none; /* Remover sublinhado padrão */
      display: inline-block; /* Para que o botão respeite largura e altura especificadas */
  }
  
  div a button:hover {
      background-color: #0056b3; /* Cor de fundo azul mais escura no hover */
      cursor: pointer; /* Mudar o cursor ao passar o mouse */
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
    <h1>Tabela cliente</h1>

    <div class="m=5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">RG</th>
      <th scope="col">CPF/CNPJ</th>
      <th scope="col">Sexo</th>
      <th scope="col">Data_nasc</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Endereço</th>
      <th scope="col">...</th>
    </tr>
  </thead>
  <a href="http://localhost/TCC_definitivo/php/formcliente.php"><button>cadastrar</button></a>
  <tbody>
<?php
while ($user_data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $user_data['idusuarios'] . "</td>";
    echo "<td>" . $user_data['nome'] . "</td>";
    echo "<td>" . $user_data['email'] . "</td>";
    echo "<td>" . $user_data['telefone'] . "</td>";
    echo "<td>" . $user_data['rg'] . "</td>";
    echo "<td>" . $user_data['cpf/cnpj'] . "</td>";
    echo "<td>" . $user_data['sexo'] . "</td>";
    echo "<td>" . $user_data['data_nasc'] . "</td>";
    echo "<td>" . $user_data['cidade'] . "</td>";
    echo "<td>" . $user_data['estado'] . "</td>";
    echo "<td>" . $user_data['endereco'] . "</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
    </div>

</body>
</html>