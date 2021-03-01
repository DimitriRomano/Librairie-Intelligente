<?php
    class User{
        private $id;
        private $prenom;
        private $nom;
        private $age;
        private $region;
        private $type_lecture;
        private $adresse_mail;
        

        public function __construct($id,$login,$prenom,$nom,$age,$region,$type_lecture,$adresse_mail)
        {
            $this->setId($id);
            $this->setPrenom($prenom);
            $this->setNom($nom);
            $this->setAge($age);
            $this->setRegion($region);
            $this->setType_lecture($type_lecture);
            $this->setAdresse_mail($adresse_mail);
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
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom($prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

       
        /**
         * Get the value of age
         */ 
        public function getAge()
        {
                return $this->age;
        }

        /**
         * Set the value of age
         *
         * @return  self
         */ 
        public function setAge($age)
        {
                $this->age = $age;

                return $this;
        }

        /**
         * Get the value of region
         */ 
        public function getRegion()
        {
                return $this->region;
        }

        /**
         * Set the value of region
         *
         * @return  self
         */ 
        public function setRegion($region)
        {
                $this->region = $region;

                return $this;
        }

        /**
         * Get the value of type_lecture
         */ 
        public function getType_lecture()
        {
                return $this->type_lecture;
        }

        /**
         * Set the value of type_lecture
         *
         * @return  self
         */ 
        public function setType_lecture($type_lecture)
        {
                $this->type_lecture = $type_lecture;

                return $this;
        }

        /**
         * Get the value of login
         */ 
        public function getLogin()
        {
                return $this->login;
        }

        /**
         * Set the value of login
         *
         * @return  self
         */ 
        public function setLogin($login)
        {
                $this->login = $login;

                return $this;
        }

        /**
         * Get the value of adresse_mail
         */ 
        public function getAdresse_mail()
        {
                return $this->adresse_mail;
        }

        /**
         * Set the value of adresse_mail
         *
         * @return  self
         */ 
        public function setAdresse_mail($adresse_mail)
        {
                $this->adresse_mail = $adresse_mail;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }
    }

    
?>