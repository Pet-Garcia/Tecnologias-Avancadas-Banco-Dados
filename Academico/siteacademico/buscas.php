<?php
include('include/conect.php');

// =====================================================
// CARREGAR DROPDOWNS DA SIDEBAR (Filtros)
// =====================================================
$alunos = mysqli_query($conn, "SELECT DISTINCT nome FROM alunos ORDER BY nome;");
$turmas = mysqli_query($conn, "SELECT DISTINCT nometurma FROM turma ORDER BY nometurma;");
$disciplinas = mysqli_query($conn, "SELECT DISTINCT nomedisciplina FROM disciplina ORDER BY nomedisciplina;");
$professores = mysqli_query($conn, "SELECT DISTINCT nomeprofessor FROM professor ORDER BY nomeprofessor;");
$anos = mysqli_query($conn, "SELECT DISTINCT ano FROM turma ORDER BY ano DESC;");

// =====================================================
// CONFIGURAÇÃO DA PAGINAÇÃO
// =====================================================
$itens_por_pagina = 25;
$pagina_atual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
if ($pagina_atual < 1) {
    $pagina_atual = 1;
}
$offset = ($pagina_atual - 1) * $itens_por_pagina;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>Consulta Geral Acadêmica</title>
    <style>
        /* Estilos rápidos para os botões de paginação integrados ao seu tema */
        .paginacao {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
        }
        .pag-btn {
            padding: 8px 14px;
            background: var(--card-bg);
            border: 1px solid #334155;
            color: var(--text-main);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: 0.2s;
        }
        .pag-btn:hover {
            border-color: var(--primary-blue);
            background: rgba(59, 130, 246, 0.1);
        }
        .pag-btn.ativo {
            background: var(--primary-blue);
            color: white;
            border-color: var(--primary-blue);
        }
        .pag-info {
            color: var(--text-dim);
            font-size: 0.9rem;
            margin: 0 10px;
        }
    </style>
</head>
<body class="body-consulta">

