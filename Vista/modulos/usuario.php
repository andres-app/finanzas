<?php include "Vista/layouts/header.php"; ?>
<?php include "Vista/layouts/sidebar.php"; ?>

<div class="p-6">
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
            <tbody id="usuariosBody"></tbody>
        </table>
    </div>
</div>

<?php include "Vista/layouts/footer.php"; ?>
<script src="Vista/scripts/usuario.js"></script>
