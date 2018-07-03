<div class="article">
    <article>
        <?php
            //INITIALIZE SESSION//
            session_start();

            //UNSET ALL SESSION VARIABLES//
            $_SESSION = array();

            //DESTROY SESSION//
            session_destroy();

            //REDIRECT TO INDEX//
            header("location: index.php?page=home");
            exit;
        ?>
    </article>
</div>
