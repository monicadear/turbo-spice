<?php include ("../codes/adminconfig.php"); ?>
<a name=#calendarlistings></a>


<?php

if ($session->userlevel>="2"){
}
else 
{
$sql = "SELECT startdate,title FROM calendar where startdate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 
		$evt_type=$myrow["evt_type"];					   

echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3> ";
}



<BR><BR>

<?include("../codes/adminconfig.php");?>

<?$viewmode = $_REQUEST['viewmode'];?>





if ($session->userlevel>="2"){
}
else {
$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}




                   $website=$myrow["website"];
			$evt_type=$myrow["evt_type"];
$enddatespellout = strtr($enddate, $transdate);
	$titlepass=urlencode($title);




echo "<a name=\"$startdate\"></a>\n";



if($session->isAdmin()){
echo "<div align=right><a href=/myadmin/calendar/update_event.php?id=$id>edit this event</a></div><BR>";
}

if ($evt_type == "1") {
echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3 align=left> ";
}


if (isset($description) && $description !== "") {
echo "<BR>$description\n";
}
else {
echo "";
}

if (isset($location) && $location !== "") {
echo "<BR><span class=smaller><b>LOCATION:</b></span> $location\n";
}
else {
echo "";
}

echo "<BR><span class=smaller><b>DATE and TIME:</b></span> ";

echo "$startdatespellout\n";


if (isset($enddate)  && $enddate !==$startdate && $enddate !=="0000-00-00") {
echo " to $enddatespellout\n";
}
else {
echo "";
}




if (isset($starttime) && $starttime !=="" && $starttime!== "00:00") {
echo "<BR><span class=smallgray>Starts: $starttime</span>\n";
}
else {
echo "";
}


if (isset($endtime) && $endtime !=="" && $endtime!== "00:00") {
echo "<BR><span class=smallgray>Ends: $endtime</span>\n";
}
else {
echo "";
}




if (isset($contact) && $contact !== "") {
echo "<BR><span class=smaller><b>CONTACT:</b></span> $contact<BR>\n";
}
else {
echo "";
}

if (isset($website) && $website !== "") {
echo "<BR><span class=smaller><b>WEBSITE:</b></span> <a href=http://$website>$website</a><BR>\n";
}
else {
echo "";
}






echo "<BR>\n";}
echo "<BR><a href=rsvp.php?id=$id&startdate=$startdate&starttimepass=$starttimepass&endtimepass=$endtimepass&locationpass=$locationpass&titlepass=$titlepass&price=$price&pricenonmembers=$pricenonmembers><img src=/images/rsvp.gif border=0 alt=rsvp hspace=2 width=25>RSVP: Please let us know if you're attending $title!</a><BR>\n";



echo "<hr><br>\n\n";

</div>