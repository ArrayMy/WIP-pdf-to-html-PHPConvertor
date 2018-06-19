<?php
class PDF_Convertor{
  
	
	
 public function __construct(){

 }
	
	/*PDF CONVERTOR SITE*/
	public function PDF_Convertor_Controler($file){
		
		
	}
	
	public function PDF_Convertor_Read($file){
		file_get_contents
	}
	
	
	/*WEBPAGE SITE*/
	public function load_data_from_config(){
	$this->Config = parse_ini_file("../Config/config.ini",true);	
	}
	
	public function upload_pdf_file(){
	$this->load_data_from_config();
	$DIR = $this->Config['PDF']['PDF_Upload_Files_Path'];
	$UPLOAD_FILE = $DIR . basename($_FILES['PDF_FILE']['name']);
	 if($_FILES['PDF_FILE']['size']<=$this->Config['PDF']['PDF_Max_Size']){
		 if($_FILES['PDF_FILE']['type']=='application/pdf'){
	       if(move_uploaded_file($_FILES['PDF_FILE']['tmp_name'],$UPLOAD_FILE)){
		     echo "Succesfull upload!";
			   header("Location:http://$_SERVER[SERVER_NAME]/source.php?file=".$_FILES['PDF_FILE']['name']);
			   session_start();
			   $_SESSION['SECURITY'] = $_FILES['PDF_FILE']['name'];
		   }else{
		   }
	 }else{
			 session_start();
			 $_SESSION["TYPE"] = $_FILES['PDF_FILE']['type'];
			 header("Location:http://$_SERVER[SERVER_NAME]?error=1");
			 echo $_SESSION["TYPE"];
		 }
	 }else{
		  session_start();
		  $_SESSION["MAX_SIZE"] = $this->Config['PDF']['PDF_Max_Size'];
		  header("Location:http://$_SERVER[SERVER_NAME]?error=2");
	 echo $_SESSION["MAX_SIZE"];
	 }
	 
}
	public function calculate_bytes($bytes){
		$bytes = $bytes / 1000;
		$bytes = $bytes / 1000;
		$this->PDF_MAX_SIZE_MB = $bytes;
	}
	
	public function show_error(){
		session_start();
		if(isset($_GET['error']) and $_GET['error']==1 and isset($_SESSION['TYPE'])){
			echo "Convert only pdf files, not ". $_SESSION['TYPE']." files.";
		}elseif(isset($_GET['error']) and $_GET['error']==2 and isset($_SESSION['MAX_SIZE'])){
			$this->calculate_bytes($_SESSION['MAX_SIZE']);
			 echo "Max size is ".$this->PDF_MAX_SIZE_MB."MB.";
		}else{
			
		}
		session_unset();
		session_destroy();
	}

 public function check_file(){
	 session_start();
	 if(isset($_GET['file']) and isset($_SESSION['SECURITY']) and $_GET['file']==$_SESSION['SECURITY']){
  
  }else{
   /*CALL PDF CONVERT*/
  }
 }
	 session_destroy();
 }
  
 
}


?>
