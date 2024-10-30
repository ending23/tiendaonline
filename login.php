<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['username'];
            header("Location: listado_productos.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST">
        Nombre de Usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
