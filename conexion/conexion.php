<?php
// Configuración de conexión a la base de datos
$host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos

// Crear conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die('Conexión fallida: ' . $conexion->connect_error);
}

// Consultar eventos
$sql = "SELECT id, titulo AS nombre, imagen_url AS imagen, fecha_evento AS fecha FROM eventos";
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado && $resultado->num_rows > 0) {
    // Guardar los eventos en un array
    $eventos = [];
    while ($row = $resultado->fetch_assoc()) {
        // Crear un objeto DateTime a partir de la fecha de la base de datos
        $fecha = new DateTime($row['fecha']);
        // Formatear la fecha en el formato deseado
        $fecha_formateada = $fecha->format('d-m-Y');
        $row['fecha'] = $fecha_formateada;
        $eventos[] = $row;
    }
} else {
    $eventos = []; // No hay eventos
}



// Cerrar conexión
$conexion->close();
?>
