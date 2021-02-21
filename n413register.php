<?php
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page takes the registration data from register.php, checks for errors, encrypts the password, and inserts the new account record in the database. If it is successful, it will log in the user. If not, it will show an error. 
*/

include("n413connect.php");

function sanitize($item){
    global $link;
    $item = html_entity_decode($item);
    $item = trim($item);
    $item = stripslashes($item);
    $item = strip_tags($item);
    $item = mysqli_real_escape_string( $link, $item );
    return $item;
}



//Array to hold the various messages
    $messages = array();
    $messages["status"] = 0;
    $messages["errors"] = 0;
    $messages["username_length"] = "";
    $messages["username_exists"] = "";
    $messages["email_exists"] = "";
    $messages["email_validate"] = "";
    $messages["password_length"] = "";
    $messages["success"] = "";
    $messages["failed"] = "";


    //Checks to see if the username is at least 5 characters, if the password is at least 8 characters & encrpts it
    $username = "";
    $email = "";
    $password = "";
        
    //checks user
    if(isset($_POST["username"])) { $username = $_POST["username"]; }
    $username = trim($username);
    if( strlen($username) < 5 ){
    	$messages["error"] = 1;
        $messages["username_length"] = "The Username must be at least 5 characters long.";
    }else{
        $username = sanitize($username);
    }
    
    //Hash password
    if(isset($_POST["password"])) { $password = $_POST["password"]; }
    $password = trim($password);
    if( strlen($password) < 8 ){
    	$messages["error"] = 1;
        $messages["password_length"] = "The Password must be at least 8 characters long.";
    }else{
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        if($encrypted_password){ 
            $password = $encrypted_password; 
        }else{
            $messages["errors"] = 1;
            $messages["password_length"] = "Password encryption failed.  You cannot register at this time";
        }
    }

    //Validates the email
    if(isset($_POST["email"])) { $email = $_POST["email"]; }   
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$email = sanitize($email);
    }else{
    	$messages["errors"] = 1;
    	$messages["email_validate"] = "There are problems with the e-mail address.  Please correct them.";
    }


    //Checks to make sure the user doesn't already exist
    if( ! $messages["errors"]){
        $sql = "SELECT * FROM `users_hash` WHERE username = '".$username."'";
        $result = mysqli_query($link, $sql);
        if( mysqli_num_rows($result) > 0){
            $messages["errors"] = 1;
            $messages["username_exists"] = "This Username is already in use.  Please provide a different Username";
        }
        
        $sql = "SELECT * FROM `users_hash` WHERE email = '".$email."'";
        $result = mysqli_query($link, $sql);
        if( mysqli_num_rows($result) > 0){
            $messages["errors"] = 1;
            $messages["email_exists"] = "This E-mail address is already in use.  You cannot register another account for this E-mail.";
        }
    } //if( ! $messages["errors"])

    //Inserts the new user data into the users table
    if( ! $messages["errors"]){
        $sql = "INSERT INTO `users_hash` (`id`, `username`, `email`, `password`, `role`) 
                VALUES (NULL, '".$username."', '".$email."', '".$password."', '0')";
        $result = mysqli_query($link, $sql); 
        
        $user_id = mysqli_insert_id($link);
        if($user_id){
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION["role"] = "0";
        } // if($user_id)
    }  //if( ! $messages["errors"])  
    
    //Provides user messages to let the user know if their submission was successful or not
    if(isset($_SESSION["user_id"])){
        $messages["status"] = "1";
        $messages["success"] = '<h3>You are now Registered! Feel free to explore the rest of the site.</h3>';
    }else{
        $messages["failed"] = '<h3>The Registration was not successful.</h3>
        <div class="col-12 text-center"><a href="register.php"><button type="button" class="btn btn-dark mt-5">Please Try Again</button></a></div>';
    }  

    
    echo json_encode($messages);

?>