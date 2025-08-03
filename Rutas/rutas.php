<?php

$vistaPath = dirname(__DIR__) . "/Vista/modulos/";

if (isset($_GET["url"])) {
  $url = $_GET["url"];

  $modulosPermitidos = [
    "login", "registro", "dashboard", "salir",
    "gastos", "categorias", "reportes"
    // agrega más módulos según tu app
  ];

  if (in_array($url, $modulosPermitidos)) {
    include $vistaPath . $url . ".php";
  } else {
    include $vistaPath . "404.php";
  }
} else {
  include $vistaPath . "login.php";
}
