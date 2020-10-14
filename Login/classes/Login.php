<?php
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;

require "PHPMailer/OAuth.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";


class Login
{
    private $db_connection = null;
    private $user_id = null;
    private $user_is_logged_in = false;
    public $errors = array();
    public $messages = array();
    private $rcode;
    public function __construct()
    {
        session_start();
        $now = time();
        if (isset($_GET["logout"])) {
            $this->doLogout();
        } elseif (!empty($_SESSION['user_id'])) {
            $this->loginWithSessionData();
        } elseif (isset($_POST["login"])) {
            $this->loginWithPostData($_POST['user_id'], $_POST['password']);
        }elseif(isset($_POST["create"])){
            $this->createAccount($_POST['name'],$_POST['user_id'],$_POST['password'],$_POST['email_id'],$_POST['phone']);
        }elseif(isset($_POST["enter"])){
            $this->recoverPassword($_POST['user_id'],$_POST['re_email']);
        }elseif (isset($_POST['go'])) {
            # code...
        }
    }
    private function loginWithSessionData()
    {
        $this->user_id = $_SESSION['user_id'];
        $this->user_is_logged_in = true;
    }
    private function logOutWithSessionData()
    {
        $_SESSION = array();
        session_destroy();
        $this->user_is_logged_in = false;
        $this->messages[] = MESSAGE_LOGGED_OUT;
    }
    private function loginWithPostData($user_id, $password)
    {
        if (empty($user_id)) {
            $this->errors[] = MESSAGE_USEREMAIL_EMPTY;
        } else if (empty($password)) {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;
        } else {
            $CommFunc = new CommonFunctions();
            $result = $CommFunc->loginFunction($user_id, $password);
            if (!isset($result->user_id)) {
                $this->errors[] = MESSAGE_LOGIN_FAILED;
            } else {
                $_SESSION['user_id'] = $result->user_id;
                $this->user_is_logged_in = true;
            }
        }
    }
    public function doLogout()
    {
        $_SESSION = array();
        session_destroy();
        $this->user_is_logged_in = false;
        $this->messages[] = MESSAGE_LOGGED_OUT;
    }
    public function isUserLoggedIn()
    {
        return $this->user_is_logged_in;
    }
    
    public function createAccount($name,$user_id,$password,$email_id,$phone)
    {
        if(empty($name)){
            $this->errors[] = MESSAGE_NAME_EMPTY;
        }elseif (empty($user_id)) {
            $this->errors[] = MESSAGE_USEREMAIL_EMPTY;
        } else if (empty($password)) {
            $this->errors[] = MESSAGE_PASSWORD_EMPTY;
        }elseif(empty($email_id)){
            $this->errors[] = MESSAGE_MAIL_EMPTY;
        }elseif(empty($phone)){
            $this->errors[] = MESSAGE_PHONE_EMPTY;
        }else {
            $CommFunc = new CommonFunctions();
            $result = $CommFunc->createAccountFunction($name,$user_id,$password,$email_id,$phone);
            if (!$result) {
                $this->errors[] = MESSAGE_CREATEACCOUNT_FAILED;
            } else {
                echo "account created";
            }
        }
    }

    public function recoverPassword($user_id,$re_email)
    {
        if(empty($re_email))
        {
            echo "Plz enter email before enter...";
        }elseif(empty($user_id)){
            echo "Plz enter user  id before enter...";
        }else {
            $CommFunc = new CommonFunctions();
            $result = $CommFunc->checkEmail($user_id,$re_email);
            if (isset($result->user_id)) {
               
                echo "process..";
                echo "<script> window.open('rcode.php'); </script>";
             /*   $rcode=554432;

                $mail = new PHPMailer();

                try {
    
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'sender@gmail.com';                     // SMTP username
                    $mail->Password   = 'Password';                               // SMTP password
                    $mail->SMTPSecure = 'tls';        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
                    $mail->setFrom('sender@gmail.com', 'Mailer');
                    $mail->addAddress('anu.priya.9472@gmail.com');     // Add a recipient
                    $mail->addReplyTo('sender@gmail.com', 'Information');

    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = '<b>'.$rcode.'</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if($mail->send()){
                        echo 'Message has been sent';
                        echo "<script> window.open('rcode.php'); </script>";
                    }
                    else{
                    
                        echo 'Some problem';
                    }
                    } catch (Exception $e) {
                        echo "Message could not be sent.";
                    }*/
                }
        
            else {
                echo "Your user id or email id is wrong...";
            }
        }
        
    }
}
