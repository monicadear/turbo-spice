<?
$dbselectiontri= mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$queryselectiontri= "SELECT * FROM category3 where categoryid=$category3"; 


$resultselectiontri = mysql_query($queryselectiontri, $connection) or die ("Couldn't execute query. Please try again later"); 


$q=0;	while ($myrowselectiontri = mysql_fetch_array($resultselectiontri)){ 				                      $category3iddisplay3=$myrowselectiontri["categoryid"];
                   $category3namedisplay3=$myrowselectiontri["categoryname"];

$phrasetoshow3=urlencode($category3namedisplay3);

if (isset($category3) & $category3iddisplay3==$category3) {
echo "<a href=/pages/showall.php?category3=$category3iddisplay3&showbysample=3&phrasetoshow=$phrasetoshow3>$category3namedisplay3</a> &#124; \n";
}
 else {
}

   	} $q++;

?>
