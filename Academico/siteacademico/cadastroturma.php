<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Cadastro de Turma</title>
</head>
<body>

<?php
include('include/conect.php');

$passo = (isset($_POST['passo']) ? $_POST['passo'] : '0');

// Buscar disciplinas para o menu suspenso
$sqlDisci = "SELECT iddisciplina, nomedisciplina FROM disciplina;";
$resDisci = mysqli_query($conn, $sqlDisci);

switch ($passo) {
    case '0': ?>
        <!-- Tela de Formulário de Cadastro -->
        <main class="container">
            <form method="POST" action="cadastroturma.php" class="card-form" name="form_turma">
                <header class="card-header">
                    <h2>Cadastro de Turma</h2>
                    <p>Organize os alunos em períodos e disciplinas específicas.</p>
                </header>

                <div class="form-body">
                    <div class="form-group">
                        <label>Nome da Turma</label>
                        <input type="text" name="nometurma" placeholder="Ex: Engenharia 2026-A" required>
                    </div>

                    <div class="form-group">
                        <label>Disciplina</label>
                        <select name="iddisciplina" required>
                            <option value="">Selecione a disciplina...</option>
                            <?php while($disci = mysqli_fetch_assoc($resDisci)) { ?>
                                <option value="<?php echo $disci['iddisciplina']; ?>">
                                    <?php echo $disci['nomedisciplina']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-row" style="display: flex; gap: 15px;">
                        <div class="form-group" style="flex: 1;">
                            <label>Semestre</label>
                            <input name="semestre" type="number" min="1" max="2" placeholder="1 ou 2" required>
                        </div>
                        <div class="form-group" style="flex: 2;">
                            <label>Ano</label>
                            <input name="ano" type="number" min="2024" max="2030" placeholder="Ex: 2026" required>
                        </div>
                    </div>
                </div>

                <footer class="card-footer">
                    <input type="hidden" value="1" name="passo">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Criar Turma</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':
        $nometurma = $_POST['nometurma'];
        $iddisciplina = $_POST['iddisciplina'];
        $semestre = $_POST['semestre'];
        $ano = $_POST['ano'];

        $query = "INSERT INTO turma (nometurma, iddisciplina, semestre, ano) 
                  VALUES ('$nometurma', '$iddisciplina', '$semestre', '$ano')";
        $q1 = mysqli_query($conn, $query);
    ?>
        <!-- Tela de Confirmação de Cadastro -->
        <main class="container">
            <div class="card-form success-state">
                <header class="card-header">
                    <div class="status-icon">🏫</div>
                    <h2>Turma Criada!</h2>
                    <p>A nova turma foi registrada no sistema com sucesso.</p>
                </header>

                <div class="form-body readonly-data">
                    <div class="data-item">
                        <strong>Nome da Turma:</strong> 
                        <span><?php echo $nometurma; ?></span>
                    </div>
                    <div class="data-item">
                        <strong>Cód. Disciplina:</strong> 
                        <span><?php echo $iddisciplina; ?></span>
                    </div>
                    <div class="data-item">
                        <strong>Período Letivo:</strong> 
                        <span><?php echo $ano . " / " . $semestre . "º Sem."; ?></span>
                    </div>
                </div>

                <footer class="card-footer footer-dual">
                    <a href="index.php" class="btn-link">Menu Inicial</a>
                    <form action="cadastroturma.php" method="POST">
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