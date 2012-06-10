<?php
    $id = '';
    if (!isset($_COOKIE['id'])) {
        require_once('login.php');
        exit();
    } elseif (isset($_COOKIE['id']) and isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_COOKIE['id'];
    }
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('View Profile');
?>
<body>
    <?php
        require_once('template/template_header.php');
        output_header('view_profile');
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
            <?php
                $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
                mysqli_query($dbc, "set name 'utf-8'");

                $query = "select * from user where id = '$id'";
                $result = mysqli_query($dbc, $query) or die('error querying database.');

                while ($row = mysqli_fetch_array($result)) {
                    echo $row['username'].' '.$row['join_date'];
                }
                mysqli_close($dbc);
            ?>
         </div>
     </div>

	<?php
        require_once('template/template_footer.php');
   	?>
</body>
</html>
