<?php
namespace Source\Support;

class PegaEmail{
     private static $nomeQuemEnvia;
     private static $emailQuemEnvia;

     public static function construct(string $nomeQuemEnvia,$emailQuemEnvia)
     {
        self::$nomeQuemEnvia=$nomeQuemEnvia;
         self::$emailQuemEnvia=$emailQuemEnvia;
     }

     public static function getNomeQuemEnvia(){
         return self::$nomeQuemEnvia;
     }
     public static function getemailQuemEnvia(){
        return self::$emailQuemEnvia;
    }

}