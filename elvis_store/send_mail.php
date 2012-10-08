<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<title>Sent email</title>
</head>

<body>

<?php

$output_from = false;
$subject = '';
$body = '';

if (isset($_POST['submit'])){
  $from = "ukuleler@foxmail.com";
  $subject = $_POST['email_subject'];
  $body = $_POST['email_body'];
  
  if(empty($subject) && empty($body)){
	  echo "你忘记写标题和内容了。";
	  $output_from = true;
  }
    if(empty($subject) && !empty($body)){
	  echo "邮件加个标题会更好。";
	  $output_from = true;
  }
  if(!empty($subject) && empty($body)){
	  echo "你的邮件内容还没有写。";
	  $output_from = true;
  }
  if (!empty($subject) && !empty($body)){
		$dbc = mysqli_connect('localhost','root','','elvis_store') or die("Error connecting to MySQL server.");
		mysqli_query($dbc,"set names 'utf8'");
		$query = "select * from email_list";
		$result = mysqli_query($dbc,$query) or die("Error querying database.");
		
		while($row = mysqli_fetch_array($result)){
			$name = $row['name'];
			$email = $row['email'];
			
			$msg = "Dear $name,\n$body";
			
			mail($email,$subject,$msg, 'From:'.$from);
			
			echo "Email sent to: $email <br />";
		}
		echo "<a href='javascript:history.go(-1)'>go back</a>";
		mysqli_close($dbc);
  }
}
else{
	  $output_from = true;
}

if ($output_from){
?>
  <form action="<?php /*?><?php echo $_SERVER['php_self']; ?><?php */?>send_mail.php" method="post" id="send_mail">
    <label for="email_subject">Email subject</label>
      <input type="text" name="email_subject" id="email_subject" value="<?php echo $subject; ?>"/>
    <label for="email_body">Email body</label>
      <textarea cols="60" rows="8" name="email_body" id="email_body"><?php echo $body; ?></textarea>
      <input type="submit" value="Send mail" name="submit" />
  </form>
<?php
}
?>
</body>
</html>