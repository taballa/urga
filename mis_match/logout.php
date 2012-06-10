
<?php
    if (isset($_COOKIE['id'])) {
        setcookie('username', '', time()-3600);
        setcookie('id', '', time()-3600);
        $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
        header('Location:'.$home_url);
    }else{
        $home_url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/index.php';
        header('Location:'.$home_url);
    }
?>