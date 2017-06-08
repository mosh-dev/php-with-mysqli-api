<?php 

	require_once("../includes/session.php");
	require_once("../includes/functions.php");

	authorize_page(1);


?>

<!DOCTYPE html>
<html>
<head>
	<title>SC DB</title>
	<link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
	<link href="stylesheets/header.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">
	<div class="hlogo">
		<img src="resources/logo_s.png" alt="beetheme" width="100px">
	</div>
	
	<div class="main_nav">
		<ul class="nav">
		<?php 
			if ($_SESSION['access'] > 1) {
				echo "<li><a href=\"member_db.php\">Members</a></li>"; 
			}
		?>
			<li><a href="ride_posts.php">Posts</a></li>
		<?php 
			if ($_SESSION['access'] > 2) {
				echo "<li><a href=\"#\">Admin Panel</a></li>"; 
			}
		?>
			<li><a href="#">Announcement</a></li>
			<li style="border:none;"><a href="#">About</a></li>
		</ul>
	</div>
	
	<div class="logout">
	<a class="btnl" href="member/member_profile.php?id=<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['username']; ?></a>
	<a class="btnr" href="logout.php">Logout</a>
	</div>
</div>
