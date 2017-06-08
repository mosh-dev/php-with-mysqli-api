<?php
	require_once("../includes/functions.php");
	require_once("../includes/dbconnect.php");
    require_once("../includes/session.php");

	
	if (!isset($_SESSION['fullname'])) {
		redirect_to("index.php");
	}
    //Pulling form values from Session 
    $fullname = $_SESSION['fullname'];
    $nickname = $_SESSION['nickname'];
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $month = $_SESSION['month'];
    $date = $_SESSION['date'];
    $year = $_SESSION['year'];
    $phone = $_SESSION['phone'];
    $ephone = $_SESSION['ephone'];
    $ephone_person = $_SESSION['ephone_person'];
    $address = $_SESSION['address'];
    $website = mysqli_prep($_SESSION['website']);
    $fbid = mysqli_prep($_SESSION['fbid']);
    $gender = $_SESSION['gender'];
    $blood = $_SESSION['blood'];
    $info = mysqli_prep($_SESSION['info']);
    // Role Set By Default
    $access = "1";
    //temporat photo folder saved to session
    $photo_name = $_SESSION['photo_name'];
    $photo_tmp = $_SESSION['photo_folder'];        
    
    $final_photo_folder = "../profile_photos/";
    //combining folder and file
    $final_file = $final_photo_folder.$photo_name;       
    $temp_file = $photo_tmp.$photo_name;

    // Shorting values 
    $name = $fullname . '(' . $nickname . ')';
    $dob = $year . '/' . $month . '/' . $date;
    $hashed_password = password_encrypt($password);

    if (isset($_POST['submit'])) {

    	//query for members table
    	$query1 = "INSERT INTO members (";
    	$query1 .= "name,";
    	$query1 .= "email,";
    	$query1 .= "phone,";
    	$query1 .= "ephone,";
    	$query1 .= "contact_person,";
    	$query1 .= "date_of_birth,";
    	$query1 .= "blood_group,";
    	$query1 .= "gender,";
    	$query1 .= "address,";
    	$query1 .= "website,";
    	$query1 .= "fbid,";
    	$query1 .= "additional_info,";
    	$query1 .= "profile_picture";
        $query1 .= ")";
    	$query1 .= "VALUES(";
        $query1 .= "'{$name}',";
    	$query1 .= "'{$email}',";
    	$query1 .= "'{$phone}',";
    	$query1 .= "'{$ephone}',";
    	$query1 .= "'{$ephone_person}',";
    	$query1 .= "'{$dob}',";
    	$query1 .= "'{$blood}',";
    	$query1 .= "'{$gender}',";
    	$query1 .= "'{$address}',";
    	$query1 .= "'{$website}',";
    	$query1 .= "'{$fbid}',";
    	$query1 .= "'{$info}',";
    	$query1 .= "'{$final_file}'";
    	$query1 .= ");";

		//query for users table
		$query2 = "INSERT INTO users (";
    	$query2 .= "username,";
    	$query2 .= "pass,";
    	$query2 .= "access";
    	$query2 .= ")";
    	$query2 .= "VALUES(";
        $query2 .= "'{$username}',";
    	$query2 .= "'{$hashed_password}',";
    	$query2 .= "'{$access}'";
    	$query2 .= ");";
		
        //photo uploading and query function                                            
		$result1 = mysqli_query($connection, $query1);
		$result2 = mysqli_query($connection, $query2);
        $result3 = rename($temp_file, $final_file);

        //Error Cheaking ,Upon success taking action...
		if (!$result1) {
				die("Query1  Failed..");
			}
        if (!$result2) {
                die("Query2  Failed..");
            }
        if (!$result3) {
                echo "Photo Upload unsuccessful";
            }

		if ($result1 && $result2 && result3) {
            session_destroy();
            redirect_to("login.php");
        }


    }
       
?>

<!DOCTYPE html>
<html>



<head>
    <title>Member Information</title>
    <link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/profile.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/heading.css" media="all" rel="stylesheet" type="text/css" />
</head>


<div class="heading">
    <div class="vd_panel">
        <h1>Your Final Profile Page</h1>
    </div>
 
</div>

<div class="container">
    <div class="info_panel">
        <h3>Information</h3>
    <form action="reg_final.php" class="edit" method="POST">
    
        <button class="cbtn" name="submit" value="submit">Confirm </button>
        <a class="discard" href="index.php">Discard</a>
    
    </form> 
    </div>
    <div class="image">
            <img src="<?php echo htmlspecialchars($temp_file); ?>" alt="sc" height="260px" width="260px">
            <h2><?php echo $name; ?></h2>
    </div>

    <div class="info">
        <div class="c1">
            <label>Phone :</label>
            <label>Emergency Phone :</label>
            <label>E@mail :</label>
            <label>Emergency contact person :</label>
            <label>Facebook ID :</label>

        </div>
        <div class="c2">
            <label><?php echo $phone; ?></label>
            <label><?php echo $ephone; ?></label>
            <label><?php echo $email; ?></label>
            <label><?php echo $ephone_person; ?></label>
            <label><?php echo $fbid; ?></label>
        </div>
        <div class="c3">
            <label>Date Of Birth :</label>
            <label>Blood Group :</label>
            <label>Gender :</label>
            <label>Website :</label>


        </div>
        <div class="c4">
            <label><?php echo $dob; ?></label>
            <label><?php echo $blood; ?></label>
            <label><?php echo $gender; ?></label>
            <label><?php echo "<a href=\"http://{$website}\">{$website}</a>";  ?></label>

        </div>
    </div>
</div>

</html>