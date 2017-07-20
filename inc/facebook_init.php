<?php 
$config = array (
	'app_id' 				=> '339106883174292',
	'app_secret' 			=> '3b35af398a7e3e3437442f6c0ae6a8e6',
	'default_graph_version' => 'v2.9',
	'default_access_token' 	=> 'EAACEdEose0cBAMjgzIEE90hjGJXCZAggqxAw0IObABp3HQqjgBZCqrBiB7HOD7MQlEDqUHC5bCHdTI2IWAaJg8YdDYFth6qPnvkDca6xuFtXGaFEYzbderuKsLqxeFCiZChX1wc2g9cX1dNPhjmhyTFQKGoC5nJx2J9wzIPjjMXyYiwqPhn6kRtBYFdFtoZD', // optional
	);
$facebook = new \Facebook\Facebook($config);

$appsecret_proof= hash_hmac('sha256', 'EAACEdEose0cBAMjgzIEE90hjGJXCZAggqxAw0IObABp3HQqjgBZCqrBiB7HOD7MQlEDqUHC5bCHdTI2IWAaJg8YdDYFth6qPnvkDca6xuFtXGaFEYzbderuKsLqxeFCiZChX1wc2g9cX1dNPhjmhyTFQKGoC5nJx2J9wzIPjjMXyYiwqPhn6kRtBYFdFtoZD', '3b35af398a7e3e3437442f6c0ae6a8e6'); 


 ?>