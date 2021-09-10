<?php

class User{
     private $id;
     private $firstName;
     private $lastName;
     private $email;
     private $password;
     private $dateOfReg;




     public function __construct($fname,$lname,$email,$password){
         $this->firstName=$fname;
         $this->lastName=$lname;
         $this->email=$email;
         $this->password=$password;
     }

    public function getDateOfReg(){
        return $this->dateOfReg;
    }

    public function setDateOfReg($dateOfReg){
        $this->dateOfReg = $dateOfReg;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

     public function setUserFName($fname){
         $this->firstName=$fname;
     }

     public function getUserFName(){
          return  $this->firstName;
     }

     public function setUserLName($lname){
         $this->lastName=$lname;
     }

     public function getUserLName(){
         return  $this->lastName;
     }

     public function setUserEmail($email){
         $this->email=$email;
     }

     public function getUserEmail(){
         return  $this->email;
     }

     public function setUserPass($password){
         $this->password=password_hash($password,PASSWORD_DEFAULT);
     }
     public function getUserPass(){
         return  $this->password;
     }




}