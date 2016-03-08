<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

//include("php-mailjet-v3-simple.class.php");

class Mail
{
    private static $host = "smtp.gmail.com";
    private static $user = "thelyngo@gmail.com";
    private static $pass = "thelyngo1234";
    private static $SMTPSecure = "tls";
    private static $port = "587";
    private static $from = "thelyngo@gmail.com";

    /**
     * Send email
     *
     * ----- @param string $lang Iso code lang (ex: fr)
     * @param string $subject Subject of the mail
     * @param string $template Template path without .tpl
     * @param array $templateParams Template parameters to assign
     * @param string $from From identifier (ex: array("Florian" => "florian@toast-games.com"))
     * @param array $to Recipients array (ex: array("Joe" => "joe@test.com", "ellen" => "ellen@test.com", ))
     */
    public static function send($subject, $template, $templateParams, $from, $to)
    {
        require _VENDOR_DIR_.'phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = self::$host; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = self::$user; // SMTP username
        $mail->Password = self::$pass; // SMTP password
        $mail->SMTPSecure = self::$SMTPSecure; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = self::$port; // TCP port to connect to

        $mail->FromName = $from;
        foreach ($to as $name => $email) $mail->addAddress($email, $name);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = utf8_decode($subject);
        foreach ($templateParams as $key => $val) View::assign($key, $val); // Assign params
        $mail->Body = View::fetch($template);

        /*$mail->From = $mailConfig['From'];
        $mail->FromName = 'Mailer';
        $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/
        if(!$mail->send())
        {
            return false;
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        else
        {
            return true;
            echo 'Message has been sent';
        }
    }
}
