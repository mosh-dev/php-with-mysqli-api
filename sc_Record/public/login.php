<?php

require_once("../includes/functions.php");
require_once("../includes/dbconnect.php");
require_once("../includes/validation_functions.php");
require_once("../includes/session.php");

if (isset($_SESSION['id'])) {
      if ($_SESSION['access'] < 2) {
      redirect_to("ride_posts.php");
    }else{
      redirect_to("member_db.php");
    }  
}


$massage = array();
$username = "";

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!presence($username)){
    $massage["term"] = "Username Empty";
    }

    if(empty($massage)){
      $found_admin = attempt_login($username, $password);
      
      if ($found_admin) {
      //mark the user logged in
      $user = $found_admin["username"];
      $access = $found_admin["access"];
      $id = $found_admin['id'];
      
      $_SESSION['username'] = $user;
      $_SESSION['id'] = $id;
      $_SESSION['access'] = $access;
      redirect_to("ride_posts.php");

      //$massage["success"] = "Login success";
      if ($access < 2) {
        redirect_to("ride_posts.php");
      }else{
        redirect_to("member_db.php");
      }   
    }
    $massage["error"] = "Login Error";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
  <link href="stylesheets/login.css" media="all" rel="stylesheet" type="text/css" />
  <title>SC Login</title>
</head>

<body>
  
<div class="container">
  <div id="login">
     
  <form action="login.php" method="POST">
    <img src="../public/resources/logo.png" alt="sc" />
    <?php echo login_errors($massage); ?>
    <fieldset class="clearfix">
      
      <p><span class="fa fa-users"></span>
      <input type="text" name="username" value="<?php echo htmlspecialchars($username) ?>" placeholder="username" />
      </p>
          
      <p><span class="fa fa-key"></span>
      <input type="password" name="password"  value="" placeholder="Password" />
      </p>
          
      <p><input type="submit" name="submit" value="Sign In"></p>

    </fieldset>
  </form>
    
  <p> Copyright SC 2015</p>
    
  </div>
</div>

 
</body>

</html>

