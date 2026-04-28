<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Disciplina</title>
</head>
<body>
<?php

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastrodisciplina.php" name="form_disciplina">
  <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center"><b>Cadastro de Disciplinas</b></td>
      </tr>
      <tr>
        <td>ID Disciplina:</td>
        <td><input name="iddisciplina" type="number"></td>
      </tr>
      <tr>
        <td>Nome da Disciplina:</td>
        <td><input name="nomedisciplina"></td>
      </tr>
      <tr>
        <td>ID do Curso:</td>
        <td><input name="idcurso" type="number"></td>
      </tr>
      <tr>
        <td>ID do Professor:</td>
        <td><input name="idprofessor" type="number"></td>
      </tr>
      <tr>
        <input type="hidden" value="1" name="passo">
        <td><input value="<< Limpar >>" type="reset"></td>
        <td><input value="<< SALVAR >>" type="submit"></td>
      </tr>
    </tbody>
  </table>
</form>
<?php
	break;
	}
	case '1': // Cadastro de Disciplina
    {
        $iddisciplina = $_POST['iddisciplina'];
        $nomedisciplina = $_POST['nomedisciplina'];
        $idcurso = $_POST['idcurso'];
        $idprofessor = $_POST['idprofessor'];

        include('./conect.php');

        $query = "INSERT INTO disciplina VALUES ('$iddisciplina', '$nomedisciplina', '$idcurso', '$idprofessor')";
        $q1 = mysqli_query($conn, $query);
?>
    <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td colspan="2" align="center"><b>Disciplina Cadastrada</b></td>
            </tr>
            <tr>
                <td>Disciplina:</td>
                <td><?php echo $nomedisciplina; ?></td>
            </tr>
            <tr>
                <td>ID Curso:</td>
                <td><?php echo $idcurso; ?></td>
            </tr>
            <tr>
                <td><a href="index.php">Início</a></td>
                <td>
                    <form action="cadastro_disciplina.php" method="POST">
                        <input type="hidden" value="0" name="passo">
                        <input type="submit" value="<< Voltar >>">
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
