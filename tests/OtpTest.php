<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

// vendor\bin\phpunit tests\OtpTest.php
class OtpTest extends TestCase
{
    use DatabaseTransactions;
    private $phone;
    private $pin;
    private $code;
    private $url;

    private function setUrl(){
        $this->url=url('/v3/auth/otp');
    }

    private function setPhone($phone){
        $this->phone=$phone;
    }

    private function setPin($pin){
        $this->pin=$pin;
    }

    private function setCode($code){
        $this->code=$code;
    }

    private function setVar(){
        $this->setPin('123456');
        $this->setPhone('081282360934');
        $this->setCode('tes');
        $this->setUrl();
        $this->post($this->url.'/reset',
        [
            'phone'=>$this->phone
        ]);
    }
    
    // @test
    public function testcheckLimitOTP(){    
        $this->setVar();    
        $this->get($this->url.'/check/'.$this->phone)
            ->seeJson([
                    'responseCode' => 1000,
                ]);
    }

    public function testOTPFirebase(){    
        $this->setVar();    
        $this->post($this->url,
        [
            'type'=>'firebase',
            'phone'=>$this->phone
        ])
            ->seeJson([
                    'responseCode' => 1000,
                ]);
    }

    public function testOTPSms(){    
        $this->setVar();    
        $this->post($this->url,
        [
            'type'=>'sms',
            'phone'=>$this->phone
        ])
            ->seeJson([
                    'responseCode' => 1000,
                ]);
    }

    public function testOTPWa(){    
        $this->setVar();    
        $this->post($this->url,
        [
            'type'=>'wa',
            'phone'=>$this->phone
        ])
            ->seeJson([
                    'responseCode' => 1000,
                ]);
    }

}