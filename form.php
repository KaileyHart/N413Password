<?php 
/*Author: Kailey Hart
//Project: N-413 Password Assignment
//Date: 02-11-2021
//Description: This page displays a form that user can fill out. The data goes to the database and is retrieved later by the messages.php file. 
*/

include("head.php") 
?>

<style>
	body {
		font-family: Arial;
	}

	#form-container {
		margin-top: 100px;
	}

	input {
		font-size: 18px;
		margin-bottom: 20px;
	}
	

	textarea {
		height: 100px;
		width: 500px;
		margin-bottom: 30px;
		font-size: 16px;
	}

	#submit {
		float: right;
	}
</style>


<div class="container-fluid">
<div id="headline" class="row mt-5">
            <div class="col-12 text-center">
                <h2>Contact Us</h2>            
            </div> <!-- /.col-12 -->
        </div> <!-- /.row -->
	<form method="POST" action="post.php">
		<div class="row mt-5">
			<div class="col-4"></div> <!-- spacer -->
			<div id="form-container" class="col-4">
				Name: <input type="text" id="name" name="name" class="form-control" value="" placeholder="Enter Name" required /><br />
				E-mail: <input type="email" id="email" name="email" class="form-control" value="" placeholder="Enter E-mail" required /><br />
				Comment: <textarea id="comment" name="comment" class="form-control" value="" placeholder="Add your comment here:"></textarea><br />
				<button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
			</div> <!-- /#form-container -->
		</div> <!-- /.row -->
	</form>
	</body>
	<script>
		var this_page = "contact";
		var page_title = "N413 PASSWORD | Contact Us"

		$(document).ready(function() {
			document.title = page_title;
			navbar_update(this_page);
		}); //document.ready
	</script>
</html>

