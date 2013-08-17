<? include("../../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page automatically.
 */
if(!$session->userlevel >=7){
include("../adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";
include ("../../library/logmein.php"); 

}

else{
/**
 * Administrator is viewing page, so display all forms.
 */
?>
<? include ("../adminheader.php"); ?><? include ("../../codes/functions.php"); ?>
<? include ("../adminnav.php"); ?>
<? include ("pressreleases_nav.php"); ?><h1>Admin: Input Press Release</h1><p><B>You may input a new press release within the site.</B></p><form enctype='multipart/form-data' method='post'  action='php_handler.php'>

CATEGORY <select name="category"><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="pressreleasecategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid DESC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value=$categoryid>$categoryname</option>\n";$c++;}?></select> <a href=../pressreleasecategories/viewall.php target=new>update press release categories</a><BR><BR>



Author's name: <? echo $session->username; ?><input type ="hidden" name="author" rows="1" value="<? echo $session->username; ?>" size="30"><BR><BR>

 <table border=0><tr> <td width="100" align="right"><span class=red>Release Date:</span></td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="startday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select> <select name="startyear"> 

<? $todayyear=date(Y);
$todayyearminusone=$todayyear-1;
$todayyearminustwo=$todayyear-2;
$todayyearplusone=$todayyear+1;
?>
<option selected>Year</option><option><?echo"$todayyearminustwo";?></option>
<option><?echo"$todayyearminusone";?></option>
<option SELECTED><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option> </select> mm-dd-yyyy</td> </tr> </table>
Title of Press Release<BR>(e.g. Organization Announcement): <input type='text' name='title' value='<?echo"$title";?>' size='18'><BR><BR>
Text of press release:<BR><textarea name='text' rows=5 cols=20><?echo"$text";?></textarea><BR><BR>

Enter the weblink, if any, that this press release will link to:<BR>(e.g. http://www.website.org/mypressrelease.html): <input type='text' name='webslink' value='<?echo"$webslink";?>' size='30'><BR><BR>

<input type='hidden' name='showorder' value='1'>


<input type='submit' name='enter' value='submit'></form><BR><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><?mysql_close($connection); ?><? include ("../adminfooter.php"); ?>

<? }
?>