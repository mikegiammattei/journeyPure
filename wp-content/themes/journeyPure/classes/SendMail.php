<?php

/**
 * FileName: SendMail.php
 * Description:
 *
 * Created by: Ambrosia Digital Team.
 * Author: Michael Giammattei
 * Date: 12/10/2019
 */

namespace Mail;


class SendMail
{
	public function send($email,$emailName,$body){
		require_once(get_stylesheet_directory() . '/vendor/autoload.php');

		$mail = new \PHPMailer\PHPMailer\PHPMailer();
		$mail->IsSMTP(); // enable SMTP

		$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587; // or 587
		$mail->IsHTML(true);
		$mail->Username = "webstackpro@gmail.com";
		$mail->Password = "TomTom2020%";
		$mail->SetFrom("webstackpro@gmail.com");
		$mail->Subject = "Review Submission From Website";
		$mail->Body = $body;
		$mail->AddAddress($email,$emailName);

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message has been sent";
		}
	}

}
