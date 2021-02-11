<?php
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page sanitizes the comments the user inputs in the form.php file. It then inserts the users data into the database. It also notifies the user if the submission was successful or not. 
*/
        include("n413connect.php");
		include("head.php");
        
        function sanitize($item){
            global $link;
            $item = html_entity_decode($item);
            $item = trim($item);
            $item = stripslashes($item);
            $item = strip_tags($item);
            $item = mysqli_real_escape_string( $link, $item );
            return $item;
        }
        
        $name = "";
        $email = "";
        $comment = "";
        
        if(isset($_POST["name"])) { $name = sanitize($_POST["name"]); }
    	if(isset($_POST["email"])) { $email = sanitize($_POST["email"]); }
        if(isset($_POST["comment"])) { $comment = sanitize($_POST["comment"]); }
        
        $sql = "INSERT INTO `form_responses` (`id`, `name`, `email`, `comment`, `timestamp`) 
        	VALUES (NULL, '".$name."', '".$email."', '".$comment."', CURRENT_TIMESTAMP)";
        $result = mysqli_query($link, $sql);
        
    ?>
    
    <DOCTYPE html>
    <html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<title>Contact Form</title>
		<style>
			body	{ font-family:Arial; }
			h2	{ text-align:center;margin-top:50px; }
			h4	{ text-align:center; }
			#message-container { width:30%;margin-left:40%;margin-top:100px; }
			.signoff{ float:right;font-style:italic;margin-top:30px; }
		</style>
	</head>       
	<body>
		<div id="message-container">
        <h2>Contact Us</h2>
		<?php
			if($result){
			    echo '<p>Thank you for submitting your comment. <a href="comments.php"> See Comments </a> or <a href="index.php">submit</a> another comment.<br/>';
			}else{
			    echo '<p>Sorry, but something went wrong.  Please try again later. <a href="index.php"> Back to Form</a><br/>';
			}
		?>
		    <span class="signoff">The Web Site Team</span></p>
		</div>
	</body>
</html>