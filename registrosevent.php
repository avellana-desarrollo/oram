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

// Obtener el ID del evento desde la URL (o cualquier otra fuente)
$evento_id = $_GET['id']; // Asegúrate de validar y sanitizar esta entrada

// Consultar asistentes del evento
$sql = "SELECT id, nombre, email, telefono, status FROM asistentes WHERE evento_id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $evento_id);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    $asistentes = [];
    while ($row = $resultado->fetch_assoc()) {
        $asistentes[] = $row;
    }
} else {
    $asistentes = []; // No hay asistentes
}

// Cerrar conexión
$conexion->close();
?>

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

        <?php
        // Obtener el ID del evento de la URL
        $event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        ?>

        <div class="container mx-auto px-6 py-3 flex items-center justify-between">
            <!-- Logo -->
            <div class="logo text-black text-2xl font-bold">
                <a href="index.php">
                    <img src="images/logos/LOGO-BARRA-01.png" alt="Logo" class="logo-img h-20"> <!-- Tamaño aumentado -->
                </a>
            </div>
            <!-- Menú -->
            <nav id="menu" class="hidden md:flex md:items-center md:space-x-6">  <!-- Espacio entre los ítems del menú aumentado -->
                <a href="index.php" class="nav-link text-dark text-dark-hover-red">Inicio</a>
                <a href="evento.php?id=<?php echo $event_id; ?>" class="nav-link text-dark text-dark-hover-red">Evento</a>
                <a href="galeria.html" class="nav-link text-dark text-dark-hover-red">Galería</a>
                <a href="speakers.php?id=<?php echo $event_id; ?>" class="nav-link text-dark text-dark-hover-red">Speakers</a> <!-- Añadido -->
                <a href="#contacto" class="nav-link text-dark text-dark-hover-red">Contacto</a>
                <a href="blog.php" class="nav-link text-dark text-dark-hover-red">Blog</a>
            </nav>
            <!-- Iconos de redes sociales -->
            <div class="hidden md:flex space-x-4"> <!-- Ocultar en móviles -->
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
                <a href="evento.php?id=<?php echo $event_id; ?>" class="nav-link text-dark text-dark-hover-red">Evento</a>
                <a href="galeria.html" class="nav-link text-dark text-dark-hover-red">Galería</a>
                <a href="speakers.php?id=<?php echo $event_id; ?>" class="nav-link text-dark text-dark-hover-red">Speakers</a> <!-- Añadido -->
                <a href="#contacto" class="nav-link text-dark text-dark-hover-red">Contacto</a>
                <a href="blog.php" class="nav-link text-dark text-dark-hover-red">Blog</a>
            </nav>
        </div>
    </header>


    <main class="pt-20">
        <!-- Sección de imagen de fondo -->
        <!-- Sección de imagen de fondo -->
        <section id="home" class="relative h-screen flex flex-col justify-center items-center bg-cover bg-center text-center" style="background-image: url('images/inicio/BACKGROUND-1157x500-01.png'); height: 600px;">
        
        <div style="display: block;
                    width: 100%;
                    height: 600px;
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 1;
                    background: rgba(0, 0, 0, 83%);"></div>
            <!-- Superposición -->
            <!-- Contenido -->
            <div class="relative z-10 text-white px-6 py-4 section-content">
                <!-- Título -->
                <h1 class="text-3xl md:text-3xl lg:text-3xl">ORAMEX</h1> <!-- Ajuste del tamaño y margen del título -->
                <h2 class="text-xl md:text-xl lg:text-xl mb-4">ORACLE USER GROUP-MÉXICO</h2>
                <h1 class="text-6xl md:text-8xl lg:text-8xl mb-8">REGISTRO</h1> <!-- Ajuste del tamaño y margen del título --> <!-- Ajuste del tamaño y margen del título -->
                <!-- Texto -->
                <div class="flex flex-col md:flex-row w-full max-w-4xl mx-auto space-y-6 md:space-y-0 md:space-x-6">
                    <!-- Div derecho (opcional) -->
                    <div class="w-full md:w-1/2 text-center">
                        <!-- Contenido para el lado derecho (si es necesario) -->
                    </div>
                </div>
            </div>
        </section>  
        <br>
        <br>

<style>
    table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

</style>
    <h1>Registro de Asistentes para el Evento</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($asistentes) > 0): ?>
                <?php foreach ($asistentes as $asistente): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($asistente['id']); ?></td>
                        <td><?php echo htmlspecialchars($asistente['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($asistente['email']); ?></td>
                        <td><?php echo htmlspecialchars($asistente['telefono']); ?></td>
                        <td><?php echo $asistente['status'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No hay asistentes registrados para este evento.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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
    // Array de rutas de las imágenes del carrusel
    const images = [
        'images/galeria/368472168_762283882570730_1467144831897777091_n.jpg',
        'images/galeria/368481645_762283842570734_5018006538102545941_n.jpg',
        'images/galeria/368515226_762283859237399_2640520836912117864_n.jpg'
    ];
    let currentIndex = 0;
    const carouselElement = document.getElementById('carousel');

    // Cambiar imagen cada 5 segundos
    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        carouselElement.style.backgroundImage = `url('${images[currentIndex]}')`;
    }, 5000);

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
            'index.php': 'Inicio',
            'eventos.php': 'Eventos',
            'galeria.html': 'Galería',  // Asegúrate de usar el nombre correcto del archivo de galería
            'contacto.html': 'Contacto',
            'blog.html' : 'Blog'  // Asegúrate de usar el nombre correcto del archivo de contacto
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

