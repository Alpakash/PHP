<?php
/**
 * User: DesleyRoelofsen
 * Date: 01/11/2018
 * Time: 20:59
 */

namespace App\Services\Mail;

use App\Services\Service;

class MailService extends Service
{

	public function boot()
	{
		$mail = new Mail();

		$this->app->instance('mail', $mail, "App\\Services\\Mail\\MailService");
	}
}