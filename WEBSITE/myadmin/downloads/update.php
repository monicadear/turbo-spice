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
<? include ("../../codes/adminconfig.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("downloads_nav.php"); ?>


<table border=0>
$filename = $row->filename;
$url = $row->url;

$publish = $row->publish;
$evt_type = $row->evt_type;

$category= $row->category;
$subcategory= $row->subcategory;
$tags= $row->tags;


echo "<tr><th width=50>Document Category:<BR></th><td>";

echo "<select name=category>";

echo "<a href=../documentcategories/viewall.php target=new>view all document categories</a><BR>";


echo "</td></tr>";

echo "<tr><th width=50>Document Subcategory:<BR></th><td>";

echo "<select name=subcategory>";

echo "<a href=../documentsubcategories/viewall.php target=new>view all document subcategories</a><BR>";

echo "</td></tr>";



echo "<tr><th>Published?</th><td>";



} else if ($publish=='N'|| $publish=='') {

} else {  echo "Published to live website?: <select name=publish><option value=Y>published</option><option value=N>not published</option></select><BR>\n";


echo "</td></tr>";

echo "<tr><th>Members-Only?</th><td>";



} else if ($evt_type=='0' || $evt_type=='') {

} else {  echo "Members-only?: <select name=evt_type><option value=1>members-only</option><option value=0>PUBLIC, open to all</option></select><BR>\n";


echo "</td></tr>";




}


?>

<?


<? }
?>