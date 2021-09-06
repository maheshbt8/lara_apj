<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Zipcontroller extends CI_Controller {
  
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library('zip');
    }
   
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $fileName = 'itsolutionstuff.txt';
        $fileData = 'This file created by Itsolutionstuff.com';
  
        $this->zip->add_data($fileName, $fileData);
  
        $fileName2 = 'itsolutionstuff_file2.txt';
        $fileData2 = 'This file created by Itsolutionstuff.com - 2';
  
        $this->zip->add_data($fileName2, $fileData2);
  
        $this->zip->download('Itsolutionstuff_zip.zip');
    }
      

  public function pdf($value='')
  {
    $fileName = 'itsolutionstuff.pdf';
        $fileData = base_url('assets/dummy.pdf');

        $this->zip->read_file($fileData);
  
        $fileName2 = 'itsolutionstuff_file2.pdf';
        $fileData2 = base_url('assets/dummy.pdf');

        $this->zip->read_file($fileData2);
        /*print_r($this->zip->compression_level);die;
  echo $fileData;die; */   
        $this->zip->download('Itsolutionstuff_zip.zip');
  }
}