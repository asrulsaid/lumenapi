<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

// vendor\bin\phpunit tests\RegisterTest.php
class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    private $phone;
    private $wilayah;
    private $nama;
    private $url;

    private function setPhone($phone){
        $this->phone=$phone;
    }

    private function setWilayah($wilayah){
        $this->wilayah=$wilayah;
    }

    private function setNama($nama){
        $this->nama=$nama;
    }

    private function setUrl(){
        $this->url=url('/v3/register');
    }

    private function setVar(){
        $this->setWilayah('1');
        $this->setPhone('088804128599');
        $this->setNama('tes');
        $this->setUrl();
    }

    private function setVarCekNomor(){
        $this->setWilayah('1');
        $this->setPhone('088804128799');
        $this->setNama('tes');
        $this->setUrl();
    }

    // @test
    public function testRegister(){
        $this->setVar();
        $this->post($this->url,
        [
            'wilayah'=>$this->wilayah,
            'phone'=>$this->phone,
            'name'=>$this->nama,
        ])
            ->seeJson([
                 'responseCode' => '1000',
             ]);
    }

    public function testCekNomor(){
        $this->setVarCekNomor();
        $this->post($this->url,
        [
            'wilayah'=>$this->wilayah,
            'phone'=>$this->phone,
            'name'=>$this->nama,
        ])
            ->seeJson([
                 'responseCode' => '2030',
             ]);
    }

    public function testWilayah(){
        $this->urlWilayah=url('/v3/wilayah');
        $this->get($this->urlWilayah)
            ->seeJson([
                 'responseCode' => '1000',
             ]);
    }

    public function testCheckAccount(){
        $this->phone='088804128799';
        $this->urlCheckAccount=url('/v3/check');
        $this->post($this->urlCheckAccount,
        [
            'phone'=>$this->phone,
        ])
            ->seeJson([
                 'responseCode' => '1000',
             ]);
    }

}