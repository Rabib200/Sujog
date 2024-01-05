<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'RHSM', 'rhsm1234', 'youth');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>