<?php

	// Function to  Cheak query is succesfull or not.
	function confirm_query($result_set) {
		// test if there was a query error
		if(!$result_set){
			die("database query failed. ");
		}
	}

	// string escape for input value
	function mysqli_prep($value) {
		global $connection;
		$safe_value = mysqli_real_escape_string($connection, $value);
		return $safe_value;
	}

	// Function Fo URL redirection
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}


	// function takes id and returns member ..
	function find_member_by_id($id) {
		global $connection;

		$query = "SELECT * FROM ";
		$query .= "members ";
		$query .= "WHERE ";
		$query .= "ID = {$id} ";

		$result = mysqli_query($connection, $query);
		confirm_query($result);

		if ($user =  mysqli_fetch_assoc($result)) {
			return $user;
		}else{
			return null;
		}
	}

	// function takes id and return user
	function find_user_by_id($id) {
		global $connection;

		$query = "SELECT * FROM ";
		$query .= "users ";
		$query .= "WHERE ";
		$query .= "ID = {$id} ";

		$result = mysqli_query($connection, $query);
		confirm_query($result);

			if ($user =  mysqli_fetch_assoc($result)) {
			return $user;
		}else{
			return null;
		}
	}


	// function takes id and returns post
	function find_post_by_id($id){
		global $connection;

		$query = "SELECT * FROM ";
		$query .= "ride_posts ";
		$query .= "WHERE ";
		$query .= "ID = {$id} ";

		$result = mysqli_query($connection, $query);
		confirm_query($result);

		if ($post =  mysqli_fetch_assoc($result)) {
			return $post;
		}else{
			return null;
		}
	}


	 // functon takes username and return user
	function find_users($username) {
		global $connection;
		$safe_username = mysqli_real_escape_string($connection, $username);

		$query = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";

		$result = mysqli_query($connection, $query);
		confirm_query($result);
		if ($user =  mysqli_fetch_assoc($result)) {
			return $user;
		}else{
			return null;
		}
	}


	 // Function for login attempt
	function attempt_login($username, $password) {
		$user = find_users($username);
		if ($user) {
			//found user now cheak password
			if (password_cheak($password, $user["pass"])) {
				return $user;
			}else{
				//password not found
				return false;
			}
		}else{
			//user not found
			return false;
		}

	}

	 // Password encrypting function..
	function password_encrypt($password) {
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		
		return $hash;
	}
	 // Function to generate salt for crypt function..
	function generate_salt($length) {
		$unique_random_string = md5(uniqid(mt_rand(), true));
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_replace('+', '.', $base64_string);
		$salt = substr($modified_base64_string, 0, $length);

		return $salt;
	}


	// password cheaking function  takes inout pass and crypt it with existing hash to match the result
	function password_cheak($password, $existing_hash){
		$hash = crypt($password, $existing_hash);
		if ($hash === $existing_hash) {
			return true;
		}else{
			return false;
		}
	}


	// Authorization cheaking part ...

	function logged_in() {
		return isset($_SESSION['id']);
	}

	function authorize_page($page_atuh) {
		if (!logged_in()) {
			redirect_to("http://localhost/savar_cyclists/public/login.php");
		}elseif ($_SESSION['access'] < $page_atuh) {
			redirect_to("http://localhost/savar_cyclists/public/404.php");

		}	
	}

	//  Conditional Delete button function For  deleting post
	function delete_post($id, $id1){
		$output = "";
		if ($_SESSION['id'] == $id1 or $_SESSION['access'] == 3) {
			$output = "<a class=\"delete_button\" href=\"ride_posts/delete_post.php?id={$id}&user_id={$id1}\" onclick = \"return confirm('Are You Sure..?')\">Delete</a>";
		}

		return $output;
	}

	 //  Conditional Delet button function For  deleting coments
	function delete_comment($post_id, $post_owner_id,$comment_owner_id, $comment_id){
		$output = "";
		if ($_SESSION['id'] == $post_owner_id or $_SESSION['id'] == $comment_owner_id or $_SESSION['access'] == 3) {
			$output = "<a class=\"delete_button\" href=\"delete_comment.php?id={$comment_id}&p_id={$post_id}&pw_id={$post_owner_id}&cw_id={$comment_owner_id}\" ";
			$output .= "onclick = \"return confirm('Are You Sure..?')\">Delete</a>";
		}

		return $output;
	}

?>