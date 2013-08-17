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


<?php include("adminnav.php"); ?><hr><h2>ADMINISTRATION</h2>

<B>Use this homepage to update items within the  website.</B><BR><BR>

<h1>USERS</h1><div id=indent><a href=admin.php>View ALL allowed users</a><BR></div><hr>

</div>
</body>
</html>


<?

} // end ADMIN

?>

