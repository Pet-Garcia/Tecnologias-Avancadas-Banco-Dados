<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Menu de Gerenciamento</title>
</head>
<body>

    <main class="menu-container">
        <header class="menu-header">
            <h1>Gerenciamento de Banco de Dados</h1>
            <p>Selecione uma categoria para realizar o cadastro</p>
        </header>

        <nav class="menu-grid">
            <a href="cadastroprofessor.php" class="menu-card">
                <div class="card-icon">👨‍🏫</div>
                <div class="card-content">
                    <span>Professor</span>
                    <small>Cadastrar novo docente</small>
                </div>
            </a>

            <a href="cadastroaluno.php" class="menu-card">
                <div class="card-icon">🎓</div>
                <div class="card-content">
                    <span>Aluno</span>
                    <small>Matricular novo estudante</small>
                </div>
            </a>

            <a href="cadastrodisciplina.php" class="menu-card">
                <div class="card-icon">📚</div>
                <div class="card-content">
                    <span>Disciplina</span>
                    <small>Gerenciar matérias e cursos</small>
                </div>
            </a>

            <a href="cadastroturma.php" class="menu-card">
                <div class="card-icon">🏫</div>
                <div class="card-content">
                    <span>Turma</span>
                    <small>Configurar salas e horários</small>
                </div>
            </a>

            <a href="buscas.php" class="menu-card">
                <div class="card-icon">Lupa</div>
                <div class="card-content">
                    <span>Busca</span>
                    <small>Buscar no Banco</small>
                </div>
            </a>

            <a href="cadastraritemturma.php" class="menu-card full-width">
                <div class="card-icon">🔗</div>
                <div class="card-content">
                    <span>Vincular Aluno à Turma</span>
                    <small>Gerenciar enturmação de alunos</small>
                </div>
            </a>

        </nav>
    </main>

</body>
</html>