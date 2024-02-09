<?php include "../layout/header.php";?>
<?php include "../modelo/conexion.php";?>

<!-- ESTO ERA DE PRUEBA -->
<!-- Content Row -->
<div class="row">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario
    if(isset($_POST['submit'])) {
        // Verificar si se ha seleccionado un archivo
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $id = 1; // Establecer el ID directamente a 1
            $nombre_imagen = $_FILES['imagen']['name'];

            // Actualizar la base de datos con el nombre de la imagen seleccionada
            $conn = conexionBd();

            // Escapar el nombre de la imagen para prevenir inyecciones SQL
            $nombre_imagen = mysqli_real_escape_string($conn, $nombre_imagen);

            // Preparar y ejecutar la consulta SQL para actualizar la imagen en la base de datos
            $sql = "UPDATE sitios SET img='$nombre_imagen' WHERE id=$id";

            if (mysqli_query($conn, $sql)) {
                echo "La imagen se ha actualizado correctamente.";
            } else {
                echo "Error al actualizar la imagen en la base de datos: " . mysqli_error($conn);
            }

            cerrarBd($conn);
        } else {
            echo "Por favor, selecciona una imagen válida.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Imagen</title>
</head>
<body>
    <h2>Actualizar Imagen</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="imagen">Seleccionar imagen:</label>
        <input type="file" name="imagen" id="imagen" required><br><br>
        <input type="submit" value="Actualizar" name="submit">
    </form>
</body>
</html>

</div>
<?php include "../layout/footer.php";?>