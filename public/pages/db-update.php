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

            if ($type == 1) { //Modificar el número de teléfono de un tío.
                $rut_tio = $_POST['rut_tio'];
                $telefono_tio = $_POST['telefono_tio'];

                $sql = "UPDATE usuarios
                        SET telefono = $telefono_tio
                        WHERE CAST(rut AS TEXT) = '$rut_tio'
                        ";

                $result = pg_query($connection, $sql);

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion, f.patente, f.marca, f.modelo, f.capacidad, f.ano
                        FROM roles as r, usuarios as u, furgones as f
                        WHERE r.usuario_rut=u.rut AND u.rut=f.rut_tio
                        AND r.rol='tio' AND u.rut='$rut_tio'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Datos actualizados.</h4><subtitulo>";
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
            }else if($type == 2){ //Modificar el número de teléfono de un apoderado.
                $rut_apoderado = $_POST['rut_apoderado'];
                $telefono_apoderado = $_POST['telefono_apoderado'];

                $sql = "UPDATE usuarios
                        SET telefono = '$telefono_apoderado'
                        WHERE CAST(rut AS TEXT) = '$rut_apoderado'
                        ";
                $result = pg_query($connection, $sql);

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion
                        FROM usuarios as u
                        WHERE u.rut = '$rut_apoderado'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Datos actualizados.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>RUT Apoderado</center></th> <th><center>Nombre Apoderado</center></th> <th><center>Apellido Apoderado</center></th>
                      <th><center>Teléfono Apoderado</center></th> <th><center>Dirección Apoderado</center></th>";


                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            /*}else if($type == 3){ //Modificar el número de teléfono de un alumno.
            /*    $id_alumno = $_POST['id_alumno'];
                $telefono_alumno = $_POST['telefono_alumno'];

                $sql = "UPDATE usuarios
                        SET telefono = '$telefono_apoderado'
                        WHERE CAST(rut AS TEXT) = '$rut_alumno'
                        ";
                $result = pg_query($connection, $sql);

                $sql = "SELECT a.id, a.nombre, a.apellido, a.nivel, a.curso
                        FROM alumnos as a
                        WHERE a.id '$id_alumno'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Datos actualizados.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>ID Alumno</center></th> <th><center>Nombre Alumno</center></th> <th><center>Apellido Alumno</center></th>
                      <th><center>Nivel Alumno</center></th> <th><center>Curso</center></th>";


                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";*/
            }else if($type == 4) { //Modificar el furgón de un alumno.
                $id_alumno = $_POST['id_alumno'];
                $patente_furgon_alumno = $_POST['patente_furgon_alumno'];

                $sql = "UPDATE alumnos
                        SET patente_furgon = '$patente_furgon_alumno'
                        WHERE id = $id_alumno
                        ";

                $result = pg_query($connection, $sql);

                $sql = "SELECT a.id, a.nombre, a.apellido, a.nivel, a.curso, a.patente_furgon
                        FROM alumnos as a
                        WHERE a.id = $id_alumno
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Datos actualizados.</h4><subtitulo>";
                echo "<div style='overflow-x:auto;'><div class='custom-table'><table>";
                echo "<tr><th><center>ID Alumno</center></th> <th><center>Nombre Alumno</center></th> <th><center>Apellido Alumno</center></th>
                      <th><center>Nivel Alumno</center></th> <th><center>Curso</center></th> <th><center>Patente Furgón</center></th>";


                while($fila = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo '<td><center>' . $fila[0] . '</center></td>';
                    echo '<td><center>' . $fila[1] . '</center></td>';
                    echo '<td><center>' . $fila[2] . '</center></td>';
                    echo '<td><center>' . $fila[3] . '</center></td>';
                    echo '<td><center>' . $fila[4] . '</center></td>';
                    echo '<td><center>' . $fila[5] . '</center></td>';
                    echo "</tr>";
                }

                echo "</table></div></div>";
                echo "<br><br><br>";
            }else if($type == 5) { //Modificar el furgón de un tío.
                $rut_tio = $_POST['rut_tio'];
                $patente_furgon = $_POST['patente_furgon'];
                $marca_furgon = $_POST['marca_furgon'];
                $modelo_furgon = $_POST['modelo_furgon'];
                $capacidad_furgon = $_POST['capacidad_furgon'];
                $ano_furgon = $_POST['ano_furgon'];

                $sql = "UPDATE furgones
                        SET patente = '$patente_furgon', marca =  '$marca_furgon',
                        modelo = '$modelo_furgon', capacidad = '$capacidad_furgon',
                        ano = '$ano_furgon'
                        WHERE rut_tio = $rut_tio
                        ";
                $result = pg_query($connection, $sql);

                $sql = "SELECT u.rut, u.nombre, u.apellido, u.telefono, u.direccion, f.patente, f.marca, f.modelo, f.capacidad, f.ano
                        FROM roles as r, usuarios as u, furgones as f
                        WHERE r.usuario_rut=u.rut AND u.rut=f.rut_tio
                        AND r.rol='tio' AND u.rut='$rut_tio'
                        ";
                $result = pg_query($connection, $sql);

                echo "<subtitulo><h4>Datos actualizados.</h4><subtitulo>";
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
            }else if(!isset($type)){ //ERROR

            }else{
                header("location:index.php?page=404");
            }
        ?>

        <titulo><h2>Búsqueda en BDD</h2><titulo>

        <subtitulo><h4>Escoge un tipo de actualización.</h4></subtitulo>

        <center>
            <form id="form-shower">
                <div class="form-group <?php echo (!empty($tipo_err)) ? 'has-error' : ''; ?>">
    				<label>Tipo de actualización</label>
    				<select class="form-control" id="searchSelector">
                        <option value="-">Selecciona un tipo de actualización.</option>
    					<option value="1">Modificar el número de teléfono de un tío.</option>
    					<option value="2">Modificar el número de teléfono de un apoderado.</option>
    					<!-- <option value="3">Modificar el número de teléfono de un alumno.</option> -->
                        <option value="4">Modificar el furgón de un alumno.</option>
                        <option value="5">Modificar el furgón de un tío.</option>
    				</select>
    			</div>
            </form>
        </center>

        <!--  FIRST OPTION -->
        <!--  Modificar el número de teléfono de un tío. -->
        <form name="1" id="1" style="display:none" action="index.php?page=db-update&type=1" method="post">
            <subtitulo><h4>Cambiar el teléfono de un tío por su RUT.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($rut_tio_err)) ? 'has-error' : ''; ?>">
                <label>RUT del tío</label>
                <input type="text" name="rut_tio" class="form-control">
                <span class="help-block"><?php echo $rut_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($telefono_tio_err)) ? 'has-error' : ''; ?>">
                <label>Nuevo teléfono</label>
                <input type="text" name="telefono_tio" class="form-control">
                <span class="help-block"><?php echo $telefono_tio_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cambiar">
            </div>
        </form>

        <!--  SECOND OPTION -->
        <!--  Modificar el número de teléfono de un apoderado. -->
        <form name="2" id="2" style="display:none" action="index.php?page=db-update&type=2" method="post">
            <subtitulo><h4>Cambiar el teléfono de un apoderado por su RUT.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($rut_apoderado_err)) ? 'has-error' : ''; ?>">
                <label>RUT del apoderado</label>
                <input type="text" name="rut_apoderado" class="form-control">
                <span class="help-block"><?php echo $rut_apoderado_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($telefono_apoderado_err)) ? 'has-error' : ''; ?>">
                <label>Nuevo teléfono</label>
                <input type="text" name="telefono_apoderado" class="form-control">
                <span class="help-block"><?php echo $telefono_apoderado_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cambiar">
            </div>
        </form>

        <!--  THIRD OPTION -->
        <!--  Modificar el número de teléfono de un alumno. -->
        <!-- <form name="3" id="3" style="display:none" action="index.php?page=db-update&type=3" method="post">
            <subtitulo><h4>Cambiar el teléfono de un alumno por su ID.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($id_alumno_err)) ? 'has-error' : ''; ?>">
                <label>ID del alumno</label>
                <input type="text" name="id_alumno" class="form-control">
                <span class="help-block"><?php echo $id_alumno_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($telefono_alumno_err)) ? 'has-error' : ''; ?>">
                <label>Nuevo teléfono</label>
                <input type="text" name="telefono_alumno" class="form-control">
                <span class="help-block"><?php echo $telefono_alumno_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cambiar">
            </div>
        </form> -->

        <!--  FOURTH OPTION -->
        <!--  Modificar el furgón de un alumno. -->
        <form name="4" id="4" style="display:none" action="index.php?page=db-update&type=4" method="post">
            <subtitulo><h4>Modificar el furgón de un alumno.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($id_alumno_err)) ? 'has-error' : ''; ?>">
                <label>ID del alumno</label>
                <input type="text" name="id_alumno" class="form-control" value="<?php echo $id_alumno; ?>">
                <span class="help-block"><?php echo $id_alumno_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($patente_furgon_alumno_err)) ? 'has-error' : ''; ?>">
                <label>Patente del nuevo furgón</label>
                <input type="text" name="patente_furgon_alumno" class="form-control">
                <span class="help-block"><?php echo $patente_furgon_alumno_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Buscar">
            </div>
        </form>

        <!--  FIFTH OPTION -->
        <!--  Modificar el furgón de un tío. -->
        <form name="5" id="5" style="display:none" action="index.php?page=db-update&type=5" method="post">
            <subtitulo><h4>Modificar el furgón de un tío por su RUT.</h4></subtitulo>

            <div class="form-group <?php echo (!empty($rut_tio_err)) ? 'has-error' : ''; ?>">
                <label>RUT del tío</label>
                <input type="text" name="rut_tio" class="form-control">
                <span class="help-block"><?php echo $rut_tio_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($patente_furgon_err)) ? 'has-error' : ''; ?>">
                <label>Patente del nuevo furgón</label>
                <input type="text" name="patente_furgon" class="form-control">
                <span class="help-block"><?php echo $patente_furgon_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($marca_furgon_err)) ? 'has-error' : ''; ?>">
                <label>Marca del nuevo furgón</label>
                <input type="text" name="marca_furgon" class="form-control">
                <span class="help-block"><?php echo $marca_furgon_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($modelo_furgon_err)) ? 'has-error' : ''; ?>">
                <label>Modelo del nuevo furgón</label>
                <input type="text" name="modelo_furgon" class="form-control">
                <span class="help-block"><?php echo $modelo_furgon_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($capacidad_furgon_err)) ? 'has-error' : ''; ?>">
                <label>Capacidad del nuevo furgón</label>
                <input type="text" name="capacidad_furgon" class="form-control">
                <span class="help-block"><?php echo $capacidad_furgon_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($ano_furgon_err)) ? 'has-error' : ''; ?>">
                <label>Año del nuevo furgón</label>
                <input type="text" name="ano_furgon" class="form-control">
                <span class="help-block"><?php echo $ano_furgon_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Cambiar">
            </div>
        </form>

        <script>
            $("#searchSelector").on("change", function() {
                $("#" + $(this).val()).show().siblings().hide();
            })
        </script>
    </article>
</div>
