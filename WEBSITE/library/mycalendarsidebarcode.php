<div id=sidebarbox>
<h2 class=sidebar>Upcoming Events</h2>
<a name=#calendarlistings></a>
<?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $todaydateforsearch=date(Y)."-".date(m)."-".date(d);

if ($session->userlevel>="2"){$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' order by startdate ASC"; 
}
else 
{
$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow = mysql_fetch_array($sql_result)){                               $startdate=$myrow["startdate"];                   $enddate=$myrow["enddate"];                   $title=$myrow["title"];
                   $location=$myrow["location"];
                   $starttime=$myrow["starttime"];                   $endtime=$myrow["endtime"];
                   $price=$myrow["price"];
                   $pricenonmembers=$myrow["pricenonmembers"];
		$evt_type=$myrow["evt_type"];					   
$starttimepass=urlencode($starttime);$endtimepass=urlencode($endtime);$locationpass=urlencode($location);

$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);$showdateyear = substr("$startdate", 0, 4);$showdatemonth = substr("$startdate", 4, 3);$showdateday = substr("$startdate", 8, 3);
$showdateyearend = substr("$enddate", 0, 4);$showdatemonthend = substr("$enddate", 4, 3);$showdatedayend = substr("$enddate", 8, 3);

$transdatesm["-01"] = " January "; $transdatesm["-02"] = " February "; $transdatesm["-03"] = " March "; $transdatesm["-04"] = " April "; $transdatesm["-05"] = " May "; $transdatesm["-06"] = " June "; $transdatesm["-07"] = " July "; $transdatesm["-08"] = " August "; $transdatesm["-09"] = " September "; $transdatesm["-10"] = " October "; $transdatesm["-11"] = " November "; $transdatesm["-12"] = " December "; $showdatemonthshow = strtr($showdatemonth, $transdatesm);
$showdatemonthendshow = strtr($showdatemonthend, $transdatesm);
$transdatesd[" "] = " "; $showdatedayshow = strtr($showdateday, $transdatesd);$showdatedayendshow = strtr($showdatedayend, $transdatesd);$transtitle[" "] = "%20";$titlepass= strtr($title,$transtitle);if ($evt_type == "1") {
echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3> ";
}
echo "$title<BR>\n";

if (isset ($showdatemonth) ) {
echo "When: $showdatemonthshow $showdatedayshow $showdateyear<BR>";
}

if (isset ($showdatemonthend) && ($showdatedayend !== $showdateday) ) {
echo "to $showdatemonthendshow $showdatedayendshow $showdateyearend<BR>";
}

echo "<a href=/pages/main.php?pageid=13&pagecategory=4#$startdate class=smallest>>>More Information</a> &nbsp;";


echo "<a href=rsvp.php?id=$id&startdate=$startdate&starttimepass=$starttimepass&endtimepass=$endtimepass&locationpass=$locationpass&titlepass=$titlepass&price=$price&pricenonmembers=$pricenonmembers class=smallest>>>RSVP</a><BR>\n";







echo "<BR>\n";$d++;} ?>




<div align=right><a href=/pages/main.php?pageid=13&pagecategory=4 class=nounderline>> More Events</a></div>

</div>