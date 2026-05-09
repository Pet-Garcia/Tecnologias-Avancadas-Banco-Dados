<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Matrícula de Aluno</title>
</head>
<body>

<?php
include('include/conect.php');
$passo = (isset($_POST['passo']) ? $_POST['passo'] : '0');

// Buscar alunos e turmas para os selects
$sqlAluno = "SELECT ra, nome FROM alunos";
$resAluno = mysqli_query($conn, $sqlAluno);

$sqlTurma = "SELECT idturma, nometurma FROM turma";
$resTurma = mysqli_query($conn, $sqlTurma);

switch ($passo) {
    case '0': ?>
        <!-- Tela de Seleção para Matrícula -->
        <main class="container">
            <form method="POST" action="cadastraritemturma.php" class="card-form">
                <header class="card-header">
                    <h2>Matrícula em Turma</h2>
                    <p>Vincule um aluno a uma turma existente.</p>
                </header>

                <div class="form-body">
                    <div class="form-group">
                        <label>Selecione o Aluno</label>
                        <select name="ra" required>
                            <option value="">Clique para selecionar...</option>
                            <?php while($aluno = mysqli_fetch_assoc($resAluno)) { ?>
                                <option value="<?php echo $aluno['ra']; ?>">
                                    <?php echo $aluno['ra'] . " - " . $aluno['nome']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Selecione a Turma</label>
                        <select name="idturma" required>
                            <option value="">Clique para selecionar...</option>
                            <?php while($turma = mysqli_fetch_assoc($resTurma)) { ?>
                                <option value="<?php echo $turma['idturma']; ?>">
                                    <?php echo $turma['idturma'] . " - " . $turma['nometurma']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <footer class="card-footer">
                    <input type="hidden" name="passo" value="1">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Finalizar Matrícula</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':
        $ra = $_POST['ra'];
        $idturma = $_POST['idturma'];

        $query = "INSERT INTO itemturma (ra, idturma) VALUES ('$ra', '$idturma')";
        $q1 = mysqli_query($conn, $query);
    ?>
        <!-- Tela de Confirmação de Matrícula -->
        <main class="container">
            <div class="card-form success-state">
                <header class="card-header">
                    <div class="status-icon">🔗</div>
                    <h2>Matrícula Confirmada!</h2>
                    <p>O vínculo foi estabelecido com sucesso.</p>
                </header>

                <div class="form-body readonly-data">
                    <div class="data-item">
                        <strong>RA do Aluno:</strong> 
                        <span><?php echo $ra; ?></span>
                    </div>
                    <div class="data-item">
                        <strong>ID da Turma:</strong> 
                        <span><?php echo $idturma; ?></span>
                    </div>
                </div>

                <footer class="card-footer footer-dual">
                    <a href="index.php" class="btn-link">Menu Principal</a>
                    <form action="cadastraritemturma.php" method="POST">
                        <input type="hidden" value="0" name="passo">
                        <button type="submit" class="btn-secondary"><-- Nova Matrícula</button>
                    </form>
                </footer>
            </div>
        </main>
    <?php break;
} ?>

</body>
</html>