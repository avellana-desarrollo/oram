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
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KMCBWWX8');</script>
<!-- End Google Tag Manager -->


</head>

<style>
    
    body {
        font-family: 'Montserrat', sans-serif;
        
        
    }
    
</style>

<body class="bg-gray-100 scroll-behavior">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KMCBWWX8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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

    <main class="pt-20">
        <!-- Sección de imagen de fondo -->
            <!-- Sección de imagen de fondo -->
        <style>
        /* Estilos adicionales si es necesario */
        .section-title {
            text-align: center;
            margin-left: 0.7rem; /* Espacio entre los títulos */
        }
        
        .pleca-principal {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            padding: 0 100px !important;
        }
        
        
    </style>
        <!-- Sección de imagen de fondo -->
        
        
        

        <div class="slider-principal">
        
        <section id="home" class="pleca-principal relative h-screen bg-cover bg-center" style="background-image: url('images/inicio/DSC_0168.JPG'); height: 100vh;">
            
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
                
                    <div class="block text-left"> 
                    <h1 class="text-xl md:text-xl lg:text-4xl mb-4"><span class="text-4xl"><b>Unimos a profesionales</b></span> de ORACLE<br> a través de nuestros <span class="text-4xl"><b>eventos anuales</b></span>.</h1> <!-- Ajuste del tamaño y margen del título -->
                    
                    <a style="margin-top: 10px;" class="btntt-3 text-white px-6 py-3 rounded-lg font-semibold" href="#video-pr">Conócenos</a>
                    
                    <!-- Texto -->
                    <div class="flex flex-col md:flex-row w-full max-w-4xl mx-auto space-y-6 md:space-y-0 md:space-x-6">
                        <!-- Div derecho (opcional) -->
                        <div class="w-full md:w-1/2 text-center">
                            <!-- Contenido para el lado derecho (si es necesario) -->
                        </div>
                    </div>
                    </div>
                    
                </div>
            </section>
        
            <section id="home" class="pleca-principal relative h-screen bg-cover bg-center" style="background-image: url('images/inicio/IMG_8222.png'); height: 100vh;">
            
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
                
                    <div class="block text-left"> 
                    <h1 class="text-xl md:text-xl lg:text-4xl mb-4">Comunidad líder de usuarios<br> de tecnología <span class="text-4xl"><b>ORACLE en México</b></span>.</h1> <!-- Ajuste del tamaño y margen del título -->
                    
                    <a style="margin-top: 10px;" class="btntt-3 text-white px-6 py-3 rounded-lg font-semibold" href="galeria.html">Conócenos</a>
                    
                    <!-- Texto -->
                    <div class="flex flex-col md:flex-row w-full max-w-4xl mx-auto space-y-6 md:space-y-0 md:space-x-6">
                        <!-- Div derecho (opcional) -->
                        <div class="w-full md:w-1/2 text-center">
                            <!-- Contenido para el lado derecho (si es necesario) -->
                        </div>
                    </div>
                    </div>
                    
                </div>
            </section>
            
            <section id="home" class="pleca-principal relative h-screen bg-cover bg-center" style="background-image: url('images/inicio/DSC_0160.JPG'); height: 100vh;">
            
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
                
                    <div class="block text-left"> 
                    <h1 class="text-xl md:text-xl lg:text-4xl mb-4"><span class="text-4xl"><b>Fomentamos la colaboración</b></span><br> y el intercambio técnico.</h1> <!-- Ajuste del tamaño y margen del título -->
                    
                    <a style="margin-top: 10px;" class="btntt-3 text-white px-6 py-3 rounded-lg font-semibold" href="blog.php">Conócenos</a>
                    
                    <!-- Texto -->
                    <div class="flex flex-col md:flex-row w-full max-w-4xl mx-auto space-y-6 md:space-y-0 md:space-x-6">
                        <!-- Div derecho (opcional) -->
                        <div class="w-full md:w-1/2 text-center">
                            <!-- Contenido para el lado derecho (si es necesario) -->
                        </div>
                    </div>
                    </div>
                    
                </div>
            </section>
            
            
            
        </div>
        
        
        
        <style>
        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .z-10 {
            z-index: 10;
        }

        .z-20 {
            z-index: 20;
        }

        /* Archivo CSS personalizado, por ejemplo styles.css */
