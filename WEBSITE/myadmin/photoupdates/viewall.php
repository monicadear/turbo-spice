<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a><BR>";



}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("allphotos_nav.php"); ?>

<h1>Admin: Edit Photo Galleries</h1>

<p>
<B>You may edit these pictures within the Photo Galleries for the site.</B></p>



<table border=1>
<?
$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 
$query= "SELECT * FROM allphotosextended order by showorder asc"; 
$sql_result = mysql_query($query, $connection) or die ("Couldn't execute query. Please try again later"); 

$e=0;
while ($myrow = mysql_fetch_array($sql_result)){ 
                   $pid=$myrow["pid"];		
                   $title=$myrow["title"];
                   $description=$myrow["description"];
                   $author=$myrow["author"];
                   $thumbnail=$myrow["thumbnail"];
                   $picture1=$myrow["picture1"];
                   $picture1desc=$myrow["picture1description"];
                   $picture2=$myrow["picture2"];
                   $picture2desc=$myrow["picture2description"];
                   $picture3=$myrow["picture3"];
                   $picture3desc=$myrow["picture3description"];
                   $picture4=$myrow["picture4"];
                   $picture4desc=$myrow["picture4description"];
                   $picture5=$myrow["picture5"];
                   $picture5desc=$myrow["picture5description"];
                   $picture6=$myrow["picture6"];
                   $picture6desc=$myrow["picture6description"];
                   $picture7=$myrow["picture7"];
                   $picture7desc=$myrow["picture7description"];
                   $picture8=$myrow["picture8"];
                   $picture8desc=$myrow["picture8description"];
                   $showorder=$myrow["showorder"];


$pos = strpos($description,"&lt;BR&gt;&lt;BR&gt;"); 
$preview = substr($description,0,$pos-5); 

$trans5["&lt;b&gt;"]= "<b>";
$trans5["&lt;/b&gt;"]= "</b>";
$trans5["&lt;i&gt;"]= "<i>";
$trans5["&lt;/i&gt;"]= "</i>";
$trans5["&lt;BR&gt;"]= "<BR>";
$preview = strtr($preview,$trans5);

$picture1desc=strtr($picture1desc,$trans5);
$picture2desc=strtr($picture2desc,$trans5);
$picture3desc=strtr($picture3desc,$trans5);
$picture4desc=strtr($picture4desc,$trans5);
$picture5desc=strtr($picture5desc,$trans5);
$picture6desc=strtr($picture6desc,$trans5);
$picture7desc=strtr($picture7desc,$trans5);
$picture8desc=strtr($picture8desc,$trans5);



echo "<tr>";
echo "<td valign=top>$showorder</td>";
echo "<td valign=top>ID=$pid</td>";
echo "<td valign=top width=10%>";
echo "<i>$title</i><BR>";



echo "<img src=/thumbs/$thumbnail width=150><BR>";
echo "<a href=addthumb.php?pid=$pid>edit thumbnail</a><BR>";


echo "<span class=smalladmintext>$description</span><BR><BR>";

if (isset($author) && $author !=="") {
echo "Photographer: <span class=smalladmintext>$author</span><BR>";
}

echo "<form method=post action=update.php><input type=hidden name=pid value=$pid><input type=submit name=submit value=update></form>";


echo "</td>\n";

echo "<td valign=top><form method=post action=update.php><input type=hidden name=pid value=$pid><input type=submit name=submit value=update></form></td>\n";


echo "<td valign=top>";
if ($picture1 == "")
{
echo "<form method=post action=addphoto.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture1 width=100 hspace=5><BR>
<form method=post action=addphoto.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='change photo'></form><BR><form method=post action=delete_picture.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form><BR>\n";
}


echo "<BR><span class=smalladmintext>$picture1desc</span><BR>";
echo "<BR><a href=updatetext1.php?pid=$pid>update caption</a>";

echo "</td>";



echo "<td valign=top>";


if ($picture2 == "")
{
echo "<form method=post action=addphoto2.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add second photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture2 width=100 hspace=5><BR>
<form method=post action=delete_picture2.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}

echo "<BR><span class=smalladmintext>$picture2desc</span><BR>";
echo "<BR><a href=updatetext2.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture3 == "")
{
echo "<form method=post action=addphoto3.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add third photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture3 width=100 hspace=5><BR>
<form method=post action=delete_picture3.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}

echo "<BR><span class=smalladmintext>$picture3desc</span><BR>";
echo "<BR><a href=updatetext3.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture4 == "")
{
echo "<form method=post action=addphoto4.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add fourth photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture4 width=100 hspace=5><BR>
<form method=post action=delete_picture4.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}


echo "<BR><span class=smalladmintext>$picture4desc</span><BR>";
echo "<BR><a href=updatetext4.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture5 == "")
{
echo "<form method=post action=addphoto5.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add fifth photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture5 width=100 hspace=5><BR>
<form method=post action=delete_picture5.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}

echo "<BR><span class=smalladmintext>$picture5desc</span><BR>";
echo "<BR><a href=updatetext5.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture6 == "")
{
echo "<form method=post action=addphoto6.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add sixth photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture6 width=100 hspace=5><BR>
<form method=post action=delete_picture6.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}

echo "<BR><span class=smalladmintext>$picture6desc</span><BR>";
echo "<BR><a href=updatetext6.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture7 == "")
{
echo "<form method=post action=addphoto7.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add seventh photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture7 width=100 hspace=5><BR>
<form method=post action=delete_picture7.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}

echo "<BR><span class=smalladmintext>$picture7desc</span><BR>";
echo "<BR><a href=updatetext7.php?pid=$pid>update caption</a>";

echo "</td><td valign=top>";


if ($picture8 == "")
{
echo "<form method=post action=addphoto8.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='add eighth photo'></form>\n";
}

else {
echo "<img src=/photogallery/$picture8 width=100 hspace=5><BR>
<form method=post action=delete_picture8.php><input type=hidden name=pid value=$pid><input type=submit name=submit value='delete photo'></form>\n";
}


echo "<BR><span class=smalladmintext>$picture8desc</span><BR>";
echo "<BR><a href=updatetext8.php?pid=$pid>update caption</a>";


echo "</td>\n";
echo "<td valign=top><form method=post action=delete_gallery.php><input type=hidden name=pid value=$pid><input type=submit name=submit value=delete></form></td>\n";
echo "</tr>\n";
echo "\n";
}

$e++; 
?>

</table>

<?
mysql_free_result($sql_result); 
mysql_close($connection); 
?>

<? include ("../adminfooter.php"); ?>

<? }
?>