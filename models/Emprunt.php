<?php
/**
 * @class Emprunt Emprunt.php
 * @brief classe de donnée Emprunt similaire à la table emprunter de la base de donnée
 */
    class  Emprunt {
            /**
             * @param $id
             * @param $date
             * @param $id_client référence à l'utilisateur
             * @param $id_livre référence à livre
             */
        private $id;
        private $date_emprunt;
        private $id_client;
        private $id_livre;

        public function __construct($id,$date_emprunt,$id_client,$id_livre)
        {
            $this->setId($id);
            $this->setDate_emprunt($date_emprunt);
            $this->setId_client($id_client);
            $this->setId_livre($id_livre);
        }        


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of date_emprunt
         */ 
        public function getDate_emprunt()
        {
                return $this->date_emprunt;
        }

        /**
         * Set the value of date_emprunt
         *
         * @return  self
         */ 
        public function setDate_emprunt($date_emprunt)
        {
                $this->date_emprunt = $date_emprunt;

                return $this;
        }

        /**
         * Get the value of id_client
         */ 
        public function getId_client()
        {
                return $this->id_client;
        }

        /**
         * Set the value of id_client
         *
         * @return  self
         */ 
        public function setId_client($id_client)
        {
                $this->id_client = $id_client;

                return $this;
        }

        /**
         * Get the value of id_livre
         */ 
        public function getId_livre()
        {
                return $this->id_livre;
        }

        /**
         * Set the value of id_livre
         *
         * @return  self
         */ 
        public function setId_livre($id_livre)
        {
                $this->id_livre = $id_livre;

                return $this;
        }
    }
?>