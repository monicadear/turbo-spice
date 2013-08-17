<!-- ALL CODE PROPERTY OF 10K GROUP LLC. --><!-- May not be used without permission  --><?php include ("../library/header.php"); ?><?php include ("../library/header2.php"); ?><?php include ("../library/header3.php"); ?>


<?php include ("exclusions.php"); ?>

<?php include ("pagepartial0.php"); ?>



<? $categoryid=$_REQUEST['categoryid'];?><div id=allcategories>
<? echo "<h1>Product Results</h1>"; ?>

<? include ("../codes/adminconfig.php"); ?>
<table border=0 cellspacing=0 cellpadding=3><tr><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM allproducts where category='$categoryid' and publishedbox='Y' order by stackorder, productid"; 

$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later");                 $e = 0;while ($myrow = mysql_fetch_array($sql_result)){                    $productid=$myrow["productid"];	                   $name=$myrow["name"];                   $description=$myrow["description"];                   $moreinfo=$myrow["moreinfo"];                   $price=$myrow["price"];                   $picture1=$myrow["picture1"];$description=html_entity_decode("$description", ENT_QUOTES);$name=html_entity_decode("$name", ENT_QUOTES);$moreinfo=html_entity_decode("$moreinfo", ENT_QUOTES);$trans5[" "] = "_"; $trans5["'"] = "_";$nametopass = strtr($name,$trans5); $productnametopass="Website".$productid;echo "<td valign=top width=33%>";if ($picture1 == "") {echo "<form method=post action=details.php><input type=hidden name=productid value='$productid'><input type=image src=/productitems/allproducts/images_allproducts/clickfordetails.jpg name=submit width=112 border=0 value=update></form>";}else if (isset($picture1)) {echo "<form method=post action=details.php><input type=hidden name=productid value='$productid'><input type=image src=/productitems/allproducts/images_allproducts/clickfordetails.jpg name=submit width=112 border=0 value=update></form><BR><form method=post action=details.php><input type=hidden name=productid value='$productid'><input type=image src=/productitems/allproducts/images_allproducts/$picture1 name=submit width=175 border=0 value=update></form>";}echo "<h4>$name</h4>\n";if ($price=="CALL" || $price=="call" || $price==null) {echo " \n";echo "<b>Please <a href=/pages/contact.php?subject=$nametopass>CONTACT US</a> for pricing.</b>\n";}else  {echo " \n";echo "<b><i>$$price</i></b>\n";}echo "</td>\n\n";$e++; 		if ($e==3)  {                              echo "</tr></table>\n\n<BR><!-- end section -->\n\n";				echo "<table border=0 width=95% cellspacing=0 cellpadding=3><tr>";	$e=0;                             }}?></tr></table>
</div><?mysql_close($connection); ?><BR clear=all>

<? include ("exclusionsbottom.php"); ?><?php include("../library/footer.php"); ?>