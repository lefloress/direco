<?php

namespace Clay\Bootstrap;

use Exception;

class Image
{
	
	protected $defaultValues = array(
		'method'           => 'scale',
		'wm_dir'           => 'assets/images/watermarks/',
		'wm_margin_right'  => 5,
		'wm_margin_bottom' => 5,
		'quality'          => 90,
		'permission'       => 0644
	);
	
	protected $filePath;
	protected $fileExt;
	protected $img;
    
    public static function make($file, $extension = null)
    {
        return new static($file, $extension);
    }

	function __construct($file, $extension = null)
	{
	    $this->filePath = $file;
        $this->fileExt = $extension;
        
		if (is_null($this->fileExt))
		{
			$this->fileExt  = \File::extension($file);
		}
		

		switch ($this->fileExt)
		{
			case 'jpg':
			case 'jpeg':
				$this->img = imagecreatefromjpeg($this->filePath);
				break;
			case 'png':
				$this->img = imagecreatefrompng($this->filePath);
				break;
            case 'gif':
                $this->img = imagecreatefromgif($this->filePath);
                break;
            case 'bmp':
                $this->img = imagecreatefromwbmp($this->filePath);
                break;
			default:
				throw new Exception(sprintf('The image format "%s" is not valid', $this->fileExt));
		}

		$this->size = getimagesize($this->filePath);
	}

	public function  __destruct()
	{
		@imagedestroy($this->img);
	}
	
	public function getImage()
	{
		return $this->img;
	}

	function resampleImage($newFilePath, $imgValues)
	{
		$imgValues = array_merge($this->defaultValues, $imgValues);
		
		$xSrc = 0;
		$ySrc = 0;
		$wSrc = $this->size[0];
		$hSrc = $this->size[1];
		
		if ( ! isset ($imgValues['size']) || static::isSmallerThan($this->size, $imgValues['size']))
		{
			$newSize = $this->size;
			$xDst = 0;
			$yDst = 0;
			$dst = $newSize;
		}
		else
		{
			$newSize = $imgValues['size'];

			$divWidth = $imgValues['size'][0] / $this->size[0];
			$divHeight = $imgValues['size'][1] / $this->size[1];

			if ($imgValues['method'] == 'scale')
			{
				if ($divWidth < $divHeight)
				{
					$newSize[1] = $this->size[1] * $divWidth;
				}
				else
				{
					$newSize[0] = $this->size[0] * $divHeight;
				}
				
				$dst = $newSize;
				
				if ( ! isset ($imgValues['bgcolor']))
				{
					$xDst = 0;
					$yDst = 0;
				}
				else
				{
					$xDst = ($imgValues['size'][0] - $newSize[0]) / 2;
					$yDst = ($imgValues['size'][1] - $newSize[1]) / 2;
					$newSize = $imgValues['size'];
				}
			}
			else if (in_array ($imgValues['method'], array ('crop', 'crop-up')))
			{
				$dst = $newSize;
				
				if ( isset ($imgValues['source']))
				{
					$xSrc = $imgValues['source']['x'];
					$ySrc = $imgValues['source']['y'];
					$wSrc = $imgValues['source']['w'];
					$hSrc = $imgValues['source']['h'];
					$xDst = 0;
					$yDst = 0;
				}
				else
				{
					if($divWidth < $divHeight)
					{
						$dst[0] = $this->size[0] * $divHeight;
						$xDst = - ($dst[0] - $imgValues['size'][0]) / 2;
						$yDst = 0;
					}
					else
					{
						$dst[1] = $this->size[1] * $divWidth;
	
						if($imgValues['method'] == 'crop')
						{
							$yDst = - ($dst[1] - $imgValues['size'][1]) / 2;
						}
						else //crop-up
						{
							$yDst = 0;
						}
	
						$xDst  = 0;
					}					
				}
			}
			else
			{
				throw new Exception(sprintf('The image method "%s" is not define in image handler', $imgValues['method']));
			}
		}

		$newImage = imagecreatetruecolor ($newSize[0], $newSize[1]);

		if (isset ($imgValues['bgcolor']))
		{
			$color = imagecolorallocate ($newImage, $imgValues['bgcolor'][0], $imgValues['bgcolor'][1], $imgValues['bgcolor'][2]);
			imagefill ($newImage, 0, 0, $color);
		}
		else
		{
			if ($this->fileExt == 'png')
			{
				$ImgWhite = imagecolorallocate($newImage, 255, 255, 255);
				imagefill($newImage, 0, 0, $ImgWhite);
				imagecolortransparent($newImage, $ImgWhite);

				imagealphablending($newImage, false);
				imagesavealpha($newImage, true);
			}
		}

		imagecopyresampled($newImage, $this->img, $xDst, $yDst, $xSrc, $ySrc, $dst[0], $dst[1], $wSrc, $hSrc);

		if (isset ($imgValues['watermark']))
		{
			if (is_array ($imgValues['watermark']))
			{
				$randKey = array_rand($imgValues['watermark']);
				$watermark = $imgValues['watermark'][$randKey];
			}
			else
			{
				$watermark = $imgValues['watermark'];
			}

			$watermark = imagecreatefrompng($imgValues['wm_dir'] . $watermark . '.png');

			$wmSize[0] = imagesx($watermark);
			$wmSize[1] = imagesy($watermark);

			if(static::isSmallerThan($wmSize, $newSize))
			{
				$xDst = $newSize[0] - $wmSize[0] - $imgValues['wm_margin_right'];
				$yDst = $newSize[1] - $wmSize[1] - $imgValues['wm_margin_bottom'];
			}
			else
			{
				$xIni = ($wmSize[0] - $newSize[0]) / 2;
				$yIni = ($wmSize[1] - $newSize[1]) / 2;
				$newImage2 = imagecreatetruecolor($wmSize[0], $wmSize[1]);
				imagecopy($newImage2, $newImage, $xIni, $yIni, 0, 0, $newSize[0], $newSize[1]);
				imagedestroy($newImage);
				$newImage = $newImage2;
				$xDst = 0;
				$yDst = 0;
			}

			imagecopy($newImage, $watermark, $xDst, $yDst, 0, 0, $wmSize[0], $wmSize[1]);
		}

		switch ($this->fileExt)
		{
			case 'png':
				$pngQuality = ($imgValues['quality'] - 100) / 11.111111;
				$pngQuality = round (abs ($pngQuality));
				imagepng ($newImage, $newFilePath, $pngQuality);
				break;
            case 'gif':
                imagegif ($newImage, $newFilePath, $imgValues['quality']);
                break;
            case 'jpg':
            case 'jpeg':
            case 'bmp':
            default: 
                imagejpeg ($newImage, $newFilePath, $imgValues['quality']);
                break;
		}

		chmod($newFilePath, $imgValues['permission']);
		
		imagedestroy($newImage);
        
        return $this;
	}

	public static function isSmallerThan($size, $newSize)
	{
		if (is_string($size)) $size = getimagesize($size);
		
		return (($size[0] < $newSize[0]) && ($size[1] < $newSize[1]));
	}

}
