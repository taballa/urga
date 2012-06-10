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
    $msg = '';

    if (!isset($_COOKIE['id'])) {
        if (isset($_POST['submit'])) {
            $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
            mysqli_query($dbc, "set name 'utf-8'");
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            $query = "select id, username, password from user where username = '$username' and password = sha('$password')";
            $result = mysqli_query($dbc, $query) or die('error querying database.');
            if (mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                setcookie('username', $row['username']);
                setcookie('id', $row['id']);
                $msg = "登录成功。";
                $output_form = false;
            }else{
                $msg = '用户名或密码错误。';
            }
            mysqli_close($dbc);
        }
    }else{
        $id = $_COOKIE['id'];
        $msg = '欢迎 '."$id".' 如果不是可以<a href="login.php">退出并重新登录</a>。';
        $output_form = false;
    }
    echo '
     <div class="ym-wrapper">
         <div class="ym-grid">
            <div class="ym-gbox msg"><p>'."$msg".'</p></div>
        ';
    if ($output_form) {
    ?>
         	<form action="login.php" method="post" class="ym-form" id="login_form">
         		<div class="ym-fbox-text">
                    <label for="username">username</label>
                    <input type="text" name="username" id="">
         			<label for="password">password</label>
         			<input type="password" name="password" id="">
         			<input type="submit" name='submit' value="Login">
         		</div>
            </form>
            <div class="ym-box"><p><a href="register.php">注册</a></p></div>
     <?php
    }
    echo "
         </div>
     </div>
     ";
    ?>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
