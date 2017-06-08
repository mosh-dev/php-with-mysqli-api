<?php
	require_once("../includes/functions.php");
    require_once("../includes/validation_functions.php");
    require_once("../includes/session.php");


    authorize_page(1);

	$query = "SELECT * FROM ";
	$query .= "ride_posts ";
	$query .= "ORDER by time DESC ";


	$result = mysqli_query($connection, $query);
	confirm_query($result);


?>



<?php include("layout/header.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride Posts</title>
	<link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
	<link href="stylesheets/ride_posts.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="round-button">
	<div class="round-button-circle">
	<a href="ride_posts/new_post.php" class="round-button">NEW</a>
	</div>
</div>

<div class="container">

	<?php
		while ($row = mysqli_fetch_assoc($result)) {

		$query1 = "SELECT * FROM ";
		$query1 .= "members ";
		$query1 .= "WHERE id = '{$row['user_id']}'";

		$result1 = mysqli_query($connection, $query1);
		confirm_query($result1);

		$row1 = mysqli_fetch_assoc($result1);
	?>

	<div class="posts">
		<a href="ride_posts/post_single.php?id=<?php echo $row['id'] ?>">
			<img class="thumb" src="<?php echo $row['cover_link'] ?>" alt="sc" height="120px" width="120px">
			<h2 class="title"><?php echo $row['title'] ?></h2>
		</a>
		<div class="btn_set">			
			<?php echo delete_post($row['id'], $row1['id']);	?>

		</div>
		
		<P><?php echo $row['details'] ?></P>

		<div class="name"><div class="by">Posted by :</div> <?php echo $row1['name'] ?></div>
		<div class="date"><?php echo $row['time'] ?></div>

		
	</div>

	<?php } ?>

</div>

</body>
</html>