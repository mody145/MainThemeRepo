<?php session_start() ?>

<!-- Check If User Add This Item To List Follow -->
<?php if (isset($_POST['id'])) { 
	// If True Add Item
	$list = $_SESSION['follow'][] = $_POST['id'];

	$items_unique = array_unique($_SESSION['follow']);

	echo count($items_unique);

} ?>