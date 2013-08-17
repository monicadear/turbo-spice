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
<? include ("../../codes/functions.php"); ?><? include ("../adminnav.php"); ?><? include ("calendar_nav.php"); ?><h1>Admin: Input New CALENDAR EVENT</h1><p><B>This is the calendar within the site. Enter a new event here.</B></p><?$todayyear=date(Y);$todayyearplusone=$todayyear+1;$todayyearplustwo=$todayyear+2;?><!-- -------------- --><!--  -------------------------    --><!--  ------INPUT FORM---------    --><!--  -------------------------    --><table width="400" border="1" align="center" cellpadding="4" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EBEEF1"> <?phpecho "<FORM method=post action=calendar_php_handler.php>";?><tr> <td width="100" align="right"><span class=red>Start Date:</span></td> <td width="278" align="left">  <select name="startmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="startday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select> <select name="startyear"> <option>Year</option><option SELECTED><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option><option><?echo"$todayyearplustwo";?></option> </select> mm-dd-yyyy</td> </tr> <tr> <td width="100" align="right">End Date:</td> <td width="278" align="left">  <select name="endmonth"> <option selected>Month</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option> </select> <select name="endday"> <option selected>Day</option><option value=01>1</option><option value=02>2</option><option value=03>3</option><option value=04>4</option><option value=05>5</option><option value=06>6</option><option value=07>7</option><option value=08>8</option><option value=09>9</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option> </select>  <select name="endyear"> <option selected>Year</option> <option><?echo"$todayyear";?></option><option><?echo"$todayyearplusone";?></option><option><?echo"$todayyearplustwo";?></option> </select> mm-dd-yyyy</td> </tr> <tr> <td align="right">Title:</td> <td align="left"><input name="title"  id="title" size="50"></td> </tr><tr> <td align="right">Description:</td> <td align="left"><textarea name="description" cols="30" rows="5" id="description"></textarea></td> </tr><tr><td align="right">Time</td><td><input name="starttime" id="starttime" size="10"> to <input name="endtime" id="endtime" size="10"><BR>e.g. 8:30am to 10:00am </td></tr><tr><td align="right">Location</td><td><input name="location" id="location" size="50"> </td></tr><tr><td align="right">Price (members)</td><td>$<input name="price" id="price" size="10"> 0 if no charge</td></tr><tr><td align="right">Price (nonmembers/visitors)</td><td>$<input name="pricenonmembers" id="pricenonmembers" size="10"> 0 if no charge</td></tr><tr><td align="right">NAME OF CONTACT FOR THIS EVENT</td><td><input name="contact" id="contact" size="30"> (e.g. John)</td></tr><tr><td align="right">Website for this event, if any</td><td><input name="website" id="website" size="30"> (e.g. http://www.google.com)</td></tr>
<tr><td align="right">PUBLISHED to the site?</td><td><input type="radio" value="Y" checked name="publish"> Check to include this in the live listings. <BR>
<input type="radio" value="N" name="publish"> Check to HIDE this from the live listings. <BR>
</td></tr>



<tr><td>MEMBERS-ONLY content<BR>?</td><td><input type="radio" value="0" checked name="evt_type"> Check for PUBLIC ACCESSIBLE view.<BR>
<input type="radio" value="1" name="evt_type"> Check for MEMBERS-ONLY view.<BR>
</td></tr>

<tr><td>Tags:</td><td>
<input type ="text" name="tags" size="50" value="<?php echo $tags ?>" size="40"><BR>(add some descriptive tags, using commas to separate)
</td></tr>


<tr><td width=85><b>category:</b></td><td><select name="category"><option></option><? include ("../../codes/adminconfig.php"); ?><?/*Search database for item*/$db = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase="documentcategory";$sql = "SELECT * FROM $tablebase ORDER BY categoryid ASC"; $sql_result = mysql_query($sql, $connection) or die ("Couldn't execute query"); $c=0;while ($myrow = mysql_fetch_array($sql_result)){                    $categoryid=$myrow["categoryid"];                   $categoryname=$myrow["categoryname"];echo "<option value='$categoryid'>$categoryname</option>\n";$c++;}?></select>  <a href=../documentcategories/viewall.php target=new>edit category</a></td></tr>
<tr><td><b>subcategory:</b></td><td><select name="subcategory"><option></option><?include("../codes/adminconfig.php");/*Search database for item*/$db2 = mysql_select_db($database, $connection) or die ("Couldn't select DB"); $tablebase2="documentsubcategory";$sql2 = "SELECT * FROM $tablebase2 ORDER BY subcategoryid ASC"; $sql_result2 = mysql_query($sql2, $connection) or die ("Couldn't execute query"); $d=0;while ($myrow2 = mysql_fetch_array($sql_result2)){                    $subcategoryid=$myrow2["subcategoryid"];                   $subcategoryname=$myrow2["subcategoryname"];echo "<option value=$subcategoryid>$subcategoryname</option>\n";$d++;}?></select></td></tr>

<tr align="center"> <td colspan="2"><input type="submit" name="submit_enter" value="submit"> (press only once)</table><!--  -------------------------    --><!--  -------------------------    --><!--  -------------------------    --><!-- -------------- --><? include ("../adminfooter.php"); ?>

<? }
 ?>