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




<div align=center><script language = "JavaScript" type="text/javascript">
document.write('<IMG SRC="/images/'+pic+'.jpg" width="85" height="60" border="0" alt="picture">')</script></div>






<?
$pid=$_REQUEST['pid'];


 ?>







<?


$dbpagecontent = "allphotosextended";

<?

$textpc = strtr($rowpc->description,$transpc); 



$picture1 = $rowpc->picture1; 
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





?>

<a href="javascript:history.go(-1)">go back</a>



<? include ("../codes/adminconfig.php"); ?>
<?
$dbpagecontentsub = "allphotosextended";
$result1pagecontentsub = mysql_db_query($database, $query1pagecontentsub);
while($rowpcsub = mysql_fetch_object($result1pagecontentsub)) {

$idpageshow = $rowpcsub->pid;


}

?>


<?

echo "<h1>$titlepc</h1>\n";



echo "<!-- TEXT-->\n";

echo "$picture1desc<BR>";
}
echo "<BR>\n";

if ($picture2 == "") {


echo "$picture2desc<BR>";
}
echo "<BR>\n";

if ($picture3 == "") {


if (isset($picture3desc)) {
echo "$picture3desc<BR>";
}
echo "<BR>\n";

if ($picture4 == "") {

if (isset($picture4desc)) {
echo "$picture4desc<BR>";
}
echo "<BR>\n";


if ($picture5 == "") {

if (isset($picture5desc)) {
echo "$picture5desc<BR>";
}
echo "<BR>\n";


if ($picture6 == "") {

if (isset($picture6desc)) {
echo "$picture6desc<BR>";
}
echo "<BR>";

if ($picture7 == "") {

if (isset($picture7desc)) {
echo "$picture7desc<BR>";
}
echo "<BR>";

if ($picture8 == "") {

}

if (isset($picture8desc)) {
echo "$picture8desc<BR>";
}
echo "<BR>";


echo "<a href=#top>top of page</a>";




<!-- end pagecontentindent -->


<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?> 