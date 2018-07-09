<div class="widget">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
        <titulo><h2>Hola, <?php echo $_SESSION['username']; ?>.</h2></titulo>

        <ul>
            <li><a href="index.php?page=account">Mi perfil</a></li>
            <li><a href="index.php?page=db-search">Búsqueda en BDD</a></li>
            <li><a href="index.php?page=db-update">Modificar BDD</a></li>
            <li><a href="index.php?page=logout">Logout</a></li>
        </ul>
    <?php }else{ ?>
        <titulo><h2>Guía de uso</h2></titulo>

        <ul>
            <li>Ingresa los datos de tu crédito</li>
            <li>Cada casilla permite añadir una opción de banco distinta</li>
            <li>Añade distintos bancos para luego poder compararlos entre sí</li>
            <li>Añade montos adicionales por banco</li>
        </ul>
    <?php } ?>
</div>