<div class="layout-consulta">

    <aside class="sidebar-busca">
        <h1 class="text-color">Consulta Geral</h1>
        
        <form method="GET" action="buscas.php">
            <input type="hidden" name="pagina" value="1">

            <div class="form-group-busca">
                <label>Turma</label>
                <select name="turma">
                    <option value="">Todas as Turmas</option>
                    <?php while($t = mysqli_fetch_assoc($turmas)) { ?>
                        <option value="<?= htmlspecialchars($t['nometurma']) ?>" <?= (isset($_GET['turma']) && $_GET['turma'] == $t['nometurma']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($t['nometurma']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-busca">
                <label>Disciplina</label>
                <select name="disciplina">
                    <option value="">Todas as Disciplinas</option>
                    <?php while($d = mysqli_fetch_assoc($disciplinas)) { ?>
                        <option value="<?= htmlspecialchars($d['nomedisciplina']) ?>" <?= (isset($_GET['disciplina']) && $_GET['disciplina'] == $d['nomedisciplina']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($d['nomedisciplina']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-busca">
                <label>Professor</label>
                <select name="professor">
                    <option value="">Todos os Professores</option>
                    <?php while($p = mysqli_fetch_assoc($professores)) { ?>
                        <option value="<?= htmlspecialchars($p['nomeprofessor']) ?>" <?= (isset($_GET['professor']) && $_GET['professor'] == $p['nomeprofessor']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($p['nomeprofessor']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-busca">
                <label>Ano Letivo</label>
                <select name="ano">
                    <option value="">Todos os Anos</option>
                    <?php while($a = mysqli_fetch_assoc($anos)) { ?>
                        <option value="<?= htmlspecialchars($a['ano']) ?>" <?= (isset($_GET['ano']) && $_GET['ano'] == $a['ano']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($a['ano']) ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-busca">
                <label>Semestre</label>
                <select name="semestre">
                    <option value="">Todos</option>
                    <option value="1" <?= (isset($_GET['semestre']) && $_GET['semestre'] == '1') ? 'selected' : '' ?>>1º Semestre</option>
                    <option value="2" <?= (isset($_GET['semestre']) && $_GET['semestre'] == '2') ? 'selected' : '' ?>>2º Semestre</option>
                </select>
            </div>

            <div class="form-group-busca checkbox-group">
                <label>
                    <input type="checkbox" name="multiplas_turmas" value="1" <?= isset($_GET['multiplas_turmas']) ? 'checked' : '' ?>>
                    Alunos em múltiplas turmas
                </label>
            </div>

            <button type="submit" class="btn-primary" style="width: 100%;">Filtrar</button>
        </form>

        <a class="btn-link" href="index.php" style="margin-top: auto; display: block;">← Voltar ao Menu</a>
    </aside>

    <main class="conteudo-resultados">
        <h1 class="text-color" style="font-size: 2rem; margin-bottom: 30px;">Resultados Encontrados</h1>

        <?php
        $where = [];

        if (!empty($_GET['aluno'])) {
            $aluno = mysqli_real_escape_string($conn, $_GET['aluno']);
            $where[] = "a.nome = '$aluno'";
        }
        if (!empty($_GET['turma'])) {
            $turma = mysqli_real_escape_string($conn, $_GET['turma']);
            $where[] = "t.nometurma = '$turma'";
        }
        if (!empty($_GET['disciplina'])) {
            $disciplina = mysqli_real_escape_string($conn, $_GET['disciplina']);
            $where[] = "d.nomedisciplina = '$disciplina'";
        }
        if (!empty($_GET['professor'])) {
            $professor = mysqli_real_escape_string($conn, $_GET['professor']);
            $where[] = "p.nomeprofessor = '$professor'";
        }
        if (!empty($_GET['ano'])) {
            $ano = intval($_GET['ano']);
            $where[] = "t.ano = '$ano'";
        }
        if (!empty($_GET['semestre'])) {
            $semestre = intval($_GET['semestre']);
            $where[] = "t.semestre = '$semestre'";
        }
        if (isset($_GET['multiplas_turmas'])) {
            $where[] = "a.ra IN (SELECT it2.ra FROM itemturma it2 GROUP BY it2.ra HAVING COUNT(it2.idturma) > 1)";
        }

        // 1. QUERY PARA CONTAR O TOTAL DE REGISTROS FILTRADOS (Para calcular o número de páginas)
        $sql_count = "
            SELECT COUNT(DISTINCT a.ra, t.idturma, d.iddisciplina) AS total
            FROM alunos a
            INNER JOIN itemturma it ON a.ra = it.ra
            INNER JOIN turma t      ON it.idturma = t.idturma
            INNER JOIN disciplina d ON t.iddisciplina = d.iddisciplina
            INNER JOIN professor p  ON d.idprofessor = p.idprofessor
        ";
        if (count($where) > 0) {
            $sql_count .= " WHERE " . implode(" AND ", $where);
        }
        $res_count = mysqli_query($conn, $sql_count);
        $row_count = mysqli_fetch_assoc($res_count);
        $total_registros = $row_count['total'];
        $total_paginas = ceil($total_registros / $itens_por_pagina);

        // 2. QUERY PRINCIPAL ADAPTADA COM LIMIT E OFFSET
        $sql = "
            SELECT DISTINCT
                a.nome AS nome_aluno,
                t.nometurma AS nome_turma,
                t.ano AS ano_turma,
                t.semestre AS semestre_turma,
                d.nomedisciplina AS nome_disciplina,
                p.nomeprofessor AS nome_professor
            FROM alunos a
            INNER JOIN itemturma it ON a.ra = it.ra
            INNER JOIN turma t      ON it.idturma = t.idturma
            INNER JOIN disciplina d ON t.iddisciplina = d.iddisciplina
            INNER JOIN professor p  ON d.idprofessor = p.idprofessor
        ";

        if (count($where) > 0) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $sql .= " ORDER BY t.nometurma, t.ano DESC, a.nome ASC ";
        $sql .= " LIMIT $itens_por_pagina OFFSET $offset;";
        
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado) > 0) {
        ?>
            <div class="tabela-wrapper">
                <table class="tabela-consulta">
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Ano Letivo</th>
                            <th>Semestre</th>
                            <th>Disciplina</th>
                            <th>Professor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($r = mysqli_fetch_assoc($resultado)) { ?>
                            <tr>
                                <td><?= htmlspecialchars($r['nome_aluno']) ?></td>
                                <td><?= htmlspecialchars($r['nome_turma']) ?></td>
                                <td><?= htmlspecialchars($r['ano_turma']) ?></td>
                                <td><?= htmlspecialchars($r['semestre_turma']) ?>º</td>
                                <td><?= htmlspecialchars($r['nome_disciplina']) ?></td>
                                <td><?= htmlspecialchars($r['nome_professor']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php if ($total_paginas > 1) { ?>
                <div class="paginacao">
                    <?php 
                    // Monta a URL mantendo os parâmetros atuais de pesquisa intactos
                    $params = $_GET; 
                    ?>
                    
                    <?php if ($pagina_atual > 1) { 
                        $params['pagina'] = $pagina_atual - 1; ?>
                        <a href="buscas.php?<?= http_build_query($params) ?>" class="pag-btn">&laquo; Anterior</a>
                    <?php } ?>

                    <span class="pag-info">Página <strong><?= $pagina_atual ?></strong> de <strong><?= $total_paginas ?></strong></span>

                    <?php if ($pagina_atual < $total_paginas) { 
                        $params['pagina'] = $pagina_atual + 1; ?>
                        <a href="buscas.php?<?= http_build_query($params) ?>" class="pag-btn">Próximo &raquo;</a>
                    <?php } ?>
                </div>
            <?php } ?>

        <?php
        } else {
            echo "<div class='readonly-data' style='margin:0;'><p style='color: var(--text-dim); text-align: center; margin: 0;'>Nenhum registro acadêmico corresponde aos filtros.</p></div>";
        }
        ?>
    </main>

</div>

</body>
</html>