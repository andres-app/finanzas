<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
  header("Location: login");
  exit();
}
?>
<?php include "Vista/layouts/header.php"; ?>
<?php include "Vista/layouts/sidebar.php"; ?>

<div class="p-6 bg-gray-100 min-h-screen">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Panel de Finanzas</h1>
  <h1 class="text-2xl font-bold text-gray-800">
    Bienvenido, <?= htmlspecialchars($_SESSION["nombre"]) ?>
  </h1>


  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white p-4 shadow rounded-xl">
      <h2 class="text-gray-600">Ingresos Totales</h2>
      <p class="text-2xl font-bold text-green-500">S/ 45,200</p>
    </div>
    <div class="bg-white p-4 shadow rounded-xl">
      <h2 class="text-gray-600">Gastos Totales</h2>
      <p class="text-2xl font-bold text-red-500">S/ 32,100</p>
    </div>
    <div class="bg-white p-4 shadow rounded-xl">
      <h2 class="text-gray-600">Balance</h2>
      <p class="text-2xl font-bold text-blue-500">S/ 13,100</p>
    </div>
    <div class="bg-white p-4 shadow rounded-xl">
      <h2 class="text-gray-600">Órdenes</h2>
      <p class="text-2xl font-bold text-purple-500">135</p>
    </div>
  </div>
</div>

<?php include "Vista/layouts/footer.php"; ?>