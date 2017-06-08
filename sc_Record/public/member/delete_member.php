<?php  

	require_once("../../includes/functions.php");
	require_once("../../includes/dbconnect.php");
	require_once("../../includes/session.php");

	authorize_page(3);
	if (!isset($_GET['id'])) {
		redirect_to("../404.php");
	}

	$id = $_GET['id'];

	$current_member = find_member_by_id($id);
	$current_user = find_user_by_id($id);

	if (!$current_user or !$current_member) {
		redirect_to("../member_db.php");
	}

	$query1 = "DELETE FROM members WHERE id = {$id} LIMIT 1";
	$query2 = "DELETE FROM users WHERE id = {$id} LIMIT 1";

	$result1 = mysqli_query($connection, $query1);
	$result2 = mysqli_query($connection, $query2);
	$result3 = unlink("../" . $current_member['profile_picture']);

	if ($result1 && $result2) {
		if (mysqli_affected_rows($connection) == 1) {
			redirect_to("../member_db.php");
		}else{
			die("Failed");
		}
	}

?>