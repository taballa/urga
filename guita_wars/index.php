
<?php
    require_once('template/template_head.php');
    output_head('Guita Wars - HIGH SCORE');
?>

<?php
    function show_image($target){
        if (is_file(mb_convert_encoding($target, 'gb2312', 'utf-8')) && filesize(mb_convert_encoding($target, 'gb2312', 'utf-8'))>0){
          echo "<img class='float-right bordered' src='$target' alt='sccre image' width='250'/>";
        } else {
          echo '<img class="float-right bordered" src="images/unverified.gif" alt="unverified score" />';
        }
    }
?>


<body>
    <!-- include HTML HEADER -->
    <?php
        require_once('template/template_header.php');
        output_header('index');
    ?>

    <div class="ym-wrapper">
        <div class="ym-g75 ym-gl">
        
        
        <?php
        require_once('appvars.php');

        $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting mysql server.');
        mysqli_query($dbc, "set names 'utf8'");

        $query = 'select * from scores where approved = 1 order by score desc, name asc';
        $result = mysqli_query($dbc,$query);
        $i = 0;

        while($row = mysqli_fetch_array($result)){
            $name = $row['name'];
            $score = $row['score'];
            $date = $row['datetime'];
            $screen_shot = $row['screen_shot'];
            $target = guitar_wars_uploadpath.$screen_shot;
            
            // no1 message
            if ($i == 0){
                echo '<div class="box success">
                    <p>Top Score: '.$row['score'].'</p>
                    </div>
                ';
            }

            // echo box start
            echo '<div class="ym-wbox ym-clearfix">';

            // show image
            show_image($target);

            // detail
            echo "<p>name: <strong>$name</strong></p>";
            echo "<p>score: $score</p>";
            echo "<p>time: $date</p>";

            //echo box end
            echo '</div>';

            $i++;
        }
        mysqli_close($dbc);
        ?>

        </div>
    </div>

    <footer>
    </footer>
</body>
</html>