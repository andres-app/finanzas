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
  <title>Registro | FinanzasApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .fade-in-up { animation: fadeInUp 0.7s ease-out; }
  </style>
</head>
<body class="bg-gradient-to-br from-green-100 via-white to-blue-100 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl rounded-xl p-10 max-w-md w-full fade-in-up border border-gray-200">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-green-700 mb-1">Crear cuenta</h1>
      <p class="text-gray-600 text-sm">Regístrate para comenzar a gestionar tus finanzas</p>
    </div>

    <form id="formRegistro" method="post" class="space-y-5">
      <div>
        <label for="nombre" class="block mb-1 text-gray-700 font-medium">Nombre</label>
        <input type="text" id="nombre" name="nombre" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="Tu nombre completo">
      </div>

      <div>
        <label for="email" class="block mb-1 text-gray-700 font-medium">Correo electrónico</label>
        <input type="email" id="email" name="email" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="correo@ejemplo.com">
      </div>

      <div>
        <label for="password" class="block mb-1 text-gray-700 font-medium">Contraseña</label>
        <input type="password" id="password" name="password" required
          class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
          placeholder="********">
      </div>

      <button type="submit"
        class="w-full bg-green-600 hover:bg-green-700 transition-colors py-2 rounded-md text-white font-semibold shadow">
        Registrarse
      </button>

      <div class="text-center mt-3">
        <a href="login" class="text-sm text-green-600 hover:underline">Ya tengo una cuenta</a>
      </div>
    </form>
  </div>

  <script src="Vista/scripts/usuario.js"></script>
</body>
</html>
