<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Calendar Event</title>
<link rel="stylesheet" href="../style.css">
<meta HTTP-EQUIV="expires" CONTENT="0">
<meta HTTP-EQUIV="Pragma" CONTENT="cache">
<? include ("../codes/adminconfig.php"); ?>
<!-- secondary page content goes here -->
<!-- -------- ----------  -----  -->
<div id=secondarypagecontent>


<?php
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


$sql = "SELECT * FROM calendar where id = '$id'"; 
$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 

$c=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
           
                   $startdate=$myrow["startdate"];
                   $enddate=$myrow["enddate"];
                   $title=$myrow["title"];
                   $description=$myrow["description"];
		    $id=$myrow["id"];					   

$trans["&amp;"] = "&"; 
$trans["&#039;"] = "'";
$trans["&lt;"] = "<";
$trans["&gt;"] = ">";
$trans["javascript"] = "j_script";
$trans["&lt;input"] = "input_";
$title = strtr($title,$trans);
$description = strtr($description,$trans);
$trans2["@"] = "(at)";
$description = strtr($description,$trans2);

echo "<a name=$id></a><BR>\n";
echo "<h2>$title</h2>\n";
echo "<b>$startdate</b><BR>\n";
echo "$description<BR>\n";
echo "<br>";
$c++;
} 

?> 

<!-- end secondarypagecontent div --> 
</div>

</body></html>