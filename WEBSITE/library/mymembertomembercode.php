<ul>

include ("../codes/adminconfig.php");

$querymembertomemberdisp= "SELECT id, title FROM mailout order by id desc"; 


$sql_resultmembertomemberdisp = mysql_query($querymembertomemberdisp, $connection) or die ("Couldn't execute query. Please try again later"); 
		$titlemembertomemberdisp=$myrowmembertomemberdisp["title"];

echo "<li>";


echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 

echo "<a href=#$idmembertomemberdisp>$titlemembertomemberdisp</a>";
echo "<BR></li>\n\n";
}
?>

<div id=indent3>

<?



if ($session->userlevel>="2"){
}

else {
$querymembertomember= "SELECT * FROM mailout order by id desc"; 
}



$sql_resultmembertomember = mysql_query($querymembertomember, $connection) or die ("Couldn't execute query. Please try again later"); 

                   $authormembertomember=$myrowmembertomember["author"];



$trans["&lt;"] = "<";
$textmembertomember = strtr($textmembertomember,$trans); 


echo "<a name=$idmembertomember></a>\n";

echo "<div id=membertomemberdiv>";

echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5 align=left> "; 

echo "<h2>$titlemembertomember</h2>\n";

echo "$textmembertomember<BR>\n";
echo "<div align=right>";
echo "<span class=lastupdated>Last updated: ";
print theDate ("d F Y","$datemembertomember");
echo "</span><BR>";
echo "</div>\n\n";
echo "</div><!-- end of membertomembers div -->";
echo "<!-- --------------- -->\n\n";
echo "<BR clear=all><hr><BR>";

