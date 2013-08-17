<div id=sidebarbox>
<h2 class=sidebar>From the Blog</h2>

<?php$user = "SOMEUSER";$pass = "SOMEPASSFROMWORDPRESS";$database = "SOMEDATABASEFROMWORDPRESS";$connection = mysql_connect("YOURWORDPRESSHOST", $user, $pass) or die ("Go to the <a href=/blog/>blog</a>");?>

<?

$dbblogpost = "wp_posts";
$query1blogpost = "select ID, post_title, post_content from $dbblogpost where post_status='publish' order by post_date desc limit 1";

$result1blogpost = mysql_db_query($database, $query1blogpost);while($rowblogshow = mysql_fetch_object($result1blogpost)) {


$transpc["&amp;"] = "&"; $transpc["&#039;"] = "'";$transpc["&quot;"] = "'";$transpc["&lt;"] = "<";$transpc["&gt;"] = ">";$transpc["\r"] = "<BR>"; 
$transpc["\n"] = "<BR>";

$preblogcontent = $rowblogshow->post_content;

$preblogtitle = strtr($rowblogshow->post_title, $transpc);

$preblogcontent = strtr($preblogcontent,$transpc); 

$preblogcontent = substr($preblogcontent,0,250); 





echo "<h5>$preblogtitle</h5>";
echo "<span class=blogtextside>$preblogcontent... </span> ";
echo "<BR>";echo "<div align=right><a href=/blog/ class=nounderline>> More from the Blog</a></div>";unset ($id);unset ($s);unset ($user);unset ($database);unset ($connection);}?></div>
<BR>
