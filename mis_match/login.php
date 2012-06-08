<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('Login');
?>
<body>
    <?php
        $db = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
    ?>
    <?php
        require_once('template/template_header.php');
		output_header('login');
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
         	<form action="login.php" method="post" class="ym-form" id="login_form">
         		<div class="ym-fbox-text">
         			<label for="email">email</label>
         			<input type="email" name="email" id="">
         			<label for="password">password</label>
         			<input type="password" name="password" id="">
         			<input type="submit" value="Login">
         		</div>
         	</form>
         </div>
     </div>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
