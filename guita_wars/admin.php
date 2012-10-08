<?php
    require_once('authorize.php');
    require_once('template/template_head.php');
    output_head('Administrator');
?>

<body>
    <?php
        require_once('template/template_header.php');
        output_header('admin');
    ?>
    <div class="ym-wrapper">
        <?PHP
        require_once('appvars.php');

        $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
        mysqli_query($dbc, "set names 'utf8'");
        $query = "select * from scores order by score desc, datetime asc";
        $data = mysqli_query($dbc, $query) or die('error querying database.');

        while ($row = mysqli_fetch_array($data)){
            $name = $row['name'];
            $id = $row['id'];
            $datetime = $row['datetime'];
            $score = $row['score'];
            $screen_shot = $row['screen_shot'];
            $target = guitar_wars_uploadpath.$screen_shot;
            // PHP 不支持自己覆盖自己 如：$target = $target + 1;  错：支持的问题在下面！
            $target_gb = mb_convert_encoding($target, 'gb2312', 'utf-8');

            // content start
            echo '<div class="ym-g75 ym-gl ym-clearfix content">';

            //问题一：is_file 函数只能用 target_gb
            if (is_file($target_gb) && filesize($target_gb)>0){
              //问题二: 图片链接只能用 target 为什么？？
              echo "<img class='float-right bordered' src='$target' alt='sccre image' width='250'/>";
            } else {
              echo '<img class="float-right bordered" src="images/unverified.gif" alt="unverified score" />';
            }
            echo "<p>name: $name</p><p>score: $score</p>";
            echo "<a href='remove_score.php?id=$id&name=$name&score=$score&screen_shot=$screen_shot&datetime=$datetime'>Delete</a>";
            if ($row['approved'] == 0){
                echo "<a href='approve_score.php?id=$id&name=$name&score=$score&screen_shot=$screen_shot'>Approve</a>";
            }

            // content end
            echo '</div>';
        }
        mysqli_close($dbc);
        ?>
</div>
</body>
</html>