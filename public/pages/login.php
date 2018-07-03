<div class="articulo">
    <article>
        <?php
            //DB CONNECTION//
            require_once 'inc/config/config.php';

            //STARTING SESSION//
            ob_start();
            session_start();

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                die ("Ya te encuentras logeado.</article></div>");
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
        ?>
        <titulo><h2>Login</h2><titulo>

        <subtitulo><h4>Ingresa tus datos en los campos para iniciar sesión.</h4></subtitulo>

        <center>
            <form action="index.php?page=login" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Ingresa">
                </div>
                <br>
                <h4>Click <a href="index.php">AQUÍ</a> para ir al inicio.</h4>
            </form>
        </center>
    </article>
</div>
