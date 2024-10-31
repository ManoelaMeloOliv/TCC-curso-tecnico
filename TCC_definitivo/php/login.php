<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    
        if(strlen($_POST['email']) == 0){
            echo "Preencha seu email!";
     }  else if (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha!";
     } else {

        $email = $mysqli ->real_escape_string($_POST['email']);
        $senha = $mysqli ->real_escape_string($_POST['senha']);


        $sql_code = "SELECT * FROM usuarioslog WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " .  $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuarioslogin = $sql_query->fetch_assoc();

            if (!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuarioslogin['id'];
            $_SESSION['nome'] = $usuarioslogin['nome'];

            header("Location: ../area.html");
            

        } else {
            echo "Falha ao logar!  E-mail ou senha incorretos";
        }

    }


    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    height:100vh ;
    background-color: #000;
    background-size: cover;
    background-position: center;
    transition: background-image 0.5s ease; /* Transição suave para a imagem de fundo */
}

.box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate( -50%, -50%);
    background-color: rgba(247, 241, 209, 0.2);
    padding: 15px;
         /* border-radius: 6px; */
    width: 20%;
    color: #fff;
}

/* Estilos para os campos de entrada e labels, ajuste conforme necessário */
.inputBox {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #fff;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: 0.3s ease all;
        }

        button:hover {
            background-color: #0056b3;
        }
        .inputBox {
    position: relative;
}

        </style>
</head>
<body>
<div class="box">
    <form action="" method="POST">
    <div class="inputBox">
        <p>
            <label>E-mail</label>
            <input type="text"  name="email">
        </p>
        <p>
        <div class="inputBox">
            <label>Senha</label>
            <input type="password"  name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
</p>
    </form>
</body>
</html>

