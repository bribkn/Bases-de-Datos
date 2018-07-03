<style>
    /* TABLES */
    table { font-family: arial, sans-serif; border-collapse: collapse; max-width: 200px; width: 100%; }
    td, th { text-align: center; color: black; }
    th { background-color: #dddddd; font-weight: normal; }

    tr:nth-child(odd) { background-color: #dddddd; }
    tr:nth-child(even) { background-color: #ffffff; }

    .custom-table{ margin:0px; }
    table { border-collapse: separate; border-spacing: 0; min-width: 350px; }

    table.Info tr th,
    table.Info tr:first-child td{ border-top: 1px solid #bbb; }

    /* top-left border-radius */
    table tr:first-child th:first-child,
    table.Info tr:first-child td:first-child { border-top-left-radius: 6px; }

    /* top-right border-radius */
    table tr:first-child th:last-child,
    table.Info tr:first-child td:last-child { border-top-right-radius: 6px; }

    /* bottom-left border-radius */
    table tr:last-child td:first-child { border-bottom-left-radius: 6px; }

    /* bottom-right border-radius */
    table tr:last-child td:last-child { border-bottom-right-radius: 6px; }
</style>
<div class="articulo">
    <article>
        <div style="overflow-x:auto;">

        <?php
            //DB CONNECTION//
            require_once 'inc/config/config.php';

            //STARTING SESSION//
            session_start();

            if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
                die ("<h2>Debes estar conectado para ver esta página.</h2></article></div>");
            }

            //GET USER DATA//
            $nickname = $_SESSION['username'];
            $sql = "SELECT * FROM usuarios, roles WHERE usuarios.rut = roles.usuario_rut AND usuarios.nick = '$nickname'";
            $result = pg_query($connection, $sql);
            $datos = pg_fetch_row($result);
        ?>

        <titulo><h2>Mi cuenta</h2></titulo>

        <center><subtitulo><h4>Mis datos</h4></subtitulo>

        <table>
            <tr> <th><b>RUT</b></th> <th> <?php echo $datos[0]; ?> </th> </tr>
            <tr> <td><b>Nick</b></td> <td> <?php echo $datos[1]; ?> </td> </tr>
            <tr> <td><b>Nombre</b></td> <td> <?php echo $datos[3]; ?> </td> </tr>
            <tr> <td><b>Apellido</b></td> <td> <?php echo $datos[4]; ?> </td> </tr>
            <tr> <td><b>Teléfono</b></td> <td> <?php echo $datos[5]; ?> </td> </tr>
            <tr> <td><b>Dirección</b></td> <td> <?php echo $datos[6]; ?> </td> </tr>
            <tr> <td><b>Rol</b></td> <td> <?php echo $datos[8]; ?> </td> </tr>
        </table></center>
        <br>
        <center><h4>Click <a href="index.php?page=logout">AQUÍ</a> para desconectarte.</h4></center>

    </article>
</div>
