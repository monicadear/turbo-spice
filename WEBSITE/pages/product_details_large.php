<?
/**
 * Main.php
 *
 * This is an example of the main page of a website. Here
 * users will be able to login. However, like on most sites
 * the login form doesn't just have to be on the main page,
 * but re-appear on subsequent pages, depending on whether
 * the user has logged in or not.
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 26, 2008 by Monica Flores 10kwebdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>


<? include ("../codes/functions.php"); ?>


<? include ("exclusions.php"); ?>




<?


echo "<div id=pagecontentindent>";

echo "<div id=pagecontentindenttext>";

echo "<a name=top></a>";
?>


<div id=sharewidget>
<!-- AddThis Button BEGIN -->
<a href="http://www.addthis.com/bookmark.php?v=250" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="/images/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4a228d3e3e015f94"></script>
<!-- AddThis Button END -->
</div>

<span class=toptitlegreen>get it</span> &nbsp;<span class=toptitlered>store        </span>
<BR><BR><BR>
<?$productid=$_REQUEST['productid']; ?><? include ("../codes/adminconfig.php"); ?><?$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $query= "SELECT * FROM productsmall where id=$productid"; $sql_result = mysql_query($query, $connection) or die ("<tr><td>See all of our <a href=http://growyouroakland.org/pages/main.php?pageid=40&pagecategory=6>products</a>.</td></tr>"); 

$d=1;while ($myrow = mysql_fetch_array($sql_result)){                    $id=$myrow["id"];	
                   $titlepg=$myrow["title"];
                   $title2pg=$myrow["title2"];
                   $creatorpg=$myrow["creator"];
                   $textpg=$myrow["text"];
                   $moreinfopg=$myrow["moreinfo"];
                   $price=$myrow["price"];
                   $filename=$myrow["filename"];
                   $filename2=$myrow["filename2"];
                   $webslink=$myrow["webslink"];

$transpg["&amp;"] = "&"; 
$transpg["&#039;"] = "'";
$transpg["&lt;"] = "<";
$transpg["&gt;"] = ">";

$textpg = strtr($textpg,$transpg); 
$textpg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $textpg);
$textpg = ereg_replace("\r\n", "\n<BR>", $textpg);


$moreinfopg = strtr($moreinfopg,$transpg); 
$moreinfopg = ereg_replace("\r\n\r\n", "\n<BR><BR>", $moreinfopg);
$moreinfopg = ereg_replace("\r\n", "\n<BR>", $moreinfopg);




$titlepg=html_entity_decode("$titlepg", ENT_NOQUOTES);

$trans5["'"] = "";
$trans5["&quote;"] = "_";
$nametopass = strtr($titlepg,$trans5); 
$productnametopass = $id."-".$nametopass; 

echo "<div id=productdescription>\n";

echo "<div id=storeshowpicturedetailbig>\n";

	if (isset($filename) && $filename !=="")
	{echo "<a href=product_details.php?productid=$id><img src=/productsmall/$filename border=0 width=475 alt='product'></a>\n";}

	else {echo "<img src=/downloads/comingsoon.jpg border=0 alt='coming soon' width=75>\n";}



	if (isset($filename2) && $filename2 !=="")
	{echo "<a href=product_details.php?productid=$id><img src=/productsmall/$filename2 border=0 width=320 alt='product'></a><BR>\n";}

	else {echo "";}


	echo "<a href=product_details.php?productid=$id><img src=/images/icons/shrink.jpg border=0 alt=view width=20 align=right hspace=5></a><BR>\n";


echo "<BR>\n<a href=http://growyouroakland.org/pages/main.php?pageid=40&pagecategory=6>return to store</a>\n";

echo "</div>\n";

echo "<div id=productdescriptioninside>\n";


echo "<i>$titlepg</i><BR>\n";
echo "<b>$creatorpg</b><BR>\n";
echo "<BR><BR>\n";


echo "<b>$title2pg</b>\n";

if (isset($price) && $price !=="")
{
echo " <b>$$price</b><BR>\n";
}
else {
}

echo "<BR>\n";
echo "$textpg\n";
echo "<BR><BR>\n";
echo "<i>$moreinfopg</i><BR><BR>\n";



echo "<div id=priceindent>\n";

echo "<table border=0 cellspacing=0 cellpadding=0>\n";
echo "<tr>\n";
echo "<td valign=top>\n";


if (isset($webslink) && $webslink !=="")
{
$webslink = "http://".$webslink;
echo "<a href=$webslink>";
echo "<img src=/downloads/AddtoCartButton.jpg width=100 border=0 alt='add to cart'>";
echo "</a>";
}



// if using PayPal shopping cart
else {
 include ("paypalform.php");

}


echo "</td></tr></table><!-- end price -->\n";


echo "</div>\n";
echo "</div>\n";

echo "<BR clear=all>\n";


echo "</div>\n";


$d++;
}
?>


<?
echo "<BR><BR><BR>";
echo "<div id=languagetranslation>";

echo "<a href=http://translate.google.com/translate?u=http://www.growyouroakland.org/pages/product_details_large.php?productid=$id&amp;langpair=en%7Ces&amp;hl=es&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools class=translation>en Espa&ntilde;ol</a> ";

echo "<a href=http://translate.google.com/translate?u=http://www.growyouroakland.org/pages/product_details_large.php?productid=$id&amp;langpair=en%7Czh&amp;hl=zh&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools><img src=/images/chinesetranslation.jpg border=0 alt=Chinese valign=middle></a>";


echo "</div><BR>\n";

?>




</div></div><!-- end pagecontentindent -->








<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>