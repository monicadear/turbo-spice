<div id=sidebarbox>
<h2 class=sidebar>Announcements</h2>
<?

include ("../codes/adminconfig.php");


if ($session->userlevel>="2"){
}
else {

// HIDE TITLES if members-only
// $queryannouncedisp= "SELECT id, title, description, url, evt_type FROM announcements where evt_type='0' and publish='Y' order by id desc limit 3"; 

// Show titles even if members-only
$queryannouncedisp= "SELECT id, title, description, url, evt_type FROM announcements where publish='Y' order by id desc limit 3"; 

}


$sql_resultannouncedisp = mysql_query($queryannouncedisp, $connection) or die ("Couldn't execute query. Please try again later"); 
			   $descriptionannouncedisp=$myrowannouncedisp["description"];

                   $urlannouncement=$myrowannouncedisp["url"];


// THIS VERSION EXPLODES BY EVERYTHING BEFORE THE FIRST period . 

// $transrot["&amp;"] = "&"; 
// $descriptionannouncedisppieces=explode(".", $descriptionannouncedisp);
// $previewdescriptiondisp=$descriptionannouncedisppieces[0]; // piece1

$descriptionannouncedisppieces=explode(".", $descriptionannouncedisp);
$previewdescriptiondisp=$descriptionannouncedisppieces[0]; // piece1

///////////////////////////////////

// THIS VERSION SHOWS THE FIRST 57 CHARACTERS> CHOOSE WHICH YOU WANT TO ENABLE and uncomment

$trans5["&lt;BR&gt;"]= "<BR>";
$trans5["&lt;"]= "<";
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
}
?>

<div align=right><a href=/pages/main.php?pageid=43 class=nounderline>> More Announcements</a></div>
</div>