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


	}

?>
