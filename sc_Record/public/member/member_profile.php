<?php
	require_once("../../includes/dbconnect.php");
	require_once("../../includes/functions.php");
	require_once("../../includes/session.php"); 

	// This Page Dosent exists without id
	if (!isset($_GET['id'])) {
		redirect_to("../404.php");
	}
	//l2 Authorization bypass only if user access his profile ..
	$user_id = $_SESSION['id'];
	$post_id = $_GET['id'];

	if ($user_id != $post_id) {
		authorize_page(2);
	}
		
	$member = find_member_by_id($post_id);

?>

<html>

<head>
	<title>Member Information</title>
	<link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../stylesheets/profile.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../stylesheets/heading.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="heading">
	<div class="vd_panel">
    	<h1>User Profile Page</h1>
    	<div class="cancel">
			<!--Dynamic back button -->
			<a class="cbtn" href="<?php if ($_SESSION['access'] < 2) {
				echo "../ride_posts.php";
			} else{
				echo "../member_db.php";
			}
			?>">Go back</a>
		</div>
    </div>
</div>

<div class="container">
	<div class="info_panel">
    	<h3>Information</h3>
    	<?php 
    		if ($user_id == $post_id) {
    			echo "<div class=\"edit\">
				<a class=\"cbtn\" href=\"edit_member.php\">Update Info</a>
				</div>";
    		}
		?>
    </div>
	<div class="image">
	    <img src="<?php echo "../{$member['profile_picture']}"; ?>" alt="sc" height="260px" width="260px">
	    <h2><?php echo $member['name']; ?></h2>
	</div>

    
    <div class="info">
    	<div class="c1">
			<label>Phone :</label>
		    <label>Emergency Phone :</label>
		    <label>E@mail :</label>
		    <label>Emergency contact person :</label>
		    <label>Facebook ID :</label>
		    <label>Address :</label>
		</div>
		<div class="c2">
			<label><?php echo $member['phone'];  ?></label>
		    <label><?php echo $member['ephone'];  ?></label>
		    <label><?php echo $member['email'];  ?></label>
		    <label><?php echo $member['contact_person'];  ?></label>
		    <label><?php echo $member['fbid'];  ?></label>
		    <p class="address"><?php echo $member['address'];  ?></p>
		</div>
		<div class="c3">
			<label>Date Of Birth :</label>
		    <label>Blood Group :</label>
		    <label>Gender :</label>
		    <label>Website :</label>
		    <label>ID No :</label>
		</div>
		<div class="c4">
			<label><?php echo $member['date_of_birth'];  ?></label>
		    <label><?php echo $member['blood_group'];  ?></label>
		    <label><?php echo $member['gender'];  ?></label>
		    <label><?php echo "<a href=\"http://{$member['website']}\" target=\"_blank\">{$member['website']}</a>";  ?></label>
		    <label><?php echo $member['id'];  ?></label>
		</div>
    </div>
</div>

</body>
</html>