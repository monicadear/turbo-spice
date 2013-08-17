
<? //exclusionsbottom.php


////// STAFF
if ($pageid==5) {
include ("../library/myall_staff.php");
}


///////// MEMBER-ONLY ANNOUNCEMENTS

 else if ($pageid==6) {include ("../library/myannouncementcode.php");}




////////////  MEMBER-ONLY ADD A CALENDAR ITEM
else if ($pageid==7) {
if($session->userlevel >= 2){
include ("../library/mycalendaradd.php");
}
else {echo "Please log in as a board member to access this area.";}
}


////////////  MEMBER-ONLY ADD A FILE
else if ($pageid==8) {
if($session->userlevel >= 2){
include ("../library/mydownloadsadd.php");
}
else {echo "Please log in as a board member to access this area.";}
}

////////////  MEMBER-ONLY ADD AN ANNOUNCEMENT
else if ($pageid==9) {
if($session->userlevel >= 2){
include ("../library/myannouncementadd.php");
}
else {echo "Please log in as a board member to access this area.";}
}


////////////  MEMBER-ONLY DOWNLOAD FILESelse if ($pageid==10) {
if($session->userlevel >= 2){
include ("../library/mydownloadscode.php");}
else {echo "Please log in as a board member to access this area.";}
}


///////// MEMBER-ONLY CALENDAR

 else if ($pageid==11) {include ("../library/mycalendarcode.php");}






////// CALENDAR of EVENTS
else if ($pageid==13) {
 include ("../library/mycalendarcode.php");

echo "<BR clear=all>";

  include("../library/calendaroverlaycode.php" );
  include("../library/calendargridcode.php"); 


}


///////// CONTACTUS FORM

 else if ($pageid==14) {include ("../library/contactuscode.php");}



////// Current Members
else if ($pageid==21) {
 include ("../library/mymemberdirectorycode.php");
}


////// PHOTO GALLERIES
else if ($pageid==28) {
 include ("../library/callphotogalleries.php");
}

////// FAQS
else if ($pageid==30) {
include ("../library/faqssmallcode.php");
include ("../library/faqthumbscode.php");
}



////// LINKS
else if ($pageid==39) {
 include ("../library/myresourcescode.php");
}


////// STORE
else if ($pageid==40) {
 include ("../library/productsmallcode.php");
}



////// ANNOUNCEMENTS
else if ($pageid==43) {
 include ("../library/myannouncementcode.php");
}



////// DONATE
else if ($pageid==50) {
 include ("../library/contributecode.php");
}

////// IN THE NEWS
else if ($pageid==52) {
 include ("../library/myinthenewscode.php");
}

////// PRESS RELASES
else if ($pageid==53) {
 include ("../library/mypressreleasecode.php");
}



else {

}



include ("../library/translation.php");

?>


</div></div><!-- end pagecontentindent -->






