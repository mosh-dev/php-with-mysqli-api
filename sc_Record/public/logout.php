<?php  

require_once("../includes/functions.php");
require_once("../includes/session.php");

$_SESSION  = array();
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-4200, '/');
}

$result = session_destroy();
if ($result) {
	redirect_to("index.php");
}

?>
