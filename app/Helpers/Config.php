<?php
namespace App\Helpers;

class Config
{
    private static $respondCode;
    //setter
    public function setRespondCode($respondCodes){
        self::$respondCode= $respondCodes;
    }
    //getter
    public function getRespondCode(){
        return self::$respondCode;
    }
}