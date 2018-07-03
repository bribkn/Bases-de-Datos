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

            // Define variables and initialize with empty values
            $username = $password = "";
            $username_err = $password_err = "";

            // Processing form data when form is submitted
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Check if username is empty
                if(empty(trim($_POST["username"]))){
                    $username_err = 'Por favor ingresa tu usuario.';
                } else {
                    $username = trim($_POST["username"]);
                }

                // Check if password is empty
                if(empty(trim($_POST['password']))){
                    $password_err = 'Por favor ingresa tu password.';
                } else {
                    $password = trim($_POST['password']);
                }

                // Validate credentials
                if(empty($username_err) && empty($password_err)){
                    // Prepare a select statement
                    $sql = "SELECT nick, password FROM usuarios WHERE nick = $1";

                    if(pg_prepare($connection, "USERsearchQuery", $sql)){
                        //SET PARAMETERS//
                        $param_username = $username;

                        // Attempt to execute the prepared statement
                        if($result = pg_execute($connection, "USERsearchQuery", array($param_username))) {
                            // Check if username exists, if yes then verify password
                            if(pg_num_rows($result) == 1){
                                if($userData = pg_fetch_array($result)){
                                    if(password_verify($password, $userData["password"])){
                                        /* Password is correct, so start a new session and
                                        save the username to the session */
                                        session_start();
                                        $_SESSION['username'] = $username;
                                        $_SESSION['loggedin'] = true;

                                        header("location:index.php?page=account");
                                    }else{
                                        // Display an error message if password is not valid
                                        $password_err = 'La password no es valida.';
                                    }
                                }
                            }else{
                                // Display an error message if username doesn't exist
                                $username_err = 'No hay ninguna cuenta con ese nombre.';
                            }
                        }else{
                            echo "Error desconocido.";
                        }
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);
                }

                // Close connection
                mysqli_close($connection);
            }

            //Buscar todos los alumnos transportados por un tío.
            //Buscar todos los alumnos de un apoderado.
            //Buscar un tío por su nombre y/o apellido.
            //Buscar a un tío por alguno de sus alumnos transportados.
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

        <form name="1" id="1" style="display:none">
            hola
        </form>

        <form name="2" id="2" style="display:none">
            hola2
        </form>

        <form name="3" id="3" style="display:none">
            hola3
        </form>

        <form name="4" id="4" style="display:none">
            hola4
        </form>

        <script>
            $("#searchSelector").on("change", function() {
                $("#" + $(this).val()).show().siblings().hide();
            })
        </script>

    </article>
</div>
