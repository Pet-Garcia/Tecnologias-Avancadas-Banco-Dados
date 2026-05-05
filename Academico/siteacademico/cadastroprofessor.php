<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Professor</title>
</head>
<body>
<?php

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastroprofessor.php" name="form_professor">
  <table style="text-align: left; width: 100%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center"><b>Cadastro de Professores</b></td>
      </tr>
      <tr>
        <td>Nome:</td>
        <td><input name="nomeprofessor"></td>
      </tr>
      <tr>
        <td>CPF:</td>
        <td><input name="cpf"></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input name="email"></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><input name="telefone"></td>
      </tr>
      <tr>
        <input type="hidden" value="1" name="passo">
        <td><input value="  [ Limpar ]  " type="reset"></td>
        <td><input value=" [  Cadastrar  ] " type="submit"></td>
      </tr>
    </tbody>
  </table>
</form>
<?php
	break;
	}
	case '1': // Cadastro de Professor
    {
        $nomeprofessor = $_POST['nomeprofessor'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        include('include/conect.php');

        // Note que seguimos a ordem das colunas da tabela 'professor'
        $query = "INSERT INTO professor (nomeprofessor, cpf, email, telefone) 
          VALUES ('$nomeprofessor', '$cpf', '$email', '$telefone')";
        $q1 = mysqli_query($conn, $query);
?>
    <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td colspan="2" align="center"><b>Professor Cadastrado com Sucesso</b></td>
            </tr>
            <tr>
                <td>Nome:</td>
                <td><input value="<?php echo $nomeprofessor; ?>" readonly></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input value="<?php echo $cpf; ?>" readonly></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input value="<?php echo $email; ?>" readonly></td>
            </tr>
            <tr>
                <td>Telefone:</td>
                <td><input value="<?php echo $telefone; ?>" readonly></td>
            </tr>
            <tr>
                <td><a href="index.php">Início</a></td>
                <td>
                    <form action="cadastroprofessor.php" method="POST">
                        <input type="hidden" value="0" name="passo">
                        <input type='submit'  value='<-- Voltar'  >
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
<?php 
        break;
    }
}
?>
</body>	
	

</html>
