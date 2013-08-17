<?  //adminconfig.php
if(isset($_REQUEST['user'])) die('Do not allow.');
if(isset($_REQUEST['pass'])) die('Do not allow.');
if(isset($_REQUEST['database'])) die('Do not allow.');
if(isset($_REQUEST['connection'])) die('Do not allow.');
$user = "USERNAME";$pass = "PASS";$database = "DATABASE";$connection = mysql_connect("local or DATABASE NUMBER", $user, $pass) or die ("Cannot connect to database");?>