<?php
class Mailer{
    public function  __construct()
    {
        require("vendor/phpmailer/src/PHPMailer.php");
        require("vendor/phpmailer/src/SMTP.php");

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
        $this->mail->Username = "projectuser66@gmail.com";
        $this->mail->Password = "abcd@1234";
        $this->mail->SetFrom("projectuser66@gmail.com", "Sahaya");
        $this->mail->Subject = $subject;
		$this->mail->AddEmbeddedImage("../assets/images/logo.png", "logo", "logo.png", 'base64', 'image/png');
		$this->mail->AddEmbeddedImage('../assets/images/mail-logo.png', 'mail-logo', 'mail-logo.png', 'base64', 'image/png');
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