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
<? include ("../../codes/adminconfig.php"); ?>

<tr><td>Picture 1:</td><td><img src=/slide/1.jpg width=100 hspace=5><BR>
<tr><td>Picture 2:</td><td><img src=/slide/2.jpg width=100 hspace=5><BR>
<tr><td>Picture 3:</td><td><img src=/slide/3.jpg width=100 hspace=5><BR>
<tr><td>Picture 4:</td><td><img src=/slide/4.jpg width=100 hspace=5><BR>
<tr><td>Picture 5:</td><td><img src=/slide/5.jpg width=100 hspace=5><BR>
<tr><td>Picture 6:</td><td><img src=/slide/6.jpg width=100 hspace=5><BR>
<tr><td>Picture 7:</td><td><img src=/slide/7.jpg width=100 hspace=5><BR>
<tr><td>Picture 8:</td><td><img src=/slide/8.jpg width=100 hspace=5><BR>


<? }
?>