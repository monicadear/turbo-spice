<? include("../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){

include("adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>

<?php include("adminheader.php"); ?>






<h1>USERS</h1>

</div>
</body>
</html>


<?

} // end ADMIN

?>
