<?php
    require_once('appvars.php');
    require_once('template/template_head.php');
    output_head('Index title');
?>
<body>
    <?php
        require_once('template/template_header.php');
        output_header("index");
    ?>
     <div class="ym-wrapper">
         <div class="ym-grid">
             <div class="ym-g38 ym-gl">
                 <nav class="ym-vlist">
                    <ul>
                        <li><a href="">menu list</a></li>
                        <li><span>menu list</span>
                            <ul>
                                <li><a href="">menu lise 02</a></li>
                                <li><a href="">menu lise 02</a></li>
                            </ul>
                        </li>
                        <li><a href="">menu list</a></li>
                        <li><a href="">menu list</a></li>
                        <li><a href="">menu list</a></li>
                    </ul>
                 </nav>
             </div>
             <div class="ym-g62 ym-gr">
                 <div class="content">
                    <?php
                        if (isset($_COOKIE['id'])) {
                            $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
                            mysqli_query($dbc, "set name 'utf-8'");

                            $query = 'select * from user';
                            $result = mysqli_query($dbc, $query) or die('error querying database.');

                            while ($row = mysqli_fetch_array($result)) {
                                echo '<a href="view_profile.php?id='.$row['id'].'">'.$row['username'].' '.$row['join_date'].'</a><br />';
                            }
                            mysqli_close($dbc);
                        } else {
                            $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
                            mysqli_query($dbc, "set name 'utf-8'");

                            $query = 'select * from user';
                            $result = mysqli_query($dbc, $query) or die('error querying database.');

                            while ($row = mysqli_fetch_array($result)) {
                                echo $row['username'].' '.$row['join_date'].'<br />';
                            }
                            mysqli_close($dbc);
                        }

                    ?>
                 </div>
             </div>
         </div>
     </div>
     <?php
        require_once('template/template_footer.php');
     ?>
</body>
</html>

