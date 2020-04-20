<?php

/**
 * Interface MailerInterface
*/
interface MailerInterface
{
    /** Send mail */
    public function send();
}


/**
 * Class SmtpMailer
*/
class SmtpMailer implements MailerInterface
{
    /** Send mail */
    public function send()
    {
        var_dump('send with smtp');
    }
}


/**
 * Class MailgunMailer
 */
class MailgunMailer implements MailerInterface
{
    /** Send mail */
    public function send()
    {
        var_dump('send with mailgun');
    }
}

# Resolve Duplicate calling code by Decorator Pattern
/*
$smtp = new SmtpMailer();
$smtp->send();

$mailgun = new MailgunMailer();
$mailgun->send();
*/

/**
 * Class MailDecorator
*/
class MailDecorator
{
    /** @var MailerInterface  */
    protected $mailer;

    /**
     * MailDecorator constructor.
     * @param MailerInterface $mailer
    */
    public function __construct(MailerInterface $mailer)
    {
         $this->mailer = $mailer;
    }

    /**
     * @param $name
     * @param $arguments
     * @return
   */
    public function __call($name, $arguments)
    {
         return $this->mailer->{$name}($arguments);
    }
}

$mail = new MailDecorator(new SmtpMailer());
$mail->send();

$mail = new MailDecorator(new MailgunMailer());
$mail->send();