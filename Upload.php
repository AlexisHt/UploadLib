<?php
	class Upload {
		private $fileName;
		private $fileTmpName;
		private $fileSize;
		private $fileMaxSize;
		private $fileType;
		private $fileFolder;
		private $fileCode;
		private $rectHeight;
		private $rectWidth;
		private $squareDim;
		private $fileShape;
		private $fileCropPosition;
		private $fileExtension;
		private $fileAllExtension;
		private $fileAdress;


		public function __construct($name,$tmpname,$size,$maxsize,$type,$folder,$rectHeight,$rectWidth,$squareDim,$fileShape,$fileCropPosition,$fileAllExtension){
			$this->fileName = $name;
			$this->fileTmpName = $tmpname;			
			$this->fileSize = $size;
			$this->fileMaxSize = $maxsize;
			$this->fileType = $type;
			$this->fileFolder = $folder;
			$this->fileCode = md5(uniqid(mt_rand()));
			$this->rectHeight = $rectHeight;
			$this->rectWidth = $rectWidth;
			$this->squareDim = $squareDim;
			$this->fileShape = $fileShape;
			$this->fileCropPosition = $fileCropPosition;
			$this->fileExtension = strtolower( substr( strrchr($this->fileName, '.') ,1));;
			$this->fileAllExtension = $fileAllExtension;
			$this->fileAdress = $this->fileAdress();

			if (!self::_checkExtension())
			{
					throw new InvalidArgumentException("Extension invalide !");
			}

			if (!self::_checkSize())
			{
					throw new InvalidArgumentException("Poid du fichier invalide !");
			}

			if (!move_uploaded_file($this->fileTmpName, $this->fileAdress)){
				throw new InvalidArgumentException("Problème de upload !");
			}
			else{
				if (self::_isImage())
				{
						$this->resizeImage();
				}
			}

		}

		private function fileAdress(){
			return $adresse = $this->fileFolder."/".$this->fileCode.".".$this->fileExtension;
		}

		private function _checkExtension(){

			if(in_array($this->fileExtension, $this->fileAllExtension)){
				return true;
			}
			else{
				return false;
			}
		}

		private function _checkSize(){

			if($this->fileMaxSize > $this->fileSize){
				return true;
			}
			else{
				return false;
			}
		}

		private function _isImage(){
			$imgExt = array('png', 'jpeg', 'gif', 'svg', 'jpg');

			if(in_array($this->fileExtension, $imgExt)){
				return true;
			}
			else{
				return false;
			}
		}



		private function resizeImage(){

			if (!self::_isImage()) {
				throw new Exception("Error Processing Request", 1);
			}

			else
			{

				if (in_array($this->fileExtension)){

			            switch ($this->fileExtension) {
			                case 'jpg';
			                case 'jpeg';
			                    $extension_upload = "jpeg";
			                    break;
			                case 'png':
			                    $extension_upload = "png";
			                    break;
			                case 'gif':
			                    $extension_upload = "gif";
			                     break;
		                    case 'svg':
			                    $extension_upload = "svg";
			                     break;
			            }

				$image_fonction = "ImageCreateFrom" . $extension_upload;
           		$image = $image_fonction($this->fileAdress);
           		$width = imagesx($image);
				$height = imagesy($image);

				} 


				if ($this->FileShape = "rectangle" ) {


					if(!empty($this->$rectWidth) || !empty($this->$rectHeight)){

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
						$format = 'ImageCreateFrom' . $this->fileExtension;
               			$format($resize, $this->fileAdress);

               			imagedestroy($image);

				}

				else if($this->fileShape == "carre"){

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

						if($width<$height)
						{

							if($this->fileCropPosition == 'centre2'){
								imagecopyresized($resize, $image, 0, 0, 0, (($new_height-$new_width)/2), $new_width, $new_height, $width, $height);
							}
							else if($this->fileCropPosition == 'haut'){
								imagecopyresized($resize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							}
							else if($this->fileCropPosition == 'bas'){
								imagecopyresized($resize, $image, 0, 0, 0, ($new_height-$new_width), $new_width, $new_height, $width, $height);
							}

						}
						else
						{

							if($this->fileCropPosition == 'centre'){
								imagecopyresized($resize, $image, (($new_height-$new_width)/2), 0, 0, 0, $new_width, $new_height, $width, $height);
							}
							else if($this->fileCropPosition == 'gauche'){
								imagecopyresized($resize, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
							}
							else if($this->fileCropPosition == 'droite'){
								imagecopyresized($resize, $image, ($new_height-$new_width), 0, 0, 0, $new_width, $new_height, $width, $height);
							}
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
