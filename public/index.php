<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 , user-scalable=no">
	<title>DB Page</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/fonts.css">
</head>

<body>
    <!--  INCLUDE JAVASCRIPTs -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="inc/menu.js"></script>
	<script src="inc/show-option.js"></script>
	<script src="inc/slider.js"></script>

	<!--  HEADER START -->
	<header>
        <!-- REQUIRE LOGIN & INCLUDE MENUS -->
		<?php require_once 'inc/config.php'; require 'inc/nav-menu.php'; ?>
	</header>

	<!--  PAGE START -->
	<section class="main">
		<div class="wrapper">
			<!--  FRONT MESSAGE -->
			<div class="mensaje">
				<h1>CAElculadora</h1>
			</div>
			<!--  FRONT MESSAGE END -->

			<!--  LEFT BLOCK CONTAINER -->
			<div class="articulo">
				<article>
					<!--  LEFT BLOCK TITLE -->
					<h3>CAE</h3><br>
					<!--  LEFT BLOCK END TITLE -->

					<!--  LEFT BLOCK BODY -->
					Bienvenido al sitio de Transporte Escolar.
					<!--  LEFT BLOCK END BODY -->
				</article>
                <!--  LEFT BLOCK BODY END -->
			</div>
            <!--  LEFT BLOCK CONTAINER END -->



			<!--  RIGHT BLOCK CONTAINER -->
			<aside>
				<?php include 'inc/tips-menu.php' ?>
			</aside>
            <!--  RIGHT BLOCK END-->
		</div>
	</section>
	<!--  PAGE END -->

	<footer>
		<div class="wrapper">
			<p>Transporte Escolar, por Martín Saavedra y Brían Bastías.</p>
		</div>
	</footer>
</body>
</html>
