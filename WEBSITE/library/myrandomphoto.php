<!-- random pix -->

include("../codes/adminconfig.php");


$dbresources = "products";

echo "$queryresources<BR>\n";

$sql_resultresources = mysql_query($queryresources, $connection) or die ("Couldn't execute query. Please try again later"); 

while ($myrowresources = mysql_fetch_array($sql_resultresources)){ 


if ( isset($picture11) && $picture11 !== "") {
echo "<a href=#><img src=images/$picture11 width=85 class=pretty></a>";
}
else {
echo "";
}


}

j++;


?>