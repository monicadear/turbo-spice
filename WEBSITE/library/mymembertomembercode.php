<ul><?

include ("../codes/adminconfig.php");$dbmembertomemberdisp = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$querymembertomemberdisp= "SELECT id, title FROM mailout order by id desc"; 


$sql_resultmembertomemberdisp = mysql_query($querymembertomemberdisp, $connection) or die ("Couldn't execute query. Please try again later"); $x=0;while ($myrowmembertomemberdisp = mysql_fetch_array($sql_resultmembertomemberdisp)){                    $idmembertomemberdisp=$myrowmembertomemberdisp["id"];
		$titlemembertomemberdisp=$myrowmembertomemberdisp["title"];                  

echo "<li>";


echo "<img src=/images/icons/personal.gif border=0 width=20 hspace=5> "; 

echo "<a href=#$idmembertomemberdisp>$titlemembertomemberdisp</a>";
echo "<BR></li>\n\n";
}$x++; 
?></ul><BR>

<div id=indent3>

<?

$dbmembertomember = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

if ($session->userlevel>="2"){$querymembertomember= "SELECT * FROM mailout order by id desc"; 
}

else {
$querymembertomember= "SELECT * FROM mailout order by id desc"; 
}



$sql_resultmembertomember = mysql_query($querymembertomember, $connection) or die ("Couldn't execute query. Please try again later"); $t=0;while ($myrowmembertomember = mysql_fetch_array($sql_resultmembertomember)){                    $idmembertomember=$myrowmembertomember["id"];                   $datemembertomember=$myrowmembertomember["date"];                   $titlemembertomember=$myrowmembertomember["title"];                   $textmembertomember=$myrowmembertomember["text"];

                   $authormembertomember=$myrowmembertomember["author"];



$trans["&lt;"] = "<";$trans["&gt;"] = ">";
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
}$t++; 
?></div>