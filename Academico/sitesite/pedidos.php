<?php
$pedidos = []; // depois você liga no banco
$total = count($pedidos);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pedidos</title>

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
      <a href="index.php" class="text-purple-400 hover:text-purple-300 mb-6 inline-block">
        ← Voltar ao índice
      </a>

      <div class="flex justify-between">
        <div>
          <h1 class="text-5xl mb-2 text-purple-400">PEDIDOS</h1>
          <p class="text-gray-400">$ SELECT * FROM pedidos ORDER BY data DESC;</p>
        </div>

        <div class="text-right">
          <div class="text-sm text-gray-500">Total de registros</div>
          <div class="text-3xl text-purple-400"><?php echo $total; ?></div>
        </div>
      </div>
    </div>

    <!-- Filtros -->
    <div class="flex gap-4 mb-6">
      <input type="text" placeholder="Buscar pedidos..."
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
            <th class="px-6 py-4 text-left text-purple-400">ID</th>
            <th class="px-6 py-4 text-left text-purple-400">CLIENTE</th>
            <th class="px-6 py-4 text-right text-purple-400">TOTAL</th>
            <th class="px-6 py-4 text-center text-purple-400">ITENS</th>
            <th class="px-6 py-4 text-left text-purple-400">STATUS</th>
            <th class="px-6 py-4 text-left text-purple-400">DATA</th>
          </tr>
        </thead>

        <tbody>
        <?php if ($total === 0): ?>
          <tr>
            <td colspan="6" class="text-center py-16 text-gray-500">
              <div class="text-4xl mb-4">∅</div>
              <div>Nenhum registro encontrado</div>
              <div class="text-sm opacity-50">A tabela está vazia</div>
            </td>
          </tr>
        <?php else: ?>
          <?php foreach ($pedidos as $pedido): ?>
            <tr class="border-b border-gray-800 hover:bg-purple-500/10 transition">

              <td class="px-6 py-4 text-gray-400">
                #<?php echo $pedido['id']; ?>
              </td>

              <td class="px-6 py-4">
                <?php echo $pedido['cliente']; ?>
              </td>

              <td class="px-6 py-4 text-right text-purple-400">
                R$ <?php echo number_format($pedido['total'], 2, ',', '.'); ?>
              </td>

              <td class="px-6 py-4 text-center text-gray-400">
                <?php echo $pedido['itens']; ?>
              </td>

              <td class="px-6 py-4">
                <?php
                  $status = $pedido['status'];
                  $classe = "text-red-400";

                  if ($status == "Entregue") {
                    $classe = "text-green-400";
                  } elseif ($status == "Enviado") {
                    $classe = "text-blue-400";
                  } elseif ($status == "Processando") {
                    $classe = "text-yellow-400";
                  }
                ?>
                <span class="<?php echo $classe; ?>">
                  <?php echo $status; ?>
                </span>
              </td>

              <td class="px-6 py-4 text-gray-400">
                <?php echo $pedido['data']; ?>
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
          <button class="px-4 py-2 bg-purple-500 text-black rounded">1</button>
          <button disabled class="px-4 py-2 bg-gray-800 rounded opacity-50">Próximo</button>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>