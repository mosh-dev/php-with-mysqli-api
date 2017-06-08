<?php 

require_once("../../includes/dbconnect.php");
require_once("../../includes/validation_functions.php");
require_once("../../includes/functions.php");
require_once("../../includes/session.php");

authorize_page(1);

$user_id = $_SESSION['id'];
$errors = array();



$member = find_member_by_id($user_id);
$user = find_user_by_id($user_id);

$fullname = $member['name'];
$email = $member['email'];
$phone = $member['phone'];
$ephone = $member['ephone'];
$ephone_person = $member['contact_person'];
$address = $member['address'];

if (isset($_POST['submit'])) {
	$fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $ephone = $_POST['ephone'];
    $ephone_person = $_POST['ephone_person'];
    $address = $_POST['address'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    if(!name_single($fullname)) {
    	$errors["name"] = "Invalid Name";
    }
	
	if(!email_single($email)) {
        $errors["mail"] = "Invalid email";
    }

    if ($member['email'] != $email) {
    	if(!email_exists($email)){
        $errors["mail_exists"] = "Email alrady taken";
    	}
    }

    if (!empty($old_pass && $new_pass)) {
        if(!old_pass_cheak($old_pass, $user_id)) {
            $errors["password"] = "Enter your password Correctly";
        }

        if(!password($new_pass, $confirm_pass)) {
            $errors["password_2"] = "Password didnt match with confirm pass";
        }
    }
    
    if(!phone($phone)) {
        $errors["phone"] = "Invalid Phone Number, i.e +88017XXXXXXXX,017XXXXXXXX";
    }

    if(!contact_person($ephone_person)) {
        $errors["emergency"] = "Invalid Contact person Name";
    }

    if(!address($address)) {
        $errors["address"] = "Address Contains Unacceptable Charecter or empty";
    }

    if (empty($errors)) {

    	$hashed_password = password_encrypt($new_pass);
	
		//query for members table
		
    		$query1 = "UPDATE members SET ";
	    	$query1 .= "name = '{$fullname}', ";
	    	$query1 .= "email = '{$email}', ";
	    	$query1 .= "phone = '{$phone}', ";
	    	$query1 .= "ephone = '{$ephone}', ";
	    	$query1 .= "contact_person = '{$ephone_person}', ";
	    	$query1 .= "address = '{$address}' ";
	    	$query1 .= "WHERE id = {$user_id}";

	    	$result1 = mysqli_query($connection, $query1);

	    	if (!$result1) {
                die("Query 1  Failed..");
            }else {
 				$errors["success1"] = "Information updated successfully";
        	}

			if (!empty($old_pass && $new_pass)) {
			    	
		    	$query2 = "UPDATE users SET ";
		    	$query2 .= "pass = '{$hashed_password}' ";
		    	$query2 .= "WHERE id = {$user_id}";

		    	$result2 = mysqli_query($connection, $query2);

	        	if (!$result2) {
	                die("Query 2  Failed..");
	            }else {
	 				$errors["success2"] = "Password updated successfully";

				}

    		}

	}

}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Member Information</title>
	<link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../stylesheets/profile.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../stylesheets/heading.css" media="all" rel="stylesheet" type="text/css" />
	<link href="../stylesheets/error.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="heading">
		<div class="vd_panel">
	    	<h1>User Profile Page</h1>
	    	<div class="edit">
				<a class="cbtn" href="member_profile.php?id=<?php echo $user_id; ?>">Go back</a>
			</div>
	    </div>	 
	</div>

	<?php echo form_errors($errors); ?>

	<div class="container_u">
	<div class="info_panel">
	    <h3>Information</h3>
	    <form action="edit_member.php" class="edit" method="POST">
	    	<input type="submit" class="cbtn" name="submit" value="Save Changes">
	      
	</div>
    	<div class="infou">
		    <div class="c1u">
	    		<label><h3>Update information</h3></label>
				<label><input class="form" type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" placeholder = "fullname"/> </br></label>
			    <label><input class="form" type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder = "email"/> </br></label>
			    <label><input class="form" type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder = "phone"/> </br></label>
			    <label><input class="form" type="text" name="ephone" value="<?php echo htmlspecialchars($ephone); ?>" placeholder = "emergency phone"/> </br></label>
			    <label><input class="form" type="text" name="ephone_person" value="<?php echo htmlspecialchars($ephone_person); ?>" placeholder = "emergency contact person"/> </br></label>
			    <label><input class="form" type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" placeholder = "address"/> </br></label>
			</div>
			<div class="c2u">
				<label><h3>Update password</h3></label>
			    <label><input class="formp" type="password" name="old_pass" value="" placeholder = "old password"/> </br></label>
			    <label><input class="formp" type="password" name="new_pass" value="" placeholder = "new password"/> </br></label>
			    <label><input class="formp" type="password" name="confirm_pass" value="" placeholder = "confirm password"/> </br></label>
	    	</div>
	    </form> 

	</div>
	<h4 style="color: #0696FF; text-shadow: none; margin-left:20px;">NOTE : Not all information can be changed</h4>
	</div>
</body>

</html>