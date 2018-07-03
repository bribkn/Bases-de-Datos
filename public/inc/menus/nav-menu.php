<!--  RESPONSIVE MENU -->
<div class="menu_bar">
    <a href="#" class="bt-menu"><span class="icon-menu"> </a>
</div>

<!--  PAGE LOGO -->
<div class="wrapper">
    <div class="logo">
        <a href="#"><img src="img/logo.png" alt="Logo del proyecto"></a>
    </div>

    <!--  NAVIGATION MENU -->
    <nav>
        <ul>
            <li><a href="index.php?page=home"><span class="icon-home"></span> Inicio</a></li>
            <li><a href="index.php?page=contacto"><span class="icon-briefcase"></span> Contacto</a></li>
            <li><a href="index.php?page=db-page"><span class="icon-database"></span> BDD</a></li>

            <!--  WE CHECK IF THE USER IS ALREADY LOGGED IN -->
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '<li><a href="index.php?page=account"><span class="icon-office"></span> Mi cuenta</a></li>';
                    echo '<li><a href="index.php?page=logout"><span class="icon-office"></span> Logout</a></li>';
                }else{
                    echo '<li><a href="index.php?page=register"><span class="icon-office"></span> Registro</a></li>';
                    echo '<li><a href="index.php?page=login"><span class="icon-office"></span> Login</a></li>';
                }
            ?>
        </ul>
    </nav>
</div>
