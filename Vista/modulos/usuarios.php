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

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
      <div class="p-4 border-b flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div id="tablaUsuarios_filter" class="dataTables_filter"></div>
        <div id="tablaUsuarios_buttons" class="flex flex-wrap gap-2 text-sm"></div>
      </div>

      <div class="overflow-x-auto">
        <table id="tablaUsuarios" class="min-w-full divide-y divide-gray-200 text-sm">
          <thead class="bg-green-100 text-green-800 uppercase text-xs tracking-wider">
            <tr>
              <th class="px-6 py-3 text-left">ID</th>
              <th class="px-6 py-3 text-left">Nombre</th>
              <th class="px-6 py-3 text-left">Correo</th>
              <th class="px-6 py-3 text-left">Acciones</th>
            </tr>
          </thead>
          <tbody id="usuariosBody" class="divide-y divide-gray-100">
            <!-- JS llenará aquí -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Modal de Edición de Usuario -->
  <div id="modalEditarUsuario"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">✏️ Editar Usuario</h3>
      <form id="formEditarUsuario">
        <input type="hidden" name="id" id="editar_id">

        <div class="mb-4">
          <label for="editar_nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
          <input type="text" name="nombre" id="editar_nombre"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div class="mb-4">
          <label for="editar_correo" class="block text-sm font-medium text-gray-700">Correo</label>
          <input type="email" name="correo" id="editar_correo"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div class="flex justify-end gap-2">
          <button type="button" onclick="cerrarModalEditar()"
            class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancelar</button>
          <button type="submit" class="px-4 py-2 rounded bg-green-600 text-white hover:bg-green-700">Guardar</button>
        </div>
      </form>
    </div>
  </div>


  <?php include $_SERVER['DOCUMENT_ROOT'] . "/finanzas/Vista/layouts/footer.php"; ?>
</div>

<script src="/finanzas/Vista/scripts/usuarios.js"></script>