<?php
namespace Source\Support;
use PHPMailer\PHPMailer\PHPMailer;
use Exception;

class Email1{
    private static  $para_email;
    private static $para_nome;
    private static $error;

    
    public function __construct()
    {
    self::$para_email="rlpscontrucaogeral@gmail.com";
    self::$para_nome="Rlps Construção";

   
    }
    
    public function email($QuemEstaEnviar,$nomeDeQuemEnvia,$assunto,$corpo):bool{

            $emailEnviar=new PHPMailer(true);
            $emailEnviar->SMTPAuth=true;
            $emailEnviar->SMTPSecure="tls";
            $emailEnviar->CharSet="utf-8";

            $emailEnviar->isSMTP();
            $emailEnviar->From=$QuemEstaEnviar;
            $emailEnviar->FromName=$nomeDeQuemEnvia;
            $emailEnviar->Subject=$assunto;
            $emailEnviar->msgHTML($corpo);
            $emailEnviar->setLanguage("br");

            //AddAddress PARA ONDE VAI A SMS

            $emailEnviar->addAddress(self::$para_email,self::$para_nome);
            
            //CONFIGURAÇÃO DO SMTP

            $emailEnviar->Host=CONF_SMTP_MAIL['host'];
            $emailEnviar->Port=CONF_SMTP_MAIL['port'];
            $emailEnviar->Password=CONF_SMTP_MAIL['passwd'];
            $emailEnviar->Username=CONF_SMTP_MAIL['user'];

            try{
                $emailEnviar->send();
                return true;
           }catch(Exception $exception){ 
               self::$error;
               return false;
               }

        }

        public  function error():?Exception{

            
                   return self::$error;
            }

}