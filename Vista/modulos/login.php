<?php
session_start();
if (isset($_SESSION["id_usuario"])) {
  header("Location: dashboard");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Login | FinanzasApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 0.7s ease-out;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-green-100 via-white to-blue-100 min-h-screen flex items-center justify-center">

  <!-- Login Card -->
  <div class="bg-white shadow-xl rounded-xl p-10 max-w-md w-full fade-in-up border border-gray-200">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-green-700 mb-1">Panel de Finanzas</h1>
      <p class="text-gray-600 text-sm">Inicia sesión para continuar</p>
    </div>

    <form id="formLogin" method="post" class="space-y-5">
      <div>
        <label for="usuario" class="block mb-1 text-gray-700 font-medium">Usuario</label>
        <input type="text" id="usuario" name="usuario" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="Ingresa tu usuario">
      </div>

      <div>
        <label for="password" class="block mb-1 text-gray-700 font-medium">Contraseña</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="********">
      </div>

      <button type="submit"
        class="w-full bg-green-600 hover:bg-green-700 transition-colors py-2 rounded-md text-white font-semibold shadow">Entrar</button>
    </form>

    <div class="mt-5 text-center space-y-2">
  <a href="#" onclick="alert('Funcionalidad aún no disponible'); return false;"
     class="text-sm text-green-600 hover:underline block">¿Olvidaste tu contraseña?</a>

  <a href="registro" class="text-sm text-green-600 hover:underline block">¿No tienes cuenta?</a>
</div>

  </div>

  <!-- Toast global -->
  <div id="toast-global"
    class="fixed top-5 right-5 z-50 flex items-start gap-4 p-4 border-l-4 shadow-lg rounded-lg hidden opacity-0 transition-opacity duration-300">
    <div>
      <p id="toast-title" class="font-bold">Título</p>
      <p id="toast-message" class="text-sm">Mensaje</p>
    </div>
  </div>

  <!-- Loader global incluido -->
  <?php include "componentes/loader.php"; ?>

  <!-- Scripts -->
  <script src="Vista/scripts/loader.js"></script>
  <script src="Vista/scripts/usuario.js"></script>

</body>

</html>