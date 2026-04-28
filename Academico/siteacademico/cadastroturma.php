<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Turma</title>
</head>
<body>
<?php

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastroturma.php" name="form_turma">
  <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center"><b>Cadastro de Turmas</b></td>
      </tr>
      <tr>
        <td>ID Turma:</td>
        <td><input name="idturma" type="number"></td>
      </tr>
      <tr>
        <td>Nome da Turma:</td>
        <td><input name="nometurma"></td>
      </tr>
      <tr>
        <td>ID da Disciplina:</td>
        <td><input name="iddisciplina" type="number"></td>
      </tr>
      <tr>
        <td>Semestre:</td>
        <td><input name="semestre" type="number" placeholder="Ex: 1"></td>
      </tr>
      <tr>
        <td>Ano:</td>
        <td><input name="ano" type="number" placeholder="Ex: 2026"></td>
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
	case '1': // Cadastro de Turma
    {
        $idturma = $_POST['idturma'];
        $nometurma = $_POST['nometurma'];
        $iddisciplina = $_POST['iddisciplina'];
        $semestre = $_POST['semestre'];
        $ano = $_POST['ano'];

        include('include/conect.php');

        $query = "INSERT INTO turma VALUES ('$idturma', '$nometurma', '$iddisciplina', '$semestre', '$ano')";
        $q1 = mysqli_query($conn, $query);
?>
    <table style="text-align: left; width: 50%;" align="center" border="1" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td colspan="2" align="center"><b>Turma Cadastrada</b></td>
            </tr>
            <tr>
                <td>ID Turma:</td>
                <td><?php echo $idturma; ?></td>
            </tr>
            <tr>
                <td>Turma:</td>
                <td><?php echo $nometurma; ?></td>
            </tr>
            <tr>
                <td>ID Disciplina:</td>
                <td><?php echo $iddisciplina; ?></td>
            </tr>
            <tr>
                <td>Ano/Semestre:</td>
                <td><?php echo $ano . "/" . $semestre; ?></td>
            </tr>
            <tr>
                <td><a href="index.php">Início</a></td>
                <td>
                    <form action="cadastro_turma.php" method="POST">
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
