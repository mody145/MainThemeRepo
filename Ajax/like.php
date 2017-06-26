<?php session_start();

require_once( dirname( dirname( __FILE__ ) ) . '/../../../wp-load.php' );

require_once get_template_directory() . '/functions.php';

$id = $_POST['id'];

echo icreament_meta_likes($id);

?>