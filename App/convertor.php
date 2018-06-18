<?php
class PDF_Convertor{
  
	
	
 public function __construct(){
  /*$this->check_file();*/
 }
	 
	public function load_data_from_config(){
	$this->Config = parse_ini_file("../../Config/config.ini",true);	
	}
	
 public function upload_pdf_file(){
	$this->load_data_from_config();
	$DIR = $this->Config['PDF']['PDF_Upload_Files_Path'];
	$UPLOAD_FILE = $DIR . basename($_FILES['PDF_FILE']['name']);
	 if($_FILES['PDF_FILE']['size']<=$this->Config['PDF']['PDF_Max_Size']){
		 if($_FILES['PDF_FILE']['type']=='application/pdf'){
	       if(move_uploaded_file($_FILES['PDF_FILE']['tmp_name'],$UPLOAD_FILE)){
		     echo "Succesfull im converting!";
		   }else{
		   }
	 }else{
		  echo "Upload only pdf files, not ".$_FILES['PDF_FILE']['type']." files.";
		 }
	 }else{
		 echo "Max size is ".$this->Config['PDF']['PDF_Max_Size']." .";
	 }
	 
}

 public function check_file(){
  $this->PDF = pdf_new();
	 if(pdf_open_pdi_document($this->PDF,$_FILES['PDF_FILE']['name'])===false){
   print error;
   exit;
  }else{
   $this->info_file();
  }
 }
  
  public function info_file(){
   
  }
}


?>
