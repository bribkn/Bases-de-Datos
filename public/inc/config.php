<?php
    $server = "localhost:5432";
    $db = "transporte_escolar";
    $user = "brianbastias";
    $password = "";

    $connection = pg_connect("host=localhost port=5432 dbname=transporte_escolar user=brianbastias password=");

    if (!$connection) {
        die("CONEXION ERRONEA: <br><br>");
    }
?>
