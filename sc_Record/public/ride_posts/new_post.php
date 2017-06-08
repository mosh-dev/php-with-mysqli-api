<?php
    require_once("../../includes/functions.php");
    require_once("../../includes/validation_functions.php");
    require_once("../../includes/session.php");


        //initialization
    $errors = array();
    
    $title = "";
    $destination = "";
    $map_link = "";
    $ext_link = "";
    $details = "";

    if (isset($_POST['submit'])) {
        
        $title = $_POST['title'];
        $destination = $_POST['destination'];
        $map_link = $_POST['map_link'];
        $ext_link = $_POST['ext_link'];
        $details = mysqli_prep($_POST['details']);

        //cover Upload part
        $photo_name = rand(1000,100000)."-".$_FILES['cover']['name'];
        $photo_tmp = $_FILES['cover']['tmp_name'];
        $photo_folder = "../post_photos/";
        //converting the file name into lower case
        $new_photo_name = strtolower($photo_name);
        $final_photo_name=str_replace(' ','-',$new_photo_name);

        $cover_link = $photo_folder.$photo_name;

        move_uploaded_file($photo_tmp, "../".$photo_folder.$final_photo_name);



        if(!presence($title)){
            $errors["title"] = "Title Empty";
        }
        if(!presence($destination)){
            $errors["destination"] = "Destination empty";
        }
        if(!presence($map_link)){
            $errors["map_link"] = "Enter the map link";
        }

        if (empty($errors)) {
        $query1 = "INSERT INTO ride_posts (";
        $query1 .= "user_id,";
        $query1 .= "title,";
        $query1 .= "destination,";
        $query1 .= "map_link,";
        $query1 .= "ext_link,";
        $query1 .= "details,";
        $query1 .= "cover_link ";
        $query1 .= ")";
        $query1 .= "VALUES(";
        $query1 .= "'{$_SESSION['id']}',";
        $query1 .= "'{$title}',";
        $query1 .= "'{$destination}',";
        $query1 .= "'{$map_link}',";
        $query1 .= "'{$ext_link}',";
        $query1 .= "'{$details}',";
        $query1 .= "'{$cover_link}'";
        $query1 .= ");";

        $result1 = mysqli_query($connection, $query1);

        if (!$query1) {
            die("failed");
        }else{
            redirect_to('../ride_posts.php');
        }


        }

    }




?>

<!DOCTYPE html>
<html>
<head>
    <title>New Post</title>
    <link href="../stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/ride_posts.css" rel="stylesheet" type="text/css" >
    <link href="../stylesheets/heading.css" rel="stylesheet" type="text/css" >
    <link href="../stylesheets/error.css" rel="stylesheet" type="text/css" >
</head>

<body>

<div class="heading">
    <div class="vd_panel">
        <h1>Create A new post</h1>
        <div class="cancel">
            <a class="cbtn" href="../ride_posts.php">Cancel</a>
        </div>
    </div>
</div>


<?php echo form_errors($errors); ?>

<div class="post">
    <div class="info_panel">
        <h3>Information</h3>
        <form action="new_post.php" class="cancel" method="POST" enctype="multipart/form-data">    
            <input type="submit" class="cbtn" name="submit" value="Post">     
    </div>
            <div class="infou">
                <input class="post_title" type="text" name="title" value="" placeholder = "Title"/> </br>
                <input class="dest" type="text" name="destination" value="" placeholder = "Destination"/> </br>
                <input class="dest" type="text" name="map_link" value="" placeholder = "Enter the route Link"/> </br>
                <input class="dest" type="text" name="ext_link" value="" placeholder = "External link of this post"/>

                <input class="cover" type="file" name="cover" id="uploadFile"/>
                <h3 class="cover"> Cover :</h3>

                <h2 class="post_details"> Details </h2>
                <textarea class="details" name="details" value ="" > </textarea>
            </div>
        </form> 
</div>
    
</body>
</html>  