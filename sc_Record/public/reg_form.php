<?php
    require_once("../includes/functions.php");
    require_once("../includes/validation_functions.php");
    require_once("../includes/session.php");


    //initialization
    $errors = array();
    
    $fullname = "";
    $nickname = "";
    $email = "";
    $cemail = "";
    $username = "";
    $date = "";
    $month = "";
    $year = "";
    $phone = "";
    $ephone = "";
    $ephone_person = "";
    $address = "";
    $website = "";
    $fbid = "";
    $info = "";
    $blood = "";
    $gender = "";

    $month_name = "month";
 

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $cemail = $_POST['cemail'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_pass = $_POST['confirm_pass'];
        $month = $_POST['month'];
        $date = $_POST['date'];
        $year = $_POST['year'];
        $phone = $_POST['phone'];
        $ephone = $_POST['ephone'];
        $ephone_person = $_POST['ephone_person'];
        $address = $_POST['address'];
        $website = $_POST['website'];
        $fbid = $_POST['fbid'];
        $gender = $_POST['gender'];
        $blood = $_POST['blood'];
        $info = $_POST['info'];
        $terms = $_POST['terms'];

        switch ($month) {
            case 1:
                $month_name = "January";
                break;
            case 2:
                $month_name = "february";
                break;
            case 3:
                $month_name = "march";
                break;
            case 4:
                $month_name = "april";
                break;
            case 5:
                $month_name = "may";
                break;
            case 6:
                $month_name = "june";
                break;
            case 7:
                $month_name = "july";
                break;
            case 8:
                $month_name = "august";
                break;
            case 9:
                $month_name = "september";
                break;
            case 10:
                $month_name = "october";
                break;
            case 11:
                $month_name = "november";
                break;
            case 12:
                $month_name = "december";
                break;

            
            default:
                $month_name = "month";
                break;
        }




        //profile photo Upload part
        $photo_name = rand(1000,100000)."-".$_FILES['profile_pic']['name'];
        $photo_tmp = $_FILES['profile_pic']['tmp_name'];
        $photo_folder = "../profile_photos/tmp/";
        //converting the file name into lower case
        $new_photo_name = strtolower($photo_name);
        $final_photo_name=str_replace(' ','-',$new_photo_name);


        // * validation Of all values of the Submitted Form
        
        
        if(!name($fullname, $nickname)){
            $errors["name"] = "Invalid Name";
        }

        if(!email($email, $cemail)){
            $errors["mail"] = "Invalid email";
        }
        // cheaking for uniqueness
        if(!email_exists($email)){
            $errors["mail_exists"] = "Email alrady taken";
        }
        
        if(!username($username)){
            $errors["username"] = "Invalid username, minimum length 4";
        }

        // cheaking for uniqueness
        if(!username_exists($username)){
            $errors["username_exists"] = "username alrady exists";
        }


        if(!password($password, $confirm_pass)){
            $errors["password"] = "Password minimum length 5 and should Match both Field";
        }

        if(!phone($phone)){
            $errors["phone"] = "Invalid Phone Number, i.e +88017XXXXXXXX,017XXXXXXXX";
        }

        if(!contact_person($ephone_person)){
            $errors["emergency"] = "Invalid Contact person Name";
        }

        if(!address($address)){
            $errors["address"] = "Address Contains Unacceptable Charecter or empty";
        }

        if(!fbid($fbid)){
            $errors["fbid"] = "Facebook Id not valid";
        }

        if(!length($info)){
            $errors["info"] = "Charecter Limit Exeeds  max 600";
        }

        if(!date_validation($date, $month, $year)){
            $errors["date"] = "Enter Yout Date Of Birth correctly";
        }

        if(!gen_blood($gender, $blood)){
            $errors["gen"] = "Select Your Gender And Blood Group";
        }


        if(!presence($terms)){
            $errors["term"] = "You Have to accept the Terms And Conditions";
        }

        // * End of Validation


        if (empty($errors)) {            
            //setting up values to session
            $_SESSION['fullname'] = $fullname;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['month'] = $month;
            $_SESSION['date'] = $date;
            $_SESSION['year'] = $year;
            $_SESSION['phone'] = $phone;
            $_SESSION['ephone'] = $ephone;
            $_SESSION['ephone_person'] = $ephone_person;
            $_SESSION['address'] = $address;
            $_SESSION['website'] = $website;
            $_SESSION['fbid'] = $fbid;
            $_SESSION['gender'] = $gender;
            $_SESSION['blood'] = $blood;
            $_SESSION['info'] = $info;
            $_SESSION['terms'] = $terms;
            //profile photo Upload and passing the temp folder to session
            $_SESSION['photo_name'] = $final_photo_name;
            $_SESSION['photo_folder'] = $photo_folder;
            move_uploaded_file($photo_tmp, $photo_folder.$final_photo_name);

         	redirect_to('reg_final.php');
   		}
    }


