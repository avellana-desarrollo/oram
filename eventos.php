<?php
        session_start();

        // Conexión a la base de datos
        $host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos

        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($conexion->connect_error) {
            die('Conexión fallida: ' . $conexion->connect_error);
        }

        // Inicializar una variable para el mensaje de error
        $error_message = '';

        // Comprobar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare("SELECT * FROM login WHERE usuario = ? AND contrasena = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Credenciales correctas, mostrar botón
                $_SESSION['loggedin'] = true;
            } else {
                // Establecer el mensaje de error
                $error_message = 'Usuario o contraseña incorrectos';
            }

            $stmt->close();
        }

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
    <style>
        /* Estilo para el icono de login grande */
        .login-icon {
            font-size: 2.5rem; /* Tamaño del icono */
            cursor: pointer;
        }

        /* Estilo para el formulario de login flotante */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .login-section {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #1a202c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary:hover {
            background-color: #2d3748;
        }

        .btn-redondo {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px; /* Cambia el valor para ajustar el redondeo de las esquinas */
            background-color: red;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none; /* Asegúrate de que no haya borde */
            transition: background-color 0.3s; /* Efecto de transición en el color de fondo */
        }

        .btn-redondo:hover {
            background-color: darkred; /* Color de fondo en el hover */
        }

        /* Estilo para los botones de icono */
.btn-modificar, .btn-registro {
    position: absolute;
    bottom: 10px;
    background-color: white; /* Fondo blanco para los botones */
    border-radius: 50%; /* Bordes redondeados para los botones */
    padding: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Sombra sutil */
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-modificar {
    right: 50px; /* Ajusta la posición para el ícono de lápiz */
}

.btn-registro {
    right: 10px; /* Ajusta la posición para el ícono de registro */
}

.btn-modificar:hover, .btn-registro:hover {
    background-color: #f0f0f0; /* Color de fondo al pasar el ratón */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Sombra más intensa al pasar el ratón */
}

.btn-modificar img, .btn-registro img {
    width: 24px; /* Ajusta el tamaño del ícono */
    height: 24px;
}




    </style>
</head>

<style>
    
    body {
        font-family: 'Monserrat', sans-serif;
    }
    
</style>

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
                <a href="index.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Inicio</a>
                <a href="eventos.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Eventos</a>
                <a href="galeria.html" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Galería</a>
                <a href="blog.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Blog</a>
                <a href="contactanos.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Contacto</a>
                
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
            <img src="images/logos/ICONOS-10-USUARIO.png" alt="Facebook" class="login-icon" id="login-icon">
            
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
                <a href="index.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Inicio</a>
                <a href="eventos.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Eventos</a>
                <a href="galeria.html" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Galería</a>
                <a href="blog.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Blog</a>
                <a href="contactanos.php" class="nav-link text-dark text-dark-hover-red" style="font-weight: bold;">Contacto</a>
                
            </nav>
        </div>
    </header>

    
    <style>
    
        .pleca-principal {
            margin-top: 100px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            padding: 0 100px !important;
        }
        
    </style>
        

    <main class="">
        <!-- Sección de imagen de fondo -->
        <section id="home" class="pleca-principal relative h-screen bg-cover bg-center" style="background-image: url('images/inicio/BACKGROUND-1157x500-01.png'); height: 100vh;">
        
            <div style="display: block;
                    width: 100%;
                    height: 100vh;
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 1;
                    background: rgba(0, 0, 0, 83%);"></div>
            
            <!-- Superposición -->
            <!-- Contenido -->
            <div class="relative z-10 text-white px-6 py-4">
                <!-- Título -->
                <h1 class="text-3xl md:text-3xl lg:text-3xl">ORAMEX</h1> <!-- Ajuste del tamaño y margen del título -->
                <h2 class="text-xl md:text-xl lg:text-xl mb-4">ORACLE USER GROUP-MÉXICO</h2>
                <h1 class="text-7xl md:text-3xl lg:text-7xl mb-8"><b>EVENTOS</b></h1> <!-- Ajuste del tamaño y margen del título --> <!-- Ajuste del tamaño y margen del título -->
                <!-- Texto -->
                <div class="flex flex-col md:flex-row w-full max-w-4xl mx-auto space-y-6 md:space-y-0 md:space-x-6">
                    <!-- Div derecho (opcional) -->
                    <div class="w-full md:w-1/2 text-center">
                        <!-- Contenido para el lado derecho (si es necesario) -->
                    </div>
                </div>
            </div>
        </section>

        <?php
        session_start();

        // Conexión a la base de datos
        $host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos

        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($conexion->connect_error) {
            die('Conexión fallida: ' . $conexion->connect_error);
        }

        // Inicializar una variable para el mensaje de error
        $error_message = '';

        // Comprobar si el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Preparar y ejecutar la consulta
            $stmt = $conexion->prepare("SELECT * FROM login WHERE usuario = ? AND contrasena = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                // Credenciales correctas, mostrar botón
                $_SESSION['loggedin'] = true;
            } else {
                // Establecer el mensaje de error
                $error_message = 'Usuario o contraseña incorrectos';
            }

            $stmt->close();
        }

        $conexion->close();
        ?>

        <!-- Mostrar botón si está autenticado -->
        <!-- Mostrar botón si está autenticado -->
<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
    <a href="nuevoEvento.php" class="btn-redondo">Añadir Evento</a>
<?php else: ?>
    <!-- Mostrar mensaje de error si existe -->
    <?php if ($error_message): ?>
        <script>
            showError("<?php echo $error_message; ?>");
        </script>
    <?php endif; ?>
<?php endif; ?>

