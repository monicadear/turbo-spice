<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<table border=1 bordercolor=#CCCCCC cellspacing=0 cellpadding=0>
{ 
$categoryid=$myrowcatalog["categoryid"];	
$cattitle=$myrowcatalog["categoryname"];	

?>

<?

$webdisplaylinkh="http://".$weblink;


$translinkliteration["watch?v="] = "v/";
$weblinkvideos = strtr($weblink, $translinkliteration);
$weblinkvideosshow = "http://"."".$weblinkvideos;


echo "<td>$id</td>";

echo "<td></td>";

echo "<td width=20%><span class=smalladmintext><b>$title</b></span></td>\n";

echo "<td>";

echo "<object width=322 height=266><param name=movie value='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0'></param><param name=allowFullScreen value=true></param><param name=allowScriptAccess value=always></param><embed src='$weblinkvideosshow&color1=0xb1b1b1&color2=0xcfcfcf&hl=en&feature=player_embedded&fs=1&rel=0' type=application/x-shockwave-flash allowfullscreen=true allowScriptAccess=always width=322 height=266></embed></object>";


echo "</td>";



<?
}
$g++;
?>





<hr>
<span class=red>NOT CATEGORIZED!</span><BR>

<? include ("../../codes/adminconfig.php"); ?>
echo "$titlenot: ";
echo "<a href=$weblinknot target=new>$weblinknot</a> ";
echo "<form method=post action=updater.php><input type=hidden name=id value=$idnot><input type=submit name=submit value=update></form><form method=post action=deleter.php><input type=hidden name=id value=$id><input type=submit name=submit value=delete></form><BR>";

}
$z++;
?>



<? }
?>