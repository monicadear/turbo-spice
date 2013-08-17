<div id=sidebarbox>


<script type="text/javascript">
<!--
var image1=new Image()
image1.src="/slide/1.jpg"
var image2=new Image()
image2.src="/slide/2.jpg"
var image3=new Image()
image3.src="/slide/3.jpg"
var image4=new Image()
image4.src="/slide/4.jpg"
var image5=new Image()
image5.src="/slide/5.jpg"
var image6=new Image()
image6.src="/slide/6.jpg"
var image7=new Image()
image7.src="/slide/7.jpg"
var image8=new Image()
image8.src="/slide/8.jpg"
//-->
</script>



<?

echo "<div align=center><img src=/slide/1.jpg name=slide align=center border=1 /></div>";

?>

<script type="text/javascript">
<!--
//variable that will increment through the images
var step=1
function slideit(){
//if browser does not support the image object, exit.
if (!document.images)
return
document.images.slide.src=eval("image"+step+".src")
if (step<8)
step++
else
step=1
//call function "slideit()" every 5.0 seconds
setTimeout("slideit()",5000)
}
slideit()
//-->
</script>

<BR>
<div align=right><a href=/pages/main.php?pageid=28&pagecategory=4 class=nounderline>> View our Gallery</a></div>

</div>