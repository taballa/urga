<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('register');
?>
<body>
    <?php
        $db = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
    ?>
    <?php
        require_once('template/template_header.php');
        output_header('register');
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
         	<form action="register.php" method="post" class="ym-form" id="register_form">
         		<div class="ym-fbox-text">
         			<label for="email">email</label>
         			<input type="email" name="email" id="">
         			<label for="password">password</label>
         			<input type="password" name="password" id="">
         			<label for="password_r">password <em>(retype)</em></label>
         			<input type="password" name="password_r" id="">
         			<input type="submit" value="register">
         		</div>
         	</form>
         </div>
     </div>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
