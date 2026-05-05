<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Aluno</title>
</head>
<body>
<?php

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');
include('include/conect.php');

// Buscar alunos
$sqlAluno = "SELECT ra, nome FROM alunos";
$resAluno = mysqli_query($conn, $sqlAluno);

// Buscar turmas
$sqlTurma = "SELECT idturma, nometurma FROM turma";
$resTurma = mysqli_query($conn, $sqlTurma);

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastraritemturma.php">
  <table border="1" align="center">
    <tr>
      <td colspan="2" align="center"><b>Matrícula em Turma</b></td>
    </tr>

    <tr>
      <td>Aluno:</td>
      <td>
        <select name="ra">
          <option value="">Selecione o aluno</option>
          <?php while($aluno = mysqli_fetch_assoc($resAluno)) { ?>
            <option value="<?php echo $aluno['ra']; ?>">
              <?php echo $aluno['nome']; ?>
            </option>
          <?php } ?>
        </select>
      </td>
    </tr>

    <tr>
      <td>Turma:</td>
      <td>
        <select name="idturma">
          <option value="">Selecione a turma</option>
          <?php while($turma = mysqli_fetch_assoc($resTurma)) { ?>
            <option value="<?php echo $turma['idturma']; ?>">
              <?php echo $turma['nometurma']; ?>
            </option>
          <?php } ?>
        </select>
      </td>
    </tr>

    <tr>
      <input type="hidden" name="passo" value="1">
      <td><input type="reset" value="[ Limpar ]"></td>
      <td><input type="submit" value="[ Matricular ]"></td>
    </tr>
  </table>
</form>
<?php
	break;
	}
	case '1':
	{
        $ra = $_POST['ra'];
    $idturma = $_POST['idturma'];

    $query = "INSERT INTO itemturma (ra, idturma) VALUES ('$ra', '$idturma')";
    $q1 = mysqli_query($conn, $query);
//$q1    = mysql_query($query);
?>

<table border="1" align="center">
  <tr>
    <td colspan="2" align="center"><b>Aluno Matriculado</b></td>
  </tr>
  <tr>
    <td>RA:</td>
    <td><?php echo $ra; ?></td>
  </tr>
  <tr>
    <td>ID Turma:</td>
    <td><?php echo $idturma; ?></td>
  </tr>
</table>
	<?php break;
	}
}
?>
</body>	
	

</html>
