<?php

/*
This class is using the mailer library from "php-Mailer"
-->https://github.com/PHPMailer/PHPMailer

This class handels three main-methods:

-Method "checkSMTPServerStatus" --> Checks if SMTP Server is reachable or not
-Method "sendNewPassword" --> Sends a new Password Mail if the User has forgotten it
-Method "sendConfirmationMail" --> Sends the confirmation Mail the user has to confirm after its registration
*/

class Sendmail{

	private $mailer,
	$smtpServer = MailerConstants::MAIL_SMTP,
	$port = MailerConstants::MAIL_PORT,
	$userName = MailerConstants::MAIL_USERNAME,
	$name = MailerConstants::MAIL_SENDER,
	$password = MailerConstants::MAIL_PASSWORD,
	$smtpSecure = MailerConstants::MAIL_SECURE;

	public function __construct(){
		$this->mailer = new PHPMailer;
	}

	public function checkSMTPServerStatus(){
		$smtp = new SMTP;

		if (!$smtp->connect($this->smtpServer, $this->port)) {
			$smtp->quit(true);
			return false;
		}
		else{
			$smtp->quit(true);
			return true;
		}
	}

	public function sendConfirmationMail($userEmail,$userID){
		$this->initMailServer($userEmail);
		$content = str_replace('%id%', $userID, file_get_contents(MailerConstants::MAIL_CONFIRMATION_URL));
		$this->mailer->isHTML(true);                                  
		$this->mailer->Subject = MailerConstants::MAIL_SUBJECT_CONFIRM_MAIL;
		$this->mailer->msgHTML($content, dirname(__FILE__));
		$this->mailer->AltBody = MailerConstants::MAIL_ALT_EMAIL_CONFIRM_TEXT.''.MailerConstants::MAIL_ALT_EMAIL_CONFIRM_URL;
		return $this->send();
	}

	public function sendNewPassword($userEmail,$password){
		$this->initMailServer($userEmail);
		$content = str_replace('%pw%', $password, file_get_contents(MailerConstants::MAIL_FORGOT_PASSWORD_URL));
		$this->mailer->isHTML(true);                                  
		$this->mailer->Subject = MailerConstants::MAIL_SUBJECT_FORGOT_PW_MAIL;
		$this->mailer->msgHTML($content, dirname(__FILE__));
		$this->mailer->AltBody = MailerConstants::MAIL_ALT_EMAIL_FORGOT_PW_TEXT.$password;
		return $this->send();
	}
	
	public function sendReminderNotification($userEmail,$subject,$text){
		$this->initMailServer($userEmail);
		$content = str_replace('%text%', $text, file_get_contents(MailerConstants::MAIL_REMINDER_NOTIFICATION_URL));
		$this->mailer->isHTML(true);                                  
		$this->mailer->Subject = 'Consilium Equorum '.$subject;
		$this->mailer->msgHTML($content, dirname(__FILE__));
		$this->mailer->AltBody = $text;
		return $this->send();	
	}

	private function initMailServer($userEmail){
		$this->mailer->isSMTP();                     
		$this->mailer->Host = $this->smtpServer;
		$this->mailer->SMTPAuth = true;
		$this->mailer->Username = $this->userName;
		$this->mailer->Password = $this->password;
		$this->mailer->SMTPSecure = $this->smtpSecure;
		$this->mailer->Port = $this->port;
		$this->mailer->setFrom($this->userName, $this->name);
		$this->mailer->addAddress($userEmail);
	}

	private function send(){
		if($this->mailer->Send()){
			return true;
		}
		else{
			return false;
		}
	}
}
?>



