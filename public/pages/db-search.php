<div class="articulo">
    <article>
        <?php
            //DB CONNECTION//
            require_once 'inc/config/config.php';

            //STARTING SESSION//
            ob_start();
            session_start();

            if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
                die ("<h2>Debes estar conectado para ver esta página.</h2></article></div>");
            }

            $type = $_GET['type'];

            if ($type == 1) { //Buscar todos los alumnos transportados por un tío.
                $nombre_tio = $_POST['nombre_tio'];
                $apellido_tio = $_POST['apellido_tio'];
                $rut_tio = $_POST['rut_tio'];

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, a.nombre, a.apellido, a.nivel,
                            a.patente_furgon, a.curso
                        FROM alumnos as a, furgones as f, usuarios as u, roles as r
                        WHERE a.patente_furgon = f.patente AND f.rut_tio = u.rut
                        AND u.rut = r.usuario_rut AND r.rol = 'tio'
                        AND u.nombre LIKE '%$nombre_tio%' AND u.apellido LIKE '%$apellido_tio%'
                        AND CAST(u.rut AS TEXT) LIKE '%$rut_tio%'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Listado de alumnos transportados por el tío.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>RUT Tío</center></th> <th><center>Nombre Tío</center></th> <th><center>Apellido Tío</center></th>
                      <th><center>Teléfono Tío</center></th> <th><center>Nombre Alumno</center></th> <th><center>Apellido Alumno</center></th>
                      <th><center>Nivel Alumno</center></th> <th><center>Patente Furgón</center></th> <th><center>Curso Alumno</center></th>";

                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo '<td><center>' . $fila[5] . '</center></td>';
                    echo '<td><center>' . $fila[6] . '</center></td>';
                    echo '<td><center>' . $fila[7] . '</center></td>';
                    echo '<td><center>' . $fila[8] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            }else if($type == 2){ //Buscar todos los alumnos de un apoderado.
                $nombre_apoderado = $_POST['nombre_apoderado'];
                $apellido_apoderado = $_POST['apellido_apoderado'];
                $rut_apoderado = $_POST['rut_apoderado'];

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, a.nombre,
                               a.apellido, a.nivel, a.patente_furgon, a.curso
                        FROM alumnos as a, tiene as t, usuarios as u, roles as r
                        WHERE a.id = t.alumno_id
                        AND t.usuario_rut = u.rut
                        AND u.rut = r.usuario_rut
                        AND r.rol = 'apoderado'
                        AND u.nombre LIKE '%$nombre_apoderado%'
                        AND u.apellido LIKE '%$apellido_apoderado%'
                        AND CAST(u.rut AS TEXT) LIKE '%$rut_apoderado%'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Listado de alumnos del apoderado.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>RUT Apoderado</center></th> <th><center>Nombre Apoderado</center></th> <th><center>Apellido Apoderado</center></th>
                      <th><center>Teléfono Apoderado</center></th> <th><center>Nombre Alumno</center></th> <th><center>Apellido Alumno</center></th>
                      <th><center>Nivel Alumno</center></th> <th><center>Patente Furgón</center></th> <th><center>Curso Alumno</center></th>";

                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo '<td><center>' . $fila[5] . '</center></td>';
                    echo '<td><center>' . $fila[6] . '</center></td>';
                    echo '<td><center>' . $fila[7] . '</center></td>';
                    echo '<td><center>' . $fila[8] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            }else if($type == 3){ //Buscar un tío por su nombre y/o apellido.
                $nombre_tio = $_POST['nombre_tio'];
                $apellido_tio = $_POST['apellido_tio'];
                $rut_tio = $_POST['rut_tio'];

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion, f.patente, f.marca, f.modelo, f.capacidad, f.ano
                        FROM roles as r, usuarios as u, furgones as f
                        WHERE r.usuario_rut=u.rut AND u.rut=f.rut_tio AND r.rol='tio'
                        AND u.nombre LIKE '%$nombre_tio%' AND u.apellido LIKE '%$apellido_tio%'
                        AND CAST(u.rut AS TEXT) LIKE '%$rut_tio%'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Listado de tíos</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>RUT</center></th> <th><center>Nombre</center></th> <th><center>Apellido</center></th> 
                      <th><center>Teléfono</center></th> <th><center>Dirección</center></th> <th><center>Patente</center></th>
                      <th><center>Marca</center></th> <th><center>Modelo</center></th> <th><center>Capacidad</center></th>
                      <th><center>Año</center></th>";

                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo '<td><center>' . $fila[5] . '</center></td>';
                    echo '<td><center>' . $fila[6] . '</center></td>';
                    echo '<td><center>' . $fila[7] . '</center></td>';
                    echo '<td><center>' . $fila[8] . '</center></td>';
                    echo '<td><center>' . $fila[9] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            }else if($type == 4) { //Buscar a un tío por alguno de sus alumnos transportados.
                $nombre_alumno = $_POST['nombre_alumno'];
                $apellido_alumno = $_POST['apellido_alumno'];

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion,
                               f.patente, f.marca, f.modelo, f.capacidad, f.ano
                        FROM roles as r, usuarios as u, furgones as f, alumnos as a
                        WHERE a.patente_furgon = f.patente
                        AND f.rut_tio = u.rut
                        AND u.rut = r.usuario_rut
                        AND r.rol = 'tio'
                        AND a.nombre LIKE '%$nombre_alumno%'
                        AND a.apellido LIKE '%$apellido_alumno%'
                        GROUP BY(u.rut,f.patente);
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Listado de alumnos transportados por el tío.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>RUT Tío</center></th> <th><center>Nombre Tío</center></th> <th><center>Apellido Tío</center></th>
                      <th><center>Teléfono Tío</center></th> <th><center>Dirección Tío</center></th> <th><center>Patente Furgón</center></th>
                      <th><center>Marca</center></th> <th><center>Modelo</center></th> <th><center>Capacidad</center></th> <th><center>Año</center></th>";

                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo '<td><center>' . $fila[5] . '</center></td>';
                    echo '<td><center>' . $fila[6] . '</center></td>';
                    echo '<td><center>' . $fila[7] . '</center></td>';
                    echo '<td><center>' . $fila[8] . '</center></td>';
                    echo '<td><center>' . $fila[8] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            }else if(!isset($type)){ //ERROR

            }else{
                header("location:index.php?page=404");
            }
        ?>

        <!-- <script src="inc/form-opener.js"></script> -->
        <titulo><h2>Búsqueda en BDD</h2><titulo>

        <subtitulo><h4>Escoge un tipo de búsqueda.</h4></subtitulo>

        <center>
            <form id="form-shower">
                <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
    				<label>Tipo de búsqueda</label>
    				<select class="form-control" id="searchSelector">
                        <option value="-">Selecciona un tipo de búsqueda.</option>
    					<option value="1">Buscar todos los alumnos transportados por un tío.</option>
    					<option value="2">Buscar todos los alumnos de un apoderado.</option>
    					<option value="3">Buscar un tío por su nombre y apellido.</option>
                        <option value="4">Buscar a un tío por alguno de sus alumnos transportados.</option>
    				</select>
    			</div>
            </form>
        </center>

        <!--  FIRST OPTION -->
        <!--  Buscar todos los alumnos transportados por un tío. -->
        <form name="1" id="1" style="display:none" action="index.php?page=db-search&type=1" method="post">
            <subtitulo><h4>Buscar todos los alumnos transportados por un tío.</h4></subtitulo>
            <subtitulo><h4>Si desconoces algún campo, simplemente déjalo en blanco.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($nombre_tio_err)) ? 'has-error' : ''; ?>">
                <label>Nombre del tío</label>
                <input type="text" name="nombre_tio" class="form-control" value="<?php echo $nombre_tio; ?>">
                <span class="help-block"><?php echo $nombre_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($apellido_tio_err)) ? 'has-error' : ''; ?>">
                <label>Apellido del tío</label>
                <input type="text" name="apellido_tio" class="form-control">
                <span class="help-block"><?php echo $apellido_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($rut_tio_err)) ? 'has-error' : ''; ?>">
                <label>RUT del tío</label>
                <input type="text" name="rut_tio" class="form-control">
                <span class="help-block"><?php echo $rut_tio_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        <!--  SECOND OPTION -->
        <!--  Buscar todos los alumnos de un apoderado. -->
        <form name="2" id="2" style="display:none" action="index.php?page=db-search&type=2" method="post">
            <subtitulo><h4>Buscar todos los alumnos de un apoderado.</h4></subtitulo>
            <subtitulo><h4>Si desconoces algún campo, simplemente déjalo en blanco.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($nombre_apoderado_err)) ? 'has-error' : ''; ?>">
                <label>Nombre del apoderado</label>
                <input type="text" name="nombre_apoderado" class="form-control" value="<?php echo $nombre_apoderado; ?>">
                <span class="help-block"><?php echo $nombre_apoderado_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($apellido_apoderado_err)) ? 'has-error' : ''; ?>">
                <label>Apellido del apoderado</label>
                <input type="text" name="apellido_apoderado" class="form-control">
                <span class="help-block"><?php echo $apellido_apoderado_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($rut_apoderado_err)) ? 'has-error' : ''; ?>">
                <label>RUT del apoderado</label>
                <input type="text" name="rut_apoderado" class="form-control">
                <span class="help-block"><?php echo $rut_apoderado_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        <!--  THIRD OPTION -->
        <!--  Buscar un tío por su nombre, apellido y/o RUT. -->
        <form name="3" id="3" style="display:none" action="index.php?page=db-search&type=3" method="post">
            <subtitulo><h4>Buscar un tío por su nombre y/o apellido.</h4></subtitulo>
            <subtitulo><h4>Si desconoces algún campo, simplemente déjalo en blanco.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($nombre_tio_err)) ? 'has-error' : ''; ?>">
                <label>Nombre del tío</label>
                <input type="text" name="nombre_tio" class="form-control" value="<?php echo $nombre_tio; ?>">
                <span class="help-block"><?php echo $nombre_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($apellido_tio_err)) ? 'has-error' : ''; ?>">
                <label>Apellido del tío</label>
                <input type="text" name="apellido_tio" class="form-control">
                <span class="help-block"><?php echo $apellido_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($rut_tio_err)) ? 'has-error' : ''; ?>">
                <label>RUT del tío</label>
                <input type="text" name="rut_tio" class="form-control">
                <span class="help-block"><?php echo $rut_tio_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        <!--  FOURTH OPTION -->
        <!--  Buscar a un tío por alguno de sus alumnos transportados. -->
        <form name="4" id="4" style="display:none" action="index.php?page=db-search&type=4" method="post">
            <subtitulo><h4>Buscar a un tío por alguno de sus alumnos transportados.</h4></subtitulo>
            <subtitulo><h4>Si desconoces algún campo, simplemente déjalo en blanco.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($nombre_alumno_err)) ? 'has-error' : ''; ?>">
                <label>Nombre del alumno</label>
                <input type="text" name="nombre_alumno" class="form-control" value="<?php echo $nombre_alumno; ?>">
                <span class="help-block"><?php echo $nombre_alumno_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($apellido_alumno_err)) ? 'has-error' : ''; ?>">
                <label>Apellido del alumno</label>
                <input type="text" name="apellido_alumno" class="form-control">
                <span class="help-block"><?php echo $apellido_alumno_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        <script>
            $("#searchSelector").on("change", function() {
                $("#" + $(this).val()).show().siblings().hide();
            })
        </script>
    </article>
</div>