<section id="eventos" class="container mx-auto px-6 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $host = 'localhost'; // O la dirección IP del servidor MySQL
$usuario = 'avellan3_AlanJ'; // Tu usuario de MySQL
$contrasena = 'fupduv-dynwom-9bymPo'; // Tu contraseña de MySQL
$base_de_datos = 'avellan3_oramex'; // Nombre de la base de datos
        
        $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);
        
        if ($conexion->connect_error) {
            die('Conexión fallida: ' . $conexion->connect_error);
        }
        
        $sql = "SELECT id, titulo AS nombre, imagen_url AS imagen, fecha_evento AS fecha FROM eventos";
        $resultado = $conexion->query($sql);
        
        if ($resultado && $resultado->num_rows > 0) {
            $eventos = [];
            while ($row = $resultado->fetch_assoc()) {
                $fecha = new DateTime($row['fecha']);
                $fecha_formateada = $fecha->format('d-m-Y');
                $row['fecha'] = $fecha_formateada;
                $eventos[] = $row;
            }
        } else {
            $eventos = [];
        }

        function comparar_fechas($a, $b) {
            return strtotime($b['fecha']) - strtotime($a['fecha']);
        }

        usort($eventos, 'comparar_fechas');

        $current_date = date('Y-m-d H:i:s');

        foreach ($eventos as $evento) {
            $event_date = $evento['fecha'];
            $is_past_event = (strtotime($event_date) < strtotime($current_date));
            $event_id = htmlspecialchars($evento['id']);
            $event_status = $is_past_event ? 0 : 1; // 0 para eventos pasados, 1 para eventos futuros o actuales
        
            if ($is_past_event) {
                $update_sql = "UPDATE eventos SET status = 0 WHERE id = ?";
                $stmt = $conexion->prepare($update_sql);
                $stmt->bind_param('i', $event_id);
                $stmt->execute();
                $stmt->close();
            }
        
            $event_link = 'evento.php?id=' . $event_id . '&status=' . $event_status;
        
            echo '<div class="evento transform transition-transform duration-300 hover:scale-105 hover:shadow-lg cursor-pointer relative" onclick="window.location.href=\'' . $event_link . '\'">';
            echo '<div class="evento-image">';
            echo '<img src="images/eventos/' . htmlspecialchars($evento['imagen']) . '" alt="' . htmlspecialchars($evento['nombre']) . '">';
            echo '</div>';
            echo '<div class="evento-overlay">';
            echo '<div class="evento-text">';
            echo '<div class="evento-title">' . htmlspecialchars($evento['nombre']) . '</div>';
            echo '<div class="evento-date">' . htmlspecialchars($evento['fecha']) . '</div>';
            echo '</div>';
            echo '</div>';
        
            // Verificar si el usuario está autenticado y mostrar el icono de lápiz
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<div class="btn-modificar" onclick="event.stopPropagation(); window.location.href=\'editarevento.php?id=' . $event_id . '\'">';
                echo '<i class="fas fa-pencil-alt"></i>'; // Icono de lápiz
                echo '</div>';

                echo '<div class="btn-registro" onclick="event.stopPropagation(); window.location.href=\'registrosevent.php?id=' . $event_id . '\'">';
                echo '<i class="fas fa-user-plus"></i>';
                echo '</div>';
            }
        
            echo '</div>';
        }

        $conexion->close();
        ?>
    </div>
</section>

<style>
    .evento {
    position: relative;
    overflow: hidden;
    /* Ajusta el tamaño del contenedor como sea necesario */
    width: 400px; /* Ejemplo de ancho fijo */
    height: 250px; /* Ejemplo de alto fijo */
}

.evento-image {
    width: 100%;
    height: 100%;
}

.evento-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Para mantener la relación de aspecto y centrado */
    display: block;
}

</style>





<style>

.contact-bubbles {
    position: fixed;
    right: 20px;
    bottom: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    z-index: 1000; /* Asegura que las burbujas estén por encima de otros elementos */
}

.bubble {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: white;
    font-size: 24px; /* Tamaño del icono */
    text-decoration: none; /* Sin subrayado */
    z-index: 1001; /* Asegura que cada burbuja individual esté por encima */
}

.bubble:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    color: white; /* Mantener el color blanco al pasar el cursor */
}

.whatsapp {
    background-color: #25D366; /* WhatsApp color */
}

.email {
    background-color: #0072C6; /* Email color */
}

.messenger {
    background-color: #0084FF; /* Messenger color */
}
</style>
<div class="contact-bubbles">
        <a href="https://api.whatsapp.com/send/?phone=%2B525619985023&text&type=phone_number&app_absent=0" target="_blank" class="bubble whatsapp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="mailto:contacto@oramex.mx" class="bubble email">
            <i class="fas fa-envelope"></i>
        </a>
        <a href="https://m.me/1557621645099979" target="_blank" class="bubble messenger">
            <i class="fab fa-facebook-messenger"></i>
        </a>
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

h5.widget-title:hover {
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





    <!-- Formulario de login flotante -->
    <div class="overlay" id="overlay"></div>
    <div class="login-section" id="login-section">
        <h2 class="text-xl font-bold mb-4">Iniciar Sesión</h2>
        <form action="eventos.php" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
            </div>
            <button type="submit" class="mt-6 bg-red-600 text-white px-6 py-2 rounded-lg">Iniciar Sesión</button>
        </form>
    </div>


    <script>

        function showError(message) {
                    alert(message);
                }

        document.getElementById('login-icon').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('login-section').style.display = 'block';
        });

        document.getElementById('overlay').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('login-section').style.display = 'none';
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

        function redirectToEvent(eventId) {
            window.location.href = 'evento.php?id=' + eventId;
        }
    </script>

    
</body>
</html>
