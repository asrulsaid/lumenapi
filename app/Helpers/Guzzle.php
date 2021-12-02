<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class Guzzle
{
	public function waBlast($nama, $target, $tgl_lahir)
	{
		try {
			$client = new Client;
	        $request = $client->post('https://wuzz.ai/ae/landingpage/saveitem/121', [
	            'form_params' => [
		            'plp' 						=> 'submit',
		            'token'      				=> 'qFHHHiFx09UMjXKzzBhBKONoOeHvWGMz2r2R3sdNfPjLpru9qbGPgt2Rc243O5jK',
		            'vendor_name'    		=> $nama,
		            'vendor_hp'    			=> $target,
		            'vendor_tgl_lahir'	=> $tgl_lahir,
	            ],
	        ]);

	        $content = $request->getBody()->getContents();
					return $content;

		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public function waBlast2($token, $target, $message)
	{
		try {
			$client = new Client;
	        // $request = $client->post('https://console.wablas.com/api/send-message', [
	        $request = $client->post('https://kioser.wablas.com/api/send-message', [
							'headers' => [
									'Authorization' => $token
							],
	            'form_params' => [
		            'phone' 						=> $target,
		            'message'      			=> $message,
	            ],
	        ]);

	        $content = $request->getBody()->getContents();
					return $content;

		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function waBlast3($sender,$target, $message)
	{
		$token = "Bearer 2k7EpL4qTbRuLmu2napQY8VvuWrgWqgffExGOY81wtgPq6RlQU";
		try {
			$client = new Client;
	        $request = $client->post('https://app.whatspie.com/api/messages', [
							'headers' => [
									'Authorization' => $token,
									'Accept' => 'application/json',
									'Content-Type' => 'application/x-www-form-urlencoded'
							],
	            'form_params' => [
		            'receiver' 				=> $target,
		            'device' 				=> $sender,
		            'message'      			=> $message,
		            'type'      			=> 'chat',
	            ],
	        ]);

	        $content = $request->getBody()->getContents();
					return $content;

		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function waCheckDevice()
	{
		$token = "Bearer 2k7EpL4qTbRuLmu2napQY8VvuWrgWqgffExGOY81wtgPq6RlQU";
		try {
			$client = new Client;
	        $request = $client->get('https://app.whatspie.com/api/devices', [
				'headers' => [
						'Authorization' => $token,
						'Accept' => 'application/json',
						'Content-Type' => 'application/x-www-form-urlencoded'
				],
	        ]);

	        $content = $request->getBody()->getContents();
					return $content;

		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}


	public static function otpCall($body){
		$url = "http://104.199.196.122/gateway/v3/asynccall";
		$header = "Apikey 2a710f42fb0c2d7b78eed69117bcea6e";

		try {
			$client = new Client;
			// $request = $client->request('POST', $url, [
			// 	'headers' => [
			// 			'Content-Type' => 'application/json',
			// 			'Authorization' => $header
			// 	],
			//     'json' => ['msisdn' => '082188480724', 'retry' => 0]
			// ]);

		    $request = $client->post($url, [
				'headers' => [
						'Content-Type' => 'application/json',
						'Authorization' => $header
				],
		        'json' => $body,
		        'content-type' => 'application/json'
		    ]);

		    $content = $request->getBody()->getContents();
			return $content;
		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function WaRegister($phone='',$customMessage='', $name='')
	{
		try {
			$client = new Client;
			$object = new responBaru;
			$url = '/cron/wa_fresh?';
			if (!empty($phone))
				$data[] = 'nomor='.$phone;
			if (!empty($customMessage))
				$data[] = 'customMessage='.$customMessage;
			if (!empty($name))
				$data[] = 'name='.$name;

			$url = $url.implode('&',$data);
			$request = $client->get(env('URL_IP_BROADCAST').$url);
			return $object;
		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function firebaseBroadcast($token, $data){
		try {
			$client = new Client;
			$request = $client->post((env('URL_IP_BROADCAST').'/firebase/device'), [
				'form_params' => [
					'token'	=> $token,
					'data_firebase' => $data,
				],
			]);
			$content = $request->getBody()->getContents();
					return $content;

		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function getFirewall(){
		$firewallId = env('DO_ID');
		$url = "https://api.digitalocean.com/v2/firewalls/$firewallId";
		$header = "Bearer bbac1f27d3ffd438e5e2408b1c48c7219bd601d7a14b37b621113262a00a87e3";

		try {
			$client = new Client;
			$request = $client->get($url, [
				'headers' => [
						'Content-Type' => 'application/json',
						'Authorization' => $header
				],
				'content-type' => 'application/json'
			]);

			$content = $request->getBody()->getContents();
			return $content;
		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}

	public static function firewallUpdate($body){
		$firewallId = env('DO_ID');
		$url = "https://api.digitalocean.com/v2/firewalls/$firewallId";
		$header = "Bearer bbac1f27d3ffd438e5e2408b1c48c7219bd601d7a14b37b621113262a00a87e3";

		try {
			$client = new Client;
			// $request = $client->post($url, [
			$request = $client->request('PUT', $url, [
				'headers' => [
						'Content-Type' => 'application/json',
						'Authorization' => $header
				],
				'json' => $body,
				'content-type' => 'application/json'
			]);

			$content = $request->getBody()->getContents();
			return $content;
		} catch(\Exception $e) {
			return $e->getMessage();
		}
	}
	
	public static function smsSend($phone, $message, $type = 'general'){
		try {
			$client = new Client;
			$response = $client->request('GET', 'https://internal.kioser.com/sender_sms.php', [
				'query' => [
					'numbers' => $phone,
					'content' => $message,
					'type' => $type,
					'submit' => true
				]
			]);

			if($response->getStatusCode() != 200)
			{
				throw new \Exception('Terjadi Kesalahan');
			}

		} catch (\Exception $e) {
			return false;
		}

		return true;
	}
}

class responBaru{
	public function handle(){
		return "ok";
	}
}
