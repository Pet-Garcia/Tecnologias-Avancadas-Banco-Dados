<?php

include('./includes/conexao.php');

$produtos = []; // depois você pode puxar do banco
$total = count($produtos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Produtos</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background: #0a0b0f;
      color: white;
    }

    .grid-pattern {
      width: 100%;
      height: 100%;
      background-image:
        linear-gradient(rgba(6, 182, 212, 0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(6, 182, 212, 0.1) 1px, transparent 1px);
      background-size: 50px 50px;
      position: absolute;
      inset: 0;
      opacity: 0.05;
    }
  </style>
</head>

<body>
<div class="min-h-screen relative">
  <div class="grid-pattern"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 py-12">

    <!-- Header -->
    <div class="mb-8">
      <a href="home.php" class="text-green-400 hover:text-green-300 mb-6 inline-block">
        ← Voltar a página ínicial
      </a>

      <div class="flex justify-between">
        <div>
          <h1 class="text-5xl mb-2 text-green-400">PROFESSORES</h1>
          <p class="text-gray-400">$ SELECT * FROM professor ORDER BY nome ASC;</p>
        </div>

        <div class="text-right">
          <div class="text-sm text-gray-500">Total de registros</div>
          <div class="text-3xl text-green-400"><?php echo $total; ?></div>
        </div>
      </div>
    </div>

    <!-- Filtros -->
    <div class="flex gap-4 mb-6">
      <input type="text" placeholder="Buscar produtos..."
        class="w-full bg-gray-900 border border-gray-800 rounded-lg px-4 py-3">

      <button class="px-6 py-3 bg-gray-900 border border-gray-800 rounded-lg">
        Filtros
      </button>
    </div>

    <!-- Tabela -->
    <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-hidden">
      <table class="w-full">
        <thead>
          <tr class="border-b border-gray-800 bg-gray-900">
            <th class="px-6 py-4 text-left text-green-400">ID</th>
            <th class="px-6 py-4 text-left text-green-400">NOME</th>
            <th class="px-6 py-4 text-left text-green-400">CPF</th>
            <th class="px-6 py-4 text-right text-green-400">SALÁRIO</th>
          </tr>
        </thead>

        <tbody>
        <?php if ($total === 0): ?>
          <tr>
            <td colspan="5" class="text-center py-16 text-gray-500">
              <div class="text-4xl mb-4">∅</div>
              <div>Nenhum registro encontrado</div>
              <div class="text-sm opacity-50">A tabela está vazia</div>
            </td>
          </tr>
        <?php else: ?>
          <?php foreach ($produtos as $produto): ?>
            <tr class="border-b border-gray-800 hover:bg-green-500/10 transition">
              
              <td class="px-6 py-4 text-gray-400">
                <?php echo $produto['sku']; ?>
              </td>

              <td class="px-6 py-4">
                <?php echo $produto['nome']; ?>
              </td>

              <td class="px-6 py-4 text-gray-400">
                <?php echo $produto['categoria']; ?>
              </td>

              <td class="px-6 py-4 text-right text-green-400">
                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
              </td>

              <td class="px-6 py-4 text-right">
                <?php
                  $estoque = $produto['estoque'];
                  $classe = "text-red-400";

                  if ($estoque > 100) {
                    $classe = "text-green-400";
                  } elseif ($estoque > 20) {
                    $classe = "text-yellow-400";
                  }
                ?>
                <span class="<?php echo $classe; ?>">
                  <?php echo $estoque; ?> un.
                </span>
              </td>

            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>

      <!-- Paginação -->
      <div class="px-6 py-4 border-t border-gray-800 flex justify-between text-sm text-gray-500">
        <div>Exibindo <?php echo $total; ?> de <?php echo $total; ?> registros</div>
        <div class="flex gap-2">
          <button disabled class="px-4 py-2 bg-gray-800 rounded opacity-50">Anterior</button>
          <button class="px-4 py-2 bg-green-500 text-black rounded">1</button>
          <button disabled class="px-4 py-2 bg-gray-800 rounded opacity-50">Próximo</button>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>