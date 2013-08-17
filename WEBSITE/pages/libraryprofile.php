<?

echo "<BR>";
$id=$_REQUEST['id'];



echo "<div align=left>";
echo "<a href=moreinfo.php?id=$id class=profile>see profile</a> <span class=profile>&#124;</span> ";
echo "<a href=editphoto.php?id=$id class=profile>edit picture</a> <span class=profile>&#124;</span> ";
echo "<a href=updatemylisting.php?id=$id class=profile>update contact info</a><BR>";
echo "<a href=uploaddoc.php?id=$id class=profile>upload a document</a> <span class=profile>&#124;</span> ";
echo "</div>";




?>