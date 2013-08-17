<?
/**
 * moreinfo.php
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

<? include ("../library/myheader.php");  ?>
<? include ("../library/myheader2.php"); ?>
<? include ("../library/myheader3.php"); ?>
<? include ("../library/myheader4.php"); ?>
<? include ("../library/myheader5.php"); ?>
<? include ("../library/myheader6.php"); ?>



<? include ("exclusions.php"); ?>


<? include ("pagepartial0.php"); ?>

<?


echo "<div id=memberdetails>";

echo "<div align=left><span class=notice>To update this profile, please login with your username and password.</span></div>";



?>




<? include ("../codes/functions.php"); ?>





<?
$id=$_REQUEST['id'];
$db = "directory";
$query1 = "select * from $db where id = '$id'";


$result1 = mysql_db_query($database, $query1);
while($row = mysql_fetch_object($result1)) {


$firstname=html_entity_decode("$row->firstname", ENT_QUOTES);
$lastname=html_entity_decode("$row->lastname", ENT_QUOTES);
$company=$row->company;
$address=$row->address;
$city=$row->city;
$state=$row->state;
$zip=$row->zip;
$company_phone_number=$row->company_phone_number;
$company_fax_number=$row->company_fax_number;
$category=$row->category;

$email=$row->email;


$website=$row->website;
$picture1=$row->picture1;
$id=$row->id;

$description=$row->description;
$refers=html_entity_decode("$row->refers", ENT_QUOTES);
$publish= $row->publish;
$dateupdated= $row->dateupdated;


$membersince=$row->membersince;

$membersinceyear = substr("$membersince", 0, 4);
$membersincemonth = substr("$membersince", 4, 2);


$transdate["01"] = " January "; 
$transdate["02"] = " February "; 
$transdate["03"] = " March "; 
$transdate["04"] = " April "; 
$transdate["05"] = " May "; 
$transdate["06"] = " June "; 
$transdate["07"] = " July "; 
$transdate["08"] = " August "; 
$transdate["09"] = " September "; 
$transdate["10"] = " October "; 
$transdate["11"] = " November "; 
$transdate["12"] = " December "; 

$membersincemonthspellout = strtr($membersincemonth, $transdate);





$keywords=$_REQUEST['keywords'];

if (isset($keywords) && $keywords !=="") {

$transformkeyword["%25"] = ""; 
$transformkeyword["%"] = ""; 
$keywords=strtr($keywords,$transformkeyword);




$string = "<span class=redbackgroundkeyword>".$keywords."</span>";
$firstname = ereg_replace($keywords,$string, $firstname);
$lastname = ereg_replace($keywords,$string, $lastname);
$company = ereg_replace($keywords,$string, $company);
$address = ereg_replace($keywords,$string, $address);
$city = ereg_replace($keywords,$string, $city);
$state = ereg_replace($keywords,$string, $state);
$description = ereg_replace($keywords,$string, $description);
} 
else {
}




?>


<!-- beginning of page content -->






<?


if ($publish=="N") {
echo "<h2>$firstname $lastname</h2>\n\nMember not yet activated. Please contact the Membership Coordinator.\n\n";
}

else {




if ($session->userlevel=="2"){
include ("libraryprofile.php");
}


else {
echo "\n";
}




echo "<div id=indent4>";


echo "<div id=pictureaid>";
if (isset($picture1) && $picture1 !=="") {
echo "<img src=/memberuploads/$picture1 width=150 border=0 hspace=5 alt=picture>";
}

else {
echo "<img src=/memberuploads/greetings.jpg width=100 border=0 hspace=5 alt=picture>";
}
echo "</div>";


echo "<h1>About this Member</h1> ";





echo "<b>$firstname $lastname</b><BR>";

if (isset($company) && $company !=="") {
echo "<BR>$company<BR>\n";
}
else {
echo "";
}

echo "<i>$category</i> <BR>\n";


echo "<BR>";
if (isset($membersince) && $membersince !=="") {
echo "<span class=green>member since ";
echo "$membersincemonthspellout $membersinceyear</span><BR>\n";
}
else {
echo "";
}



echo "<BR>";
if (isset($address) && $address !=="") {
echo "$address<BR>\n";
}
else {
echo "";
}

if (isset($city) && $city !=="") {
echo "$city, \n";
}
else {
echo "";
}


if (isset($state) && $state !=="") {
echo "$state\n";
}
else {
echo "";
}


if (isset($zip) && $zip !=="") {
echo " $zip<BR>\n";
}
else {
echo "";
}


echo "<BR>";

echo "<b>Phone:</b> $company_phone_number<BR>\n";


 if (isset($company_fax_number) && $company_fax_number !=="") {
echo "<b>Fax:</b> $company_fax_number<BR>\n";
}

else {
echo "";
}


 if (isset($website) && $website !=="") {
$website="http://".$website;
echo "<b>Web:</b> <a href=$website target=new>$website</a><BR>\n";
}

else {
echo "";
}



if (isset($email) && $email !=="") {
echo "<b>E-mail:</b> [<a href=contactmemberform.php?id=$id>Click here to contact.</a>]<BR>";
}

else {
echo "";
}




echo "<!-- ------ ---- -->";




echo "<hr>\n";


echo "<!-- ------ ---- -->";
echo "<BR>";



echo "<div id=mydocuments>";
echo "<h3>Member's Documents:</h3>";

echo "<ul>\n";

include ("../codes/adminconfig.php"); 

$dbdocs = mysql_select_db($database, $connection) or die ("Couldn't select DB"); 

$querydocs= "SELECT title,filename,evt_type FROM downloads where aut_id='$id' order by id desc"; 

$sql_resultdocs = mysql_query($querydocs, $connection) or die ("Couldn't execute query. Please try again later"); $d=0;while ($myrowdocs = mysql_fetch_array($sql_resultdocs)){                    $iddocs=$myrowdocs["id"];				
		      $titledocs=$myrowdocs["title"];					      $filenamedocs=$myrowdocs["filename"];				      $evt_typedocs=$myrowdocs["evt_type"];					   

if ($evt_typedocs=="1") {
echo "<li>$titledocs\n";
if($session->logged_in){echo "<a href=/downloads/$filenamedocs>link</a>";}
echo "<BR></li>";

}
else {
echo "<li><a href=/downloads/$filenamedocs>$titledocs</a></li>\n";
}



}
$d++;

echo "</ul>";

echo "<BR>";

if ($typeofdisplay!=="bw") {


if ($session->userlevel=="2"){
echo "<a href=uploaddoc.php?id=$id>Upload a document to your profile</a>";
}
else {
echo "<span class=notice>To view the documents or upload a new file, please login with your username and password.</span>";
}


}


echo "</div>";





if (isset($description) && $description !== "") {
echo "$description<BR>\n";
}

else {
echo "<BR>\n";
 }




echo "</div>";




} // end MEMBER PUBLISH loop


echo "<BR>\n";

}


?>


<div align=left><a href="javascript:history.go(-1)" class="profile">GO BACK</a> <span class=profile>&#124;</span> <a href=/pages/directory.php class="profile">See ENTIRE DIRECTORY</a></div>


</div>



<? include ("exclusionsbottom.php"); ?>



<? include ("../library/mynavigation.php"); ?>



<?php include ("../library/myfooter.php"); ?>