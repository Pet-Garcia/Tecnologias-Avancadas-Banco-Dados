<?php

if($_SERVER ['REQUEST_METHOD'] == POST){
    $ra = $_POST['ra'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    echo "Cliente cadastrado com sucesso";
}

// criar um formulario decente
?>
<form method='POST'>
    RA <input name='ra'>
    <br>
    Nome <input name='nome'>
    <br>
    CPF <input name='cpf'>
    <br>
    Telefone <input name='telefone'>
    <br>
    Email <input name='email'>
    <br>
    <input type='submit' value='Cadastrar.php'>
</form>