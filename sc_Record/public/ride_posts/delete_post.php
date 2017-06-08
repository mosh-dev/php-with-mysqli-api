<?php  

require_once("../../includes/functions.php");
require_once("../../includes/dbconnect.php");
require_once("../../includes/session.php");

if ($_SESSION['id'] == $_GET['user_id']) {
	authorize_page(1);
}else{
	authorize_page(3);
}

if (!isset($_GET['id'])) {
	redirect_to("../404.php");
}

//  obtain current post to unlink the  image attachment and extra cheak
$current_post = find_post_by_id($_GET['id']);

if ($_SESSION['access'] < 3) {
	if ($_SESSION['id'] != $current_post['user_id']) {
	redirect_to("../404.php");
	}
}

$query1 = "DELETE FROM ride_posts WHERE id = '{$_GET['id']}' LIMIT 1";


$result1 = mysqli_query($connection, $query1);
$result2 = unlink("../" . $current_post['cover_link']);


if ($result1) {
	if (mysqli_affected_rows($connection) == 1) {
		redirect_to("../ride_posts.php");
	}else{
		die("Failed");
	}
}
?>

