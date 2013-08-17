<? include("../../include/session.php"); 

/**
 * User not an administrator, redirect to main page
 * automatically.
 */

if(!$session->isAdmin()){

include("../adminheader.php");

echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein_members.php"); 

}

else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>
<? include ("../adminheader.php"); ?>
<? include ("../../codes/adminconfig.php"); ?><? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("slidecontent_nav.php"); ?><h1>Admin: Slideshow Content Edit</h1><p><B>You may edit these slideshow images from the front page.</B></p><table border=1>

<tr><td>Picture 1:</td><td><img src=/slide/1.jpg width=100 hspace=5><BR><form method=post action=addphoto1.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 2:</td><td><img src=/slide/2.jpg width=100 hspace=5><BR><form method=post action=addphoto2.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 3:</td><td><img src=/slide/3.jpg width=100 hspace=5><BR><form method=post action=addphoto3.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 4:</td><td><img src=/slide/4.jpg width=100 hspace=5><BR><form method=post action=addphoto4.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 5:</td><td><img src=/slide/5.jpg width=100 hspace=5><BR><form method=post action=addphoto5.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 6:</td><td><img src=/slide/6.jpg width=100 hspace=5><BR><form method=post action=addphoto6.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 7:</td><td><img src=/slide/7.jpg width=100 hspace=5><BR><form method=post action=addphoto7.php><input type=submit name=submit value='change photo'></form></td></tr>
<tr><td>Picture 8:</td><td><img src=/slide/8.jpg width=100 hspace=5><BR><form method=post action=addphoto8.php><input type=submit name=submit value='change photo'></form></td></tr>
</table><? include ("../adminfooter.php"); ?>

<? }
?>