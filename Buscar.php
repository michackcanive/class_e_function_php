<?php
namespace App\Model\Database;

use App\Model\Database\Connect;
use \PDOException;
use \PDO;


class Buscar extends Connect
{

    private static $factos;
    private static $informacao;
    private static $idepoimentos;
    private static $protifolio;

   
    /**
     * Connect constructor.
     */
    public function __construct()
    {
    }

    public function __clone()
    {
        // TODO: Implement __clone() method.
    }

    /**
     * @return \PDO
     */

    public static function getFactos()
    {
        try{
            if(empty(self::$factos)){  
            self::$factos=Connect::getInstance()->query("SELECT * FROM tb_factos");
                $fetch=self::$factos->fetch(PDO::FETCH_ASSOC);
    }
        }catch (PDOException $exception){
            die("<h1>WOOPS ! ERRO AO BUSCAR OS FACTOS..</h1>");
        
        }
        return $fetch;
    }

    public static function getInformacao()
    {
        $fetch="";
        try{
            if(empty(self::$informacao)){  
            self::$informacao=Connect::getInstance()->query("SELECT * FROM tb_inf_s");
                $fetch=self::$informacao->fetch(PDO::FETCH_ASSOC);
    }
        }catch (PDOException $exception){
            die("<h1>WOOPS ! ERRO AO BUSCAR AS INFORMAÇÃO..</h1>");
            return $fetch;
        }
        return $fetch;
    }
    public static function getdepoimentos()
    {
        try{
            if(empty(self::$idepoimentos)){  
            self::$idepoimentos=Connect::getInstance()->prepare("SELECT * FROM tb_depoimentos");
            self::$idepoimentos->execute();

                $fetch=self::$idepoimentos->fetch(PDO::FETCH_ASSOC);
    }
        }catch (PDOException $exception){
            die("<h1>WOOPS ! ERRO AO BUSCAR AS INFORMAÇÃO..</h1>");
        
        }
        return $fetch;
    }

    public static function getProtifolio(){


        try{
            if(empty(self::$protifolio)){  
            self::$protifolio=Connect::getInstance()->prepare("SELECT * FROM protifolio");
            self::$protifolio->execute();
         
    }
        }catch (PDOException $exception){
            die("<h1>WOOPS ! ERRO AO BUSCAR AS INFORMAÇÃO..</h1>");
        
        }
       // return $ex;


    }




}
?>