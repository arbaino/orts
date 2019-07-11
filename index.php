$_SESSION
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Online And Repair Tracking Servide Login Form</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />

    </head>
    
    <body>
		<?php
				if(isset($_GET['msg'])){
					echo '<center><font color="Red"><h4>'.$_GET['msg'].'</h4></font></center><br/>';					
				}
			?>
		<div id="formContainer">
			
			<form id="login" method="POST" action="controller/LoginAction.php">
				<input type="text" name="username" id="loginEmail" value="admin" />
				<input type="password" name="password" id="loginPass" value="1234" />
				<input type="submit" name="submit" value="Login" />
			</form>
		</div>
        
        <!-- JavaScript includes -->
		<!-- <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="assets/js/script.js"></script> -->

    </body>
</html>

