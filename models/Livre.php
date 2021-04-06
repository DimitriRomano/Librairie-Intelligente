<?php

/**
 * \class Livre Livre.php
 * \brief classe de donnée de l'objet Livre
 *  */        
    class Livre{
            /**
             * Attributs de l'objet Livre
             * \param $id
             * \param $titre
             * \param $auteur
             * \param $annee_edition
             * \param $genre
             * \param $categorie détente ou reflexion ou rien
             */
        private $id;
        private $titre;
        private $auteur;
        private $annee_edition;
        private $genre;
        private $resume; 
        private $categorie;  

        /**
         * \fn constructeur qui prend en parametre un id, un titre, un auteur, une année d'édition, un genre , un résumé, une catégorie et instancie l'objet Livre
         */
        public function __construct($id,$titre,$auteur,$annee_edition,$genre,$resume,$categorie)
        {
            $this->setId($id);
            $this->setTitre($titre);
            $this->setAnnee_edition($annee_edition);
            $this->setAuteur($auteur);
            $this->setGenre($genre);
            $this->setResume($resume);
            $this->setCategorie($categorie);
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
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of annee_edition
         */ 
        public function getAnnee_edition()
        {
                return $this->annee_edition;
        }

        /**
         * Set the value of annee_edition
         *
         * @return  self
         */ 
        public function setAnnee_edition($annee_edition)
        {
                $this->annee_edition = $annee_edition;

                return $this;
        }

        /**
         * Get the value of genre
         */ 
        public function getGenre()
        {
                return $this->genre;
        }

        /**
         * Set the value of genre
         *
         * @return  self
         */ 
        public function setGenre($genre)
        {
                $this->genre = $genre;

                return $this;
        }

        /**
         * Get the value of resume
         */ 
        public function getResume()
        {
                return $this->resume;
        }

        /**
         * Set the value of resume
         *
         * @return  self
         */ 
        public function setResume($resume)
        {
                $this->resume = $resume;

                return $this;
        }

        /**
         * Get the value of auteur
         */ 
        public function getAuteur()
        {
                return $this->auteur;
        }

        /**
         * Set the value of auteur
         *
         * @return  self
         */ 
        public function setAuteur($auteur)
        {
                $this->auteur = $auteur;

                return $this;
        }

        /**
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }
    }
?>