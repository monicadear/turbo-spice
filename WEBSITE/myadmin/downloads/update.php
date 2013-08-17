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
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?>


<table border=0><?$submit=$_POST['submit'];if ($submit) {$id=$_POST['id'];} ?><? echo "<form method='post' action='update_handler.php'>"; ?> <?$db = "downloads";$query1 = "select * from $db where id = '$id'";$result1 = mysql_db_query($database, $query1);while($row = mysql_fetch_object($result1)) {$trans["&amp;"] = "&"; $trans["&#039;"] = "'";$trans["&lt;"] = "<";$trans["&gt;"] = ">";$trans["javascript"] = "j_script";$trans["&lt;input"] = "input_";$text = strtr($row->text,$trans); $trans4["\n"]= "";$trans4["<BR><BR>"] = "\r\r\n";$trans4["<BR>"] = "\r\n";$text = strtr($text,$trans4);
$filename = $row->filename;
$url = $row->url;

$publish = $row->publish;
$evt_type = $row->evt_type;

$category= $row->category;
$subcategory= $row->subcategory;
$tags= $row->tags;

 
echo "<tr><th width=50>Document Category:<BR></th><td>";

echo "<select name=category>";include("../../codes/adminconfig.php");include("producttypelist_category.php");echo "</select><BR>\n";

echo "<a href=../documentcategories/viewall.php target=new>view all document categories</a><BR>";


echo "</td></tr>";
 
echo "<tr><th width=50>Document Subcategory:<BR></th><td>";

echo "<select name=subcategory>";include("../../codes/adminconfig.php");include("producttypelist_subcategory.php");echo "</select><BR>\n";

echo "<a href=../documentsubcategories/viewall.php target=new>view all document subcategories</a><BR>";

echo "</td></tr>";

echo "<tr><th width=50>Title: </th><td><input type=text name='title' value='$row->title' size=50></td></tr>";    echo "<tr><th width=50>Text</th><td><textarea name='text' rows=4 cols=40>";    echo "$text</textarea>&nbsp;&nbsp;&nbsp;</td></tr>";echo "<tr><th width=50>Filename: </th><td>$filename</td></tr>";echo "<tr><th width=50>URL: </th><td><input type=text name='url' value='$url' size=50> <a href=http://$url target=new>(check link)</a></td></tr>";

echo "<tr><th>Published?</th><td>";

if ($publish=='Y') {echo "Published to live website?: <select name=publish><option value=Y selected>published</option><option value=N>not published</option></select>\n";

} else if ($publish=='N'|| $publish=='') {echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N selected>not published</option></select>\n";

} else {  echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N>not published</option></select><BR>\n";}


echo "</td></tr>";

echo "<tr><th>Members-Only?</th><td>";

if ($evt_type=='1') {echo "Members-only?: <select name=evt_type><option value=1 selected>members-only</option><option value=0>PUBLIC, open to all</option></select>\n";

} else if ($evt_type=='0' || $evt_type=='') {echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0 selected>PUBLIC, open to all</option></select>\n";

} else {  echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0>PUBLIC, open to all</option></select><BR>\n";}


echo "</td></tr>";


$id = $row->id;echo "<tr><th width=50>Tags: </th><td><input type=text name='tags' value='$tags'></td></tr>";echo "<tr><td colspan=2><br><input type=hidden name='id' value='$id'>";echo "</td></tr></table><p>";

}


?><input type=submit name="update" value="UPDATE record"></form>

<?mysql_close($connection); ?>
<? include ("../adminfooter.php"); ?>

<? }
?>