<?php
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page displays when a user logs out. It destroys the session. 
*/
    session_start();
    unset($_SESSION);
    session_destroy();
    include("head.php");
?>
<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>Account Log-out</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row mt-5">
        <div class="col-4"></div>  <!-- spacer -->
        <div class="col-4 text-center">
        <h3>We are sad to see you go :( <br> You Logged Out.</h3>
        <a href="login.php"><button class="btn btn-dark mt-5">Log In</button></a>
        </div> <!-- /.col-4 -->
    </div> <!-- /.row --> 
</div>  <!-- /.container-fluid -->
</body>
<script>
    var this_page = "logout";
    var page_title = 'N413 PASSWORD | Logout';
		
    $(document).ready(function(){ 
            document.title = page_title;
            //navbar_update(this_page);
        }); //document.ready
</script>
</html>
