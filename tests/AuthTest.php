<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

// vendor\bin\phpunit tests\AuthTest.php
class AuthTest extends TestCase
{
    use DatabaseTransactions;
    private $phone;
    private $pin;
    private $code;
    private $url;

    private function setUrl(){
        $this->url=url('/v3/auth/pin');
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
        $this->setCode('999999');
        $this->setUrl();
    }
    
    // @test
    public function testBuatpin(){    
        $this->setVar();    
        \DB::connection('mysql')->table('otp')->insert(['code' => $this->code,'nohp'=>$this->phone]);
        $this->post($this->url,
        [
            'phone'=>$this->phone,
            'pin'=>$this->pin,
            'code'=>$this->code,
        ])
            ->seeJson([
                    'responseCode' => 1000,
                ]);
    }

    public function testSalahCodeOtp(){    
        $this->setVar();    
        $this->post($this->url,
        [
            'phone'=>$this->phone,
            'pin'=>$this->pin,
            'code'=>$this->code,
        ])
            ->seeJson([
                    'responseCode' => 1020,
                ]);
    }

}