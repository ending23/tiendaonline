<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form method="POST">
        Nombre de Usuario: <input type="text" name="username" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
