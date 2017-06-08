<?php
	
	require_once("../../includes/functions.php");
    require_once("../../includes/validation_functions.php");
    require_once("../../includes/session.php");

    authorize_page(1);

    if (!isset($_GET['id'])) {
		redirect_to("../404.php");
	}

	if (isset($_POST['submit'])) {
		
		$comment = mysqli_prep($_POST['comment']);

		$query4 = "INSERT INTO `comments`(";
		$query4 .= "`post_id`, ";
		$query4 .= "`user_id`, ";
		$query4 .= "`comment`)"; 
		$query4 .= "VALUES (";
		$query4 .=  "{$_GET['id']}, ";
		$query4 .= "{$_SESSION['id']}, ";
		$query4 .= "'{$comment}'";
		$query4 .= ")";
		
		if ($comment !== "") {
			$result4 = mysqli_query($connection, $query4);
			confirm_query($result4);
		}

	}


	//query for posts
	$query1 = "SELECT * FROM ";
	$query1 .= "`ride_posts` ";
	$query1 .= "WHERE id = '{$_GET['id']}'";

	$result1 = mysqli_query($connection, $query1);

	$post_row = mysqli_fetch_assoc($result1);


	//query for comments
	$query2 = "SELECT * FROM ";
	$query2 .= "`comments` ";
	$query2 .= "WHERE post_id = '{$_GET['id']}'";

	$result2 = mysqli_query($connection, $query2);



?>



<!DOCTYPE html>
<html>
<head>
	<title><?php echo $post_row['title']; ?></title>
	<link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../stylesheets/ride_posts.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/heading.css">
</head>
<body>

<div class="heading">
    <div class="vd_panel">
        <h1><?php echo $post_row['title'];  ?></h1>
        <div class="cancel">
            <a class="cbtn" href="../ride_posts.php">Back</a>
        </div>
    </div>
</div>

<div class="post_container">
	<img src="../<?php echo $post_row['cover_link']; ?>" width="100%">
	<div class="col1">
		<ul class="scol1">
			<li>Destination : </li>
			<li>Map link : </li>
			<li>External Link : </li>
		</ul>
		<ul>
			<li><?php echo $post_row['destination']; ?></li>
			<li><?php echo $post_row['map_link']; ?></li>
			<li><?php echo $post_row['ext_link']; ?></li>
		</ul>
	</div>
	
	<div class="col2">
	<!-- map iframe Reserved area   -->
	</div>
	
	<div class="post_info">
		<p><?php echo $post_row['details']; ?></p>		
	</div>

</div>

<div class="comment_container">
	<h2>Comments</h2>
	
	<?php
		while ($comment_row = mysqli_fetch_assoc($result2)) {
		
		$query3 = "SELECT name FROM ";
		$query3 .= "members ";
		$query3 .= "WHERE id = '{$comment_row['user_id']}'";
		
		$result3 = mysqli_query($connection, $query3);
		confirm_query($result3);

		// Finding comment owner by user id
		$comment_owner = mysqli_fetch_assoc($result3);

	?>

	<h3><?php echo $comment_owner['name']; ?></h3>
		<?php 
			$post_id = $_GET['id'];
			$post_owner_id = $post_row['user_id'];
			$comment_owner_id = $comment_row['user_id'];
			$comment_id = $comment_row['id'];

			echo delete_comment($post_id, $post_owner_id, $comment_owner_id, $comment_id );
		?>
	
	<p><?php echo $comment_row['comment']; ?></p>
	<p class="comment_date"><?php echo $comment_row['date_publish']; ?></p>

	
	<?php } ?>

	<form id="bottom" class="comment_input" action="post_single.php?id=<?php echo $_GET['id']; ?>#bottom" method="POST">
		<p class="new_comment">Post new Comment</p>
		<textarea class="comment_text" name="comment" ></textarea>
		<input type="submit" class="post_btn" name="submit" value="POST">
	</form>

</div>


</body>
</html>