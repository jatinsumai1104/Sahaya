<?php
class Mailer{
    public function  __construct()
    {
        require("phpmailer/src/PHPMailer.php");
        require("phpmailer/src/SMTP.php");

        $this->mail = new PHPMailer\PHPMailer\PHPMailer();
        $this->mail->IsSMTP();                    // enable SMTP

        $this->mail->SMTPDebug = 0;            // debugging: 1 = errors and messages, 2 = messages only
        $this->mail->SMTPAuth = true;             // authentication enabled
        $this->mail->SMTPSecure = 'ssl';          // secure transfer enabled REQUIRED for Gmail
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 465;               // or 587
        $this->mail->IsHTML(true);
    }


    public  function send_mail($user_mail,$body,$subject){
		// a new mail id is needed
		$sender_username = "Nikhil Ghind";
		$password = "nehaghind";
        $this->mail->Username = "ghind20@gmail.com";
        $this->mail->Password = "{$password}";
        $this->mail->SetFrom("ghind20@gmail.com", "Sahaya");
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->AddAddress("$user_mail");

        if (!$this->mail->Send()) {
            return false;
        } else {
            return true;
        }

    }//end of func
}//end of class
?>