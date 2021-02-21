<?php 
 include("n413connect.php");
 include("head.php");
$sql = "SELECT * FROM `form_responses`";
$result = mysqli_query($link, $sql);
$records = array();
while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
	$records[] = $row;
}
?>

<DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
		<title>Form Project | Comments</title>
		<style>
			body	{ font-family:Arial; }
            h2 {margin-top:50px;}
			h2, h4	{ text-align:center; }
			#comment-container { margin: 0 auto; max-width:10%; margin-top:20px;text-align: center; box-shadow: 5px 10px 10px #acacac; padding: 5px 10px; border: 1px solid #acacac; border-radius: 5px; }
			input { font-size:18px;margin-bottom:20px; }
			textarea {height:100px;width:300px;margin-bottom:30px;font-size:16px; }
			
            #p { margin-bottom: -5px;}
		</style>
	</head>       
	<body>
        <h2>Comments</h2>
        <h4><a href="index.php">Back to form</a></h4>
		
		<div>
			<?php
            foreach ($records as $record){
                echo '
                    <div id="comment-container" >
                    
                        <p>"'.$record["comment"].'"</p>
                        <p id="p" >Submitted By: '.$record["name"].'</p>
                        <p >Time: '.$record["timestamp"].'</p>
                    </div>';
            }
            ?>
        </div>
	</body>
</html>

