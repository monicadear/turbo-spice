<?php include ("../codes/adminconfig.php"); ?><BR><div id=calendarcode>
<a name=#calendarlistings></a>


<?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $todaydateforsearch=date(Y)."-".date(m)."-".date(d);

if ($session->userlevel>="2"){$sql = "SELECT startdate,title,evt_type FROM calendar where startdate >= '$todaydateforsearch' and publish='Y' order by startdate ASC"; 
}
else 
{
$sql = "SELECT startdate,title FROM calendar where startdate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow = mysql_fetch_array($sql_result)){                               $startdate=$myrow["startdate"];                   $title=$myrow["title"];
		$evt_type=$myrow["evt_type"];					   
$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);$showdateyear = substr("$startdate", 0, 4);$showdatemonth = substr("$startdate", 4, 3);$showdateday = substr("$startdate", 8, 3);$transdatesm["-01"] = " January "; $transdatesm["-02"] = " February "; $transdatesm["-03"] = " March "; $transdatesm["-04"] = " April "; $transdatesm["-05"] = " May "; $transdatesm["-06"] = " June "; $transdatesm["-07"] = " July "; $transdatesm["-08"] = " August "; $transdatesm["-09"] = " September "; $transdatesm["-10"] = " October "; $transdatesm["-11"] = " November "; $transdatesm["-12"] = " December "; $showdatemonth = strtr($showdatemonth, $transdatesm);$transdatesd[" "] = " "; $showdateday = strtr($showdateday, $transdatesd);if ($evt_type == "1") {
echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3> ";
}
echo "<b>$showdatemonth $showdateday $showdateyear</b> <a href=#$startdate>$title</a><BR>\n";$d++;} ?>


<BR><BR>

<?include("../codes/adminconfig.php");?>

<?$viewmode = $_REQUEST['viewmode'];?>

<?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $todaydateforsearch=date(Y)."-".date(m)."-".date(d);



if ($session->userlevel>="2"){$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' order by startdate ASC"; 
}
else {
$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}



$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                               $startdate=$myrow["startdate"];                   $enddate=$myrow["enddate"];                   $title=$myrow["title"];                   $description=$myrow["description"];                   $starttime=$myrow["starttime"];                   $endtime=$myrow["endtime"];                   $location=$myrow["location"];                   $price=$myrow["price"];                   $pricenonmembers=$myrow["pricenonmembers"];                   $contact=$myrow["contact"];
                   $website=$myrow["website"];
			$evt_type=$myrow["evt_type"];		    $id=$myrow["id"];					   $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);$description = strtr($description,$trans);$trans2["@"] = "(at)";$description = strtr($description,$trans2);$transdate["-01-"] = " January "; $transdate["-02-"] = " February "; $transdate["-03-"] = " March "; $transdate["-04-"] = " April "; $transdate["-05-"] = " May "; $transdate["-06-"] = " June "; $transdate["-07-"] = " July "; $transdate["-08-"] = " August "; $transdate["-09-"] = " September "; $transdate["-10-"] = " October "; $transdate["-11-"] = " November "; $transdate["-12-"] = " December "; $startdatespellout = strtr($startdate, $transdate);
$enddatespellout = strtr($enddate, $transdate);
	$titlepass=urlencode($title);$starttimepass=urlencode($starttime);$endtimepass=urlencode($endtime);$locationpass=urlencode($location);




echo "<a name=\"$startdate\"></a>\n";

echo "<h2>$title</h2>";

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





if ($price == "" || $price == null || $price == "0") {
echo "<BR>\n";}else if (isset($price) && $price >0) { echo "$$price members ";}if ($pricenonmembers == "" || $pricenonmembers == null || $pricenonmembers == "0") {echo "";}else if (isset($pricenonmembers)) { echo "($$pricenonmembers non-members) ";}
echo "<BR><a href=rsvp.php?id=$id&startdate=$startdate&starttimepass=$starttimepass&endtimepass=$endtimepass&locationpass=$locationpass&titlepass=$titlepass&price=$price&pricenonmembers=$pricenonmembers><img src=/images/rsvp.gif border=0 alt=rsvp hspace=2 width=25>RSVP: Please let us know if you're attending $title!</a><BR>\n";



echo "<hr><br>\n\n";
$c++;} ?> 
</div>