?>

<!DOCTYPE html>
<html>

<head>
    <title>SC registration Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/reg_form.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/error.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>

	<?php echo form_errors($errors); ?>

	<form action="reg_form.php" class="register" method="POST" enctype="multipart/form-data">
	<div class="heading">
		 <img src="resources/img/form_logo.png" alt="sc" height="200px" width="auto"> 
	</div>
	<fieldset class="row1">
	<legend>Personal Information</legend>
	        <div class="r1c1">                 
            <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" placeholder = "fullname"/> </br>
            <input type="text" name="nickname" value="<?php echo htmlspecialchars($nickname); ?>" placeholder = "nickname"/></br>                   
        	<input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder = "em@il"/> </br>
            <input type="email" name="cemail" value="<?php echo htmlspecialchars($cemail); ?>" placeholder = "confirm em@il" />
            </div> 
           	<div class="r1c2">                 
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" placeholder = "username"/> </br>
            <input type="password" name="password" value="" placeholder = "password"/></br>                   
        	<input type="password" name="confirm_pass" value="" placeholder = "confirm password"/> </br>
            
            <select name="month">
                        <option value="<?php echo $month; ?>"><?php echo $month_name; ?>
                        </option>
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>


                    <select class="date" name="date" >
                        <option value="<?php echo $date; ?>"><?php  if (empty($date)) {
                            echo "date";
                        }else{
                            echo $date;
                        }
                        ?>
                        </option>
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <input class="year" type="text" name="year" value="<?php echo htmlspecialchars($year); ?>" size="4" maxlength="4" placeholder = "year"/>
                    <h4 style="margin-left: 5px"> Date Of birth</h4>
            </div> 

            <!-- Profile Image Input part ....  -->
        <div class="r1c3">
            	       
        <input type="file" name="profile_pic" id="uploadFile"/>
        <h3 style="text-align: center;color: white;"> Profile Photo</h3>
        
        </div>

	</fieldset>

	<fieldset class="row2">
	<legend>Contact Information</legend>
		<div class="r2c1">
		    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder = "contact number"/> </br>
		    <input type="text" name="ephone" value="<?php echo htmlspecialchars($ephone); ?>" placeholder = "emergency contact number"/></br>                   
			<input type="text" name="ephone_person" value="<?php echo htmlspecialchars($ephone_person); ?>" placeholder = "Person to contact"/> </br>
		</div>
		<div class="r2c2">
		    <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" placeholder = "permanent address"/> </br>
		    <input type="text" name="website" value="<?php echo htmlspecialchars($website); ?>" placeholder = "website"/></br>                   
			<input type="text" name="fbid" value="<?php echo htmlspecialchars($fbid); ?>" placeholder = "facebook id"/> </br>
		</div> 
	</fieldset> 
	<fieldset class="row3">
	<legend>Further Information</legend>
		<div class="r3c1">
		    <div class="select">
		    <label> I am * </label>
	        <select name="gender" >
	        <option value="<?php echo $gender; ?>"> <?php echo $gender; ?></option>
	        <option value="Male">Male </option>
	        <option value="Female">Female </option>
	        </select>
	        </div>
		    
		    <div class="select">
		    <label> Blood group * </label>
	        <select name="blood" >
	        <option value="<?php echo $blood; ?>"><?php echo $blood; ?> </option>
	        <option value="A+">A+ </option>
	        <option value="A-">A- </option>
	        </select>
	        </div>
		</div>
		<div class="r3c2">
		    <h4 style="margin-left: 5px"> Adiitional inoformation box</h4>
	        <textarea class="info" name="info" value ="<?php echo htmlspecialchars($info); ?>" > <?php echo htmlspecialchars($info); ?></textarea>

		</div>

	</fieldset>
	<fieldset class="row4">
	               
	        <p class="agreement">
	            <input type="hidden" name="terms" value="" />
	            <input type="checkbox" name="terms" value="1"/>
	            <!-- Here goes the terms And conditions -->
	            <label>*  I accept the <a href="#">Terms and Conditions</a></label>
	        </p>
	        <div>
	            <button class="reg_btn" name="submit" value="submit"> Register </button>
	        </div>  

	</fieldset>
	        
	</form>
    
</body>
</html>  