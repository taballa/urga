<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_guita_wars = "localhost";
$database_guita_wars = "guita_wars";
$username_guita_wars = "root";
$password_guita_wars = "";
$guita_wars = mysql_pconnect($hostname_guita_wars, $username_guita_wars, $password_guita_wars) or trigger_error(mysql_error(),E_USER_ERROR); 
?>