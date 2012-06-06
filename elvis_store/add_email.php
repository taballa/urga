<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer added</title>
</head>

<body>
<?php
  $dbc = mysqli_connect('localhost','root','','elvis_store') or die("error connecting to MySQL server.");
  mysqli_query($dbc,"set names 'utf8'");
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  
  $query = "insert into email_list(name,email) values('$name','$email')";
  mysqli_query($dbc,$query) or die("Error querying database.");
  
  echo "<a href='javascript:history.back()';>Customer added. go back</a>";
  mysqli_close($dbc);
?>
</body>
</html>