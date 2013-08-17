<div id=sidebarbox>
<h2 class=sidebar>Announcements</h2>
<?

include ("../codes/adminconfig.php");$dbannouncedisp = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 


if ($session->userlevel>="2"){$queryannouncedisp= "SELECT id, title, description, url, evt_type FROM announcements where publish='Y' order by id desc limit 3"; 
}
else {

// HIDE TITLES if members-only
// $queryannouncedisp= "SELECT id, title, description, url, evt_type FROM announcements where evt_type='0' and publish='Y' order by id desc limit 3"; 

// Show titles even if members-only
$queryannouncedisp= "SELECT id, title, description, url, evt_type FROM announcements where publish='Y' order by id desc limit 3"; 

}


$sql_resultannouncedisp = mysql_query($queryannouncedisp, $connection) or die ("Couldn't execute query. Please try again later"); $x=0;while ($myrowannouncedisp = mysql_fetch_array($sql_resultannouncedisp)){                    $idannouncedisp=$myrowannouncedisp["id"];					   $titleannouncedisp=$myrowannouncedisp["title"];
			   $descriptionannouncedisp=$myrowannouncedisp["description"];

                   $urlannouncement=$myrowannouncedisp["url"];
		$evt_type_disp=$myrowannouncedisp["evt_type"];                  

// THIS VERSION EXPLODES BY EVERYTHING BEFORE THE FIRST period . 

// $transrot["&amp;"] = "&"; // $transrot["&#039;"] = "'";// $transrot["&lt;"] = "<";// $transrot["&gt;"] = ">";// $descriptionannouncedisp = strtr($descriptionannouncedisp,$transrot); 
// $descriptionannouncedisppieces=explode(".", $descriptionannouncedisp);
// $previewdescriptiondisp=$descriptionannouncedisppieces[0]; // piece1

$descriptionannouncedisppieces=explode(".", $descriptionannouncedisp);
$previewdescriptiondisp=$descriptionannouncedisppieces[0]; // piece1

///////////////////////////////////

// THIS VERSION SHOWS THE FIRST 57 CHARACTERS> CHOOSE WHICH YOU WANT TO ENABLE and uncomment

$trans5["&lt;BR&gt;"]= "<BR>";
$trans5["&lt;"]= "<";$trans5["&gt;"]= ">";
$descriptionannouncedisp = strtr($descriptionannouncedisp,$trans5); 
$previewdescriptiondisp = substr($descriptionannouncedisp,0,57); 


$keywords=$_REQUEST['keywords'];
if (isset($keywords) && $keywords !=="") {

$string = "<span class=redbackground>".$keywords."</span>";

$titleannouncedisp = ereg_replace($keywords,$string, $titleannouncedisp);
}
else {
}




if ($evt_type_disp=="1") {
echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 
}

else {
}

if ($urlannouncement !=="") {
echo "<a href=http://$urlannouncement class=smallannounce>$titleannouncedisp</a><BR>";
}

else {
echo "<a href=/pages/main.php?pageid=43#$idannouncedisp class=smallannounce>$titleannouncedisp</a><BR>";
}

echo "$previewdescriptiondisp...";


echo "<BR>\n\n";
}$x++; 
?>

<div align=right><a href=/pages/main.php?pageid=43 class=nounderline>> More Announcements</a></div>
</div>