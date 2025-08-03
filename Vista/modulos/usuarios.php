<?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/sidebar.php"; ?>

<div class="flex-1 overflow-y-auto bg-gray-50">
  <!-- Topbar móvil -->
  <div class="lg:hidden flex items-center justify-between bg-white px-4 py-3 shadow sticky top-0 z-30">
    <h1 class="text-xl font-bold text-green-600">FinanzasApp</h1>
    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Contenido principal -->
  <main class="p-6">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-gray-800">👥 Usuarios</h2>
      <button class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md shadow">
        + Nuevo Usuario
      </button>
    </div>

    <div class="bg-white shadow-md rounded-xl">
      <div class="p-4 border-b flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div id="tablaUsuarios_filter" class="dataTables_filter"></div>
        <div id="tablaUsuarios_buttons" class="flex flex-wrap gap-2"></div>
      </div>

      <div class="overflow-x-auto">
        <table class="w-full table-auto text-sm text-left divide-y divide-gray-200" id="tablaUsuarios">
          <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-wider">
            <tr>
              <th class="px-6 py-3">ID</th>
              <th class="px-6 py-3">Nombre</th>
              <th class="px-6 py-3">Correo</th>
            </tr>
          </thead>
          <tbody id="usuariosBody" class="bg-white divide-y divide-gray-100">
            <!-- JS llenará aquí -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/footer.php"; ?>
</div>

<script src="/finanzas/Vista/scripts/usuario.js"></script>