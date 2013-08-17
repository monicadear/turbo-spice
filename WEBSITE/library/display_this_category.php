<?$dbsecdisplaythis="category";	@mysql_select_db("$database") or die( "Unable to open database"); 	$queryselectionsecdisplaythis = "SELECT categoryid,categoryname from $dbsecdisplaythis where categoryid='$pagecategory'";
	$resultselectionsecdisplaythis = mysql_query($queryselectionsecdisplaythis);


while ($myrowsecondnav = mysql_fetch_array($resultselectionsecdisplaythis)){ $showexistingcategory=$myrowsecondnav["categoryname"];	

if (isset($showexistingcategory)) {

$showexistingcategory=strtoupper($showexistingcategory);
 	echo "<span class=showexistingcategory>$showexistingcategory</span><BR>\n";
}

else {

}


}
mysql_close();


?>