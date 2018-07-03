<div class="articulo">
	<article>
        <?php
            //DB CONNECTION//
            require_once 'inc/config/config.php';

            //USER VARIABLES//
            $rut = $username = $password = $confirm_password = $name = $lastname = $phone = $address = $rol = "";
            $rut_err = $username_err = $password_err = $confirm_password_err = $rol_err = "";

            //PROCESS DATA//
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //VALIDATE RUT//
                if(empty(trim($_POST['rut']))){
                    $rut_err = "Por favor ingresa tu RUT.";
                }else{
                    //PREPARE A QUERY//
                    $sql = "SELECT rut FROM usuarios WHERE rut = $1";

                    if(pg_prepare($connection, "RUTsearchQuery", $sql)) {
                        //SET PARAMETERS//
                        $param_rut = trim($_POST["rut"]);

                        //ATTEMPT TO EXECUTE QUERY//
                        if($result = pg_execute($connection, "RUTsearchQuery", array($param_rut))) {
                            //CHECK IF ALREADY EXISTS ON DB//
                            if(pg_num_rows($result) == 1){
                                $rut_err = "Ya existe este usuario en la DB.";
                            }else{
                                $rut = trim($_POST["rut"]);
                            }
                        }else{
                            echo "Error desconocido. (RUT)";
                        }
                    }else{
                        echo "Error, unbinded";
                    }
                }

                //VALIDATE USERNAME//
                if(empty(trim($_POST["username"]))){
                    $username_err = "Por favor ingresa tu usuario.";
                }else{
                    //PREPARE A QUERY//
                    $sql = "SELECT rut FROM usuarios WHERE nick = $1";

                    if(pg_prepare($connection, "NICKsearchQuery", $sql)) {
                        //SET PARAMETERS//
                        $param_username = trim($_POST["username"]);

                        //ATTEMPT TO EXECUTE QUERY//
                        if($result = pg_execute($connection, "NICKsearchQuery", array($param_username))) {
                            //CHECK IF ALREADY EXISTS ON DB//
                            if(pg_num_rows($result) >= 1){
                                $username_err = "Ya existe este usuario en la DB.";
                            }else{
                                $username = trim($_POST["username"]);
                            }
                        }else{
                            echo "Error desconocido. (Username)";
                        }
                    }else{
                        echo "Error, unbinded";
                    }
                }

                //VALIDATE NAME//
                if(empty(trim($_POST['name']))){
                    $name_err = "Por favor ingresa tu nombre.";
                }else{
                    $name = trim($_POST['name']);
                }

                //VALIDATE LASTNAME//
                if(empty(trim($_POST['lastname']))){
                    $lastname_err = "Por favor ingresa tu apellido.";
                }else{
                    $lastname = trim($_POST['lastname']);
                }

                //VALIDATE PHONE//
                if(empty(trim($_POST['phone']))){
                    $phone_err = "Por favor ingresa tu número de teléfono.";
                }else{
                    $phone = trim($_POST['phone']);
                }

                //VALIDATE ADDRESS//
                if(empty(trim($_POST['address']))){
                    $address_err = "Por favor ingresa tu dirección.";
                }else{
                    $address = trim($_POST['address']);
                }

                //VALIDATE PASSWORD//
                if(empty(trim($_POST['password']))){
                    $password_err = "Por favor ingresa una password.";
                }elseif(strlen(trim($_POST['password'])) < 6){
                    $password_err = "Tu password debe tener al menos 6 caracteres.";
                }else{
                    $password = trim($_POST['password']);
                }

                //VALIDATE CONFIRMED PASSWORD//
                if(empty(trim($_POST["confirm_password"]))){
                    $confirm_password_err = 'Por favor confirma tu password.';
                }else{
                    $confirm_password = trim($_POST['confirm_password']);
                    if($password != $confirm_password){
                        $confirm_password_err = 'Las password no coinciden.';
                    }
                }

				//VALIDATE ROLE//
                if(empty(trim($_POST["rol"]))){
                    $rol_err = 'Por favor escoge un rol.';
                }else{
                    $rol = trim($_POST['rol']);
                }

                //CHECK INPUT ERRORS//
                if(empty($rut_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($lastname_err) && empty($phone_err) && empty($address_err)){
                    // Prepare an insert statement
                    $sql = "INSERT INTO usuarios (rut, nick, password, nombre, apellido, telefono, direccion) VALUES ($1, $2, $3, $4, $5, $6, $7)";
					$rolesql = "INSERT INTO roles (usuario_rut, rol) VALUES ($1, $2)";

                    if(pg_prepare($connection, "insertUserQuery", $sql) && pg_prepare($connection, "insertRoleQuery", $rolesql)){
                        // Set parameters
                        $param_rut = $rut;
                        $param_username = $username;
                        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                        $param_name = $name;
                        $param_lastname = $lastname;
                        $param_phone = $phone;
                        $param_address = $address;

						$param_rol = $rol;

                        // Attempt to execute the prepared statement
                        if(pg_execute($connection, "insertUserQuery", array($param_rut, $param_username, $param_password, $param_name, $param_lastname, $param_phone, $param_address)) && pg_execute($connection, "insertRoleQuery", array($param_rut, $param_rol))) {
                            // Redirect to login page
                            header("location: index.php?page=login");
                        }else{
                            echo "Error desconocido. (Insert)";
                        }
                    }
                }

                //CLOSE CONNECTION//
                pg_close($connection);
            }
        ?>

        <form action="index.php?page=register" method="POST">
            <h2>Registro</h2><br>

            <div class="form-group <?php echo (!empty($rut_err)) ? 'has-error' : ''; ?>">
                <label>RUT</label>
                <input type="text" name="rut"class="form-control" value="<?php echo $rut; ?>">
                <span class="help-block"><?php echo $rut_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>Apellido</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Teléfono</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                <label>Dirección</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_err; ?></span>
            </div>

			<div class="form-group <?php echo (!empty($rol_err)) ? 'has-error' : ''; ?>">
				<label>Rol</label>
				<select class="form-control" name="rol" id="conectores">
					<option value="TIO">Tío</option>
					<option value="ALUMNO">Alumno</option>
					<option value="APODERADO">Apoderado</option>
				</select>
			</div>

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirma tu password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrar">
                <input type="reset" class="btn btn-default" value="Reiniciar">
            </div>
        </form>
    </article>
</div>
