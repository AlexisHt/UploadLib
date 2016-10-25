<?php
	class Upload {
		private $fileName;
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


		public function __construct($name,$size,$maxsize,$type,$folder,$rectHeight,$rectWidth,$squareDim,$fileShape,$fileCropPosition,$fileAllExtension){

			$this->fileName = $name;
			$this->fileSize = $size;
			$this->fileSize = $maxsize;
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

			if (self::_image())
			{
					$this->resizeImage();
			}

		}

		private function fileAdress(){
			return $adresse = $this->fileFolder."/".$this->fileCode.".".$this->fileExtension;
		}

		private function _checkExtension(){

			if(in_array($this->fileExtension, $this->$fileAllExtension)){
				return true;
			}
			else{
				return false;
			}
		}

		private function _checkSize(){
			if($this->maxsize > $this->size){
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

		function upload(){
			if (!move_uploaded_file($this->fileName, $this->fileAdress)){
				throw new InvalidArgumentException("Problème de upload !");
			}
		}


	}

?>
