<?php
require_once dirname(__DIR__) . "/Modelo/Usuario.php";
session_start();

if (isset($_GET["op"])) {

    if ($_GET["op"] == "registrar") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $registrado = UsuarioModelo::registrar($nombre, $email, $password);
        echo json_encode(["success" => $registrado]);
        exit;
    }

    if ($_GET["op"] == "login") {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $datos = UsuarioModelo::login($usuario);

        if (!$datos) {
            echo json_encode(["success" => false, "error" => "Usuario no encontrado"]);
            exit;
        }

        if (!password_verify($password, $datos["password"])) {
            echo json_encode(["success" => false, "error" => "Contraseña incorrecta"]);
            exit;
        }

        $_SESSION["id_usuario"] = $datos["id"];
        $_SESSION["nombre"] = $datos["nombre"];
        echo json_encode(["success" => true]);
        exit;
    }

    if ($_GET["op"] == "listar") {
        $usuarios = UsuarioModelo::listar();
        echo json_encode($usuarios);
        exit;
    }

    if ($_GET["op"] == "mostrar") {
        $id = $_GET["id"];
        $usuario = UsuarioModelo::mostrar($id);
        echo json_encode($usuario);
        exit;
    }

    if ($_GET["op"] == "editar") {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];

        $editado = UsuarioModelo::editar($id, $nombre, $correo);
        echo json_encode(["success" => $editado]);
        exit;
    }

}