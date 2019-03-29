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
        $this->mail->Username = "2016.jatin.sumai@ves.ac.in";
        $this->mail->Password = "jatin@99";
        $this->mail->SetFrom("2016.jatin.sumai@ves.ac.in", "Sahaya");
        $this->mail->Subject = $subject;
		$this->mail->AddEmbeddedImage("../../../assets/images/logo.png", "logo", "logo.png", 'base64', 'image/png');
		$this->mail->AddEmbeddedImage('../../../assets/images/mail-logo.png', 'mail-logo', 'mail-logo.png', 'base64', 'image/png');
        $this->mail->Body = $body;


        $this->mail->AddAddress("$user_mail");

        if (!$this->mail->Send()) {
			die();
            return false;
        } else {
            return true;
        }

    }//end of func
	
	public function getMailBody($username, $base_url_link, $button_desc, $content){
		return "<div><table border='0' cellpadding='0' cellspacing='0' height='100%' style='font-family:&quot;Arial&quot;' width='100%'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;border:1px solid #ecedee' width='600'><tbody><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' height='50' style='font-family:&quot;Arial&quot;;font-size:13px;padding:20px 40px 0 40px' width='100%'><tbody><tr><td align='center' style='margin:0;padding:0' valign='middle'><a href='http://localhost/Sahaya/views/admin/pages/login2.php' style='text-decoration:none;color:#222;font-size: 20px;'> Sahaya Foundation <img height='30' src='cid:logo'  style='width:30px;height:30px' width='30'></a></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;background-color:#fff;font-size:14px;color:#46535e;border-radius:3px;padding-top:30px' width='100%'><tbody><tr><td align='left' valign='top'><div style='color:#fff;background-image:url(https://ci5.googleusercontent.com/proxy/HCXBN17Mw8b7GgEiF5k8bt56EMh5Q5WbYnIlta8fUehYfGpB4f79NphBAC6SC2py6927R3rcCLbGOc2MrQ0EgT4m-nKWg_HzlYWf13P36_ZvMGq24I82pvoD9JVbM2r494vwZyW800n9YuvFT6gsNA=s0-d-e1-ft#https://static-fastly.hackerearth.com/static/emails/images/practice/practice_intro_header.png);padding:48px 20px 48px 20px;text-align:center;font-size:30px;margin:0 0 24px 0'><span style='font-size:14px;line-height:2'>{$username}, are you helping for Good?</span><span style='display:block;font-size:24px;margin:10px 0 0 0'>LET`S HELP TOGETHER TODAY</span></div><div style='margin:0 30px 36px 30px'><span style='display:block;margin:0 0 18px 0;font-size:14px;line-height:2'>You joined Sahaya Foundation with a goal to be a better person.We aim to provide you with all the resources to achieve your goal.</span><div style='margin:0 auto;display:table'><a style='font-size:14px;border-radius:3px;display:inline-block;text-decoration:none;color:#fff;text-align:center;padding:15px 20px;width:180px;background-color:#f60' href='{$base_url_link}'>{$button_desc}</a></div></div><div style='line-height:2;margin:30px 0 18px 30px;color:#b2b2b2'><div>Regards,</div><div>Team Sahaya</div></div></td></tr></tbody></table></td></tr><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' style='font-family:&quot;Arial&quot;;font-size:12px;color:#666;padding-top:30px' width='100%'><tbody><tr><td align='left' style='padding:0 20px;font-size:12px;color:#90979e' valign='top'>{$content}</td></tr><tr><td><a href='http://localhost/Sahaya/views/admin/pages/login2.php'><img height='auto' src='cid:mail-logo' style='width:100%;height:auto' width='100%'></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></div>";

	}
	
}//end of class
?>