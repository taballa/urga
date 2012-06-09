<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('register');
?>
<body>
    <?php
        require_once('template/template_header.php');
        output_header('register');
    ?>

    <?php
    $output_form = true;
    if (isset($_POST['submit'])) {
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$password_retype = $_POST['password_retype'];
    	
    	if ($password == $password_retype) {
	        $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
            mysqli_query($dbc, "set names 'utf8'");
	        $query = "insert into user (username, password, join_date) values ('$username', SHA('$password'), now())";
	        mysqli_query($dbc, $query) or die('error querying database.');
	        echo "OK";
            mysqli_close($dbc);

	        $output_form = false;
    	}else{
    		echo "NO";
    	}
    }
    

    if ($output_form){
    	?>
	     <div class="ym-wrapper">
	         <div class="ym-grid">
	         	<form action="register.php" method="post" class="ym-form" id="register_form">
	         		<div class="ym-fbox-text">
                        <label for="username">username</label>
                        <input type="text" name="username" id="">
                        <label for="password">password</label>
                        <input type="password" name="password" id="">
                        <label for="password_retype">password <em>(retype)</em></label>
                        <input type="password" name="password_retype" id="">
                        <input type="submit" name="submit" value="register">
	         		</div>
	         	</form>
	         </div>
	     </div>
     <?php
     }
    ?>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
