<?php 
include_once "conexion.php";

// Parámetros para la paginación
$por_pagina = 12; // Número de resultados por página
if(isset($_GET['pagina']) && is_numeric($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$desde = ($pagina - 1) * $por_pagina;

// Parámetro de búsqueda
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Obtener la conexión a la base de datos
$conexion = conexionBd();

// Consulta SQL para obtener los datos con opción de búsqueda
$sql = "SELECT s.id, s.titulo, s.descripcion, s.contenido, s.estado, 
p.nombre_provincia AS provincia, cc.nombre_cc AS ciudad_canton, u.nombre AS usuario, c.categoria_nombre AS categoria
FROM sitios s
INNER JOIN provincias p ON s.provincias_id_fk = p.id
INNER JOIN ciudad_canton cc ON s.ciudad_canton_id_fk = cc.id
INNER JOIN usuarios u ON s.usuarios_id_fk = u.id
INNER JOIN categorias c ON s.categorias_id_fk = c.id";

// Agregar condición de búsqueda si hay un término de búsqueda definido
if (!empty($busqueda)) {
    $sql .= " WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
}

$sql .= " LIMIT $desde, $por_pagina";
$resultado = $conexion->query($sql);



// Consulta SQL para obtener el total de filas en la tabla (con opción de búsqueda)
$sql_total = "SELECT COUNT(*) AS total FROM sitios";
if (!empty($busqueda)) {
    // Si hay un término de búsqueda, agregarlo a la consulta SQL
    $sql_total .= " WHERE titulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";
}
$total_filas = $conexion->query($sql_total)->fetch_assoc()['total'];
$num_pags = ceil($total_filas / $por_pagina);

// Cerrar la conexión
cerrarBd($conexion);
?>
