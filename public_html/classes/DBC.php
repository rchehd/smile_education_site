<?php

class DBC
{
    private $dbconn;
    private $dbParams=[
        SERVERNAME =>"localhost",
        USERNAME =>"myuser",
        PASSWORD =>"1235812358",
        DBNAME =>"my_host1"
    ];
    //construcrot
    public function __construct(){
        $server=$this->dbParams['SERVERNAME'];
        $dbname=$this->dbParams['DBNAME'];
        $username=$this->dbParams['USERNAME'];
        $pass=$this->dbParams['PASSWORD'];
        $this->dbconn =  new PDO("mysql:host=$server;dbname=$dbname", $username, $pass);
    }
    //main public methods
    public function validateUser($user){
        $email=$user->getUserEmail();
        $pass=$user->getUserPass();


        $sql = 'SELECT * FROM users WHERE Email= :email';
        $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':email' => $email));
        $res=$stm->fetchAll(PDO::FETCH_ASSOC);
        $passHash=$res[0]['password'];
        $id=$res[0]['id'];
        $fname=$res[0]['FirstName'];
        $lname=$res[0]['LastName'];
        $dt=$res[0]['DateOfReg'];
        $valid=password_verify($pass,$passHash);
        if($valid) {
            $user->setUserFName($fname);
            $user->setUserLName($lname);
            $user->setDateOfReg($dt);
            $user->setId($id);
            return true;
        }else{
            return  false;
        }
    }

    public function saveUser($user){
        $email=$user->getUserEmail();
        $firstname=$user->getUserFName();
        $lastName=$user->getUserLName();
        $passHash=$user->getUserPass();
        try {
            if($this->isEmail($email)==false){
                $sql = 'INSERT INTO users (FirstName, LastName, Email, password,DateOfReg) VALUES (:fname,:lname,:email,:passw,NOW())';
                $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stm->execute(array(':fname'=>$firstname,':lname'=>$lastName,':email' => $email,':passw'=>$passHash));
                return true;
            }else{
                return false;
            }

        } catch (Exception $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            exit();

        }
    }
    public function updateUser($user,$data){

        $email=$user->getUserEmail();
        $id=$this->getUserID($email);
        $email=$data['email'];
        $firstname=$data['fname'];
        $lastName=$data['lname'];
        if($data['pass']){
            $passHash=password_hash($data['pass'],PASSWORD_DEFAULT);
            try{
                $sql = 'UPDATE users SET FirstName= :fname,LastName= :lname,Email= :email,Password= :passw WHERE id= :id';
                $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stm->execute(array(':fname'=>$firstname,':lname'=>$lastName,':email' => $email,':passw'=>$passHash,':id'=>$id));
                return true;
            }catch (Exception $e){
                print "Error!: " . $e->getMessage() . "<br/>";
                exit();

            }
        }else{
            try{
                $sql = 'UPDATE users SET FirstName= :fname,LastName= :lname,Email= :email WHERE id= :id';
                $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stm->execute(array(':fname'=>$firstname,':lname'=>$lastName,':email' => $email,':id'=>$id));
                return true;
            }catch (Exception $e){
                print "Error!: " . $e->getMessage() . "<br/>";
                exit();

            }
        }


    }
    public function getHashPass($user){
        $email=$user->getUserEmail();
        try{
            $sql = 'SELECT Password FROM users WHERE Email= :email';
            $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stm->execute(array(':email' => $email));
            return true;
        }catch (Exception $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            exit();

        }

    }


    // additional private methods
    private function getUserID(string $userEmail){
        $sql = 'SELECT id FROM users WHERE Email= :email';
        $stm=$this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':email'=>$userEmail));
        $result=$stm->fetchALL(PDO::FETCH_ASSOC);
        return $result[0]['id'];

    }
    private function getUserInfoFromEmail(string $userEmail, string $paramName){
        $sql = 'SELECT :param FROM users WHERE Email= :email';
        $stm=$this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':param'=>$paramName,':email'=>$userEmail));
        $result=$stm->fetchALL(PDO::FETCH_ASSOC);
        return $result[0][$paramName];

    }
    private function getUserInfoFromId(int $id,string $paramName ){
        $sql = 'SELECT :param FROM users WHERE id= :id';
        $stm=$this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':param'=>$paramName,':id'=>$id));
        $result=$stm->fetchALL();
        return $result[0][$paramName];

    }
    private function getAllUserInfoFromId(int $id){
        $sql = 'SELECT * FROM users WHERE id= :id';
        $stm=$this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':id'=>$id));
        $result=$stm->fetchALL();
        return $result[0];
    }
    private function isUser(int $id,string $email){
        $sql = 'SELECT id FROM users WHERE Email= :email and id!= :id';
        $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':email' => $email,':id'=>$id));
        $result=$stm->fetchALL();
        if($stm->rowCount()>0) {
            return false;
        }else{
            return  true;
        }
    }
    private function isEmail($email){
        $sql = 'SELECT *
                FROM users
                WHERE Email = :email';
        $stm = $this->dbconn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stm->execute(array(':email' => $email));

        $stm->execute();
        $s=$stm->rowCount();
        if($s>0) {
            return true;
        }else{
            return  false;
        }
    }






}

