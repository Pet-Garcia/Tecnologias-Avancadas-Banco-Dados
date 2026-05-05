<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Aluno</title>
</head>
<body>
<?php

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastroaluno.php" name="form_aluno">
  <table style="text-align: left; width: 100%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center">Cadastro de Alunos</td>
      </tr>
      <tr>
        <td>nome:</td>
        <td><input name="nome"></td>
      </tr>
      <tr>
        <td>cpf:</td>
        <td><input name="cpf"></td>
      </tr>
      <tr>
        <td>telefone:</td>
        <td><input name="tel"></td>
      </tr>
      <tr>
        <td>email:</td>
        <td><input name="email"></td>
      </tr>
      <tr><input type="hidden" value="1" name="passo">
        <td><input value="  [ Limpar ]  " type="reset"></td>
        <td><input value=" [  Cadastrar  ] " type="submit"></td>
      </tr>
    </tbody>
  </table>
  <br>
</form>
<?php
	break;
	}
	case '1':
	{
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        include('include/conect.php');

        $query = "INSERT INTO alunos (nome, cpf, telefone, email) 
        VALUES ('$nome', '$cpf', '$tel', '$email')";
$q1    = mysqli_query($conn,$query);    //conexao que vem do arquivo conect.php
//$q1    = mysql_query($query);
?>


  <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center">Dados do usuario cadastrado</td>
      </tr>
      <tr>
        <td>Nome:</td>
        <td><input name="nome" value="<?php echo $nome;?>"></td>
      </tr>
      <tr>
        <td>CPF:</td>
        <td><input name="end" value="<?php echo $cpf;?>"></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><input name="tel" value="<?php echo $tel;?>"></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input name="end" value="<?php echo $email;?>"></td>
      </tr>
      <tr>
        <td><a href="index.php"  target="_self">Inicio</a></td><form action="aulahtmldb.php" method="POST"  name="f2"><!-- form de envio ao voltar  -->
        <td><input type="hidden" value="0" name="passo">
		    <input type='submit'  value='<-- Voltar'  ></form></td>
      </tr>
    </tbody>
  </table>	
	<?php break;
	}
}
?>
</body>	
	

</html>