.custom-height-400px {
    height: 500px;
    width: 500px;
}

.custom-height-250px {
    height: 450px;
    width: 370px;
}

        </style>

        <!-- Nueva sección con dos columnas -->
<!-- Asegúrate de incluir la biblioteca de Font Awesome en tu HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Nueva sección con dos columnas más grande -->
<section class="py-24" style="backgrounf: #f4f4f4;">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Div izquierdo con imágenes en collage -->
            <div class="w-full md:w-1/2 mb-6 md:mb-0 md:mr-6 relative">
                <div class="relative w-full h-96">
                    <style>
                        .imagen2{
                            object-fit: cover;
                        }
                    </style>
                    <img src="images/inicio/imag2.jpg" alt="ORAMEX" class="w-3/4 custom-height-400px imagen2 absolute bottom-0 left-0 z-10">
                    <img src="images/galeria/DSC_0303.JPG" alt="Imagen 2" class="w-3/4 custom-height-250px imagen2 absolute top-8 right-0 z-20 border-8 border-white">

                    <!-- Icono de video circular -->
                    <div class="absolute bottom-0 left-1/4 transform -translate-x-1/2 mb-4">
                        <a href="#" class="flex items-center justify-center w-16 h-16 bg-red-500 rounded-full border-4 border-white">
                            <i class="fas fa-video text-white text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <style>
                .icon-container {
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Alinea los íconos a la izquierda */
            }

            .icon-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px; /* Espacio entre los íconos */
                color: #B62226; /* Color de los íconos y el texto */
            }

            .icon-item i {
                margin-right: 8px; /* Espacio entre el ícono y el texto */
            }

            .icon-text {
                color: #000000; /* Color negro para el texto */
            }

            /* Contenedor del botón */
.button-container {
    text-align: center; /* Centra el botón horizontalmente */
    margin-top: 20px; /* Espacio superior para separar del contenido superior */
}

/* Estilo del botón */
.btn-gradient {
    display: inline-block;
    padding: 15px 30px; /* Tamaño grande del botón */
    font-size: 18px; /* Tamaño del texto del botón */
    font-weight: bold;
    color: #ffffff; /* Color del texto del botón */
    background: #B62226; /* Gradiente de fondo */
    border-radius: 30px; /* Bordes redondeados */
    text-decoration: none;
    text-align: center;
    margin: 0 auto; /* Centra el botón dentro del contenedor */
    display: inline-block; /* Asegura que el botón sea de tamaño adecuado */
}

