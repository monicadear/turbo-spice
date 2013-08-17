<!-- loggedinmessage.php -->

<div id=sidebarlogin>
<?
/**
 * User has already logged in, so display relevant links, including
 * a link to the admin center if the user is an administrator.
 */


if($session->logged_in){
   echo "Welcome <b>$session->username</b> <br>";

   if($session->isAdmin()){
      echo "[<a href=\"/myadmin/admin.php\" class=whitetoptop>Admin Center</a>] &nbsp; ";

    }

  echo "[<a href=\"/pages/useredit.php\" class=whitetoptop>Edit Account</a>] &nbsp;&nbsp;";

   echo "[<a href=\"/pages/process.php\" class=whitetoptop>Logout</a>]<BR>";






}


else{
}
?>

</div> <!-- end sidebarlogin -->