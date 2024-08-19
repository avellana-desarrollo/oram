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

// Obtener datos del formulario
$id_evento = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

// Manejo del archivo de imagen
if (!empty($_FILES['imagen']['name'])) {
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $imagen_destino = 'images/eventos/' . $imagen_nombre;

    // Mover el archivo a la carpeta de destino
    if (move_uploaded_file($imagen_temp, $imagen_destino)) {
        $imagen_url = $imagen_nombre;
    } else {
        die('Error al subir la imagen.');
    }
} else {
    // Si no se subió una nueva imagen, conservar la imagen actual
    $imagen_url = $_POST['imagen_url_actual'];
}

// Manejo del archivo de la agenda
if (!empty($_FILES['imagenagenda']['name'])) {
    $imagen_agenda_nombre = $_FILES['imagenagenda']['name'];
    $imagen_agenda_temp = $_FILES['imagenagenda']['tmp_name'];
    $imagen_agenda_destino = 'images/agendas/' . $imagen_agenda_nombre;

    // Mover el archivo a la carpeta de destino
    if (move_uploaded_file($imagen_agenda_temp, $imagen_agenda_destino)) {
        $imagen_agenda_url = $imagen_agenda_nombre;
    } else {
        die('Error al subir la agenda.');
    }
} else {
    // Si no se subió una nueva agenda, conservar la agenda actual
    $imagen_agenda_url = $_POST['imagen_agenda_url_actual'];
}

// Manejo de la URL del video
if (!empty($_POST['video_url'])) {
    $video_url = $_POST['video_url'];
} else {
    // Si no se proporciona una nueva URL de video, conservar la URL actual
    $video_url = $_POST['video_url_actual'];
}

$fecha_evento = $_POST['fecha_evento'];
$cupos_totales_nuevo = $_POST['cupos_totales'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$nombre_ubicacion = $_POST['nombre_ubicacion'];

// Primero, obtenemos el valor actual de cupos_disponibles
$sql_select = "SELECT cupos_totales, cupos_disponibles FROM eventos WHERE id = ?";
$stmt_select = $conexion->prepare($sql_select);
$stmt_select->bind_param('i', $id_evento);
$stmt_select->execute();
$result = $stmt_select->get_result();

if ($row = $result->fetch_assoc()) {
    $cupos_totales_actual = $row['cupos_totales'];
    $cupos_disponibles_actual = $row['cupos_disponibles'];
}

// Calcular la diferencia en cupos_totales y ajustar cupos_disponibles
$diferencia_cupos = $cupos_totales_nuevo - $cupos_totales_actual;
$cupos_disponibles_nuevo = $cupos_disponibles_actual + $diferencia_cupos;

// Actualizar el evento con los nuevos valores
$sql_update = "UPDATE eventos 
               SET titulo = ?, 
                   descripcion = ?, 
                   imagen_url = ?, 
                   video_url = ?, 
                   fecha_evento = ?, 
                   cupos_totales = ?, 
                   cupos_disponibles = ?, 
                   telefono = ?, 
                   correo = ?, 
                   nombre_ubicacion = ?,
                   imagen_agenda_url = ? 
               WHERE id = ?";

// Preparar la consulta
$stmt_update = $conexion->prepare($sql_update);

// Verificar si la preparación fue exitosa
if ($stmt_update === false) {
    die('Error en la preparación de la consulta: ' . $conexion->error);
}

// Enlazar los parámetros
$stmt_update->bind_param(
    'sssssiiisssi',
    $titulo, 
    $descripcion, 
    $imagen_url, 
    $video_url, 
    $fecha_evento, 
    $cupos_totales_nuevo, 
    $cupos_disponibles_nuevo, 
    $telefono, 
    $correo, 
    $nombre_ubicacion,
    $imagen_agenda_url,
    $id_evento
);

// Ejecutar la consulta
if ($stmt_update->execute()) {
    // Redirigir a actualizarevento.php con un parámetro de éxito
    header('Location: editarevento.php?status=success&id=' . $id_evento);
    exit;
} else {
    // Redirigir a actualizarevento.php con un parámetro de error
    header('Location: editarevento.php?status=error&id=' . $id_evento);
    exit;
}

// Cerrar la consulta y la conexión
$stmt_select->close();
$stmt_update->close();
$conexion->close();
?>
