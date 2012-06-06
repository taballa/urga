<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Remove customer</title>
</head>

<body>
<form action="remove_email.php" method="post">
<?php

  $dbc = mysqli_connect('localhost','root','','elvis_store') or die("Error connecting to MySQL server.");
 
  if (isset($_POST['submit']) && !empty($_POST['todelete'])){
	  foreach($_POST['todelete'] as $delete_id){
		  $query = "delete from email_list where id=$delete_id";
		  mysqli_query($dbc, $query) or die("error querying database.");
	  }
	  echo '<em>Removed customer.</em><br />';
  }

  mysqli_query($dbc,"set names 'utf8'") or die("Error querying database.");
  // 列出全部 email_list 内容
  $query = "select * from email_list";
  $result = mysqli_query($dbc,$query) or die("Error querying database.");
  while ($row = mysqli_fetch_array($result)){
	  echo '<input type="checkbox" value="'.$row['id'].'" name="todelete[]"/>';
	  echo $row['name'].' '.$row['email'].' <br />';
  }
  mysqli_close($dbc);
  
?>

  <input type="submit" name="submit" value="Remove" />
</form>
</body>
</html>