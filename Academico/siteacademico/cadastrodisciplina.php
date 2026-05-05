<html>
<head>

  <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
  <link rel="stylesheet" type="text/css" href="include/style.css">
  <title>Disciplina</title>
</head>
<body>
<?php

include('include/conect.php');

$passo=(isset($_POST['passo'])? $_POST['passo']:'0');

// Buscar cursos
$sqlCurso = "SELECT idcurso, nomecurso FROM cursos;";
$resCurso = mysqli_query($conn, $sqlCurso);

// Buscar professores
$sqlProf = "SELECT idprofessor, nomeprofessor FROM professor;";
$resProf = mysqli_query($conn, $sqlProf);

switch ($passo)
{
	case '0':
	{ ?>
<form method="POST" action="cadastrodisciplina.php" name="form_disciplina">
  <table style="text-align: left; width: 100%;" align="center" border="1" cellpadding="2" cellspacing="2">
    <tbody>
      <tr>
        <td colspan="2" rowspan="1" align="center"><b>Cadastro de Disciplinas</b></td>
      </tr>
      <tr>
        <td>Nome da Disciplina:</td>
        <td><input name="nomedisciplina"></td>
      </tr>
      <tr>
        <td>ID do Curso:</td>
        <td>
          <select name="idcurso">
              <option value="">Selecione um curso</option>
              <?php while($curso = mysqli_fetch_assoc($resCurso)) { ?>
                <option value="<?php echo $curso['idcurso']; ?>">
                  <?php echo $curso['nomecurso']; ?>
                </option>
              <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>ID do Professor:</td>
        <td><select name="idprofessor">
            <option value="">Selecione um professor</option>
            <?php while($prof = mysqli_fetch_assoc($resProf)) { ?>
              <option value="<?php echo $prof['idprofessor']; ?>">
                <?php echo $prof['nomeprofessor']; ?>
              </option>
            <?php } ?>
          </select>
        </td>
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
	case '1': // Cadastro de Disciplina
    {
        $nomedisciplina = $_POST['nomedisciplina'];
        $idcurso = $_POST['idcurso'];
        $idprofessor = $_POST['idprofessor'];


        $query = "INSERT INTO disciplina (nomedisciplina, idcurso, idprofessor) 
        VALUES ('$nomedisciplina', '$idcurso', '$idprofessor')";
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
                <td>ID Professor:</td>
                <td><?php echo $idprofessor; ?></td>
            </tr>
            <tr>
                <td><a href="index.php">Início</a></td>
                <td>
                    <form action="cadastro_disciplina.php" method="POST">
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
