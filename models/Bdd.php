<?php
    /**
     * @class Bdd classe abstraite qui permet la connection à la base de donnée
     * @brief on a accès à cette base de donnée que dans les classes qui hérite de celle ci par la fonction
     * contient un attribut de type PDO
     */
    abstract class Bdd{
        private static $pdo;
    
        /**
         * @fn fonction qui permet de relié l'objet PDO connecté à la base de donnée à l'attribut $pdo
         */
        private static function setBdd(){
            self::$pdo = new PDO("mysql:host=localhost;dbname=librairie_intelligente;charset=utf8","root","");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        }
    
        /**
         * @fn fonction qui permet d'avoir accès à notre objet PDO depuis l'extérieur de la classe
         * @return retourne la référence de notre objet PDO
         */
        protected function getBdd(){
            if(self::$pdo === null){
                self::setBdd();
            }
            return self::$pdo;
        }
    }
    
?>