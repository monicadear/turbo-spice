<div id=pagecontentindent>
<hr><BR>
<?include("../codes/adminconfig.php");?>

$showstartyearonly = substr("$startdate", 0, 4);
$showstartmonthonly = substr("$startdate", 5, 2);
$showstartdayonly = substr("$startdate", 8, 2);





	$titlepass=urlencode($title);
echo "$showstartdayonly / \n";
echo "$showstartyearonly\n";


echo "</h2>";


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




echo "<hr color=#333333 width=90%><BR>";
</div>
<BR>