<?php
class PDF_Convertor{
  
 public function __construct(){
  $this->open_and_load_config();
  $this->check_file();
 }
 
 public function open_and_load_config(){
  $this->CONFIG_PDF_FILE = parse_ini_file("_DIR_ . \"/../../config.ini",true);
 }
 
 public function check_file(){
  $this->PDF = pdf_new();
  if(pdf_open_pdi_document($this->PDF,'$this->CONFIG_PDF_FILE['PDF_INFO']['PDF_FILE_NAME']')===false){
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
