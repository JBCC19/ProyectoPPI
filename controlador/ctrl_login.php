<?php

include "../modelo/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        // Acción de registro
        registrarUsuario();
    } elseif (isset($_POST["login"])) {
        // Acción de inicio de sesión
        iniciarSesion2();
    }
}

function registrarUsuario()
{
    $conn = conexionBd();

    // Obtener datos del formulario de registro
    $nombre = $_POST["fullname"];
    $correo = $_POST["email"];
    $contrasena = $_POST["password"]; // Hash de la contraseña

    // Insertar datos en la base de datos
    $query = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES ('$nombre', '$correo', '$contrasena', 'user')";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
    } else {
        echo "Error al registrar usuario: " . mysqli_error($conn);
    }

    cerrarBd($conn);
}
/* Para cuando se aplique encriptacion, mientas tanto es de prueba 

function iniciarSesion()
{
    $conn = conexionBd();

    // Obtener datos del formulario de inicio de sesión
    $correo = $_POST["email"];
    $contrasena = $_POST["password"];

    // Buscar usuario en la base de datos
    $query = "SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Inicio de sesión exitoso
            header("Location: otra_pagina.php"); // Redireccionar a otra página
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    cerrarBd($conn);
}
*/

function iniciarSesion2()
{
    $conn = conexionBd();

    // Obtener datos del formulario de inicio de sesión
    $correo = $_POST["email"];
    $contrasena = $_POST["password"];

    // Utilizar una consulta preparada para evitar ataques de inyección SQL
    $query = "SELECT * FROM usuarios WHERE correo=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_object();

        // Verificar la contraseña en texto plano
        if ($contrasena === $usuario->contrasena) {
            // Inicio de sesión exitoso
            // Almacena la información del usuario en sesiones
            session_start();
            $_SESSION['id'] = $usuario->id;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['correo'] = $usuario->correo;
            $_SESSION['rol'] = $usuario->rol;

            // Redirige a la página de inicio
            header("Location: ../index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger mt-4 mb-4 text-center' id='alertas' role='alert' style='width: 85%; margin: auto !important; margin-top: 1rem !important;'>
                ¡Contraseña incorrecta, verifique!
            </div>";
        }
    } else {
        echo "<div class='alert alert-danger mt-4 mb-4 text-center' id='alertas' role='alert' style='width: 85%; margin: auto !important; margin-top: 1rem !important;'>
            ¡Usuario no encontrado!
        </div>";
    }

    // Cerrar la consulta preparada
    $stmt->close();
    cerrarBd($conn);
}
?>