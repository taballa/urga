<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('Login');
?>
<body>
    <?php
        require_once('template/template_header.php');
		output_header('login');
    ?>

    <?php
    $output_form = true;
    if (isset($_POST['submit'])) {
    	$username = $_POST['username'];
    	$password = $_POST['password'];

        $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
        $query = "select * from user where username = '$username'";
        $result = mysqli_query($dbc, $query) or die('error querying database.');
        while ($row = mysqli_fetch_array($result)){
            $id = $row['id'];
            $join_date = $row['join_date'];
            echo "$id in $join_date to join the mis macth.";
        };
        mysqli_close($dbc);

        $output_form = false;
    }

    if ($output_form) {
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
         	<form action="login.php" method="post" class="ym-form" id="login_form">
         		<div class="ym-fbox-text">
                    <label for="username">username</label>
                    <input type="text" name="username" id="">
         			<label for="password">password</label>
         			<input type="password" name="password" id="">
         			<input type="submit" name='submit' value="Login">
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
