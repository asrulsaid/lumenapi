<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Messaging\CloudMessage;

class Firebase
{
	public function notification($token, array $data = [])
	{
		$url = 'https://fcm.googleapis.com/fcm/send';

		$body = array();

		is_array($token)
		? $body['registration_ids'] = $token
		: $body['to'] = $token;

		empty($data) ?: $body['data'] = $data;

		$headers = [
			'Authorization' => 'key = AAAAFbEUhIQ:APA91bEFEvE-wfUnZq2myXuDNwUq33ttDGxt2GWVqVkY_J9TWcE0di3pWgUnQFR2FXI8HJE70wd7U4aEQU78YhMYH33RUzib33W4Rha42TBsLwBIlXfWyZ97VANYE40rUH18iPzcpIOt',
			'Content-Type' => 'application/json',
			'Cache-Control' => 'no-cache'
		];

		$client = new Client;
		$response = $client->post($url, [
			'headers' => $headers,
			'json' => $body
		]);

		return $response->getBody();
	}

	public function topic($name, array $data)
	{
		$serviceAccount = ServiceAccount::fromJsonFile(base_path().'/google-service-account.json');

		$firebase = (new Factory)
		    ->withServiceAccount($serviceAccount)
		    ->create();

		$messaging  = $firebase->getMessaging();

		$message = CloudMessage::withTarget('topic', $name)
		    ->withData($data);

		return $messaging->send($message);
	}
}
