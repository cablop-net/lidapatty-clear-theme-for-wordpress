<?php
class imageCreator
{
	private $readyImage = null;
	public $error = false;
	private $backgroundColor = Array(255, 255, 255);
	public $saveEmptySpace = false;
	public $rotate = false;

	public function setBackground($color)
	{
		if(is_array($color))
		{
			$this -> backgroundColor = $color;
		}
		else
		{
			if($color[0]=='#') $color=substr($color, 1);

			$int = hexdec($color);
		    $this -> backgroundColor = array(0xFF & ($int >> 0x10), 0xFF & ($int >> 0x8), 0xFF & $int);
		}
	}

	public function cropToSquare()
	{
		$width=imagesx($this -> readyImage);
		$height=imagesy($this -> readyImage);

		$min = $width<$height ? $width : $height;

		$new = imagecreatetruecolor($min, $min);
		imagecopy($new, $this -> readyImage, 0, 0, 0, 0, $min, $min);

		$this -> readyImage = $new;
		return $this;
	}

	public function crop($image, $width, $height)
	{
		$new = imagecreatetruecolor($width, $height);

		// saving transparency
		imagealphablending($new, false);
		imageSaveAlpha($new, true);

		imagecopy($new, $image, 0, 0, 0, 0, $width, $height);

		return $new;
	}


	public function selectArea($left, $top, $width, $height)
	{
		$new = imagecreatetruecolor($width, $height);

		imagecopy($new, $this -> readyImage, 0, 0, $left, $top, $width, $height);

		$this -> readyImage = $new;
		return $this;
	}

	private function resize_photo($img,$max_width,$max_height, $saveTransparency, $crop)
	{
		$old_width=imagesx($img);
		$old_height=imagesy($img);

		$ratio=1;
		if(!$crop)
		{
			if($old_width>$old_height)
			{
				if($old_width>$max_width) $ratio = $max_width/$old_width;
			}
			elseif($old_height>$max_width) $ratio = $max_width/$old_height;
		}
		else
		{
			if($old_width>$old_height)
			{
				if($old_width>$max_width) $ratio = $max_width/$old_height;
			}
			elseif($old_height>$max_width) $ratio = $max_width/$old_width;
		}

		$new_width=$old_width*$ratio;
		$new_height=$old_height*$ratio;

		if($this -> saveEmptySpace==false)
		{
			$thumb = imagecreatetruecolor($new_width, $new_height);
			if($saveTransparency)
			{
				imagealphablending($thumb, false);
				imageSaveAlpha($thumb, true);
			}
			else
			{
				imagefill($thumb, 0, 0, imagecolorallocate($thumb, $this -> backgroundColor[0], $this -> backgroundColor[1], $this -> backgroundColor[2]));
				imageSaveAlpha($thumb, true);
			}
			imagecopyresampled($thumb, $img, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
		}
		else
		{
			$thumb = imagecreatetruecolor($max_width, $max_height);

			if($saveTransparency)
			{
				$color = imagecolorallocatealpha($thumb, 255, 255, 255, 127);

				imagefill($thumb, 0, 0, imagecolorallocatealpha($thumb, 0, 0, 0, 127)); //   \ make the new temp
				ImageColorTransparent($thumb, imagecolorallocate($thumb, 0, 0, 0)); //       / image transparent

				imageSaveAlpha($thumb, true);
				imagealphablending($thumb, false);
			}
			else
			{
				imagefill($thumb, 0, 0, imagecolorallocate($thumb, $this -> backgroundColor[0], $this -> backgroundColor[1], $this -> backgroundColor[2]));
				imageSaveAlpha($thumb, true);
			}

			$x = floor(($max_width-$new_width)/2);
			$y = floor(($max_height-$new_height)/2);
			imagecopyresampled($thumb, $img, $x, $y, 0, 0, $new_width, $new_height, $old_width, $old_height);
		}

		if($crop) $thumb = $this->crop($thumb, $max_width, $max_height);

		return $thumb;
	}

	public function __construct($file) // /tmp/php/asasdasd = $_FILES[$element]['tmp_name']
	{
		if(function_exists('exif_imagetype'))
		{
			$type = exif_imagetype($file);

			switch($type)
			{
				case IMAGETYPE_GIF:
					$this -> readyImage = imagecreatefromgif($file);
					break;
				case IMAGETYPE_JPEG:
					$this -> readyImage = imagecreatefromjpeg($file);
					break;
				case IMAGETYPE_PNG:
					$this -> readyImage = imagecreatefrompng($file);
					break;
				default:
					$this -> error = true;
					break;
			}
		}
		else
		{
			$ext = pathinfo($file);
			$ext = strtolower($ext['extension']);
			switch($ext)
			{
				case 'gif':
					$this -> readyImage = imagecreatefromgif($file);
					break;
				case 'jpg':
					$this -> readyImage = imagecreatefromjpeg($file);
					break;
				case 'png':
					$this -> readyImage = imagecreatefrompng($file);
					break;
				default:
					$this -> error = true;
					break;
			}
		}
	}

	public function createJPG($name, $maxwidth, $maxheight, $crop = false)
	{
		if($this -> readyImage)
		{
			$image = $this -> resize_photo($this -> readyImage,$maxwidth, $maxheight, false, $crop);
			ImageJPEG($image,$name,90);

			ImageDestroy($image);
			return true;
		}
		else
			return false;
	}

	public function createPNG($filename, $maxwidth, $maxheight, $crop = false)
	{
		if($this -> readyImage)
		{
			$image = $this -> resize_photo($this -> readyImage,$maxwidth,$maxheight, true, $crop);

			ImagePNG($image,$filename, 2);
			ImageDestroy($image);
			return true;
		}
		else
			return false;
	}
}
?>