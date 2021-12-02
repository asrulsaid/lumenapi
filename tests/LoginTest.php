<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

// vendor\bin\phpunit tests\LoginTest.php
class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    private $phone;
    private $pin;
    private $url;

    private function setPhone($phone){
        $this->phone=$phone;
    }

    private function setPin($pin){
        $this->pin=$pin;
    }

    private function setMime($mime){
        $this->mime=$mime;
    }

    private function setTipe($tipe){
        $this->tipe=$tipe;
    }

    private function setBrand($brand){
        $this->brand=$brand;
    }

    private function setDevice($device){
        $this->device=$device;
    }

    private function setModel($model){
        $this->model=$model;
    }
    

    private function setUrl(){
        $this->url=url('/v3/login');
    }

    private function setVar(){
        $this->setPhone('081282360934');
        $this->setPin('161617');
        $this->setMime('35824005111111');
        $this->setTipe('2');
        $this->setBrand('Xiaomi');
        $this->setDevice('beryllium');
        $this->setModel('POCOPHONE F1');
        $this->setUrl();
    }

    // @test
    public function testLogin(){
        $this->setVar();
        $this->post($this->url,
        [
			'phone' => $this->phone,
			'pin' 	=> $this->pin,	//untuk ipv6
            'mime' 	=> $this->mime,
            'tipe' => $this->tipe,
            'brand' => $this->brand,
            'device' => $this->device,
            'model' => $this->model,
        ])
            ->seeJson([
                 'responseCode' => '1000',
             ]);
    }

    public function testCheckAccount(){
        $this->phone='088804128799';
        $this->urlCheckAccount=url('/v3/login/check');
        $this->post($this->urlCheckAccount,
        [
            'phone'=>$this->phone,
        ])
            ->seeJson([
                 'responseCode' => '1000',
             ]);
    }

}