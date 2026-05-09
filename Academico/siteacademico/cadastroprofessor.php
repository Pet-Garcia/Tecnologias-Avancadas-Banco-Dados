<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Cadastro de Professor</title>
</head>
<body>

<?php
$passo = (isset($_POST['passo']) ? $_POST['passo'] : '0');

switch ($passo) {
    case '0': ?>
        <!-- Tela de Cadastro -->
        <main class="container">
            <form method="POST" action="cadastroprofessor.php" class="card-form" name="form_professor">
                <header class="card-header">
                    <h2>Cadastro de Professor</h2>
                    <p>Registre novos docentes no sistema de banco de dados.</p>
                </header>

                <div class="form-body">
                    <div class="form-group">
                        <label>Nome Completo</label>
                        <input type="text" name="nomeprofessor" placeholder="Ex: Prof. Dr. Carlos Silva" required>
                    </div>

                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="cpf" placeholder="000.000.000-00" required>
                    </div>

                    <div class="form-group">
                        <label>E-mail Acadêmico</label>
                        <input type="email" name="email" placeholder="professor@instituicao.com">
                    </div>

                    <div class="form-group">
                        <label>Telefone / WhatsApp</label>
                        <input type="text" name="telefone" placeholder="(00) 00000-0000">
                    </div>
                </div>

                <footer class="card-footer">
                    <input type="hidden" value="1" name="passo">
                    <button type="reset" class="btn-secondary">Limpar</button>
                    <button type="submit" class="btn-primary">Cadastrar Professor</button>
                </footer>
            </form>
        </main>
    <?php break;

    case '1':
        $nomeprofessor = $_POST['nomeprofessor'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        include('include/conect.php');

        $query = "INSERT INTO professor (nomeprofessor, cpf, email, telefone) 
                  VALUES ('$nomeprofessor', '$cpf', '$email', '$telefone')";
        $q1 = mysqli_query($conn, $query);
    ?>
        <!-- Tela de Sucesso -->
        <main class="container">
            <div class="card-form success-state">
                <header class="card-header">
                    <div class="status-icon">👨‍🏫</div>
                    <h2>Cadastro Concluído!</h2>
                    <p>O professor foi registrado com sucesso.</p>
                </header>

                <div class="form-body readonly-data">
                    <div class="data-item"><strong>Nome:</strong> <span><?php echo $nomeprofessor; ?></span></div>
                    <div class="data-item"><strong>CPF:</strong> <span><?php echo $cpf; ?></span></div>
                    <div class="data-item"><strong>E-mail:</strong> <span><?php echo $email; ?></span></div>
                    <div class="data-item"><strong>Tel:</strong> <span><?php echo $telefone; ?></span></div>
                </div>

                <footer class="card-footer footer-dual">
                    <a href="index.php" class="btn-link">Menu Inicial</a>
                    <form action="cadastroprofessor.php" method="POST">
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