<!-- random pix --><?php 

include("../codes/adminconfig.php");


$dbresources = "products";$queryresources = "select * from $dbresources order by rand() limit 2";

echo "$queryresources<BR>\n";

$sql_resultresources = mysql_query($queryresources, $connection) or die ("Couldn't execute query. Please try again later"); $j=0;

while ($myrowresources = mysql_fetch_array($sql_resultresources)){                    $products_idr=$myrowresources["products_id"];                   $products_imager=$myrowresources["products_image"];                   $products_modelr=$myrowresources["products_model"];
    echo "<a href=/pages/details.php?productid=$productid1 class=nameofitem>$name1</a><BR>";

if ( isset($picture11) && $picture11 !== "") {
echo "<a href=#><img src=images/$picture11 width=85 class=pretty></a>";
}
else {
echo "";
}


}

j++;


?><!-- end random pix -->
