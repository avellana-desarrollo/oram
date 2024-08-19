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

// Obtener los datos del formulario
$speaker_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$bio = isset($_POST['bio']) ? trim($_POST['bio']) : '';
$evento_id = isset($_POST['evento_id']) ? intval($_POST['evento_id']) : 0;
$evento_status = isset($_POST['evento_status']) ? intval($_POST['evento_status']) : 0;

// Consultar el speaker actual para obtener la foto actual
$sql = "SELECT foto_url FROM speakers WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $speaker_id);
$stmt->execute();
$resultado = $stmt->get_result();
$speaker = $resultado->fetch_assoc();
$foto_nombre_actual = $speaker['foto_url']; // Guardar solo el nombre de la imagen

// Manejar la carga del archivo de foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_nombre = basename($_FILES['foto']['name']);
    $foto_url = 'images/speakers/' . $foto_nombre;
    move_uploaded_file($foto_tmp, $foto_url);

    // Eliminar la foto antigua si existe
    if (!empty($foto_nombre_actual) && file_exists('images/speakers/' . $foto_nombre_actual)) {
        unlink('images/speakers/' . $foto_nombre_actual);
    }
} else {
    // Mantener la foto actual si no se carga una nueva
    $foto_nombre = $foto_nombre_actual;
}

// Actualizar los datos del speaker
$sql = "UPDATE speakers SET nombre = ?, bio = ?, foto_url = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('sssi', $nombre, $bio, $foto_nombre, $speaker_id);
$stmt->execute();

// Redirigir al usuario después de la actualización
header('Location: speakers.php?id=' . $evento_id . '&status=' . $evento_status);
exit();

// Cerrar conexión
$conexion->close();
?>
