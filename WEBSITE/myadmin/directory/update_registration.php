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
<? include ("../adminnav.php"); ?>

$description= $row->description;


$website = $row->website;
$transweb["http://"] = "";

 
echo "Fax: <input type=text name='company_fax_number' value='$row->company_fax_number' size=21><BR>\n";
echo "</td></tr>\n";

    echo "<tr><th>Website</th><td><input type=text name='website' value='$website' size=50> <i>format: www.yoursite.com</i></td></tr>\n";

$lastpaiddate=$row->lastpaiddate;

if ($lastpaiddate == "" || $lastpaiddate==null) {

$lastpaiddatemonth=date(m);
$lastpaiddateday=date(d);
$lastpaiddateyear=date(Y);
$lastpaiddateyear= substr("$lastpaiddateyear", 2, 4);

$lastpaiddate=$lastpaiddatemonth."/".$lastpaiddateday."/".$lastpaiddateyear;

}

else {
	$lastpaiddate=$row->lastpaiddate;
}

echo "<input type=text name='lastpaiddate' value=''> you may use: <b>$lastpaiddate</b> <i>format: M/D/YY</i> </td></tr>";

    echo "<tr><th>Member Since</th><td><input type=text name='membersince' value='$row->membersince'> <i>format: YYYYMM</i></td></tr>";




$typeofcontact = $row->typeofcontact;

echo "Currently listed as: <b>$typeofcontact</b><BR>\n";

echo "<select name=typeofcontact>";
include ("producttypelist_category.php");
echo "</select>";




echo "</td></tr>";

echo "<tr><th valign=top>Description</th><td><textarea name='description' id='description' rows=5 cols=60>";
echo "$description";
</td></tr>";




    echo "<tr><th>Publish to DIRECTORY?</th><td>";


$publish = $row->publish;

if ($publish=='Y' || $publish=='y') {
} 

else if ($publish=='N'|| $publish=='n' || $publish=='') {
} 

else {  
echo "<select name=publish><option value=Y>publish</option><option value=N>no publish</option></select><BR>\n";
}

echo "DATE CREATED: $row->datecreated</td></tr>";



echo "</td></tr></table><p>";

<?


<? }
 ?>