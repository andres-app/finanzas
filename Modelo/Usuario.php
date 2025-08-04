<?php
require_once dirname(__DIR__) . "/config/conexion.php";

class UsuarioModelo
{

    public static function registrar($nombre, $email, $password)
    {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        return $stmt->execute();
    }

    public static function login($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function listar()
    {
        $sql = "SELECT id, nombre, email AS correo FROM usuarios ORDER BY id DESC";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mostrar($id)
{
    $sql = "SELECT id, nombre, email AS correo FROM usuarios WHERE id = :id";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function editar($id, $nombre, $correo)
{
    $sql = "UPDATE usuarios SET nombre = :nombre, email = :correo WHERE id = :id";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":correo", $correo);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
}

}
