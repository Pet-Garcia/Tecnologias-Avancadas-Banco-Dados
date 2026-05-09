<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Cadastro de Disciplina</title>
</head>
<body>

<?php
include('include/conect.php');

$passo = (isset($_POST['passo']) ? $_POST['passo'] : '0');

// Buscar cursos e professores para os menus suspensos
$sqlCurso = "SELECT idcurso, nomecurso FROM cursos;";
$resCurso = mysqli_query($conn, $sqlCurso);

$sqlProf = "SELECT idprofessor, nomeprofessor FROM professor;";
$resProf = mysqli_query($conn, $sqlProf);

switch ($passo) {
    case '0': ?>
        <!-- Tela de Formulário -->
        <main class="container">
            <form method="POST" action="cadastrodisciplina.php" class="card-form" name="form_disciplina">
                <header class="card-header">
                    <h2>Cadastro de Disciplina</h2>
                    <p>Vincule matérias a cursos e professores específicos.</p>
                </header>

                <div class="form-body">
                    <div class="form-group">
                        <label>Nome da Disciplina</label>
                        <input type="text" name="nomedisciplina" placeholder="Ex: Algoritmos II" required>
                    </div>

                    <div class="form-group">
                        <label>Curso Responsável</label>
                        <select name="idcurso" required>
                            <option value="">Selecione um curso...</option>
                            <?php while($curso = mysqli_fetch_assoc($resCurso)) { ?>
                                <option value="<?php echo $curso['idcurso']; ?>">
                                    <?php echo $curso['nomecurso']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Professor Regente</label>
                        <select name="idprofessor" required>
                            <option value="">Selecione um professor...</option>
                            <?php while($prof = mysqli_fetch_assoc($resProf)) { ?>
                                <option value="<?php echo $prof['idprofessor']; ?>">
                                    <?php echo $prof['nomeprofessor']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <footer class="card-footer">
                    <input type="hidden" value="1" name="passo">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Cadastrar Disciplina</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':
        $nomedisciplina = $_POST['nomedisciplina'];
        $idcurso = $_POST['idcurso'];
        $idprofessor = $_POST['idprofessor'];

        $query = "INSERT INTO disciplina (nomedisciplina, idcurso, idprofessor) 
                  VALUES ('$nomedisciplina', '$idcurso', '$idprofessor')";
        $q1 = mysqli_query($conn, $query);
    ?>
        <!-- Tela de Confirmação -->
        <main class="container">
            <div class="card-form success-state">
                <header class="card-header">
                    <div class="status-icon">📚</div>
                    <h2>Disciplina Registrada!</h2>
                    <p>A nova disciplina foi adicionada à grade curricular.</p>
                </header>

                <div class="form-body readonly-data">
                    <div class="data-item">
                        <strong>Disciplina:</strong> 
                        <span><?php echo $nomedisciplina; ?></span>
                    </div>
                    <div class="data-item">
                        <strong>Cód. Curso:</strong> 
                        <span><?php echo $idcurso; ?></span>
                    </div>
                    <div class="data-item">
                        <strong>Cód. Professor:</strong> 
                        <span><?php echo $idprofessor; ?></span>
                    </div>
                </div>

                <footer class="card-footer footer-dual">
                    <a href="index.php" class="btn-link">Menu Principal</a>
                    <form action="cadastrodisciplina.php" method="POST">
                        <input type="hidden" value="0" name="passo">
                        <button type="submit" class="btn-secondary"><-- Voltar</button>
                    </form>
                </footer>
            </div>
        </main>
    <?php break;
} ?>

</body>
</html>