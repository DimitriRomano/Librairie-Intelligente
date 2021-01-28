<?php
    class User{
        private $id;
        private $login;
        private $prenom;
        private $age;
        private $region;
        private $type_lecture;
        

        public function __construct($id,$login,$prenom,$age,$region,$type_lecture)
        {
            $this->setId($id);
            $this->setLogin($login);
            $this->setPrenom($prenom);
            $this->setAge($age);
            $this->setRegion($region);
            $this->setType_lecture($type_lecture);
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
    }

    
?>