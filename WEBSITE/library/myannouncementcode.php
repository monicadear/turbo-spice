<ul>

include ("../codes/adminconfig.php");


if ($session->userlevel>="2"){
}
else {

// SHOW ONLY PUBLIC, HIDE MEMBERS-ONLY
// $queryannouncedisp= "SELECT id, title FROM announcements where publish='Y' and evt_type='0' order by id desc"; 

// SHOW ALL
$queryannouncedisp= "SELECT id, title, evt_type FROM announcements where publish='Y' order by id desc"; 

}



$sql_resultannouncedisp = mysql_query($queryannouncedisp, $connection) or die ("Couldn't execute query. Please try again later"); 
		$titleannouncepagedisp=$myrowannouncedisp["title"];
                  


$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {

$string = "<span class=redbackground>".$keywords."</span>";

$titleannouncepagedisp = ereg_replace($keywords,$string, $titleannouncepagedisp);
}
else {
}


echo "<li>";


if ($evt_type_pagedisp=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}


echo "$titleannouncepagedisp ";





if ($evt_type_pagedisp=="1") {

	if ($session->userlevel>="2"){
	}
	else {echo "<i>members only</i><BR>\n";}


}

else {
echo "<a href=#$idannouncepagedisp>link</a>";
}


echo "<BR></li>\n\n";
}
?>
<hr><BR>

<div id=indent3>

<?



if ($session->userlevel>="2"){
}

else {
$queryannounce= "SELECT * FROM announcements where evt_type='0' and publish='Y' order by id desc"; 
}



$sql_resultannounce = mysql_query($queryannounce, $connection) or die ("Couldn't execute query. Please try again later"); 

                   $authorannounce=$myrowannounce["author"];
                   $evt_typeannounce=$myrowannounce["evt_type"];

                   $weblink=$myrowannounce["url"];


$trans["&lt;"] = "<";
$trans["&quot;"] = "'";
$textannounce = strtr($textannounce,$trans); 

$transweb["http://"] = "";
$weblink = strtr($weblink,$transweb); 


echo "<a name=$idannounce></a>\n";

echo "<div id=announcediv>";

if ($evt_type_announce=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}


echo "<h2>$titleannounce</h2>\n";

if($session->isAdmin()){
echo "<div align=right><a href=/myadmin/announcements/updateannouncement.php?id=$idannounce>edit this announcement</a></div><BR>";
}


echo "$textannounce<BR>\n";

if (isset($weblink) && $weblink !=="") {
echo "<a href=http://$weblink target=new>http://$weblink</a>";
}

echo "<BR>\n";

echo "<div align=right>";
echo "<span class=lastupdated>Last updated: ";
print theDate ("d F Y","$dateannounce");
echo "</span><BR>";

echo "<span class=supersmall>$authorannounce</span><BR>\n";

echo "</div>\n\n";
echo "</div><!-- end of announces div -->";
echo "<!-- --------------- -->\n\n";
echo "<BR><br>";

