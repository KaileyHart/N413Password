<?php
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page displays the head for all of the rest of the pages. If a user is logged in, it will detect it and change the nav accordingly. 
*/
?>
<!DOCTYPE html>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
   <title>N413 PASSWORD</title>

   <!--JQuery-->
   <script src="dist/js/jquery-3.4.1.min.js" type="application/javascript"></script>
   <!--Bootstrap-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



   <script>
      function navbar_update(this_page) {
         $('#' + this_page + "_item").addClass('active');
         //$('#' + this_page + "_link").append('<span class="sr-only">(current)</span>');
      };
   </script>

   <style>
      nav {
         padding: 20px;

      }

      #nav-right {
         margin-left: 50px;
      }
   </style>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><b>N413 PASSWORD </b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="index.php">HOME <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="list.php">LIST</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="form.php">CONTACT</a>
            </li>
         </ul>
         <ul id="right_navbar" class="navbar-nav ml-auto mr-5">
        <?php 
        session_start();
        if(isset($_SESSION["user_id"])){
            if($_SESSION["role"] > 0){
                echo '
                <li id="messages_item" class="nav-item">
                    <a id="messages_link" class="nav-link" href="messages.php">MESSAGES</a>
                </li>';
            }
            echo '
            <li id="logout_item" class="nav-item">
                <a id="logout_link" class="nav-link" href="logout.php">LOGOUT</a>
            </li>';
        }else{
            echo ' 
            <li id="register_item" class="nav-item">
                <a id="register_link" class="nav-link" href="register.php">REGISTER</a>
            </li>      
            <li id="login_item" class="nav-item">
                <a id="login_link" class="nav-link" href="login.php">LOGIN</a>
            </li>';
        }
        ?>
  
      </div>
   </nav>