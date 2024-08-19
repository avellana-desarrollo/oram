<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('fpdf/fpdf.php'); // Incluye la biblioteca FPDF

// Recuperar el ID del asistente desde la URL
$id_asistente = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($id_asistente)) {
    die('ID del asistente no proporcionado.');
}

// Conexión a la base de datos

$host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die('Conexión fallida: ' . $conexion->connect_error);
}

// Consultar datos del asistente y del evento
$sql = "SELECT a.nombre, a.email, a.telefono, 
               e.titulo AS nombre_evento, e.descripcion, e.imagen_url, e.fecha_evento, 
               e.telefono AS telefono_evento, e.correo AS correo_evento, e.nombre_ubicacion, e.horario
        FROM asistentes a
        JOIN eventos e ON a.evento_id = e.id
        WHERE a.id = '$id_asistente'";
$resultado = $conexion->query($sql);

if ($resultado === false) {
    die('Error en la consulta SQL: ' . $conexion->error);
}

if ($resultado && $resultado->num_rows > 0) {
    $asistente = $resultado->fetch_assoc();

    // Crear instancia del objeto FPDF
    $pdf = new FPDF();
    $pdf->AddPage(); // Agrega una página

    // Obtener la altura de la página (en mm)
    $alto_pagina = $pdf->GetPageHeight();
    $ancho_pagina = $pdf->GetPageWidth();

    // Definir el alto deseado para la imagen (20% de la altura de la página)
    $alto_imagen = $alto_pagina * 0.20;

    // Agregar imagen del evento
    if (!empty($asistente['imagen_url'])) {
        $imagen_url = 'images/eventos/' . $asistente['imagen_url'];
        $pdf->Image($imagen_url, 0, 0, $ancho_pagina, $alto_imagen); // Imagen de ancho completo y altura del 20%
        $pdf->Ln($alto_imagen + 5); // Espacio después de la imagen (reducido)
    }

    // Configura la fuente para el título del evento
    $pdf->SetFont('Arial', 'B', 20); // Reducido el tamaño de la fuente
    $pdf->Cell(0, 8, utf8_decode($asistente['nombre_evento']), 0, 1, 'C'); // Reducido el tamaño del texto
    $pdf->Ln(5); // Espacio después del título (reducido)

    // Configura la fuente para los datos del participante
    $pdf->SetFont('Arial', '', 10); // Reducido el tamaño de la fuente
    $pdf->Cell(0, 8, 'Nombre: ' . utf8_decode($asistente['nombre']), 0, 1);
    $pdf->Cell(0, 8, 'Correo Electrónico: ' . utf8_decode($asistente['email']), 0, 1);
    $pdf->Cell(0, 8, 'Teléfono: ' . $asistente['telefono'], 0, 1);
    $pdf->Ln(5); // Espacio después de los datos del participante (reducido)

    // Texto de la carta
    $pdf->SetFont('Arial', '', 10); // Asegúrate de usar el mismo tamaño de fuente
    $pdf->MultiCell(0, 6, // Reducido el interlineado
        "Estimado/a " . utf8_decode($asistente['nombre']) . ":\n\n" .
        "Nos complace confirmar tu registro al evento " . utf8_decode($asistente['nombre_evento']) . ". A continuación, te proporcionamos los detalles del evento:\n\n" .
        "Descripción: " . utf8_decode($asistente['descripcion']) . "\n\n" .
        "Ubicación: " . utf8_decode($asistente['nombre_ubicacion']) . "\n" .
        "Fecha y Hora: " . date('d/m/Y H:i', strtotime($asistente['fecha_evento'])) . "\n" .
        "Horario: " . utf8_decode($asistente['horario']) . "\n\n" .
        "Información de Contacto del Evento:\n" .
        "Correo Electrónico: " . utf8_decode($asistente['correo_evento']) . "\n" .
        "Teléfono: " . $asistente['telefono_evento'] . "\n\n" .
        "Nos entusiasma contar con tu participación. Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en contactarnos a través del correo electrónico o teléfono proporcionados.\n\n" .
        "¡Te esperamos en el evento!\n\n" .
        "Atentamente,\n" .
        "[Nombre de la Organización]"
    );

    // Enviar el PDF al navegador como descarga
    $pdf->Output('D', 'ticket_' . $id_asistente . '.pdf'); // 'D' para descarga
} else {
    echo 'No se encontraron datos para el asistente.';
}

// Cerrar conexión
$conexion->close();
?>
