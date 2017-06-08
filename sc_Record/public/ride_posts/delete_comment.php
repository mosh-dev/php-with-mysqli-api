<?php  

require_once("../../includes/functions.php");
require_once("../../includes/dbconnect.php");
require_once("../../includes/session.php");

if (!isset($_GET['id'])) {
	redirect_to("../404.php");
}

if ($_SESSION['access'] < 3) {
	if ($_SESSION['id'] == $_GET['pw_id'] or $_SESSION['id'] == $_GET['cw_id']) {
	authorize_page(1);
}else{
	authorize_page(3);
}

}


$query1 = "DELETE FROM comments WHERE id = '{$_GET['id']}' LIMIT 1";


$result1 = mysqli_query($connection, $query1);

if ($result1) {
	if (mysqli_affected_rows($connection) == 1) {
		redirect_to("post_single.php?id={$_GET['p_id']}#bottom");
	}else{
		die("Failed");
	}
}


?>

