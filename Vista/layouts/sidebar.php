<aside id="sidebar"
       class="bg-white w-72 shadow-md h-screen fixed lg:relative transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
  <div class="p-5 border-b">
    <h2 class="text-lg font-bold text-green-600">📊 FinanzasApp</h2>
  </div>
  <nav class="p-4 space-y-2">
    <a href="dashboard"
       class="flex items-center gap-2 px-3 py-2 text-gray-700 rounded-md hover:bg-green-100 hover:text-green-700 transition">
      <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 6h18M3 14h18M3 18h18" /></svg>
      Dashboard
    </a>
    <a href="users"
       class="flex items-center gap-2 px-3 py-2 text-gray-700 rounded-md hover:bg-green-100 hover:text-green-700 transition">
      <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z" /></svg>
      Usuarios
    </a>
    <a href="salir"
       class="flex items-center gap-2 px-3 py-2 text-red-600 rounded-md hover:bg-red-100 transition">
      <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-11v1" /></svg>
      Cerrar sesión
    </a>
  </nav>
</aside>

<!-- Script para toggle del sidebar en móviles -->
<script>
  const toggleBtn = document.getElementById('menu-toggle');
  const sidebar = document.getElementById('sidebar');
  toggleBtn?.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
  });
</script>
