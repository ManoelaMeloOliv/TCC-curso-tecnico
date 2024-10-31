<?php
session_start();

   if (isset($_POST['submit']))
   {
    //print_r('Nome:' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email: ' . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone: ' .  $_POST['phone']);
    //print_r('<br>');
    //print_r('OAB:' . $_POST['oab']);
    //print_r('<br>');
    //print_r('Senha:' . $_POST['senha']);
   


   include_once('form.php');

   $nome = $_POST ['nome'];
   $email = $_POST['email'];
   $telefone = $_POST['phone'];
   $oab = $_POST['oab'];
   $senha = $_POST ['senha'];
   
    
   $queryInsert = "INSERT INTO usuarioslog VALUES (default, '$nome','$email','$telefone','$oab','$senha')";
   $result = $conexao->query($queryInsert);

   if ($result) {
       $querySearchUser = "SELECT * FROM usuarioslog WHERE email = '$email'";
       $searchUser = $conexao->query($querySearchUser)->fetch_object();

       if (!isset($_SESSION['user'])) {
           $_SESSION['user'] = $searchUser->idusuarios;
           header('location: login.php');
       }
   } else {
       echo "<script>alert('Houve algum erro!')</script>";
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/formlog.css">
    <title>DMPR Cadastro de Colaboradores</title>
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




.box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate( -50%, -50%);
    background-color: rgba(247, 241, 209, 0.2);
    padding: 15px;
    /*border-radius: 6px;*/
    width: 20%;
    color: #fff;
}

fieldset{
    border: 3px solid  #f7f1d1;
}

legend{
    border: 1px solid #f7f1d1;
    padding: 9px;
    text-align: center;
    background-color: #f7f1d1;
    /*border-radius: 4px;*/
    color:#011140;
}

.inputBox{
    position: relative;
}

.inputUser{
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    letter-spacing: 2px;

}

.labelInput{
    position: absolute;
    top: 0px;
    left: 0px;
    pointer-events: none;
    transition: .5s;
}

.inputUser:focus ~ .labelInput,
.inputUser:valid ~ .labelInput{
    top: -20px;
    font-size: 12px;
    color: dodgerblue;
}

#submit{
    background:#011140;
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    /*border-radius: 10px;*/
}
#submit:hover{
    background:#011140;
}

    </style>


</head>
<body>
    <div class="box">
    <form action="formlog.php" method = "POST">
            <fieldset>
            <legend><b>Cadastro de Colaboradores</b></legend>
            <br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome Completo</label> 
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">E-mail</label> 
            </div>
            <br><br>
            <div class="inputBox">
                <input type="tel" name="phone" id="phone" class="inputUser" required>
                <label for="phone" class="labelInput">Telefone</label> 
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="oab" id="oab" class="inputUser" required>
                <label for="oab" class="labelInput">OAB</label> 
            </div>
            <br><br>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required>
                <label for="senha" class="labelInput">Senha</label> 
            </div>
            <br><br>
            <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>