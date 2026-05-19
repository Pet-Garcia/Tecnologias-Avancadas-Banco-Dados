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
        <main class="container-busca">
            <form method="POST" action="buscas.php" class="card-form" name="form_disciplina">
                <header class="card-header">
                    <h2>Busca</h2>
                    <p>Selecione o curso, o ano e  os professores específicos.</p>
                </header>

                <div class="form-body">
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

                    <div class="form-row" style="display: flex; gap: 50px;">
                        <div class="form-group" style="flex: 2;">
                                <label>Ano</label>
                                <input name="ano" type="number" min="2000" max="2050" placeholder="Ex: 2026" required>
                            </div>
                        </div>
                    </div>

                </div>

                <footer class="card-footer">
                    <input type="hidden" value="1" name="passo">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Buscar</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':

        $idcurso = $_POST['idcurso'];
        $idprofessor = $_POST['idprofessor'];
        $ano = $_POST['ano'];

        // QUERY DE BUSCA
        $query = "
            SELECT 
                d.iddisciplina,
                d.nomedisciplina,
                c.nomecurso,
                t.nometurma,
                p.nomeprofessor,
                t.ano
            FROM disciplina d
            INNER JOIN cursos c ON d.idcurso = c.idcurso
            INNER JOIN professor p ON d.idprofessor = p.idprofessor
            INNER JOIN turma t ON d.iddisciplina = t.idturma
            WHERE d.idcurso = '$idcurso'
            AND d.idprofessor = '$idprofessor'
            AND t.ano = '$ano';
        ";

        $resultado = mysqli_query($conn, $query);
    ?>

    <main class="container-busca">
        <div class="card-form">

            <header class="card-header">
                <h2>Resultado da Busca</h2>
                <p>Resultados encontradas.</p>
            </header>

            <div class="form-body">

                <?php
                if(mysqli_num_rows($resultado) > 0){

                    while($dados = mysqli_fetch_assoc($resultado)){
                ?>

                    <div class="data-item">
                        <strong>ID:</strong>
                        <span><?php echo $dados['iddisciplina']; ?></span>
                    </div>

                    <div class="data-item">
                        <strong>Disciplina:</strong>
                        <span><?php echo $dados['nomedisciplina']; ?></span>
                    </div>

                    <div class="data-item">
                        <strong>Curso:</strong>
                        <span><?php echo $dados['nomecurso']; ?></span>
                    </div>

                    <div class="data-item">
                        <strong>Professor:</strong>
                        <span><?php echo $dados['nomeprofessor']; ?></span>
                    </div>

                    <div class="data-item">
                        <strong>Ano:</strong>
                        <span><?php echo $dados['ano']; ?></span>
                    </div>

                    <hr>

                <?php
                    }

                } else {
                    echo "<p>Nenhuma resultado encontrada.</p>";
                }
                ?>

            </div>

            <footer class="card-footer">
                <form action="buscas.php" method="POST">
                    <input type="hidden" name="passo" value="0">
                    <button type="submit" class="btn-secondary">
                        <-- Voltar
                    </button>
                </form>
            </footer>

        </div>
    </main>

    <?php
    break;
} ?>

</body>
</html>