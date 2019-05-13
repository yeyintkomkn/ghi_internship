<?php


namespace App\CustomClass;
 
 use App\Student_registration;

 class student_regData {
  
    private $id;
    private $reg_data;

     function __construct($reg_id) {
         $student_reg=Student_registration::findOrFail($reg_id);
         $this->id=$student_reg->id;
         $this->setRegData($student_reg);
     }

     /**
      * @return mixed
      */
     public function getRegData()
     {
         $this->reg_data['photo_url']=Path::$domain_url.'/upload/student_reg/'.$this->reg_data['id_photo'];
         $this->reg_data['student_card_url']=Path::$domain_url.'/upload/student_card/'.$this->reg_data['student_card'];
         return $this->reg_data;
     }

     /**
      * @param mixed $blog_data
      */
     private function setRegData($reg_data)
     {
         $this->reg_data = $reg_data;
     }




  
 }