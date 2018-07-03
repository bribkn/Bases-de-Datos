<?php
    $server = "localhost";
    $port = 5432;
    $db = "transporte_escolar";
    $user = "martinsaavedran";
    $password = "";

    $connection = pg_connect("host=$server port=$port dbname=$db user=$user password=$password");

    if (!$connection) {
        die("CONEXION ERRONEA");
    }
?>
