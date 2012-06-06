<?php
    require_once('authorize.php');
    require_once('template/template_head.php');
    output_head('Remove scre');
?>

<body>
<?php
require_once('appvars.php');
$output_form = FALSE;

if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['score']) && isset($_GET['screen_shot']) && isset($_GET['datetime'])){
    $name = $_GET['name'];
    $score = $_GET['score'];
    $id = $_GET['id'];
    $screen_shot = $_GET['screen_shot'];
    $datetime = $_GET['datetime'];
 
    $output_form = TRUE;
}else if (isset($_POST['submit'])){
    if ($_POST['confirm'] == 'yes'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $score = $_POST['score'];
        $screen_shot = $_POST['screen_shot'];
        @unlink(mb_convert_encoding(guitar_wars_uploadpath.$screen_shot, 'gb2312', 'utf-8'));
        $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting to mysql server.');
        mysqli_query($dbc, "set names 'utf8'");
        $query = "delete from scores where id=$id limit 1";
        mysqli_query($dbc, $query) or die('error querying database.');
        echo "<p>The high score of $score for $name was successfully removed.</p>" ;
        echo "<p><a href='admin.php'>Back to administartor page.</a></p>";
        
        mysqli_close($dbc);
    }else{
        echo "<p><a href='admin.php'>Back to administartor page.</a></p>";
    }
}  else {
    echo "<p class='error'>Sorry, no high score was specified for removal.</p>";
}

if ($output_form){
?>
<h1>Remove score?</h1>
<?php
    echo "
        name: $name<br />
        scroe: $score<br />
        date: $datetime<br />";
?>
<form class="ym-form" action="remove_score.php" method="post">
    <div class="ym-fbox-check">
      <input type="radio" value="yes" name="confirm" />Yes
      <input type="radio" name="confirm" value="no" checked="checked" />No
    </div>
    <div class="ym-fbox-button">
        <input type="submit" value="Remove" name="submit" />
    </div>
  <!-- hidden 供表单已删除信息确认使用 -->
  <input type="hidden" value="<?php echo $name ?>" name="name" />
  <input type="hidden" value="<?php echo $id ?>" name="id" />
  <input type="hidden" value="<?php echo $score ?>" name="score" />
  <input type="hidden" value="<?php echo $screen_shot ?>" name="screen_shot" />
</form>
<?php
}
?>
</body>
</html>