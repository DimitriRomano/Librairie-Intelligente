<?php
    class Livre{
        private $id;
        private $titre;
        private $annee_edition;
        private $genre;
        private $resume;

        public function __construct($id,$titre,$anne_edition,$genre,$resume)
        {
            $this->setId($id);
            $this->setTitre($titre);
            $this->setAnnee_edition($anne_edition);
            $this->setGenre($genre);
            $this->setResume($resume);
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
    }
?>