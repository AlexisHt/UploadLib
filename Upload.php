<?php
	class Upload {
		private $fileName;
		private $fileSize;
		private $fileType;
		private $fileFolder;
		private $rectHeight;
		private $rectWidth;
		private $squareDim;
		private $FileShape;
		private $fileCropPosition;



		function __construct($name,$size,$type,$folder,$height,$width,$dim,$shape,$position){
			$this->setFileName($name);
			$this->setFileSize($size);
			$this->setFileType($type);
			$this->setFileFolder($folder);
		}


		public function setFileName($string){
			$this->fileName = $string;
		}

		public function getFileName(){
			return $this->fileName;
		}

		public function setFileSize($string){
			$this->fileSize = $string;
		}

		public function getFileSize(){
			return $this->fileSize;
		}

		public function setFileFolder($string){
			$this->fileFolder = $string;
		}

		public function getFileFolder(){
			return $this->fileFolder;
		}

		public function setFileType($string){
			$this->fileType = $string;
		}

		public function getFileType(){
			return $this->fileType;
		}

		public function resizeImage(){

			if (!self::_isImage) {
				throw new Exception("Error Processing Request", 1);
			}

			else
			{

				$image_fonction = "ImageCreateFrom" . $this->fileExtension;
           		$image = $image_fonction($this->fileAdress);
           		$width = imagesx($image);
				$height = imagesy($image);

				if ($this->FileShape = "rectangle" ) {

					if(!empty($this->$rectWidth) || !empty($this->$rectHeight){

					$new_width = $this->rectWidth;
					$new_height = $this->$rectHeight;
					
					}
					else{

					$new_width = $width;
					$new_height = $height;

					}
						
						if($width>$height)
						{
							//format horizontal
							$new_width = $this->rectWidth;
							$new_height = ($new_width * $height) / $width ;
						}
						else
						{
							// format vertical
							$new_height = $this->rectHeight;
							$new_width = ($new_height * $width) / $height;
						}

						$resize= imagecreatetruecolor($new_width,$new_height);
						imagecopyresized($resize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
						$format = 'Image' . $this->fileExtension;
               			$format($resize, $this->fileAdress);

               			imagedestroy($image);

				}

				else if($this->FileShape = "carre" && $width == $height)){

						if($this->$squareDim){

						$new_width = $this->$squareDim;
						$new_height = $this->$squareDim;
						
						}
						else{

						$new_width = $width;
						$new_height = $height;

						}
						
					
							$new_width = $this->$squareDim;
							$new_height =  ($new_width * $height) / $width;
							$resize = imagecreatetruecolor($new_width,$new_height);

							if($position == 'centre2'){
								imagecopyresized($resize, $image, 0, 0, 0, (($new_height-$new_width)/2), $new_width, $new_height, $width, $height);
							}
							else if($position == 'haut'){
								imagecopyresized($resize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							}
							else if($position == 'bas'){
								imagecopyresized($resize, $image, 0, 0, 0, ($new_height-$new_width), $new_width, $new_height, $width, $height);
							}

							$resize= imagecreatetruecolor($new_width,$new_height);
							imagecopyresized($resize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							$format = 'Image' . $this->fileExtension;
	               			$format($resize, $this->fileAdress);

	               			imagedestroy($image);


				}
			}
		}


}

?>
