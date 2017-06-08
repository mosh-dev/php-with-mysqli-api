<?php
	require_once("dbconnect.php");
	require_once("functions.php");

	// * presence 
	//used trim() so empty space Dosent count
	//use === to avoid false Positives
	function presence($value){
		return isset($value) && $value !== "";
	}
	// * Format for Name
	function name($value1,$value2){
		if (preg_match('/^[a-z A-Z]{3,25}$/',$value1)) {
			return preg_match('/^[a-z A-Z]{3,25}$/',$value2);
		}	
	}
	// * Format for Name
	function name_single($value){
		return preg_match('/^[a-z A-Z ()]{3,25}$/',$value);	
	}
	// * Format for username
	function username($value){
		return preg_match('/^[a-zA-Z0-9_]{4,}$/',$value);
	}
	// * uniqueness for username
	function username_exists($value){
		global $connection;		

		$query = "SELECT * FROM ";
		$query .= "users ";
		$query .= "WHERE ";
		$query .= "username = '{$value}' ";

		$result = mysqli_query($connection, $query);
		//echo $query;
		confirm_query($result);

		$row = mysqli_fetch_assoc($result);

		return (empty($row));
	}

	// * PassWord Validation
	function password($value, $value_repet){
		$max = 100;
		$min = 5;
		if ($value === $value_repet) {
			$limit = strlen($value);
			return $limit <= $max && $limit >= $min;
		}
	}

	function old_pass_cheak($password,$id){
		$user = find_user_by_id($id);
		return password_cheak($password, $user["pass"]);

	}


	// * Format for email
	function email($value1, $value2){
		if ($value1 === $value2) {
			return filter_var($value1, FILTER_VALIDATE_EMAIL);
		}	
	}
	// * Format for email
	function email_single($value){
		return filter_var($value, FILTER_VALIDATE_EMAIL);
	}


	// * uniqueness for email
	function email_exists($value) {
		global $connection;		

		$query = "SELECT * FROM ";
		$query .= "members ";
		$query .= "WHERE ";
		$query .= "email = '{$value}' ";

		$result = mysqli_query($connection, $query);
		//echo $query;
		confirm_query($result);

		$row = mysqli_fetch_assoc($result);

		return (empty($row));
			
	}

	// * Format for Phone
	function phone($value){
		return preg_match('/^[0-9 +]{11,14}$/',$value);
	}
	function contact_person($value){
		return preg_match('/^[a-z A-Z]{3,25}$/',$value);
	}
	// * Format for Facebook id
	function fbid($value){
		return preg_match('/^[a-zA-Z_0-9@. +]{0,20}$/',$value);
	}

	// * Format for Address
	function address($value){
		if (isset($value) && $value !== "") {
			return preg_match('/^[0-9a-zA-Z _+.\/,]{0,200}$/',$value);
		}	
	}
	// * Cheaking Birthdate
	function date_validation($value1, $value2, $value3){
		$all = array($value1, $value2, $value3);
		if (!in_array("", $all)) {
			return preg_match('/^[0-9]{0,4}$/',$value3);
		}	
	}
	// * Cheaking gender And bloodgroup
	function gen_blood($value1, $value2){
		$all = array($value1, $value2);
		if (!in_array("", $all)) {
			return true;
		}
		else 
			return false;
	}

	// * string length for additional info
	function length($value){
		return strlen($value) <= 600;
	}


	// * Function to Display errors
	function form_errors($errors){
		$output = "";
		if (!empty($errors)) {
			$output = "<div class = \"error\">";
			$output .= "<div class = \"top\">Notices </div>";
			$output .= "<ul class = \"errorul\">";
			foreach ($errors as $key => $error) {
				$output .= "<li>{$error}</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";

		}
			return $output;
	}


	// * Function to Display login errors
	function login_errors($errors){
		$output = "";
		if (!empty($errors)) {
			$output = "<div class = \"error\">";
			//$output .= "<div class = \"top\"></div>";
			$output .= "<ul class = \"errorul\">";
			foreach ($errors as $key => $error) {
				$output .= "<li>{$error}</li>";
			}
			$output .= "</ul>";
			$output .= "</div>";

		}
			return $output;
	}


?>