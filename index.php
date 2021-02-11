<?php
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This is the index.php. It displays a random list item and a short nav list on the left side of the screen.  
*/
     include("n413connect.php");
     include("head.php"); 
    $sql = "SELECT * FROM `n413_list`
            ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
?>



<div class="container-fluid">
        <div id="headline" class="row mt-5">
            <div class="col-12 text-center">
            <h1 style="text-align: center">N413 PASSWORD PROJECT</h1>
            </div> <!-- /col-12 -->
        </div> <!-- /row -->
        <div id="subtitle" class="row">
            <div class="col-12 text-center">
                <h3>Wonders of North America Top-Ten List</h3>
            </div> <!-- /col-12 -->
        </div> <!-- /row -->
        <div id="content" class="row mt-5">
            <div class="col-1"></div><!-- spacer -->
            <div class="col-2 mt-5"> <!-- navigation -->  
                <a href="list.php" ><h4 >Top Ten List</h4></a>
                <a href="form.php" ><h4>Contact Us</h4></a>   
              
            </div> 
            <div class="col-6 text-center"> <!-- image -->  
                <a href="list.php">
                    <img class="rounded-circle"  src="images/<?php echo $row["image"]; ?>" width="100%"; /><br/>
                    <h2><?php echo $row["item"]; ?></h2></a>
            </div><!-- image placeholder -->    
        </div> <!-- /row -->
    </div> <!-- /container-fluid --> 

    </body>
    <script>
        var this_page = "home";
        var page_title = "N413 PASSWORD | Top-Ten List"

        $(document).ready(() => {
            document.title = page_title;
            navbar_update(this_page);
        }) 
    </script>
    </html>