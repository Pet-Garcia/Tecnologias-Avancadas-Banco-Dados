<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Cadastro de Aluno</title>
</head>
<body>

<?php
$passo = (isset($_POST['passo']) ? $_POST['passo'] : '0');

switch ($passo) {
    case '0': ?>
        <!-- Tela de Cadastro -->
        <main class="container">
            <form method="POST" action="cadastroaluno.php" class="card-form">
                <header class="card-header">
                    <h2>Cadastro de Aluno</h2>
                    <p>Preencha os dados abaixo para o registro.</p>
                </header>

                <div class="form-body">
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="nome" placeholder="Ex: João Silva" required>
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf" placeholder="000.000.000-00" required>
                    </div>

                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="tel" placeholder="(00) 00000-0000">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="email@exemplo.com">
                    </div>
                </div>

                <footer class="card-footer">
                    <input type="hidden" value="1" name="passo">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Cadastrar Aluno</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        include('include/conect.php');
        $query = "INSERT INTO alunos (nome, cpf, telefone, email) VALUES ('$nome', '$cpf', '$tel', '$email')";
        $q1 = mysqli_query($conn, $query);
    ?>
        <!-- Tela de Confirmação -->
        <main class="container">
            <div class="card-form success-state">
                <header class="card-header">
                    <div class="status-icon">✅</div>
                    <h2>Cadastro Realizado!</h2>
                    <p>Os dados foram salvos no sistema.</p>
                </header>

                <div class="form-body readonly-data">
                    <div class="data-item"><strong>Nome:</strong> <span><?php echo $nome;?></span></div>
                    <div class="data-item"><strong>CPF:</strong> <span><?php echo $cpf;?></span></div>
                    <div class="data-item"><strong>Tel:</strong> <span><?php echo $tel;?></span></div>
                    <div class="data-item"><strong>Email:</strong> <span><?php echo $email;?></span></div>
                </div>

                <footer class="card-footer footer-dual">
                    <a href="index.php" class="btn-link">Início</a>
                    <form action="cadastroaluno.php" method="POST">
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