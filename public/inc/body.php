<body>
    <!--  INCLUDE JAVASCRIPTs -->
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script src="inc/menus/menu.js"></script>

	<!--  HEADER START -->
	<header>
        <!-- REQUIRE LOGIN & INCLUDE MENUS -->
		<?php require_once 'inc/config/config.php'; include_once 'inc/menus/nav-menu.php'; ?>
	</header>

	<!--  PAGE START -->
	<section class="main">
		<div class="wrapper">
			<!--  FRONT MESSAGE -->
			<div class="mensaje">
				<h1>Transporte Escolar: <?php echo strtoupper($_GET['page']); ?> </h1>
			</div>
			<!--  FRONT MESSAGE END -->
