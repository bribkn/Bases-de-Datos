<div class="articulo">
	<article>
		<titulo><h2>Manejo de bases de datos</h2></titulo>
		<!--  LEFT BLOCK BODY -->
		<?php
            // get results from database
            $query_alumnos = "SELECT * FROM alumnos;";
            $result_alumnos = pg_query($connection, $query_alumnos);

            // display data in table
            echo "<subtitulo><h4>DB Alumnos</h4><subtitulo>";

            echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
            echo "<tr><th><center>ID</center></th> <th><center>Nombres</center></th> <th><center>Apellidos</center></th> <th><center>Nivel</center></th> <th><center>Patentes Furgon</center></th> <th><center>Curso</center></th>";

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
            echo "</table></div></div>";
            echo "<br><br><br>";

            // get results from database
            $query_furgones = "SELECT * FROM furgones;";
            $result_furgones = pg_query($connection, $query_furgones);

            // display data in table
			echo "<subtitulo><h4>DB Furgones</h4><subtitulo>";

            echo "<div style='overflow-x:auto;'><table>";
            echo "<tr><th><center>Patentes</center></th> <th><center>Rut Tios</center></th> <th><center>Marcas</center></th> <th><center>Modelos</center></th> <th><center>Capacidad</center></th> <th><center>Año</center></th> ";

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
            echo "</table></div>";
            echo "<br><br><br>";

            // get results from database
            $query_usuarios = "SELECT * FROM usuarios;";
            $result_usuarios = pg_query($connection, $query_usuarios);

            // display data in table
			echo "<subtitulo><h4>DB Usuarios</h4><subtitulo>";

            echo "<div style='overflow-x:auto;'><table>";
            echo "<tr><th><center>Rut</center></th> <th><center>Nick</center></th> <th><center>Nombre</center></th> <th><center>Apellidos</center></th> <th><center>Telefonos</center></th> <th><center>Dirección</center></th> ";

            // loop through results of database query, displaying them in the table
            while($fila = pg_fetch_row( $result_usuarios )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><center>' . $fila[0] . '</center></td>';
                echo '<td><center>' . $fila[1] . '</center></td>';
                // echo '<td><center>' . $fila[2] . '</center></td>';
                echo '<td><center>' . $fila[3] . '</center></td>';
                echo '<td><center>' . $fila[4] . '</center></td>';
                echo '<td><center>' . $fila[5] . '</center></td>';
                echo '<td><center>' . $fila[6] . '</center></td>';
                echo "</tr>";
            }
            // close table>
            echo "</table></div>";
            echo "<br><br><br>";

            // get results from database
            $query_roles = "SELECT * FROM roles;";
            $result_roles = pg_query($connection, $query_roles);

            // display data in table
			echo "<subtitulo><h4>DB Roles</h4><subtitulo>";

            echo "<div style='overflow-x:auto;'><table>";
            echo "<tr><th><center>Rut Usuario</center></th> <th><center>Rol</center></th> ";

            // loop through results of database query, displaying them in the table
            while($fila = pg_fetch_row( $result_roles )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><center>' . $fila[0] . '</center></td>';
                echo '<td><center>' . $fila[1] . '</center></td>';
                echo "</tr>";
            }
            // close table>
            echo "</table></div>";
            echo "<br><br><br>";

            // get results from database
            $query_tiene = "SELECT * FROM tiene;";
            $result_tiene = pg_query($connection, $query_tiene);

            // display data in table
			echo "<subtitulo><h4>DB Tiene</h4><subtitulo>";

            echo "<div style='overflow-x:auto;'><table>";
            echo "<tr><th><center>Rut Usuario</center></th> <th><center>ID Alumno</center></th> ";


            // loop through results of database query, displaying them in the table
            while($fila = pg_fetch_row( $result_tiene )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td><center>' . $fila[0] . '</center></td>';
                echo '<td><center>' . $fila[1] . '</center></td>';
                echo "</tr>";
            }

            // close table>
            echo "</table></div>";
            echo "<br><br><br>";
        ?>
	</article>
    <!--  LEFT BLOCK BODY END -->
</div>
