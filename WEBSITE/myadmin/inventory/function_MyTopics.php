
<?
$dbmytopics="productcategory";

	@mysql_select_db("$database") or die( "Unable to open database"); 

	$queryselectionmytopics = "SELECT * FROM $dbmytopics ORDER BY productcategoryid";

	$resultselectionmytopics = mysql_query($queryselectionmytopics) or die ("Couldn't submit query");


$v=1;


while ($myrowmytopics=mysql_fetch_array($resultselectionmytopics)) {
	$mytopicsproductcategoryid=$myrowmytopics["productcategoryid"];
	$productsubcategorysecid=$myrowmytopics["productsubcategorysecid"];
	$productsubcategoryname=$myrowmytopics["productsubcategoryname"];

	echo "function MyTopics$v(aMenu) {\n";
	echo "with (aMenu) {\n";
	echo "//Rewrites the text and values\n\n";
	echo "options[0]=new Option(\"Select a page\",\"none\");\n";


$db="productcategory";
	@mysql_select_db("$database") or die( "Unable to open database"); 
	$queryselectionsechead = "SELECT * FROM $db WHERE productsupercategoryid=$v ORDER BY productcategoryid";
	$resultselectionsechead = mysql_query($queryselectionsechead) or die ("Couldn't submit query");

$m=1;
while ($myrow=mysql_fetch_array($resultselectionsechead)) {
	$productcategoryid=$myrow["productcategoryid"];
	$productsupercategoryid=$myrow["productsupercategoryid"];
	$productcategoryname=$myrow["productcategoryname"];

	echo "options[$m]=new Option (\"$productcategoryid $productcategoryname\", \"$productcategoryid\");\n";

$m++;

}



	echo "options[0].selected=true\n\n";
	echo "}\n\n";
	echo "/* //Netscape likes a refresh, but Microsoft doesn't\n";
	echo "if (navigator.appName.indexOf('Netscape')>-1)\n";
	echo "history.go(0) */\n";
	echo "}\n\n";



$v++;
}
?>

<?
mysql_close();
?>