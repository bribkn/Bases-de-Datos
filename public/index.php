<?php
	// STARTING SESSION //
	session_start();

	// PAGE RENDERING //
	include_once 'inc/header.php';
	include_once 'inc/body.php';

	// ADDING DATA TO BE SHOWN //
	if (empty($_GET['page']))
		$_GET['page'] = 'home';

	if(!file_exists("pages/".urlencode($_GET['page']).".php"))
		$_GET['page']= '404';

	$actualPage = 'pages/'.urlencode($_GET['page']).'.php';
	include ($actualPage);

	// END RENDERING //
	include_once 'inc/footer.php';
?>
