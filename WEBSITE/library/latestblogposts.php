<div id=sidebarbox>
<h2 class=sidebar>From the Blog</h2>

<?php

<?

$dbblogpost = "wp_posts";
$query1blogpost = "select ID, post_title, post_content from $dbblogpost where post_status='publish' order by post_date desc limit 1";

$result1blogpost = mysql_db_query($database, $query1blogpost);


$transpc["&amp;"] = "&"; 
$transpc["\n"] = "<BR>";

$preblogcontent = $rowblogshow->post_content;

$preblogtitle = strtr($rowblogshow->post_title, $transpc);

$preblogcontent = strtr($preblogcontent,$transpc); 

$preblogcontent = substr($preblogcontent,0,250); 






echo "<span class=blogtextside>$preblogcontent... </span> ";
echo "<BR>";
<BR>