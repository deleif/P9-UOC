<!DOCTYPE html>
<html lang="es">

<head>
    <title>JDA</title>
    <meta charset="UTF-8">
    <meta name="JDA" content="WEB JDA">
    <LINK REL=StyleSheet HREF="assets/css/estilo.css" TYPE="text/css" MEDIA=screen>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>


<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <div id="container">

        <!--IMAGEN CORPORATIVA-->
        <!--<div id="cabecera">
            <a title="Inicio" href="index.php"><img src="assets/images/logotipo.png" alt="logo corporativo" width="80%" height="90%" /></a>
        </div>-->

         <!--IMAGEN CORPORATIVA, hago cambio por vídeo-->
        <header>
                <div class="overlay" id="header"></div>
                    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                        <source src="assets/videos/video_3.mp4" type="video/mp4">
                    </video>
                    <div class="container h-100">
                        <div class="d-flex h-100 text-center align-items-center">
                        <div class="w-100 text-white">
                        <a title="Inicio" href="index.php"><h1 class="display-3">JDA Cervezas</h1></a>
                            <p class="lead mb-0">Tu opinión importa</p>
                    </div>
                </div>
        </header>

        <!--MENÚ NAVBAR-->
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href='?c=Web&a=Crud'">Productos <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="?c=Web&a=ListarTipoCategorias" id="navbardrop" data-toggle="dropdown">Categorías</a>
                    <div class="dropdown-menu">
                        <?php foreach($this->categorias->ListarTipoCategorias() as $r): ?>
                            <a class="dropdown-item" href="?c=Web&a=VerProductosCategorias&id_categoria=<?php echo $r->id_categoria; ?> "><?php echo $r->descripcion_categoria; ?></a>
                        <?php endforeach; ?>                  
                    </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href = '?c=Web&a=Admin'>Administración<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <button style="margin-right: 1%" type="button" onclick="location.href = '?c=Web&a=Login_usuario'" class="btn btn-success">Inicio sesión</button>
                <button type="button" onclick="location.href = '?c=Web&a=Registro_usuario'" class="btn btn-danger">Registrarse</button>
         
        </nav>

        <!--CUERPO CONTENEDOR-->
        <div id="cuerpo">