.btn-gradient:hover {
    background: linear-gradient(45deg, #5b1210, #7A2A2A); /* Gradiente de fondo al pasar el mouse */
    cursor: pointer;
}

/* Media query para dispositivos móviles */
@media (max-width: 768px) {
    .section-container {
        padding: 2rem 0; /* Aumenta el espaciado en la sección en móviles */
    }

    .img-container {
        height: 20rem; /* Aumenta la altura de las imágenes en dispositivos móviles */
    }

    /* Ajustes generales para dispositivos móviles */
@media (max-width: 768px) {
    .pt-8 {
        padding-top: 5rem; /* Ajusta según sea necesario */
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    .w-full {
        width: 100%;
    }
}

}


            </style>
            <!-- Div derecho dividido en dos partes -->
            <div class="w-full md:w-1/2 flex flex-col pt-8">
                <!-- Sección superior -->
                <div class="mb-8">
                    <h4 class="text-xl gradient-text mb-4">ACERCA DE <b>NUESTROS EVENTOS</b></h4> <!-- Título principal -->
                    <h2 class="text-3xl font-normal text-gray-800 mb-4">LA MEJOR CONFERENCIA PARA <b>NEGOCIOS Y TECNOLOGÍA</b></h2> <!-- Título principal -->
                    <p class="text-base text-gray-600"> Nos enorgullece reunir a los líderes más influyentes de la industria y a los profesionales más destacados.</p>
                    
                    <p class="text-base text-gray-600">Estos eventos ofrecen una oportunidad incomparable para conectar con expertos y explorar las últimas innovaciones que están moldeando el futuro del mundo.</p>
                </div>

                <!-- Contenido dividido en dos columnas -->
                <div class="flex">
                    <!-- Div izquierdo dentro del div derecho -->
                    <div class="w-1/2 pr-4">
                        <h3 class="text-xl font-normal text-gray-800 mb-4">ÚNETE A NUESTROS <b>EVENTOS ANUALES</b></h3> <!-- Subtítulo del div izquierdo -->
                        <p class="text-base text-gray-600 mb-6">Forma parte de la innovación tecnológica.</p>
                        <div class="icon-container">
                            <div class="icon-item">
                                <i class="fas fa-users"></i>
                                <span class="icon-text">Need working</span>
                            </div>
                            <div class="icon-item">
                                <i class="fas fa-user"></i>
                                <span class="icon-text">Speakers reconocidos a nivel interncional</span>
                            </div>
                            <div class="icon-item">
                                <i class="fas fa-briefcase"></i>
                                <span class="icon-text">Carrera laboral</span>
                            </div>

                            <!-- HTML -->
                            <!-- Contenedor del botón -->
                            <div class="button-container">
                                <a href="contactanos.php" class="btntt-2 text-white px-6 py-3 rounded-lg font-semibold">MÁS INFORMACIÓN</a>
                            </div>

                        </div>
                    </div>

                    <!-- Div derecho dentro del div derecho -->
                    <div class="w-1/2 pl-4">

                    <style>
                        .imagen_derecha{
                            width: 100%;
                            height: 350px;
                            object-fit: cover;
                        }
                    </style>
                        <img src="images/galeria/DSC_0096.JPG" alt="Imagen Derecha" class="imagen_derecha border-4 border-white">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<style>
    /* Estilo general para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    
    /* Estilo para la imagen y el texto en la tabla */
    .table-image {
        width: 300px; /* Ajusta el tamaño según tus necesidades */
        height: auto;
        object-fit: cover;
        margin-left:50px;
    }
    .table-text {
        padding: 10px;
        text-align: left;
    }
    
    /* Estilo para las filas de la tabla */
    tr {
        display: flex;
        align-items: center;
    }
    td {
        flex: 1;
        padding: 50px;
    }
    
    /* Ajuste para dispositivos móviles */
    @media (max-width: 768px) {
        .table-image {
            width: 300px; /* Hace que la imagen ocupe el ancho completo en pantallas pequeñas */
            height: auto;
            margin-bottom: 10px;
        }
        .table-text {
        }
        tr {
            flex-direction: column;
        }
        td {
            display: block;
            width: 100%;
        }
        th {
            display: none; /* Oculta los encabezados en pantallas pequeñas */
        }
    }
    .btnt {
        background: #252525;
        border-radius: 100px 100px;
    }
</style>

        
        <!-- Nueva sección con imagen de fondo, texto y video de YouTube -->
        <section id="video" class="relative bg-cover bg-center text-item" style="">
    <!-- Contenido -->
    <div class="relative z-10 container mx-auto px-6 py-12 flex flex-col items-center justify-center h-full">
        <div class="flex flex-col md:flex-row items-center justify-center w-full">
            <!-- Div izquierdo con texto centrado -->
            <div class="w-full text-center flex flex-col items-center justify-center text-white mb-6 md:mb-0 md:pl-6">
                <div class="mb-8">
                    <h2 class="text-8xl">
                        
                        <span class="font-normal" style="font-weight: bold; font-size:50px;">EVENTOS</span>
                    </h2>
                </div>
                <p class="text-xl mb-6">No dejes pasar la oportunidad de participar en nuestros eventos anuales.<br> Descubre más detalles y únete a nosotros para una experiencia inolvidable.</p>
                <a href="contactanos.php" class="btntt-2 text-white px-6 py-3 rounded-lg font-semibold">MÁS EVENTOS</a>
            </div>
        </div>
        <!-- Tabla -->
        <!-- Tabla -->
<div class="w-full mt-12 overflow-x-auto">
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

    // Consultar los 5 eventos más lejanos
    $sql = "SELECT 
                id,
                imagen_url, 
                titulo, 
                fecha_evento, 
                nombre_ubicacion, 
                status
            FROM eventos 
            ORDER BY fecha_evento DESC
            LIMIT 5";
    $resultado = $conexion->query($sql);

    // Verificar si hay resultados
    if ($resultado && $resultado->num_rows > 0) {
        echo '<table class="min-w-full bg-white border border-gray-200 mx-auto text-center text-black table-auto">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>';
        while ($row = $resultado->fetch_assoc()) {
            // Formatear fecha en el formato deseado
            $fecha = new DateTime($row['fecha_evento']);
            $fecha_formateada = $fecha->format('d/m/Y \a \l\a\s h:i A');

            // Mostrar fila de la tabla
            echo '<tr class="border-b border-gray-200">
                    <td class="py-3 px-4 text-sm">
                        <img src="images/eventos/' . htmlspecialchars($row['imagen_url']) . '" alt="Imagen del Evento" class="w-[100%]">
                    </td>
                    <td>
                        <div class="flex text-lg items-center font-bold mb-1">' . htmlspecialchars($row['titulo']) . '</div>
                        <div class="">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <span>' . $fecha_formateada . '</span>
                        </div>
                        <div class="mb-6">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>' . htmlspecialchars($row['nombre_ubicacion']) . '</span>
                        </div>
                        
                        <a href="evento.php?id=' . htmlspecialchars($row['id']) . '&status=' . htmlspecialchars($row['status']) . '" class="btntt-2 inline-block mt-6 text-white px-6 py-3 rounded-lg font-semibold">Ver Evento</a>
                    </td>
                </tr>';
        }
        echo '</tbody>
            </table>';
    } else {
        echo '<p class="text-center text-gray-600">No hay eventos disponibles.</p>';
    }

    // Cerrar conexión
    $conexion->close();
?>
</div>

    </div>
</section>



    <style>
    
        .btntt-3 {
            display: inline-block;
            background: #e71912 !important;
            border-radius: 100px !important;
            color: #ffffff !important;
            text-decoration: none !important;
            
        }
        
        .btntt-3:hover {
            
            background: #b90f0a !important;
            
        }
        
        .btntt-2 {
            
            background: #252525 !important;
            border-radius: 100px !important;
            color: #ffffff !important;
            text-decoration: none !important;
            
        }
        
        .btntt-2:hover {
            
            background: #484747 !important;
            
        }
    
        /* Estilo del contenedor de la cuadrícula */
        /* Estilo del contenedor de la cuadrícula */
.grid-container {
    display: grid;
    gap: 0;
    padding: 0;
}

/* Estilo de los elementos de la cuadrícula */
.grid-item {
    position: relative;
    overflow: hidden;
    /* El tamaño se ajustará automáticamente según la pantalla */
    width: 100%;
    height: auto;
}

/* Estilo de las imágenes dentro de los elementos de la cuadrícula */
.grid-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Estilo del overlay del título */
.title-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(110, 21, 18, 0.8);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: flex-start;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 10px;
}

/* Mostrar el overlay al pasar el cursor */
.grid-item:hover .title-overlay {
    opacity: 1;
}

/* Estilo del título en el overlay */
.title-overlay h4 {
    margin: 0;
    font-size: 1.5em;
}

/* Estilo del texto de la cuadrícula */
.text-item {
    background: linear-gradient(135deg, #6E1512, #A52A29);
    color: white;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 100%;
}

/* Estilo del título en el texto de la cuadrícula */
.text-item h2 {
    margin: 0;
    font-size: 2em;
}

/* Estilo del enlace del botón */
.button-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: white;
    color: red;
    border: none;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    font-size: 1em;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

/* Estilo del enlace del botón al pasar el cursor */
.button-link:hover {
    background: linear-gradient(135deg, #6E1512, #A52A29);
    color: white;
}

/* Media queries para hacer la cuadrícula responsiva */
@media (min-width: 1200px) {
    .grid-container {
        grid-template-columns: repeat(5, 1fr);
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .grid-container {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .grid-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 576px) and (max-width: 767px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 575px) {
    .grid-container {
        grid-template-columns: 1fr;
    }
}

.titulo-speakers {
    font-size: 28px !important;
}
.texto_patro{
    font-size: 5em;
}

</style>

<!-- Sección de información con título, texto y tabla de imágenes -->
<div class="info-section">
    <h1 class="gradient-text" ><b>PATROCINADORES</b></h1>
    <h4 style="text-transform: uppercase;">Nuestros <b>socios y patrocinadores</b> oficiales</h4>
    <p class="texto_patro" style="font-size: 20px;">Conoce a los socios y patrocinadores que han hecho posible nuestros eventos
    y proyectos.<br> <b>Su apoyo es fundamental para nuestro éxito.</b></p>
    
    <!-- Tabla con dos columnas y una fila de imágenes -->
    <table class="image-table">
        <tr>
            <td>
            <a href="https://www.certificatic.org/" target="_black">
            <img src="images/patrocinadores/cetificatic-logo-negro.png" alt="CERTIFICATIC">
            </a>
            </td>
            
            <td>
            <a href="https://spsolutions.com.mx/" target="_black">
            <img src="images/patrocinadores/sps.webp" alt=" SP SOLUTIONS">
            </a>
            </td>
            
            <td>
            <a href="https://dbvisit.com/" target="_black">
            <img src="images/patrocinadores/LOGO-DB-COLOR.png" alt="DBVISIT">
            </a>
            </td>
        </tr>
    </table>
</div>

<!-- Sección de imágenes en una cuadrícula -->
<!-- Sección con título, texto y cuadrícula de imágenes -->
<div class="grid-container">
    <div class="grid-item text-item">
        <h2 style="font-size: 20px;">ALGUNOS DE NUESTROS <b>SPEAKERS</b></h2>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_4.png" alt="Rolando Carrasco">
        <div class="title-overlay">
            <h4>Rolando Carrasco</h4>
            <h6>ACE Director</h6>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_9.png" alt="Adrián Castillo">
        <div class="title-overlay">
            <h4>Adrián Castillo</h4>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_1.png" alt="Sean Scott">
        <div class="title-overlay">
            <h4>Sean Scott</h4>
            <h6>ACE Director</h6>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_7.png" alt="Gustavo González">
        <div class="title-overlay">
            <h4>Gustavo González</h4>
            <h6>ACE Director</h6>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG-01.png" alt="Rita Nuñez">
        <div class="title-overlay">
            <h4>Rita Nuñez</h4>
            <h6>ACE Director</h6>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG-02.png" alt="Edelweis Kammermann">
        <div class="title-overlay">
            <h4>Edelweis Kammermann</h4>
            <h6>ACE Director</h6>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_5.png" alt="Edward Roske">
        <div class="title-overlay">
            <h4>Edward Roske</h4>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_6.png" alt="Francisco Muñoz">
        <div class="title-overlay">
            <h4>Francisco Muñoz</h4>
        </div>
    </div>
    <div class="grid-item">
        <img src="images/speak/IMG ORACLE_8.png" alt="Dario Valtierra">
        <div class="title-overlay">
            <h4>Dario Valtierra</h4>
        </div>
    </div>
</div>


<!-- Sección de información con título, texto y tabla de imágenes -->
<div id="video-pr" class="info-section">
    <h1 style="font-size:50px;  line-height: 50px;" class="gradient-text"><b>ORAMEX</b></h1>
    <h4><b>ORACLE USER GROUP MEXICO</b></h4>
    <p class="texto_patro" style="font-size: 20px;">Somos el puente entre los profesionales de la tecnología <b>ORACLE</b> y las empresas mexicanas.</p>
    
    <div style="margin-top: 75px; display: flex; align-items: center; justify-content: center;">
    
        <iframe width="75%" height="715px" src="https://www.youtube.com/watch?v=AbYmRVTfJys" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        
    </div>
</div>


<style>
    /* Estilo de la sección de información */
.info-section {
    padding: 100px 0;
    background: #f4f4f4;
    text-align: center;
}

.info-section h4 {
    font-size: 1.5em;
    margin: 10px 0;
}

.info-section h1 {
    font-size: 2.5em;
    margin: 10px 0;
}

.info-section p {
    font-size: 1em;
    margin: 10px 0;
}

/* Estilo de la tabla de imágenes */
.image-table {
    margin: 20px auto;
    border-collapse: collapse;
    width: 100%;
    max-width: 1500px; /* Ajusta el ancho máximo si es necesario */
}

.image-table td {
    padding: 50px;
    text-align: center;
    vertical-align: middle;
    position: relative;
}

.image-table td:not(:last-child)::after {
    content: "";
    display: block;
    position: absolute;
    right: 0;
    top: 0;
    width: 1px;
    height: 100%;
    background: #ddd;
    z-index: 1;
}

.image-table img {
    width: 250px; /* Ajusta el tamaño de las imágenes para pantallas más pequeñas */
    object-fit: cover;
    display: block;
    margin: 0 auto;
    transition: filter 0.3s ease;
}

/* Media queries para hacer la sección responsiva */
@media (min-width: 1200px) {
    .info-section h1 {
        font-size: 2.5em;
    }
    .info-section h4 {
        font-size: 1.5em;
    }
    .info-section p {
        font-size: 1em;
    }
}

@media (min-width: 992px) and (max-width: 1199px) {
    .info-section h1 {
        font-size: 2.2em;
    }
    .info-section h4 {
        font-size: 1.4em;
    }
    .info-section p {
        font-size: 0.9em;
    }
}

@media (min-width: 768px) and (max-width: 991px) {
    .info-section h1 {
        font-size: 1.8em;
    }
    .info-section h4 {
        font-size: 1.2em;
    }
    .info-section p {
        font-size: 0.8em;
    }
}

@media (max-width: 767px) {
    .info-section h1 {
        font-size: 1.6em;
    }
    .info-section h4 {
        font-size: 1em;
    }
    .info-section p {
        font-size: 0.7em;
    }

    /* Ajustes para la tabla en pantallas pequeñas */
    .image-table img {
        width: 120px; /* Ajusta el tamaño de las imágenes para pantallas pequeñas */
    }
    
    .image-table td:not(:last-child)::after {
        display: none; /* Elimina las líneas divisorias en pantallas pequeñas */
    }
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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Script Slider Principal -->
    <script>
        $('.slider-principal').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" id="anterior" title="Anterior" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" id="siguiente" title="Siguiente" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            arrows: false,
            focusOnSelect: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 4000,
    
            responsive: [
                {
                breakpoint: 1281,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        focusOnSelect: true,
                    }
                },
                {
                breakpoint: 850,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        focusOnSelect: true,
                    }
                },
                {
                breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        focusOnSelect: true,
                    }
                },
                {
                breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        focusOnSelect: true,
                        arrows: false,
                    }
                },
                {
                breakpoint: 360,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        focusOnSelect: true,
                        arrows: false,
                    }
                }
            ]
        });
    </script>
    
</body>
</html>
