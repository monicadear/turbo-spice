<?
/**
 * details_large.php
 *
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: March 12, 2009 by Monica Flores 10kwebdesign
 */
include("../include/session.php");
?>

<? include ("../library/myheader.php"); ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>


<? include ("exclusions.php"); ?>

<? include ("pagepartialphoto.php"); ?>
<?php include ("../codes/functions.php"); ?><? include ("../codes/adminconfig.php"); ?>



<div align=center><script language = "JavaScript" type="text/javascript">
document.write('<IMG SRC="/images/'+pic+'.jpg" width="85" height="60" border="0" alt="picture">')</script></div>






<?
$pid=$_REQUEST['pid'];


 ?>







<?


$dbpagecontent = "allphotosextended";$query1pagecontent = "select * from $dbpagecontent where pid = '$pid'";?>

<?$result1pagecontent = mysql_db_query($database, $query1pagecontent);while($rowpc = mysql_fetch_object($result1pagecontent)) {$transpc["&amp;"] = "&"; $transpc["&#039;"] = "'";$transpc["&lt;"] = "<";$transpc["&gt;"] = ">";$transpc["&quot;"] = "'";$transpc["&lt;input"] = "input_";

$textpc = strtr($rowpc->description,$transpc); $titlepc = strtr($rowpc->title, $transpc);



$picture1 = $rowpc->picture1; $picture2 = $rowpc->picture2; 
$picture3 = $rowpc->picture3;
$picture4 = $rowpc->picture4;
$picture5 = $rowpc->picture5;
$picture6 = $rowpc->picture6;
$picture7 = $rowpc->picture7;
$picture8 = $rowpc->picture8;

$picture1desc = strtr($rowpc->picture1description,$transpc); 
$picture2desc = strtr($rowpc->picture2description,$transpc); 
$picture3desc = strtr($rowpc->picture3description,$transpc); 
$picture4desc = strtr($rowpc->picture4description,$transpc); 
$picture5desc = strtr($rowpc->picture5description,$transpc); 
$picture6desc = strtr($rowpc->picture6description,$transpc); 
$picture7desc = strtr($rowpc->picture7description,$transpc); 
$picture8desc = strtr($rowpc->picture8description,$transpc); 


$category = $rowpc->category;$date = $rowpc->date;


?>

<a href="javascript:history.go(-1)">go back</a>



<? include ("../codes/adminconfig.php"); ?>
<?
$dbpagecontentsub = "allphotosextended";$query1pagecontentsub = "select * from $dbpagecontentsub where pid='$pid'";
$result1pagecontentsub = mysql_db_query($database, $query1pagecontentsub);
while($rowpcsub = mysql_fetch_object($result1pagecontentsub)) {

$idpageshow = $rowpcsub->pid;


}

?>


<?

echo "<h1>$titlepc</h1>\n";



echo "<!-- TEXT-->\n";echo "$textpc<BR><BR>\n\n";
if ($picture1 == "") {echo "";} else if (isset($picture1)) {echo "<a name=$picture1></a><a href=/photogallery/$picture1><img src=/photogallery/$picture1 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}if (isset($picture1desc)) {
echo "$picture1desc<BR>";
}
echo "<BR>\n";

if ($picture2 == "") {echo "";} else if (isset($picture2)) {echo "<a name=$picture2></a><a href=/photogallery/$picture2><img src=/photogallery/$picture2 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}

if (isset($picture2desc)) {
echo "$picture2desc<BR>";
}
echo "<BR>\n";

if ($picture3 == "") {echo "";} else if (isset($picture3)) {echo "<a name=$picture3></a><a href=/photogallery/$picture3><img src=/photogallery/$picture3 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}


if (isset($picture3desc)) {
echo "$picture3desc<BR>";
}
echo "<BR>\n";

if ($picture4 == "") {echo "";} else if (isset($picture4)) {echo "<a name=$picture4></a><a href=/photogallery/$picture4><img src=/photogallery/$picture4 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}

if (isset($picture4desc)) {
echo "$picture4desc<BR>";
}
echo "<BR>\n";


if ($picture5 == "") {echo "";} else if (isset($picture5)) {echo "<a name=$picture5></a><a href=/photogallery/$picture5><img src=/photogallery/$picture5 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}

if (isset($picture5desc)) {
echo "$picture5desc<BR>";
}
echo "<BR>\n";


if ($picture6 == "") {echo "";} else if (isset($picture6)) {echo "<a name=$picture6></a><a href=/photogallery/$picture6><img src=/photogallery/$picture6 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}

if (isset($picture6desc)) {
echo "$picture6desc<BR>";
}
echo "<BR>";

if ($picture7 == "") {echo "";} else if (isset($picture7)) {echo "<a name=$picture7></a><a href=/photogallery/$picture7><img src=/photogallery/$picture7 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";}

if (isset($picture7desc)) {
echo "$picture7desc<BR>";
}
echo "<BR>";

if ($picture8 == "") {echo "";} else if (isset($picture8)) {echo "<a name=$picture8></a><a href=/photogallery/$picture8><img src=/photogallery/$picture8 border=0 width=500 hspace=2 vspace=2></a><BR>\n\n";

}

if (isset($picture8desc)) {
echo "$picture8desc<BR>";
}
echo "<BR>";


echo "<a href=#top>top of page</a>";echo "<BR><BR>\n\n";
}?>
<?mysql_free_result($sql_result); mysql_close($connection); ?><? include ("pagepartial0end.php"); ?>


<!-- end pagecontentindent -->


<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?> 