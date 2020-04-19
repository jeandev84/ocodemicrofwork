<?php

interface MailerInterface
{
    public function send();
}

class SmtpMailer implements MailerInterface
{
    public function send()
    {
        var_dump('send with smtp');
    }
}

class MailgunMailer implements MailerInterface
{
    public function send()
    {
        var_dump('send with mailgun');
    }
}

class MailDecorator
{
    protected $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __call($name, $arguments)
    {
        return $this->mailer->{$name}($arguments);
    }
}

$mail = new MailDecorator(new MailgunMailer());
$mail->send();