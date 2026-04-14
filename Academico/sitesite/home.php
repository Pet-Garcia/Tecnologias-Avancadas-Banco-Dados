<?php

include('./conect.php');

$tables = [
  [
    "name" => "Alunos",
    "path" => "alunos.php",
    "count" => 0,
    "color" => "cyan",
    "description" => "Catalógo completo dos alunos",
    "icon" => "🧑‍🎓"
  ],
  [
    "name" => "Professores",
    "path" => "professores.php",
    "count" => 0,
    "color" => "green",
    "description" => "Catálogo completo dos professores",
    "icon" => "🧑‍🏫"
  ],
  [
    "name" => "Disciplinas",
    "path" => "disciplinas.php",
    "count" => 0,
    "color" => "purple",
    "description" => "Catálogo completo das disciplinas",
    "icon" => "📗"
  ],
  [
    "name" => "Turmas",
    "path" => "turmas.php",
    "count" => 0,
    "color" => "yellow",
    "description" => "Catálogo completo das turmas",
    "icon" => "📁"
  ]
];

// função pra mapear cores
function getColor($color) {
  return match($color) {
    "cyan" => "text-cyan-400 border-cyan-400",
    "green" => "text-green-400 border-green-400",
    "purple" => "text-purple-400 border-purple-400",
    "yellow" => "text-yellow-400 border-yellow-400",
    default => "text-white border-white"
  };
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>DB Academico</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background: #0a0b0f;
      color: white;
    }

    .scanline {
      position: absolute;
      width: 100%;
      height: 100px;
      background: linear-gradient(transparent, rgba(6, 182, 212, 0.1), transparent);
      animation: scanline 8s linear infinite;
    }

    @keyframes scanline {
      0% { transform: translateY(-100%); }
      100% { transform: translateY(100vh); }
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
<div class="min-h-screen relative overflow-hidden">

  <!-- efeitos -->
  <div class="absolute inset-0 opacity-10">
    <div class="scanline"></div>
  </div>

  <div class="grid-pattern"></div>

  <div class="relative z-10 max-w-7xl mx-auto px-6 py-16">

    <!-- Header -->
    <div class="mb-16">
      <div class="flex items-center gap-4 mb-6">
        <div class="text-5xl text-cyan-400">🗄️</div>
        <div>
          <h1 class="text-6xl">
            <span class="text-cyan-400">DB</span>_Academico
          </h1>
          <div class="text-sm text-gray-500 mt-2">
            $ database.tables.list() <span class="text-green-400">▊</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

      <?php foreach ($tables as $table): ?>
        <?php $colorClass = getColor($table['color']); ?>

        <a href="<?php echo $table['path']; ?>" class="group">
          <div class="bg-gray-900 border border-gray-800 rounded-lg p-8 hover:border-cyan-500 transition hover:-translate-y-1">

            <!-- topo -->
            <div class="flex justify-between mb-4">
              <div class="text-4xl">
                <?php echo $table['icon']; ?>
              </div>

              <div class="text-right">
                <div class="text-xs text-gray-500">RECORDS</div>
                <div class="text-2xl text-cyan-400">
                  <?php echo number_format($table['count']); ?>
                </div>
              </div>
            </div>

            <!-- título -->
            <h2 class="text-3xl mb-2 group-hover:text-cyan-400">
              <?php echo $table['name']; ?>
            </h2>

            <!-- descrição -->
            <p class="text-gray-400 text-sm mb-4">
              <?php echo $table['description']; ?>
            </p>

            <!-- status -->
            <div class="text-xs text-gray-600">
              <span class="text-green-500">●</span> ONLINE | READY
            </div>

          </div>
        </a>

      <?php endforeach; ?>

    </div>

    <!-- Footer -->
    <div class="mt-12 text-center text-gray-600 text-sm">
      <p>Sistema de Gerenciamento de Banco de Dados v2.4.1</p>
      <p class="mt-2">
        <span class="text-green-400">●</span> Conectado ao servidor principal
      </p>
    </div>

  </div>
</div>
</body>
</html>