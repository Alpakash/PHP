<?php
/**
 * User: DesleyRoelofsen
 * Date: 01/11/2018
 * Time: 21:30
 */

namespace App\Services\Mail;

class Mail
{

	protected $from;
	protected $to;
	protected $subject;
	protected $content;
	protected $mail;

	public function __construct()
	{
		$this->mail = new \SendGrid\Mail\mail();
		return $this;
	}

	public function from(string $from, string $name)
	{
		$this->mail->setFrom($from, $name);
		return $this;
	}

	public function subject(string $subject)
	{
		$this->mail->setSubject($subject);
		return $this;
	}

	public function to(string $to, string $name)
	{
		$this->mail->addTo($to, $name);
		return $this;
	}

	public function content(string $content)
	{
		$this->mail->addContent("text/html", $content);
		return $this;
	}

	public function cc(string $cc, string $name)
	{
		$this->mail->addCc($cc, $name);
		return $this;
	}

	public function sendAt(int $timestamp)
	{
		$this->mail->setSendAt($timestamp);
		return $this;
	}

	public function send()
	{
		if (empty($this->from)){
			$this->mail->setFrom(getenv('MAIL_FROM'), getenv('APP_NAME'));
		}

		$sendgrid = new \SendGrid(getenv('SENDGRID_KEY'));

		$sendgrid->send($this->mail);
	}
}