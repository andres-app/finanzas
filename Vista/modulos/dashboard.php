<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
  header("Location: login");
  exit();
}
include "Vista/layouts/header.php";     // Head y apertura del body
include "Vista/layouts/sidebar.php";    // Sidebar lateral
?>

<!-- Contenedor principal del contenido -->
<div class="w-full lg:pl-8">
  <!-- Topbar Mobile -->
  <div class="lg:hidden flex items-center justify-between bg-white p-4 shadow sticky top-0 z-30">
    <h1 class="text-lg font-bold text-green-600">FinanzasApp</h1>
    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Contenido principal -->
  <main class="p-4 lg:p-6 xl:p-8 lg:-ml-6">
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-1">Panel Financiero</h1>
      <p class="text-gray-600">
        Hola, <span class="font-semibold text-green-600"><?= htmlspecialchars($_SESSION["nombre"]) ?></span>.
        Aquí tienes un resumen de tus finanzas.
      </p>
    </div>

    <!-- Contenedor grid de KPIs -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-6">

      <!-- KPI 1 -->
      <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
        <div class="bg-green-100 p-3 rounded-full">
          <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 8c1.657 0 3 1.343 3 3s-1.343 3-3 3m0 0c-1.657 0-3-1.343-3-3s1.343-3 3-3m0 0V5m0 11v3"/>
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Ingresos Totales</p>
          <p class="text-2xl font-bold text-green-600">S/ 45,200</p>
        </div>
      </div>

      <!-- KPI 2 -->
      <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
        <div class="bg-red-100 p-3 rounded-full">
          <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 16c1.657 0 3-1.343 3-3s-1.343-3-3-3m0 0c-1.657 0-3 1.343-3 3s1.343 3 3 3m0 0v3m0-11V5"/>
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Gastos Totales</p>
          <p class="text-2xl font-bold text-red-600">S/ 32,100</p>
        </div>
      </div>

      <!-- KPI 3 -->
      <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
        <div class="bg-blue-100 p-3 rounded-full">
          <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 10h11M9 21V3m4 14l4-4-4-4"/>
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Balance</p>
          <p class="text-2xl font-bold text-blue-600">S/ 13,100</p>
        </div>
      </div>

      <!-- KPI 4 -->
      <div class="bg-white p-6 rounded-xl shadow flex items-center space-x-4">
        <div class="bg-purple-100 p-3 rounded-full">
          <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" stroke-width="2"
               viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m2 0H7m4-14h2a2 2 0 012 2v2H9V5a2 2 0 012-2z"/>
          </svg>
        </div>
        <div>
          <p class="text-sm text-gray-500">Órdenes</p>
          <p class="text-2xl font-bold text-purple-600">135</p>
        </div>
      </div>

    </div>
  </main>
</div>

<?php include "Vista/layouts/footer.php"; ?>
