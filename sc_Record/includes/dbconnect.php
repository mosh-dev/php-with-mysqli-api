<?php 
	
	// defining constant to create database connections.
	define("DB_SERVER", "localhost");
	define("DB_USER", "mtushar091");
	define("DB_PASS", "14789632tt");
	define("DB_NAME_R", "sc_record");
	
	//creating database connection for the sc_record database
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME_R);
	
	//Test If succeeded
	if(mysqli_connect_errno()){
		die("Database Connection failed : " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}

?>