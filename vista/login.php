<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Documento</title>

    <link rel="stylesheet" href="../owner_code/css/login.css" type="text/css">

</head>

<body>
<?php
include "../controlador/ctrl_login.php";
?>
<a href="../index.php"><h1>Inicio</h1></a>

<div class="container">
    <div class="backbox">
        <div class="loginMsg">
            <div class="textcontent">
                <p class="title">¿No tienes una cuenta?</p>
                <p>Regístrate para guardar tus datos.</p>
                <button id="switch1">Registrarse</button>
            </div>
        </div>
        <div class="signupMsg visibility">
            <div class="textcontent">
                <p class="title">¿Ya tienes una cuenta?</p>
                <p>Inicia sesión y descubre.</p>
                <button id="switch2">Iniciar sesión</button>
            </div>
        </div>
    </div>
    <!-- backbox -->

    <div class="frontbox">
        <div class="login">
            <h2>Iniciar sesión</h2>
            <form method="post" action="">
                <div class="inputbox">
                    <input required type="text" name="email" placeholder="  CORREO ELECTRÓNICO">
                    <input required type="password" name="password" placeholder="  CONTRASEÑA">
                </div>
                <p>¿Olvidaste tu contraseña?</p>
                <button type="submit" name="login">Iniciar sesión</button>
            </form>
        </div>

        <div class="signup hide">
            <h2>REGISTRARSE</h2>
            <form method="post" action="">
                <div class="inputbox">
                    <input required type="text" name="fullname" placeholder="  NOMBRE COMPLETO">
                    <input required type="text" name="email" placeholder="  CORREO ELECTRÓNICO">
                    <input required type="password" name="password" placeholder="  CONTRASEÑA">
                </div>
                <button type="submit" name="register">Registrarse</button>
            </form>
        </div>
    </div>
    <!-- frontbox -->
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>   
<script src="../owner_code/js/login.js"></script>
</body>
</html>
