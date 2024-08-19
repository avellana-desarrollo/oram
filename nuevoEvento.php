<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORAMEX</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/index-css.css"> <!-- Enlace al archivo CSS externo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">
    <header id="header" class="header bg-white">
        <div class="container mx-auto px-6 py-3 flex items-center justify-between">
            <!-- Logo -->
            <div class="logo text-black text-2xl font-bold">
                <a href="index.php">
                    <img src="images/logos/LOGO-BARRA-01.png" alt="Logo" class="logo-img h-20"> <!-- Tamaño aumentado -->
                </a>
            </div>
            <!-- Menú -->
            <nav id="menu" class="hidden md:flex md:items-center md:space-x-6"> <!-- Espacio entre los ítems del menú aumentado -->
                <a href="index.php" class="nav-link text-dark text-dark-hover-red">Inicio</a>
                <a href="nuevoEvento.php" class="nav-link text-dark text-dark-hover-red">Evento</a>
                <a href="speakersconfig.php" class="nav-link text-dark text-dark-hover-red">Speakers</a>
            </nav>
            <!-- Iconos de redes sociales -->
            <div class="hidden md:flex space-x-4 "> <!-- Ocultar en móviles -->
                <a href="https://web.facebook.com/oramex/?locale=es_LA&_rdc=1&_rdr" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="Facebook">
                    <img src="images/logos/ICONOS-04.png" alt="Facebook" class="w-8 h-8 object-contain">
                </a>
                <a href="https://x.com/oramexico" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="Twitter">
                    <img src="images/logos/ICONOS-05.png" alt="Twitter" class="w-8 h-8 object-contain">
                </a>
                <a href="https://www.instagram.com/oramex.oficial?igsh=MWRqaGNudXY3OGYzYQ%3D%3D" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none aria-label="Instagram">
                    <img src="images/logos/ICONOS-07.png" alt="Instagram" class="w-8 h-8 object-contain">
                </a>
                <a href="https://api.whatsapp.com/send/?phone=%2B525619985023&text&type=phone_number&app_absent=0" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="Whatsapp">
                    <img src="images/logos/ICONOS-06.png" alt="Whatsapp" class="w-8 h-8 object-contain">
                </a>
                <a href="https://www.tiktok.com/@oramex_oficial?_t=8nHtW2xl7pN&_r=1" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="TikTok">
                    <img src="images/logos/ICONOS-08.png" alt="TikTok" class="w-8 h-8 object-contain">
                </a>
                <a href="https://www.linkedin.com/company/oramex/" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="Linkedin">
                    <img src="images/logos/ICONOS-09.png" alt="Linkedin" class="w-8 h-8 object-contain">
                </a>
                <a href="https://www.youtube.com/@oramex2372/videos" class="flex items-center justify-center hover:bg-gray-100 focus:outline-none" aria-label="YouTube">
                    <img src="images/logos/ICONOS-10.png" alt="YouTube" class="w-8 h-8 object-contain">
                </a>
            </div>
            
            <!-- Botón de menú para móvil -->
            <button id="menu-toggle" class="text-black md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>


        </div>
        <!-- Menú móvil -->
        <div id="mobile-menu" class="md:hidden">
            <nav class="flex flex-col items-center space-y-4 py-4">
                <a href="index.php" class="nav-link text-dark text-dark-hover-red">Inicio</a>
                <a href="nuevoEvento.php" class="nav-link text-dark text-dark-hover-red">Evento</a>
                <a href="speakersconfig.php" class="nav-link text-dark text-dark-hover-red">Speakers</a>
            </nav>
        </div>
    </header>

    <main class="pt-20">
        <div class="container mx-auto px-6 py-8">
            <h1 class="text-3xl font-bold mb-6">Agregar Nuevo Evento</h1>
            <form action="nuevoEvento.php" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="titulo" class="block text-gray-700">Título del Evento:</label>
                        <input type="text" id="titulo" name="titulo" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label for="descripcion" class="block text-gray-700">Descripción:</label>
                        <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                    </div>
                    <div>
                        <label for="imagen_url" class="block text-gray-700">Imagen del Evento:</label>
                        <input type="file" id="imagen_url" name="imagen_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label for="imagen_agenda_url" class="block text-gray-700">Imagen de la Agenda del Evento:</label>
                        <input type="file" id="imagen_agenda_url" name="imagen_agenda_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div>
                        <label for="video_url" class="block text-gray-700">URL del Video:</label>
                        <input type="url" id="video_url" name="video_url" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label for="fecha_evento" class="block text-gray-700">Fecha y Hora del Evento:</label>
                        <input type="datetime-local" id="fecha_evento" name="fecha_evento" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <div>
                        <label for="cupos_totales" class="block text-gray-700">Cupos Totales:</label>
                        <input type="number" id="cupos_totales" name="cupos_totales" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>
                    <input type="hidden" id="cupos_disponibles" name="cupos_disponibles">
                    <div>
                        <label for="telefono" class="block text-gray-700">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label for="correo" class="block text-gray-700">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label for="nombre_ubicacion" class="block text-gray-700">Nombre de la Ubicación:</label>
                        <input type="text" id="nombre_ubicacion" name="nombre_ubicacion" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label for="horario" class="block text-gray-700">Horario:</label>
                        <input type="text" id="horario" name="horario" class="w-full px-4 py-2 border border-gray-300 rounded-lg" readonly>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg">Agregar Evento</button>
                </div>

            </form>
        </div>
    </main>

    <style>
        /*==================== 
	Footer 
====================== */

