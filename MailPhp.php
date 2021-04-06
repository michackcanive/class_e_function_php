<?php


namespace App\Support;

class MailPhp{



    private static $Subject;
    private static $body;
    private static $message;
    private static $name;
    private static $headers;
    private static $email;
    private static $email_to;


    public function __construct()
    {
            
        self::$email_to="mechackantonio@gmai.com"; 
    }

    public static function add(string $name,string $email,string $Subject,string $message){

            self::$name=$name;
            self::$Subject=$Subject;
            self::$message=$message;
            self::$email=$email;


    }

    public static function send():bool{

        //Cabeçalhio da Message

        self::$headers ="Content-Type:text/plain;charset=utf-8\r\n";
        self::$headers .="From: ".self::$email."\r\n";
        self::$headers.="Reply-To:".self::$email."\r\n";

        // Body da Message

        self::$body="Pedido de Informações RLPS";
        self::$body.="Nome:".self::$name."\r\n";
        self::$body.="Mensagem:".self::$message."\r\n";


return mail(self::$email_to,mb_encode_mimeheader(self::$Subject,"utf-8"),self::$body,self::$headers);
    }




public static function error():string{            
 return "Ocorreu um erro no envio";
}

}


?>