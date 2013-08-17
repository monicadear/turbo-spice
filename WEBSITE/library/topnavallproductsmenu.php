<div id=navproductsmenusurround>

<div id=navproductsmenu>
<div id=backgroundorange><span class=navproductsmenuheader>Current Stock</span></div>

<div id=navproductsmenuindent>

<?php include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM productsupercategory where publishedbox='Y' order by productsupercategoryshoworder"; $sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later");                 $e = 0;while ($myrow = mysql_fetch_array($sql_result)){                    $productsupercategoryid=$myrow["productsupercategoryid"];	                   $productsupercategorybigname=$myrow["productsupercategoryname"];	echo "<a href=/pages/categorysuper.php?supercategoryid=";echo "$productsupercategoryid";echo " class=navallcaps>";echo "$productsupercategorybigname";echo "</a><BR>";




// PUT IN PRODUCTCATEGORY

$dbproductcategory = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $queryproductcategory= "SELECT * FROM productcategory where productsupercategoryid='$productsupercategoryid' and publishedbox='Y' order by productcategoryshoworder"; $sql_resultproductcategory = mysql_query($queryproductcategory, $connection) or die ("Couldn't execute query. Please try again later");                 $f = 0;while ($myrowproductcategory = mysql_fetch_array($sql_resultproductcategory)){                    $productcategoryid=$myrowproductcategory["productcategoryid"];	                   $productcategorybigname=$myrowproductcategory["productcategoryname"];	echo "> <a href=/pages/category.php?categoryid=";echo "$productcategoryid";echo " class=smallnav>";echo "$productcategorybigname";echo "</a><BR>";





echo "<div id=navproductsindent>";

// PUT IN PRODUCTSUBCATEGORY

$dbproductsubcategory = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $queryproductsubcategory= "SELECT * FROM productsubcategory where productsubcategorysecid='$productcategoryid' and publishedbox='Y' order by productsubcategoryshoworder"; $sql_resultproductsubcategory = mysql_query($queryproductsubcategory, $connection) or die ("Couldn't execute query. Please try again later");                 $g = 0;while ($myrowproductsubcategory = mysql_fetch_array($sql_resultproductsubcategory)){                    $productsubcategoryid=$myrowproductsubcategory["productsubcategoryid"];	                   $productsubcategorybigname=$myrowproductsubcategory["productsubcategoryname"];	echo " <a href=/pages/categorytype.php?type=";echo "$productsubcategoryid";echo " class=smallnavsub>";echo "$productsubcategorybigname";echo "</a><BR>";







$g++;
}


echo "</div>";










$f++;
}







$e++; }?></div>
</div>

</div>

