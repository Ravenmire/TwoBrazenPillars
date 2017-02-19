<?php $file = 'goto-resource.php';
include('ec.php');

	echo($file.'['.__LINE__.'] $_POST: '.print_r($_POST,TRUE));

	$site = $_POST['site'];

	header('Location: '.$site);
?>
