<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include("../adminheader.php");?>
<? include("../adminnav.php");?>
<? include("inventorynav.php");?>




<div id=indent>

<? 
$page=$_POST['page'];
?>

<h2>VIEW ALL PRODUCT ITEMS</h2>

<?
function MyDate($format, $str) { 
        $year = substr($str,0,4); 
        $month = substr($str,4,2); 
        $day = substr($str,6,2); 
        $hour = substr($str,8,2); 
        $min = substr($str,10,2); 
        $sec = substr($str,12,2); 
        return date($format,mktime($hour,$min,$sec,$month,$day,$year)); 
    } 

	 ?>


<B>This is the list of all items from the Online Gallery.</B><BR><BR>
<a href=input_new.php>Add a new item?</a><BR><BR>

<?
$sort=$_REQUEST['sort'];
$lastsort=$_REQUEST['lastsort'];
?>


<!--- -------------- -->
<table border=1 width=90%>
<tr>
<td><a href="viewall.php?sort=productid&lastsort=<?echo"$sort"?>">PID</a></td>
<td width=10%><a href="viewall.php?sort=dateupdated&lastsort=<?echo"$sort"?>">Update</a></td>
<td><a href="viewall.php?sort=supercategory&lastsort=<?echo"$sort"?>">Supercategory</a></td>
<td><a href="viewall.php?sort=category&lastsort=<?echo"$sort"?>">Category</a></td>
<td><a href="viewall.php?sort=type&lastsort=<?echo"$sort"?>">TypeID</a></td>
<td><a href="viewall.php?sort=type&lastsort=<?echo"$sort"?>">Type</a></td>
<td><a href="viewall.php?sort=name&lastsort=<?echo"$sort"?>">Name</a></td>
<td></td>


<td><a href="viewall.php?sort=stackorder&lastsort=<?echo"$sort"?>">Order</a></td>
<td><a href="viewall.php?sort=publishedbox&lastsort=<?echo"$sort"?>">Live?</a></td>
<td></td><td></td>
</tr>


<? include ("../../codes/adminconfig2.php"); ?>

<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$limit = 100; 


$sqlcount= "SELECT * FROM allproducts ORDER BY category"; 
$sql_countresult = mysql_query($sqlcount, $connection) or die ("Couldn't execute query"); 
$totalrows = mysql_num_rows($sql_countresult); 

if(empty($page)){ 
$page = 1; 
} 


$limitvalue1 = $page*$limit-($limit); 

if (empty($sort)) { $sort='dateupdated'; $lastsort='dateupdated'; } 

$sql4 = "SELECT * FROM allproducts order by $sort"; 

if (empty($lastsort)) {	$sql4 = $sql4; }
	else if ( $lastsort == $sort ) { $sql4 = $sql4 . ' DESC'; }
	else { $sql4 = $sql4 . ', ' . $lastsort; }

$sql4= $sql4." LIMIT $limitvalue1, $limit";


$sql_result4 = mysql_query($sql4, $connection) or die ("Couldn't execute query" . mysql_error()); 


$f=0;

while ($myrow4 = mysql_fetch_array($sql_result4)){ 

                   $productid=$myrow4["productid"];
		   $dateupdated = $myrow4["dateupdated"];
		   $supercategory= $myrow4["supercategory"];
		   $category= $myrow4["category"];
		   $type = $myrow4["type"];
                   $name=$myrow4["name"];
                   $filename=$myrow4["filename"];
                   $stackorder=$myrow4["stackorder"];
                   $publishedbox=$myrow4["publishedbox"];


$name=html_entity_decode("$name", ENT_QUOTES);


//Alternate row colors in our table
    echo ($f % 2) ? "<tr bgcolor=\"cccccc\">" : "<tr bgcolor=\"ffffff\">";
echo "\n<!-- ******* -->\n";
echo "<td><span class=smalltext>$productid</span></td>";
echo "<td><font color=red>$dateupdated</font></td>";
echo "<td>";

if ($filename=='' || $filename==null) {
echo "<span class=rednotlive>NO FILE</span>";
} else {

echo "<a href=/downloads/$filename><img src=/downloads/$filename width=30></a><BR>";

}

echo "<BR><a href=product_enter_file.php?productid=$productid>add/edit file</a>";




echo "</td>\n";
echo "<td><span class=smalltext>";

echo "$supercategory &nbsp; ";


echo "</span>";

echo "</td>\n";
echo "<td><span class=smalltext>";


echo "<select name=category>";
 include ("list_category.php");
echo "</select>";



echo "</span>";
echo "</td>\n";






echo "<td>$type</td>";

echo "<td>";

if (isset($type) && $type !=="") {
include("../../codes/adminconfig.php");
include("producttypelist_type.php");
}

else {
echo "TO BE ASSIGNED.";
}

echo "</td>";













echo "<td><b>$name</b></td>\n";

echo "<td><span class=purple><b>$stackorder</b></span></td>\n";



echo "<td>";
if ($publishedbox =="Y") {
echo "<span class=green><b>$publishedbox</b></span>"; 
} else if ($publishedbox =="N" || $publishedbox == null || $publishedbox =="") {
echo "<span class=rednotlive>NOT LIVE</span>";
}

echo "</td>\n";
echo "<td><form method=post action=update_piece.php><input type=hidden name=productid value=$productid><input type=hidden name=maindirectorypass value=$category><input type=hidden name=mainfileimagepass value=$category><input type=submit name=submit value=update></form></td>\n";
echo "<td><form method=post action=delete_piece.php><input type=hidden name=productid value=$productid><input type=submit name=submit value=delete></form></td>\n";
 
echo "</tr>\n\n";
echo "<!--  ----  --->";
$f++; 
} 
echo "</TABLE>"; 
echo "<p align=right>";
echo "<table><tr><td>";
echo "<br>This is page $page.</p>";
echo "</td>";

if($page != 1) { 
$pageprev= $page - 1; 
echo "<td><form method=post action=$PHP_SELF><input type=hidden name=page value=$pageprev><input type=submit value=previous name=previous></form>&nbsp;</td>"; // if page is not equal to one, prev goes to $page - 1 
} 
else { 
echo "<td>&nbsp;</td>"; // Otherwise, Previous doesnt show
} 


$numofpages = $totalrows/$limit; 

for($i= 1; $i < $numofpages; $i++) { 
echo "<td><form method=post action=$PHP_SELF><input type=hidden name=page value=$i><input type=submit value=$i name=$i></form>&nbsp;</td>"; //make number navigation 
} 

if($totalrows%$limit != 0) { 
echo "<td><form method=post action=$PHP_SELF><input type=hidden name=page value=$i><input type=submit value=$i name=$i></form>&nbsp;</td>"; ////if there is a remainder, add another page 
} 


if(($totalrows-($limit*$page)) > 0){ 
$pagenext = $page + 1; 
echo "<td><form method=post action=$PHP_SELF><input type=hidden name=page value=$pagenext><input type=submit value=next name=next></form></td>"; // if the totalrows - $limit * $page is > 0 (meaning there is a remainder), leave the next button. 
} 

echo "</tr></table>";





unset ($db);
unset ($sqlcount); 
unset ($sql_countresult);
unset ($totalrows);
unset ($sql);
unset ($limitvalue1);
unset ($limit);
unset ($sql_result);
?>





</div>

<?mysql_free_result($db); mysql_close($connection); ?>

<? include ("../adminfooter.php"); ?>

<? }
?>
