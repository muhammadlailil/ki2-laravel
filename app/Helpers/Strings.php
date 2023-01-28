<?php
namespace App\Helpers;

class Strings{
    // list function class helper string
    public static function helloWorld(){
        return 'Halo Dunia !';
    }

    public static function myName($name){
        return "Halo, nama saya {$name}";
    }

    public function world(){
        return 'World';
    }
}