/* Main Footer */
footer .main-footer{	padding: 50px 0 25px 0;	background: #252525;}
footer ul{	padding-left: 0;	list-style: none;}

/* Copy Right Footer */
.footer-copyright {	background: #222;	padding: 5px 0;}
.footer-copyright .logo {    display: inherit;}
.footer-copyright p {	color: #969696;	margin: 2px 0 0;}

/* Footer Top */
.footer-top{	background: #252525;	padding-bottom: 30px;	margin-bottom: 30px;	border-bottom: 3px solid #222;}

/* Footer transparent */
footer.transparent .footer-top, footer.transparent .main-footer{	background: transparent;}
footer.transparent .footer-copyright{	background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3) ;}

/* Footer light */
footer.light .footer-top{	background: #f9f9f9;}
footer.light .main-footer{	background: #f9f9f9;}
footer.light .footer-copyright{	background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3) ;}

/* Footer 4 */
.footer- .logo {    display: inline-block;}

/*==================== 
	Widgets 
====================== */
.widget{	padding: 20px;	margin-bottom: 40px;}
.widget.widget-last{	margin-bottom: 0px;}
.widget.no-box{	padding: 0;	background-color: transparent;	margin-bottom: 40px;
	box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; -ms-box-shadow: none; -o-box-shadow: none;}
.widget.subscribe p{	margin-bottom: 18px;}
.widget-title {margin-bottom: 20px;}
.widget-title span {background: #839FAD none repeat scroll 0 0;display: block; height: 1px;margin-top: 25px;position: relative;width: 20%;}
.widget-title span::after {background: inherit;content: "";height: inherit;    position: absolute;top: -4px;width: 50%;}
.widget-title.text-center span,.widget-title.text-center span::after {margin-left: auto;margin-right:auto;left: 0;right: 0;}
.widget .badge{	float: right;	background: #7f7f7f;}

.typo-light h1, 
.typo-light h2, 
.typo-light h3, 
.typo-light h4, 
.typo-light h5, 
.typo-light h6,
.typo-light p,
.typo-light div,
.typo-light span,
.typo-light small{	color: #fff;}

ul.social-footer2 {	margin: 0;padding: 0;	width: auto;}
ul.social-footer2 li {display: inline-block;padding: 0;}
.btn{background: linear-gradient(110deg, #e71912, #cc1b1b); color:#fff;}
.btn:hover, .btn:focus, .btn.active {background: #4b92dc;color: #fff;
-webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-webkit-transition: all 250ms ease-in-out 0s;
-moz-transition: all 250ms ease-in-out 0s;
-ms-transition: all 250ms ease-in-out 0s;
-o-transition: all 250ms ease-in-out 0s;
transition: all 250ms ease-in-out 0s;

}
.link{
    color: white;
}
.link:hover {
    color: red;
}
    </style>
    <footer id="footer" class="footer-1">
<div class="main-footer widgets-dark typo-light">
<div class="container">
<div class="row">
  
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget subscribe no-box">
<h5 class="widget-title">ORAMEX<span></span></h5>
<p>Somos el evento tecnológico más importante del año. Expertos de Oracle, líderes de la industria y profesionales de TI nos comparten, innovaciones y estrategias que están moldeando el futuro de la tecnología.</p>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">AGENDA<span></span></h5>
<p>¿Tienes alguna pregunta o necesitas asistencia con el proceso de registro para ORAMEX 2024?</p>
<!--<a class="btn" href="https://bit.ly/3m9avif" target="_blank">¡Regístrate ahora!</a>-->
</div>
</div>
  
  <div class="col-xs-12 col-sm-6 col-md-3">
<div class="widget no-box">
<h5 class="widget-title">UBICACIÓN<span></span></h5>
  <p>
    Auditorio Sotero Prieto Anexo de la Facultad de Ingeniería UNAM, CDMX.
  </p>
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-3">

<div class="widget no-box">
<h5 class="widget-title">CONTÁCTANOS<span></span></h5>

<p><a class="link" href="mailto:contacto@oramex.mx" title="">contacto@oramex.mx</a></p>
 <p><a class="link" href="tel:5619985023" title="glorythemes">(561) 9985023</a></p>

</div>
</div>

</div>
</div>
</div>
  
<div class="footer-copyright">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<p>ORAMEX 2024. Todos los derechos reservados.</p>
</div>
</div>
</div>
</div>
</footer>




    <script>
        // Convert fecha_evento to the desired format for horario
        document.getElementById('fecha_evento').addEventListener('change', function() {
            const fechaEvento = new Date(this.value);
            const diasSemana = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
            const mes = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

            const dia = diasSemana[fechaEvento.getDay()];
            const diaMes = fechaEvento.getDate();
            const nombreMes = mes[fechaEvento.getMonth()];
            const anio = fechaEvento.getFullYear();

            let horas = fechaEvento.getHours();
            let minutos = fechaEvento.getMinutes();
            const ampm = horas >= 12 ? 'PM' : 'AM';
            horas = horas % 12;
            horas = horas ? horas : 12; // La hora '0' debe ser '12'
            minutos = minutos < 10 ? '0' + minutos : minutos;

            const horario = `${dia} ${diaMes} de ${nombreMes}, ${horas}:${minutos} ${ampm}`;
            document.getElementById('horario').value = horario;
        });

        // Ensure cupos_disponibles matches cupos_totales
        document.getElementById('cupos_totales').addEventListener('change', function() {
            document.getElementById('cupos_disponibles').value = this.value;
        });

        // Script para ajustar horario basado en fecha_evento
        document.getElementById('fecha_evento').addEventListener('input', function() {
            const fecha = new Date(this.value);
            const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', hour12: true };
            document.getElementById('horario').value = fecha.toLocaleDateString('es-ES', options);
        });

        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            const isHome = window.location.hash === '#home' || window.location.hash === '';
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
            if (isHome) {
                header.classList.remove('header-scrolled');
            }
        });

        // Toggle del menú para móvil
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');
        
            // Obtener el nombre del archivo actual
            const currentPath = window.location.pathname.split('/').pop();
        
            // Mapear enlaces con sus rutas correspondientes
            const linkMap = {
                'index.html': 'Inicio',
                'eventos.php': 'Eventos',
                'galeria.html': 'Galería',  // Asegúrate de usar el nombre correcto del archivo de galería
                'contacto.html': 'Contacto'  // Asegúrate de usar el nombre correcto del archivo de contacto
            };
        
            // Buscar y resaltar el enlace activo
            navLinks.forEach(link => {
                const linkText = link.textContent.trim();
                if (linkMap[currentPath] === linkText) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active'); // Asegúrate de eliminar la clase 'active' si no coincide
                }
            });
        });
    </script>
    
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $video_url = $_POST['video_url'];
    $fecha_evento = $_POST['fecha_evento'];
    $cupos_totales = $_POST['cupos_totales'];
    $cupos_disponibles = $cupos_totales;
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $nombre_ubicacion = $_POST['nombre_ubicacion'];
    $horario = $_POST['horario'];

    // Subida de imagen del evento
    $imagen_nombre = null;
    if (isset($_FILES['imagen_url']) && $_FILES['imagen_url']['error'] == 0) {
        $imagen_nombre = uniqid() . '-' . basename($_FILES['imagen_url']['name']);
        $imagen_ruta = 'images/eventos/' . $imagen_nombre;
        move_uploaded_file($_FILES['imagen_url']['tmp_name'], $imagen_ruta);
    }

    // Subida de imagen de la agenda
    $imagen_agenda_nombre = null;
    if (isset($_FILES['imagen_agenda_url']) && $_FILES['imagen_agenda_url']['error'] == 0) {
        $imagen_agenda_nombre = uniqid() . '-' . basename($_FILES['imagen_agenda_url']['name']);
        $imagen_agenda_ruta = 'images/agendas/' . $imagen_agenda_nombre;
        move_uploaded_file($_FILES['imagen_agenda_url']['tmp_name'], $imagen_agenda_ruta);
    }

    // Conexión a la base de datos
    $host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos

    $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    if ($conexion->connect_error) {
        die('Conexión fallida: ' . $conexion->connect_error);
    }
    
    $sql = "INSERT INTO eventos (titulo, descripcion, imagen_url, video_url, fecha_evento, cupos_totales, cupos_disponibles, telefono, correo, nombre_ubicacion, horario, imagen_agenda_url, status) 
            VALUES ('$titulo', '$descripcion', '$imagen_nombre', '$video_url', '$fecha_evento', $cupos_totales, $cupos_disponibles, '$telefono', '$correo', '$nombre_ubicacion', '$horario', '$imagen_agenda_nombre', 1)";

    if ($conexion->query($sql) === TRUE) {
        echo "<script>alert('Evento guardado con éxito.');</script>";
    } else {
        echo "<script>alert('Error al guardar el evento: " . $conexion->error . "');</script>";
    }

    $conexion->close();
}
?>
