<div id=sidebarbox>
<h2 class=sidebar>Upcoming Events</h2>
<a name=#calendarlistings></a>
<?php

if ($session->userlevel>="2"){
}
else 
{
$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' and evt_type=0 order by startdate ASC"; 
}


$sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); 
                   $location=$myrow["location"];
                   $starttime=$myrow["starttime"];
                   $price=$myrow["price"];
                   $pricenonmembers=$myrow["pricenonmembers"];
		$evt_type=$myrow["evt_type"];					   






$showdatemonthendshow = strtr($showdatemonthend, $transdatesm);

echo "<img src=/images/icons/personal.gif border=0 width=15 hspace=3> ";
}


if (isset ($showdatemonth) ) {
echo "When: $showdatemonthshow $showdatedayshow $showdateyear<BR>";
}

if (isset ($showdatemonthend) && ($showdatedayend !== $showdateday) ) {
echo "to $showdatemonthendshow $showdatedayendshow $showdateyearend<BR>";
}

echo "<a href=/pages/main.php?pageid=13&pagecategory=4#$startdate class=smallest>>>More Information</a> &nbsp;";


echo "<a href=rsvp.php?id=$id&startdate=$startdate&starttimepass=$starttimepass&endtimepass=$endtimepass&locationpass=$locationpass&titlepass=$titlepass&price=$price&pricenonmembers=$pricenonmembers class=smallest>>>RSVP</a><BR>\n";







echo "<BR>\n";




<div align=right><a href=/pages/main.php?pageid=13&pagecategory=4 class=nounderline>> More Events</a></div>

</div>