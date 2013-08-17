
<?


$z=1;
echo "/* -==============  OPTION $z ===============- */\n\n\n\n";

{

$dbsupercategories="productsupercategory";

	@mysql_select_db("$database") or die( "Unable to open database"); 

	$querysupsup = "SELECT * FROM $dbsupercategories ORDER BY productsupercategoryid";


	$resultselectionmysupcategories = mysql_query($querysupsup) or die ("Couldn't submit query");



$x=1;

while ($msupcat=mysql_fetch_array($resultselectionmysupcategories)) {
	$superid=$msupcat["productsupercategoryid"];
	$supername=$msupcat["productsupercategoryname"];






echo "/* ########## THIS IS FOR My".$x." Subject MENUS ########## */\n";

$dbmysubcategories="productcategory";

	@mysql_select_db("$database") or die( "Unable to open database"); 

	$queryselectionmysubcategories = "SELECT * FROM $dbmysubcategories where productsupercategoryid= '$x' ORDER BY productcategoryid";


	$resultselectionmysubcategories = mysql_query($queryselectionmysubcategories) or die ("Couldn't submit query");


$w=1;


while ($mrmsub=mysql_fetch_array($resultselectionmysubcategories)) {
	$mscproductsubcategoryid=$mrmsub["productcategoryid"];
	$superinternalid=$mrmsub["productcategoryid"];
	$mscproductsubcategorysecid=$mrmsub["productsupercategoryid"];
	$mscproductsubcategoryname=$mrmsub["productcategoryname"];



	echo "\n/* ------- SUBMENU My".$x."Subject".$w." MENUS -------- */";
	echo "\nfunction My".$x."Subject".$w."(aMenu) {\n";
	echo "nullOptions(aMenu)\n\n";
	echo "with (aMenu){\n";
	echo "//Rewrites the text and values\n\n";
	echo "options[0]=new Option(\"Select a page\",\"none\");\n";


$dbsh="productsubcategory";
	@mysql_select_db("$database") or die( "Unable to open database"); 

	$qshead = "SELECT * FROM $dbsh WHERE productsubcategorysecid=$superinternalid ORDER BY productsubcategoryshoworder";


echo "/* QUERY: $qshead */\n";
	$rshead = mysql_query($qshead) or die ("Couldn't submit query");

$n=1;
while ($myrowsh=mysql_fetch_array($rshead)) {
	$productsubcategoryidsh=$myrowsh["productsubcategoryid"];
	$productsubcategorynamesh=$myrowsh["productsubcategoryname"];

echo "/* z=$z, x=$x, w=$w, n=$n, superid=$superid, superinternal=$superinternalid */";
	echo "options[$n]=new Option (\"$productsubcategoryidsh $productsubcategorynamesh\", \"$productsubcategoryidsh\");\n";

$n++;

}



	echo "options[0].selected=true\n\n";
	echo "}\n\n";
	echo "/* //Netscape likes a refresh, but Microsoft doesn't\n";
	echo "if (navigator.appName.indexOf('Netscape')>-1)\n";
	echo "history.go(0) */\n";
	echo "}\n\n";


$w++;
}

echo "/* ################################################# */\n\n";

$x++;
}

$z++;
echo "/* -==============  AND NEW OPTION $z ===============- */\n\n\n\n";
}

?>