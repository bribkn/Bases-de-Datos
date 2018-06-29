<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=no">
	<title>DB Page</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fonts.css">
</head>

<body>
    <!--  INCLUDE JAVASCRIPTs -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="inc/menu.js"></script>
	<script src="inc/show-option.js"></script>
	<script src="inc/slider.js"></script>

	<!--  HEADER START -->
	<header>
        <!-- REQUIRE LOGIN & INCLUDE MENUS -->
		<?php require_once 'inc/config.php'; require 'inc/nav-menu.php'; ?>
	</header>

	<!--  PAGE START -->
	<section class="main">
		<div class="wrapper">
			<!--  FRONT MESSAGE -->
			<div class="mensaje">
				<h1>CAElculadora</h1>
			</div>

			<!--  LEFT BLOCK CONTAINER -->
			<div class="articulo">
				<article>
					<!--  LEFT BLOCK TITLE -->
					<h3>CAE</h3><br>

					<!--  LEFT BLOCK BODY -->
					Bienvenido al sitio de Transporte Escolar.
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
				</article>
                <!--  LEFT BLOCK BODY END -->
			</div>
            <!--  LEFT BLOCK CONTAINER END -->

			<!--  RIGHT BLOCK CONTAINER -->
			<aside>
				<?php include 'inc/tips-menu.php' ?>
			</aside>
            <!--  RIGHT BLOCK END-->
		</div>
	</section>

	<footer>
		<div class="wrapper">
			<p>Transporte Escolar, por Martín Saavedra y Brían Bastías.</p>
		</div>
	</footer>
</body>
</html>
