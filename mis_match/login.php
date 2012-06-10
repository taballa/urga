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
    $msg = '';

    if (!isset($_COOKIE['id'])) {
        if (isset($_POST['submit'])) {
            $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
            mysqli_query($dbc, "set name 'utf-8'");
            $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            $remember = null;
            if (isset($_POST['remember'])) {
                $remember = time() + (60*60*24*14);
            }
            $query = "select id, username, password from user where username = '$username' and password = sha('$password')";
            $result = mysqli_query($dbc, $query) or die('error querying database.');
            if (mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                setcookie('username', $row['username'], $remember);
                setcookie('id', $row['id'], $remember);
                $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
                header('Location:'.$home_url);
            }else{
                $msg = '用户名或密码错误。';
            }
            mysqli_close($dbc);
        } 
    echo '
         <div class="ym-wrapper">
             <div class="ym-grid">
                <div class="ym-gbox msg"><p>'."$msg".'</p></div>
            ';
    ?>
            <form action="login.php" method="post" class="ym-form" id="login_form">
                <div class="ym-fbox-text">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="ym-fbox-check">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">记住我</label>
                </div>
                <div class="ym-fbox-button">
                    <input type="submit" name='submit' value="Login">
                </div>
                <h6>没有用户名? <a href="register.php">立即注册</a></h6>
            </form>
    <?php
            echo "
                 </div>
             </div>
             ";
    } else {
        $view_profile_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/view_profile.php';
        header('Location:'.$view_profile_url);
    }
    ?>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
