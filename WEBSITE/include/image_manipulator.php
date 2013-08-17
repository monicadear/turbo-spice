<?

class img_manip{

	var $twidth = 100;
	var $dirbase = "";
	
	function img_manip(){
		
		$this->dirbase = APP_ROOT."admin/data";
		//echo ($this->dirbase);
	}
	function createThumbnail($imageDirectory, $imageName,&$x,&$y){
		$srcImg = imagecreatefromjpeg("$imageDirectory/$imageName");
		$x = imagesx($srcImg);
		$y = imagesy($srcImg);
		$ratio =  $this->twidth/$x;
		$thumbHeight = $y * $ratio;
		$thumbImg = imagecreatetruecolor($this->twidth, $thumbHeight);
		$target_pic = imagecopyresampled ($thumbImg,$srcImg,0,0,0,0,$this->twidth,$thumbHeight, $x, $y);
		//imagejpeg ($target_id,"$targetfile",$jpegqual);
		imagejpeg($thumbImg, "$imageDirectory/t/$imageName");
		imagedestroy($srcImg);  
		imagedestroy($thumbImg);  
	}
	function displayTN($uid){
		header('content-type: image/jpeg');  
		$image = imagecreatefromjpeg("$this->dirbase/t/".$uid);  
		//imageinterlace($image,0);
		imagejpeg($image,'',100); 
	}
	function getPath($uid){
		echo $this->dirbase.'t/'.$uid;
	}
	function display($uid){
		
		header('content-type: image/jpeg');  
		

		$watermark = imagecreatefrompng("$this->dirbase/".'ez_wam.png');  
		$watermark_width = imagesx($watermark);  
		$watermark_height = imagesy($watermark);  
		$image = imagecreatetruecolor($watermark_width, $watermark_height);  
		$image = imagecreatefromjpeg("$this->dirbase/".$uid);  
		imageinterlace($image,0);
		$size = getimagesize("$this->dirbase/".$uid);  
		$dest_x = $size[0] - $watermark_width - 5;  
		$dest_y = $size[1] - $watermark_height - 5;  
		imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 30);  
		//imagecopyresampled($image, $watermark, $dest_x, $dest_y,0,0, $watermark_width, $watermark_height);  
		imagejpeg($image,'',100); 
	}

}




?>