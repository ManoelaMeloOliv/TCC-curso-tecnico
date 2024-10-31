<?php
 
session_start();

 if(isset($_POST['submit']))
 {
    //print_r('Nome:' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email: ' . $_POST['email']);
    //print_r('<br>');
    //print_r('Telefone: ' .  $_POST['phone']);
    //print_r('<br>');
    //print_r('RG:' . $_POST['rg']);
    //print_r('<br>');
    //print_r('CPF:' . $_POST['cpf']);
    //print_r('CNPJ:' . $_POST['cnpj']);
    //print_r('<br>');
    //print_r('Sexo: ' .  $_POST['genero']);
    //print_r('<br>');
    //print_r('Data de nascimento: ' . $_POST['data_nascimento']);
    //print_r('<br>');
    //print_r('Cidade: ' .  $_POST['cidade']);
    //print_r('<br>');
    //print_r('Estado: ' . $_POST['estado']);
    //print_r('<br>');
    //print_r('Endereço: ' .  $_POST['endereco']);
    

    include_once('config.php');

    $nome = $_POST ['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $rg = $_POST['rg'];
    $cpf_cnpj = $_POST ['cpf/cnpj'];
    $sexo = $_POST['genero'];
    $data_nascimento = $_POST ['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST ['estado'];
    $endereco = $_POST['endereco'];
    
    
    $queryInsert = "INSERT INTO usuarios VALUES (default, '$nome','$email','$telefone','$rg','$sexo','$cpf_cnpj','$data_nascimento','$cidade','$estado','$endereco')";
    $result = $conexao->query($queryInsert);

    if ($result) {
        $querySearchUser = "SELECT * FROM usuarios WHERE email = '$email'";
        $searchUser = $conexao->query($querySearchUser)->fetch_object();

        if (!isset($_SESSION['user'])) {
            $_SESSION['user'] = $searchUser->idusuarios;
            header('location:./advogado.php');
        }
    } else {
        echo "<script>alert('Houve algum erro!')</script>";
    }
 }


?>







<html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/formcliente.css">
    <title>DMPR Cadastro Cliente</title>

    
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
    background-color: #blue;
    padding: 13px;
    border-radius: 6px;
    width: 20%;
    color: white;
}

fieldset{
    border: 3px solid #f7f1d1;
}

legend{
    border: 1px solid  #f7f1d1;
    padding: 9px;
    text-align: center;
    background-color:  #f7f1d1;
    border-radius: 4px;
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
    font-size: 12px;
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
    color: #011140;
}

#submit{
    background:#011140;
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
}
#submit:hover{
    background-color: #blue;
}

button{
    background: #011140;
    width: 100%;
    border: none;
    padding: 10px;
    color: #ffffff;
    font-size: 12px;
    cursor: pointer;
    border-radius: 8px;
}

button:hover{
    background-image: linear-gradient(to right,rgb(129, 121, 12), rgb(195, 169, 19));
}





</style>




</head>
<body>
    <div class="box">
        <form action="formcliente.php" method = "POST">
            <fieldset>
            <legend><b>Cadastro de Cliente</b></legend>
            <br>
            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required>
                <label for="nome" class="labelInput">Nome Completo</label> 
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required>
                <label for="email" class="labelInput">E-mail</label> 
            </div>
            <br>
            <div class="inputBox">
                <input type="tel" name="phone" id="phone" class="inputUser" required>
                <label for="phone" class="labelInput">Telefone</label> 
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="rg" id="rg" class="inputUser" required>
                <label for="rg" class="labelInput">RG</label> 
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="cpf/cnpj" id="cpf/cnpj" class="inputUser" required>
                <label for="doc" class="labelInput">CPF/CNPJ</label>
            </div>
            <p><b>Sexo:</b></p>
            <input type="radio" id="feminino" name="genero" value="feminino" required>
            <label for="feminino">Feminino</label>
            <br>
            <input type="radio" id="masculino" name="genero" value="masculino" required>
            <label for="masculino">Masculino</label>
            <br>
            <input type="radio" id="outro" name="genero" value="outro" required>
            <label for="outro">Outro</label>
            <br><br>
            <label for="data_nascimento"><b>Data de Nascimento:</b></label>
            <input type="date" name="data_nascimento" id="data_nascimento" required>
            <br><br>
            <div class="inputBox">
                <input type="text" name="cidade" class="inputUser" required>
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <br>
            
            <div class="inputBox">
                <input type="text" name="estado" class="inputUser" required>
                <label for="estado" class="labelInput">Estado</label>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="endereco" class="inputUser" required>
                <label for="endereco" class="labelInput">Endereço</label>
            </div>
            <br>
            <input type="submit" name="submit" id="submit">
            <br><br>
            <a class="btn-form" href=""><button><b>Pular Etapa</b></button></a>
            </fieldset>
        </form>
    </div>
</body>
</html></html>