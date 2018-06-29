<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <!-- INCLUDE STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="inc/style.css">
        <link rel="stylesheet" href="inc/fonts.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>

    <!-- PAGE STARTS HERE -->
    <body style="background-color:#607f89">
        <!-- REQUIRE LOGIN & MENUS -->
        <?php
            include 'inc/menu_front.php';
            require_once 'inc/config.php';
        ?>

        <div class="container">
                <div class="wrapper">
                    Bienvenido al sistema base de datos del proyecto de transporte escolar. <br>
                    Utiliza el menú para navegar por el sitio.
                </div>
        </div>
    </body>
</html>
