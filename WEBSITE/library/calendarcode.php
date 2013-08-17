<div id=pagecontentindent>
<hr><BR>
<?include("../codes/adminconfig.php");?><?php$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $todaydateforsearch=date(Y)."-".date(m)."-".date(d);$sql = "SELECT * FROM calendar where enddate >= '$todaydateforsearch' and publish='Y' order by startdate ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                               $startdate=$myrow["startdate"];                   $enddate=$myrow["enddate"];                   $title=$myrow["title"];                   $description=$myrow["description"];                   $starttime=$myrow["starttime"];                   $endtime=$myrow["endtime"];                   $location=$myrow["location"];                   $price=$myrow["price"];                   $pricenonmembers=$myrow["pricenonmembers"];                   $contact=$myrow["contact"];                   $website=$myrow["website"];                   $internalevent=$myrow["internalevent"];		    $id=$myrow["id"];					   $trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$title = strtr($title,$trans);$description = strtr($description,$trans);$trans2["@"] = "(at)";$description = strtr($description,$trans2);

$showstartyearonly = substr("$startdate", 0, 4);
$showstartmonthonly = substr("$startdate", 5, 2);
$showstartdayonly = substr("$startdate", 8, 2);





	$titlepass=urlencode($title);$starttimepass=urlencode($starttime);$endtimepass=urlencode($endtime);$locationpass=urlencode($location);echo "<a name=$startdate></a>\n";echo "<h2>$showstartmonthonly / ";
echo "$showstartdayonly / \n";
echo "$showstartyearonly\n";


echo "</h2>";
echo "<h3>$title</h3>";

if (isset($description) && $description !== "") {
echo "$description<BR>\n";
}
else {
echo "";
}

if (isset($location) && $location !== "") {
echo "<BR><b>Location:</b> $location<BR>\n";
}
else {
echo "";
}



if (isset($starttime) && $starttime !=="") {
echo "<BR><span class=blue>Starts: $starttime</span>\n";
}
else {
echo "";
}


if (isset($endtime) && $endtime !=="") {
echo "<BR><span class=blue>Ends: $endtime</span><BR>\n";
}
else {
echo "<BR>";
}

if (isset($website) && $website !=="") {
echo "<BR><span class=blue>Website: <a href=$website>$website</a></span><BR>\n";
}
else {
echo "";
}


if ($internalevent=="Y") {

echo "<BR><a href=/pages/rsvp.php?id=$id&startdate=$startdate&starttimepass=$starttimepass&endtime=$endtimepass&locationpass=$locationpass&titlepass=$titlepass&price=$price&pricenonmembers=$pricenonmembers class=heavy><img src=/images/rsvp.gif border=0 alt=rsvp hspace=5 width=18>RSVP online!</a><BR>\n";

}




echo "<hr color=#333333 width=90%><BR>";$c++;} ?> 
</div>
<BR>