<div align=center>
<script>

// (C) 2002 www.CodeLifter.com
// http://www.codelifter.com
// Free for all users, but leave in this header.

// ==============================
// Set the following variables...
// ==============================

// Set the slideshow speed (in milliseconds)
var SlideShowSpeed = 4000;

// Set the duration of crossfade (in seconds)
var CrossFadeDuration = 3;

var Picture = new Array(); // don't change this
var Caption = new Array(); // don't change this

// Specify the image files...
// To add more images, just continue
// the pattern, adding to the array below.
// To use fewer images, remove lines
// starting at the end of the Picture array.
// Caution: The number of Pictures *must*
// equal the number of Captions!

Picture[1]  = '/slide/1.jpg';
Picture[2]  = '/slide/2.jpg';
Picture[3]  = '/slide/3.jpg';
Picture[4]  = '/slide/4.jpg';
Picture[5]  = '/slide/5.jpg';
Picture[6]  = '/slide/6.jpg';
Picture[7]  = '/slide/7.jpg';

// Specify the Captions...
// To add more captions, just continue
// the pattern, adding to the array below.
// To use fewer captions, remove lines
// starting at the end of the Caption array.
// Caution: The number of Captions *must*
// equal the number of Pictures!

<? include("../library/callcaptions.php");?>


// =====================================
// Do not edit anything below this line!
// =====================================

var tss;
var iss;
var jss = 1;
var pss = Picture.length-1;

var preLoad = new Array();
for (iss = 1; iss < pss+1; iss++){
preLoad[iss] = new Image();
preLoad[iss].src = Picture[iss];}

function runSlideShow(){
if (document.all){
document.images.PictureBox.style.filter="blendTrans(duration=2)";
document.images.PictureBox.style.filter="blendTrans(duration=CrossFadeDuration)";
document.images.PictureBox.filters.blendTrans.Apply();}
document.images.PictureBox.src = preLoad[jss].src;
if (document.getElementById) document.getElementById("CaptionBox").innerHTML= Caption[jss];
if (document.all) document.images.PictureBox.filters.blendTrans.Play();
jss = jss + 1;
if (jss > (pss)) jss=1;
tss = setTimeout('runSlideShow()', SlideShowSpeed);
}

</script>


<!--
Add the onload=runSlideShow() event call to the body tag.
//-->




<div id=homepageslideshow>
<div align=center><table border=0 cellpadding=0 cellspacing=0>
  <tr>
    <!--
    The next table cell holds the images.
    Set cell and image width and height the same.
    The img src must have name=PictureBox in its
    tag.  Usually the first image in the Picture
    array in the script is used here.
    //-->
	<td><div align=center><img src=/slide/1.jpg name=PictureBox width=200 border=0></div>
    </td>
  </tr>
  <tr>
    <!-- 
    The next table cell holds the captions.
    This table cell must have id=CaptionBox and
    class=Caption in its tag. The default caption
    shows whilst loading in all browsers; NS4
    will show only the default caption, throughout.
    //-->
    <td id=CaptionBox class=slideCaption align=center><div align=center>
   Welcome!
    </div></td>
  </tr>
</table>
</div>

</div>


</div>

