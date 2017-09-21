<?php
if(!class_exists('UploadException')){
	class UploadException extends Exception{ 
		public function __construct($x){parent::__construct($this->f($x),$x);} 
		private function f($x){ 
			switch($x){
				case UPLOAD_ERR_INI_SIZE:$s='The uploaded file exceeds the upload_max_filesize directive in php.ini';break; 
				case UPLOAD_ERR_FORM_SIZE:$s='The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';break; 
				case UPLOAD_ERR_PARTIAL:$s='The uploaded file was only partially uploaded';break; 
				case UPLOAD_ERR_NO_FILE:$s='No file was uploaded';break; 
				case UPLOAD_ERR_NO_TMP_DIR:$s='Missing a temporary folder';break; 
				case UPLOAD_ERR_CANT_WRITE:$s='Failed to write file to disk';break; 
				case UPLOAD_ERR_EXTENSION:$s='File upload stopped by extension';break; 
				default:$s='Unknown upload error';break; 
			};
			return $s; 
		}
	}
};


/*
// Use 
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) { 
//uploading successfully done 
} else { 
throw new UploadException($_FILES['file']['error']); 
} 
*/
