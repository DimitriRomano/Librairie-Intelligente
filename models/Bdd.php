<?php
    abstract class Bdd
    {
        private static $pdo;
        
        private static function setBdd(){
            self::$pdo = new PDO("mysql:host=localhost;dbname=librairie_intelligente;charset=utf8","root","");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        protected function getBdd(){
            if(self::$pdo === null){
                self::setBdd();
            }else{
                return self::$pdo;
            }
        }

    }
    
?>