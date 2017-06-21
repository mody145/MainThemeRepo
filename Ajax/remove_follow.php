<?php session_start() ?>

<!-- Check If User Add This Item To List Follow -->
<?php if (isset($_POST['id'])) { 
	
	$id = $_POST['id'];
	$items = $_SESSION['follow']; 

	$items_unique = array_unique($_SESSION['follow']);

	$_SESSION['follow'] = $items_unique;

	$newItems = $_SESSION['follow'];

	$key = array_search($id, $newItems);

	unset($newItems[$key]);

	$_SESSION['follow'] = $newItems;
	
	echo count($newItems);

} ?>