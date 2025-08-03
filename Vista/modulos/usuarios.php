<?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/header.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/sidebar.php"; ?>

<div class="flex-1 overflow-y-auto">
  <div class="lg:hidden flex items-center justify-between bg-white p-4 shadow sticky top-0 z-30">
    <h1 class="text-lg font-bold text-green-600">FinanzasApp</h1>
    <button id="menu-toggle" class="text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <main class="p-4 lg:p-6 xl:p-8 min-h-screen">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4">Usuarios</h2>
    <div class="bg-white shadow-md rounded-xl overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200" id="tablaUsuarios">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Correo</th>
          </tr>
        </thead>
        <tbody id="usuariosBody">
          <!-- JS llenará aquí -->
        </tbody>
      </table>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/footer.php"; ?>
</div>

<script src="/finanzas/Vista/scripts/usuario.js"></script>
