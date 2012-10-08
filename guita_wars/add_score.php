<?php
    require_once('template/template_head.php');
    output_head('Add Score');
?>
    
<body>
    <?php
        require_once('template/template_header.php');
        output_header('add_score');
    ?>
    <div class="ym-wrapper">

    <h1>Add Score</h1>

    <?php
    require_once('appvars.php');

    $output_from = true;

    if (isset($_POST['submit'])){
      $dbc = mysqli_connect(db_host, db_user, db_password, db_name) or die('error connecting mysql server.');
      mysqli_query($dbc, "set names 'utf8'");

      $name = htmlspecialchars(mysqli_real_escape_string($dbc, trim($_POST['name'])));
      $score = trim($_POST['score']);
      if (!empty($name)){
      if (((strlen($name) + mb_strlen($name,'UTF8'))/2)<=20){
      if (!empty($score)){
      if (ctype_digit($score)){
        $screen_shot = mysqli_real_escape_string($dbc, trim($_FILES['screen_shot']['name']));
        $screen_shot_type = $_FILES['screen_shot']['type'];
        $screen_shot_size = $_FILES['screen_shot']['size'];


        if (!empty($screen_shot)){
                if (in_array($screen_shot_type, $image_type) && (max_file_size >= $screen_shot_size) && ($screen_shot_size > 0)){
                        if ($_FILES['screen_shot']['error'] == 0){
                            $screen_shot_rename = time().'_'.$screen_shot;
                            $target = guitar_wars_uploadpath.$screen_shot_rename;
                                if (move_uploaded_file($_FILES['screen_shot']['tmp_name'], iconv("UTF-8", "gb2312", $target))){
                                    $query = "insert into scores (name, score, datetime, screen_shot) values ('$name', '$score', now(), '$screen_shot_rename')";
                                    mysqli_query($dbc,$query) or die('error querying database.');

                                    //因数据库限制，实际写入的信息与用户提交的不一致，如何返回给用户？ 查询最后一条, 现在的写法不能正常查询！
    //                                $query_top1 = "select * form scores where screen_shot=$screen_shot_rename";
    //                                $result = mysqli_query($dbc, $query_top1) or die("error querying database of top1.");
    //                                $name_top1 = $result['name'];
    //                                $score_top1 = $result['score'];

                                    //Confirm success with the user
                                    echo "
                                    <strong>Thanks for adding your new high score!</strong><br />
                                    Name: $name<br />
                                    Score: $score<br />
                                    <img src='".guitar_wars_uploadpath."$screen_shot_rename' alt='Score image' width='250' />
                                    <p><a href='index.php'>Back to high scores</a></p>";
                                    $output_from = false;

                            }
                    }
                }else {echo '上传的文件不是图片，或者图片尺寸大于1MB。';}
                @unlink($_FILES['screen_shot']['tmp_name']);
        } else {echo '没有添加图片。';}
      } else {echo '成绩只能填入整数。';}
      } else {echo '需要填写成绩。';}
    } else {echo '名字过长。';}
    } else {echo '需要填写名称。';}
      mysqli_close($dbc);
    }

    if ($output_from){
    ?>
    <form class="ym-form" enctype="multipart/form-data" action="add_score.php" method="post">
      <div class="ym-fbox-text">
        <label for="name">name: </label>
        <input type="text" name="name" value="<?php if (!empty($name)){echo $name;} ?>" /><span>最多10个中文字</span>
        
        <label for="score">score:</label>
        <input type="text" name="score" id="score" value="<?php if (!empty($score)){echo $score;} ?>" />
        
        <label for="screen_shot">screen shot</label>
        <input type="file" name="screen_shot" id="screen_shot"/>
        
        <input type="submit" name="submit" value="Add score" />
      </div>
    </form>
    <?php
    }
    ?>
    </div>
</body>
</html>