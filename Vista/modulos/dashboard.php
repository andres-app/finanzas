<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
  header("Location: login");
  exit();
}
include "Vista/layouts/header.php";
include "Vista/layouts/sidebar.php";
?>

<!-- Contenedor principal del contenido -->
<div class="w-full lg:pl-8">
  <!-- Topbar Mobile -->
  <div class="lg:hidden flex items-center justify-between bg-white p-4 shadow sticky top-0 z-30">
    <h1 class="text-lg font-bold text-green-600">FinanzasApp</h1>
    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Contenido principal -->
  <main class="p-4 lg:p-6 xl:p-8 lg:-ml-6 space-y-10">
    <!-- Encabezado -->
    <div>
      <h1 class="text-3xl font-bold text-gray-800 mb-1">Panel Financiero</h1>
      <p class="text-gray-600">
        Hola, <span class="font-semibold text-green-600"><?= htmlspecialchars($_SESSION["nombre"]) ?></span>. Aquí tienes un resumen de tus finanzas.
      </p>
    </div>

    <!-- KPIs -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6">
      <!-- Reutilizamos las tarjetas KPI (idénticas a las que ya tienes) -->
      <?php
      $kpis = [
        ['label' => 'Ingresos Totales', 'valor' => 'S/ 45,200', 'color' => 'green'],
        ['label' => 'Gastos Totales', 'valor' => 'S/ 32,100', 'color' => 'red'],
        ['label' => 'Balance', 'valor' => 'S/ 13,100', 'color' => 'blue'],
        ['label' => 'Órdenes', 'valor' => '135', 'color' => 'purple'],
      ];
      foreach ($kpis as $kpi) {
        echo <<<HTML
        <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
          <div class="bg-{$kpi['color']}-100 p-3 rounded-full">
            <svg class="w-6 h-6 text-{$kpi['color']}-600" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c1.657 0 3 1.343 3 3s-1.343 3-3 3m0 0c-1.657 0-3-1.343-3-3s1.343-3 3-3m0 0V5m0 11v3"/>
            </svg>
          </div>
          <div>
            <p class="text-sm text-gray-500">{$kpi['label']}</p>
            <p class="text-2xl font-bold text-{$kpi['color']}-600">{$kpi['valor']}</p>
          </div>
        </div>
        HTML;
      }
      ?>
    </div>

    <!-- Gráfica resumen (placeholder) -->
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Resumen Gráfico</h2>
      <div class="h-64 flex items-center justify-center text-gray-400 border-2 border-dashed rounded-lg">
        [ Gráfica próximamente aquí ]
      </div>
    </div>

    <!-- Últimos movimientos -->
    <div class="bg-white rounded-xl shadow p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Últimos Movimientos</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
          <thead class="bg-gray-100 text-xs uppercase text-gray-500">
            <tr>
              <th class="px-4 py-3">Fecha</th>
              <th class="px-4 py-3">Descripción</th>
              <th class="px-4 py-3">Categoría</th>
              <th class="px-4 py-3">Monto</th>
            </tr>
          </thead>
          <tbody class="divide-y">
            <tr><td class="px-4 py-2">03/08/2025</td><td class="px-4 py-2">Pago de servicios</td><td class="px-4 py-2">Gastos</td><td class="px-4 py-2 text-red-600">- S/ 180</td></tr>
            <tr><td class="px-4 py-2">02/08/2025</td><td class="px-4 py-2">Ingreso freelance</td><td class="px-4 py-2">Ingresos</td><td class="px-4 py-2 text-green-600">+ S/ 850</td></tr>
            <tr><td class="px-4 py-2">01/08/2025</td><td class="px-4 py-2">Compra supermercado</td><td class="px-4 py-2">Gastos</td><td class="px-4 py-2 text-red-600">- S/ 240</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<?php include "Vista/layouts/footer.php"; ?>
