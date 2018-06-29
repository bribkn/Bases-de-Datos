<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Busqueda en DB</title>
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
            <center>
                <div class="wrapper">
                    <?php
                        // get results from database
                        $query_alumnos = "SELECT * FROM alumnos;";
                        $result_alumnos = pg_query($connection, $query_alumnos);

                        // display data in table
                        echo "<p><h2>DB Alumnos</h2></p><br>";

                        echo "<div style='overflow-x:auto;'><table>";
                        echo "<thead><tr><th><center>ID</center></th> <th><center>Nombres</center></th> <th><center>Apellidos</center></th> <th><center>Nivel</center></th> <th><center>Patentes Furgon</center></th> <th><center>Curso</center></th> </thead>";

                        echo "<tbody>";
                        // loop through results of database query, displaying them in the table
                        while($fila = pg_fetch_row( $result_alumnos )) {
                            // echo out the contents of each row into a table
                            echo "<tr>";
                            echo '<td><center>' . $fila[0] . '</center></td>';
                            echo '<td><center>' . $fila[1] . '</center></td>';
                            echo '<td><center>' . $fila[2] . '</center></td>';
                            echo '<td><center>' . $fila[3] . '</center></td>';
                            echo '<td><center>' . $fila[4] . '</center></td>';
                            echo '<td><center>' . $fila[5] . '</center></td>';
                            echo "</tr>";
                        }
                        // close table>
                        echo "</tbody></table></div>";
                        echo "<br><br><br>";

                        // get results from database
                        $query_furgones = "SELECT * FROM furgones;";
                        $result_furgones = pg_query($connection, $query_furgones);

                        // display data in table
                        echo "<p><h2>DB Furgones</h2></p><br>";

                        echo "<div style='overflow-x:auto;'><table>";
                        echo "<thead><tr><th><center>Patentes</center></th> <th><center>Rut Tios</center></th> <th><center>Marcas</center></th> <th><center>Modelos</center></th> <th><center>Capacidad</center></th> <th><center>Año</center></th> </thead>";

                        echo "<tbody>";
                        // loop through results of database query, displaying them in the table
                        while($fila = pg_fetch_row( $result_furgones )) {
                            // echo out the contents of each row into a table
                            echo "<tr>";
                            echo '<td><center>' . $fila[0] . '</center></td>';
                            echo '<td><center>' . $fila[1] . '</center></td>';
                            echo '<td><center>' . $fila[2] . '</center></td>';
                            echo '<td><center>' . $fila[3] . '</center></td>';
                            echo '<td><center>' . $fila[4] . '</center></td>';
                            echo '<td><center>' . $fila[5] . '</center></td>';
                            echo "</tr>";
                        }
                        // close table>
                        echo "</tbody></table></div>";
                        echo "<br><br><br>";

                        // get results from database
                        $query_usuarios = "SELECT * FROM usuarios;";
                        $result_usuarios = pg_query($connection, $query_usuarios);

                        // display data in table
                        echo "<p><h2>DB Usuarios</h2></p><br>";

                        echo "<div style='overflow-x:auto;'><table>";
                        echo "<thead><tr><th><center>Rut</center></th> <th><center>Nick</center></th> <th><center>Password</center></th> <th><center>Nombre</center></th> <th><center>Apellidos</center></th> <th><center>Telefonos</center></th> <th><center>Dirección</center></th> </thead>";

                        echo "<tbody>";
                        // loop through results of database query, displaying them in the table
                        while($fila = pg_fetch_row( $result_usuarios )) {
                            // echo out the contents of each row into a table
                            echo "<tr>";
                            echo '<td><center>' . $fila[0] . '</center></td>';
                            echo '<td><center>' . $fila[1] . '</center></td>';
                            echo '<td><center>' . $fila[2] . '</center></td>';
                            echo '<td><center>' . $fila[3] . '</center></td>';
                            echo '<td><center>' . $fila[4] . '</center></td>';
                            echo '<td><center>' . $fila[5] . '</center></td>';
                            echo '<td><center>' . $fila[6] . '</center></td>';
                            echo "</tr>";
                        }
                        // close table>
                        echo "</tbody></table></div>";
                        echo "<br><br><br>";

                        // get results from database
                        $query_roles = "SELECT * FROM roles;";
                        $result_roles = pg_query($connection, $query_roles);

                        // display data in table
                        echo "<p><h2>DB Furgones</h2></p><br>";

                        echo "<div style='overflow-x:auto;'><table>";
                        echo "<thead><tr><th><center>Rut Usuario</center></th> <th><center>Rol</center></th> </thead>";

                        echo "<tbody>";
                        // loop through results of database query, displaying them in the table
                        while($fila = pg_fetch_row( $result_roles )) {
                            // echo out the contents of each row into a table
                            echo "<tr>";
                            echo '<td><center>' . $fila[0] . '</center></td>';
                            echo '<td><center>' . $fila[1] . '</center></td>';
                            echo "</tr>";
                        }
                        // close table>
                        echo "</tbody></table></div>";
                        echo "<br><br><br>";

                        // get results from database
                        $query_tiene = "SELECT * FROM tiene;";
                        $result_tiene = pg_query($connection, $query_tiene);

                        // display data in table
                        echo "<p><h2>DB Tiene</h2></p><br>";

                        echo "<div style='overflow-x:auto;'><table>";
                        echo "<thead><tr><th><center>Rut Usuario</center></th> <th><center>ID Alumno</center></th> </thead>";

                        echo "<tbody>";
                        // loop through results of database query, displaying them in the table
                        while($fila = pg_fetch_row( $result_tiene )) {
                            // echo out the contents of each row into a table
                            echo "<tr>";
                            echo '<td><center>' . $fila[0] . '</center></td>';
                            echo '<td><center>' . $fila[1] . '</center></td>';
                            echo "</tr>";
                        }
                        // close table>
                        echo "</tbody></table></div>";
                        echo "<br><br><br>";


                    ?>
                </div>
            </center>
        </div>
    </body>

    <script>
        function sortTable(table, col, reverse) {
            var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
                tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
                i;
            reverse = -((+reverse) || -1);

            tr = tr.sort(function (a, b) { // sort rows


                if(!isNaN(a.cells[col].textContent) && !isNaN(b.cells[col].textContent))
                    return reverse * ((+a.cells[col].textContent) - (+b.cells[col].textContent))
                return reverse // `-1 *` if want opposite order
                    * (a.cells[col].textContent.trim() // using `.textContent.trim()` for test
                        .localeCompare(b.cells[col].textContent.trim())
                       );
            });
            for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]); // append each row in order
        }

        function makeSortable(table) {
            var th = table.tHead, i;
            th && (th = th.rows[0]) && (th = th.cells);
            if (th) i = th.length;
            else return; // if no `<thead>` then do nothing
            while (--i >= 0) (function (i) {
                var dir = 1;
                th[i].addEventListener('click', function () {sortTable(table, i, (dir = 1 - dir))});
            }(i));
        }

        function makeAllSortable(parent) {
            parent = parent || document.body;
            var t = parent.getElementsByTagName('table'), i = t.length;
            while (--i >= 0) makeSortable(t[i]);
        }

        window.onload = function () {makeAllSortable();};
    </script>






    </body>
</html>
