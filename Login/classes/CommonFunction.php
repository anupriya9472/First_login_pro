<?php

class CommonFunctions
{
    private $db_connection = null;
    private function databaseConnection()
    {
        if ($this->db_connection != null) {
            return true;
        } else {
            try {
                $this->db_connection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                #$this->errors[] = MESSAGE_DATABASE_ERROR . $e->getMessage();
            }
        }
        return false;
    }
    public function loginFunction($user_id, $password)
    {
        if ($this->databaseConnection()) {
            $insert_query = $this->db_connection->prepare("SELECT user_id FROM login WHERE user_id=:user_id AND password = md5(:password)");
            $insert_query->bindValue(':user_id', trim($user_id), PDO::PARAM_STR);
            $insert_query->bindValue(':password', trim($password), PDO::PARAM_STR);
            $status = $insert_query->execute();
            if ($status) {
                return $insert_query->fetchObject();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function createAccountFunction($name,$user_id,$password,$email_id,$phone)
    {
        
        if($this->databaseConnection()){
            $insert_query = $this->db_connection->prepare("INSERT INTO login (name,user_id,password,email,phone) VALUES (:name,:user_id,md5(:password),:email_id,:phone)");
            $insert_query->bindValue(':name', trim($name), PDO::PARAM_STR);
            $insert_query->bindValue(':user_id', trim($user_id), PDO::PARAM_STR);
            $insert_query->bindValue(':password', trim($password), PDO::PARAM_STR);
            $insert_query->bindValue(':email_id', trim($email_id), PDO::PARAM_STR);
            $insert_query->bindValue(':phone', trim($phone), PDO::PARAM_STR);
            $status = $insert_query->execute();
            if ($status) {
                return $status;
            } else {
                return false;
            }
        } else {
            return false;   
        }
    }

    public function checkEmail($user_id,$re_email)
    {
        if($this->databaseConnection())
        {
            $insert_query = $this->db_connection->prepare("SELECT user_id,email FROM login WHERE user_id=:user_id AND email=:re_email");
            $insert_query->bindValue(':user_id', trim($user_id), PDO::PARAM_STR);
            $insert_query->bindValue(':re_email', trim($re_email), PDO::PARAM_STR);
            $status = $insert_query->execute();
            if ($status) {
                return $insert_query->fetchObject();
            } else {
                return false;
            }
        }else {
            return false;
        }
    }
}
