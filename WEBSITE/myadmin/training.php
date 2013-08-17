<? include("../include/session.php"); ?>
<?
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){

include("adminheader.php");
echo "YOU DO NOT HAVE PERMISSION TO VIEW THIS PAGE. Please return to the <a href=/>homepage.</a>";

include ("../library/logmein.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */

?>


<? include ("adminheader.php"); ?>
<? include ("adminnav.php"); ?>


<h1>TRAINING on how to use the WEBSITE</h1>

<a href=#usernamespasswords>Usernames/Passwords</a> &#124; 
<a href=#pagecontent>Page Content</a> &#124; 
<a href=#slideshow>Slideshow</a> &#124; 
<a href=#photogallery>Photo Galleries</a> &#124; 
<a href=#boardstaff>Board/Staff</a> &#124; 
<a href=#members>Members</a> &#124; 
<a href=#faqs>FAQs</a> &#124; 
<a href=#links>Links</a> &#124; 
<a href=#calendar>Calendar</a> &#124; 
<a href=#store>Store</a> &#124; 
<a href=#announcements>Announcements</a> &#124; 
<a href=#pressrelease>Press Release</a> &#124; 
<a href=#inthenews>In the News</a> &#124; 
<a href=#downloads>Downloads</a> &#124; 

<BR><BR>
<hr><BR>


<a name=usernamespasswords></a><h1>How the USERNAMES and PASSWORDS work</h1>
	
On the right hand side of each page, at the bottom, there is a user login section.<BR><BR>

This is a username and password combination.<BR><BR>

If you do not yet have a username and password, please sign in here:<BR>
<a href=<?echo"$websitefullurl";?>/pages/login.php><?echo"$websitefullurl";?>/pages/login.php</a><BR><BR>

THERE ARE CURRENTLY 3 levels of access.<BR>
Level 1 (GENERAL) has no privileges at this time.<BR>
Level 2 (BOARD) has the ability to add announcements, events, and upload files.<BR>
Level 9 (ADMIN) has the ability to edit the entire site.<BR><BR>

<BR><BR>

The Level 2 (Board) level is also the level that Members may have to access their personal level of access.<BR><BR>

Typically, either an admin is the only person who can sign up a new member, or a new user will have the capacity to sign in for a username and password, then an administrator will need to confirm their signup and promote them to the specific access level.<BR><BR>

When the application process is changed over to an online payment process, we may automatically update this based on receipt of payment.<BR><BR>

If you do not yet currently have the right level of access, and you think you should, please sign in:<BR>
<a href=<?echo"$websitefullurl";?>/pages/login.php><?echo"$websitefullurl";?>/pages/login.php</a><BR><BR>

then let us know which level of access you desire or think you deserve: BOARD (for updating events, announcements, and files) or ADMIN (for updating the entire site, including page content).<BR><BR>


YOU MAY ALSO EDIT the NAMES of USER LEVELS HERE:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/admin.php><?echo"$websitefullurl";?>/myadmin/admin.php</a><BR><BR>

To change a specific username's user level, use Update User Level directly below the Users Table Contents. Input a username, then change the Level from the dropdown list.<BR><BR>

THANK YOU.<BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>

<a name=pagecontent></a><h1>How to edit PAGE CONTENT</h1>
	
On the site, each page is assigned a different level of access.<BR>

There are currently top NAVIGATION pages,<BR>
SECONDARY navigation (on the left hand side under the logo)<BR>
and DROP-DOWNs<BR><BR>

There are also BOARD ONLY navigation pages and dropdown navigation pages (not frequent)<BR><BR>

There are LOGGED IN MEMBERS pages too.<BR><BR>

the BOTTOM NAVIGATION pages display in the bottom of every page.<BR><BR>

NO SHOW are hidden pages.<BR><BR>

To review all the pages, you must have administrator level access:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pageupdates/viewall.php><?echo"$websitefullurl";?>/myadmin/pageupdates/viewall.php</a><BR><BR>

To add a new page of content, please use this link:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pageupdates/input_new.php><?echo"$websitefullurl";?>/myadmin/pageupdates/input_new.php</a><BR><BR>

You may specify the title of the page, the title that shows in the navigation, and the content of the page, including bold, italics, links, and lists.<BR><BR>

You may publish a page to the live site if you're ready to display the page content.<BR><BR>

The sitemap will automatically be updated.<BR><BR>

<h2>Training Video: Page Content</h2>
<object width="480" height="295"><param name="movie" value="http://www.youtube.com/v/KMeqByiK2Lo&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/KMeqByiK2Lo&hl=en&fs=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="295"></embed></object><BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>



<a name=slideshow></a><h1>SLIDESHOW</h1>

The site has a little slideshow running.<BR><BR>

Each of the images in this slideshow displays at a fixed *width*.<BR><BR>


You may edit these images using the administrator tool (with appropriate permissions)<BR><BR>

View all images in the slideshow:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/slideshow/viewall.php><?echo"$websitefullurl";?>/myadmin/slideshow/viewall.php</a><BR><BR>

You may always change photo to add a new photo to the slideshow.<BR>
PLEASE BE CAREFUL!<BR><BR>

Images should be cropped and made small: to about 200 pixels wide and 200 pixels high.<BR>

The CAPTIONS for each image are held as a text file here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=45><?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=45</a><BR><BR>


You must follow this correct format to make sure the captions display as expected.<BR><BR>

Caption[1] = &quot;Welcome to the website!&quot;;<BR>
Caption[2] = &quot;Organization Association&quot;;<BR>
Caption[3] = &quot;Caption 3.&quot;;<BR>
Caption[4] = &quot;Caption 4&quot;;<BR>
Caption[5] = &quot;Caption 5&quot;;<BR>
Caption[6] = &quot;Caption 6&quot;;<BR>
Caption[7] = &quot;Caption 7&quot;;<BR>
Caption[8] = &quot;Caption 8&quot;;<BR>

<BR>

<a name=photogallery></a><h1>PHOTO GALLERIES</h1>

There is also a photo gallery section made up of two parts: a text part on top and a gallery section on the bottom.<BR>
The live photo gallery is here:<BR>
<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=28&pagecategory=4><?echo"$websitefullurl";?>/pages/main.php?pageid=28&pagecategory=4</a><BR><BR>

YOU MAY EDIT the following:<BR>
Text part at the top of the photo gallery page:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=28><?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=28</a><BR><BR>

Gallery section in the bottom part of the photo gallery page:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/photoupdates/viewall.php><?echo"$websitefullurl";?>/myadmin/photoupdates/viewall.php</a><BR><BR>

Please make sure to only upload images to which you have rights to, and when you upload, choose smaller versions to make load time for the page efficient.<BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=boardstaff></a><h1>How to edit the BOARD/STAFF E-mail contact list</h1>
	
The live site has a form:<BR>
<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=5&pagecategory=2><?echo"$websitefullurl";?>/pages/main.php?pageid=5&pagecategory=2</a><BR><BR>

This contact form HIDES e-mail addresses (so that they are not sent spam or picked up by spam robots).<BR><BR>
However, users may send an e-mail through this page to that particular user.<BR><BR>

To view all existing people on this list:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/staffupdates/viewall.php><?echo"$websitefullurl";?>/myadmin/staffupdates/viewall.php</a><BR><BR>

To add a new name and contact e-mail, edit this page (you  must have administrator privileges)<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/staffupdates/input_new.php><?echo"$websitefullurl";?>/myadmin/staffupdates/input_new.php </a><BR><BR>

Using this system, within the pages, may now add a link to the appropriate contact INSTEAD OF THEIR ACTUAL E-MAIL ADDRESS.
This way, e-mail addreses are kept private and confidential.<BR><BR>

As an example, you may send a web-form email to the primary contact:<BR>
<a href=<?echo"$websitefullurl";?>/pages/contactus.php?passid=1><?echo"$websitefullurl";?>/pages/contactus.php?passid=1</a><BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=members></a><h1>How to update MEMBERS</h1>
Currently, anyone who fills in a new member application form is automatically added to this database and an e-mail notification gets sent to the application contact, who must then go into the database and either "publish" or delete the potential member.<BR><BR>

All members listed in this database also automatically show in the "Find a Professional" section.<BR><BR>



<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=faqs></a><h1>How to update the FAQS section</h1>
	
The site has a Freqeuntly Asked Questions FAQ section here:<BR>
<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=30&pagecategory=4><?echo"$websitefullurl";?>/pages/main.php?pageid=30&pagecategory=4</a><BR><BR>

This page has two sections: a top regular text section, which may be edited here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=30><?echo"$websitefullurl";?>/myadmin/pageupdates/update.php?id=30</a><BR><BR>


There is also a question and answer section, which may be viewed here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/faqs/viewall.php><?echo"$websitefullurl";?>/myadmin/faqs/viewall.php</a><BR><BR>

Within this question and answer section, the administrator may add a new question, and a new answer in separate text boxes. These will automatically update the live site. You may also *categorize* different types of questions into different categories. The FAQ categories are here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/faqcategories/viewall.php><?echo"$websitefullurl";?>/myadmin/faqcategories/viewall.php</a> <BR><BR>


<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=links></a><h1>How to update the LINKS page</h1>
	
The site offers a resource link page.

These resources include a category (such as Nonprofit Organizations, Friends, Supporters)<BR><BR>

Each resource link may be viewed here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/resources/viewallresources.php><?echo"$websitefullurl";?>/myadmin/resources/viewallresources.php</a><BR><BR>

Administrator-level access users may add a link here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/resources/input_newr.php><?echo"$websitefullurl";?>/myadmin/resources/input_newr.php</a><BR><BR>

Please note that you have the option to download a logo from the site to your harddrive, and then upload the logo to the resource link listing.<BR><BR>

Links are slotted into the category assigned and display under that category on the live site.<BR><BR>

<h2>Training Video: Update Links</h2>
<BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=calendar></a><h1>How to Update the CALENDAR PAGE</h1>
	
The Calendar page on the revised site is composed of different upcoming events.<BR><BR>

All upcoming events appear here:<BR>
<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=13&pagecategory=4><?echo"$websitefullurl";?>/pages/main.php?pageid=13&pagecategory=4</a><BR><BR>

Administrators may edit the events here:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/calendar/calendaradmin.php><?echo"$websitefullurl";?>/myadmin/calendar/calendaradmin.php</a><BR><BR>

To edit an existing event, simply click on the specific event's update button and change details as needed.<BR><BR>

To add a new event, simply click on add a new event and enter the desired details such as Title, Description, Location, price.<BR>
The PRICE field is fixed and can show if there is a reduced price for  members and a regular price for non-members.<BR><BR>

PLEASE NOTE that each event offers a RSVP link that will generate an e-mail reminder to both the participant and currently to a specified e-mail address.<BR><BR>


<h2>Training Video: Update Calendar</h2>
<object classid=clsid:d27cdb6e-ae6d-11cf-96b8-444553540000 width=640 height=480 codebase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0><param name=allowFullScreen value=true /><param name=allowscriptaccess value=always /><param name=src value=http://www.youtube.com/v/Ld6imcQuQEo&amp;hl=en&amp;fs=1&amp;ap=%2526fmt%3D18 /><embed type=application/x-shockwave-flash width=640 height=480 src=http://www.youtube.com/v/Ld6imcQuQEo&amp;hl=en&amp;fs=1&amp;ap=%2526fmt%3D18 allowscriptaccess=always allowfullscreen=true></embed></object>


<BR><div align=right><a href=#top>top of page</a></div>
<HR>



<a name=store></a><h1>How to update the STORE</h1>
	
The site has a link to a store here:<BR>
<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=40&pagecategory=6><?echo"$websitefullurl";?>/pages/main.php?pageid=40&pagecategory=6</a><BR><BR>

This store has the opportunity for a buyer to make electronic payments via credit card at a later date.<BR><BR>

To update the items in this store please visit the back-end (administrator access only).<BR><BR>

See all the items in the store:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/productsmall/viewall.php><?echo"$websitefullurl";?>/myadmin/productsmall/viewall.php</a><BR><BR>

Input a new product:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/productsmall/input_new.php><?echo"$websitefullurl";?>/myadmin/productsmall/input_new.php </a><BR><BR>

These items will automatically update the store page.<BR><BR>


<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=announcements></a><h1>How to update ANNOUNCEMENTS</h1>
Both administrators and regular logged-in members (level 2 and above) have the capacity to add new announcements to the list of announcements. Users who log in will see an additional "input an announcement" link from their Login Center. Administrators may use that same link or use the white background Admin Center to add a new announcement.<BR><BR>

<BR><div align=right><a href=#top>top of page</a></div>
<HR>

<a name=pressrelease></a><h1>How to update PRESS RELEASES</h1>
Administrators may use this to post new press releases to the "press releases" page.<BR><BR>

<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=53&pagecategory=1><?echo"$websitefullurl";?>/pages/main.php?pageid=53&pagecategory=1</a><BR><BR>

Input a new press release:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pressreleases/input_new.php><?echo"$websitefullurl";?>/myadmin/pressreleases/input_new.php</a><BR><BR>

View all press releases:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/pressreleases/viewall.php><?echo"$websitefullurl";?>/myadmin/pressreleases/viewall.php</a><BR><BR>


<BR><div align=right><a href=#top>top of page</a></div>
<HR>

<a name=inthenews></a><h1>How to update NEWS, RECENT NEWS</h1>
Administrators may use this to post news to the "news" page.<BR><BR>

<a href=<?echo"$websitefullurl";?>/pages/main.php?pageid=52&pagecategory=1><?echo"$websitefullurl";?>/pages/main.php?pageid=52&pagecategory=1</a><BR><BR>



Input a news story:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/inthenews/input_new.php><?echo"$websitefullurl";?>/myadmin/inthenews/input_new.php</a><BR><BR>

View all news stories:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/inthenews/viewall.php><?echo"$websitefullurl";?>/myadmin/inthenews/viewall.php</a><BR><BR>


<BR><div align=right><a href=#top>top of page</a></div>
<HR>


<a name=downloads></a><h1>How to add DOWNLOADS</h1>
Certain files (under 1.5 Mb and PDF, DOC< or JPG) may be stored on the live site. Members may update their profile with attached documents. Administrators may upload documents to the site.<BR><BR>

You may view all documents available:<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/downloads/viewall.php><?echo"$websitefullurl";?>/myadmin/downloads/viewall.php</a><BR><BR>

Or you may add a new document (make sure there is a version on your hard drive for you to upload to the new site):<BR>
<a href=<?echo"$websitefullurl";?>/myadmin/downloads/upload.php><?echo"$websitefullurl";?>/myadmin/downloads/upload.php</a><BR><BR>

Please note that some hosting has a limit on the size of files that may be transferred. We recommend you upload files under 1.5 Mb: resize images or save files at a lower resolution, if possible.<BR><BR>



<?
}
?>

</body>
</html>

