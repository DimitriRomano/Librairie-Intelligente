<?php
    require_once "Bdd.php";
    require_once "Livre.php";
/**
 * \class LivreManager LivreManager.php
 * Classe reliée à la base de donnée pour gérer les traitements lié à la table livre 
 * possède un attribut privée $livres qui est un tableau et contient la liste des livres existants dans le BDD
 */
    class LivreManager extends Bdd{
        /**
         * \param $livres tableau d'Objets Livre
         */
        private $livres;
    
        /**
         * \fn fonction pour ajouter un livre au tableau $livres
         * \param $livre 
         */
        public function ajoutLivre($livre){
            $this->livres[] = $livre;
        }
    
        /**
         * \fn fonctio nd'accès à l'attribut de classe $livres
         */
        public function getLivres(){
            return $this->livres;
        }
    
        /**
         * \fn fonction pour charger le tableau $livres à partir de la base de donnée
         * 
         */
        public function chargementLivres(){
            $req = $this->getBdd()->prepare("SELECT * FROM livre");
            $req->execute();
            $mesLivresBD = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
    
            foreach($mesLivresBD as $livre){
                $l = new Livre($livre['id_livre'],$livre['titre'],$livre['auteur'],$livre['annee_edition'],$livre['genre'],$livre['resume'],$livre['categorie']);
                $this->ajoutLivre($l);
            }
        }
    
        /**
         * \fn fonction qui à partir d'un id d'un livre retourne les informations le concernant
         * \param $id id du livre à rechercher
         * \return objet livre
         */
        public function getLivreById($id){
            for($i=0; $i < count($this->livres);$i++){
                if($this->livres[$i]->getId() === $id){
                    return $this->livres[$i];
                }
            }
        }


        /**
         * \fn fonction qui permet d'obtenir la liste des livres récents
         * \param $limite nombre de livres à retenir
         * \return $livreRecentBD liste de livres récents 
         */
        public function getRecentLivres($limite=5){
            $req = $this->getBdd()->prepare("SELECT * FROM livre ORDER BY annee_edition DESC LIMIT :limite ");
            $req->bindValue(':limite',$limite,PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $livreRecentBD=null;
            foreach($result as $livre){
                $l = new Livre($livre['id_livre'],$livre['titre'],$livre['auteur'],$livre['annee_edition'],$livre['genre'],$livre['resume'],$livre['categorie']);
                $livreRecentBD[]=$l;
            }
            return $livreRecentBD;
        }

        /**
         * \fn fonction qui retourne par ordre décroissant une arrayList du nombre de livre par genre littéraire 
         * \param $listLivres
         * \return $listGenre
         */
        public function maxByGenre($listLivres){
            $listGenre  = array('manga' => 0, 'science-fiction' => 0, 'policier'=> 0, 'historique'=> 0, 'litterature'=> 0, 'dev-personnel'=> 0 );
            foreach($listLivres as $livre){
                $listGenre[$livre->getGenre()]++;
            }
            foreach($listGenre as $key => $value){
                if($value == 0){
                    unset($listGenre[$key]); //supprime de la liste les genres non représentés
                }
            }
            arsort($listGenre,SORT_NUMERIC); // range par ordre croissant en fonction de la valeur de chaque clé
            return $listGenre;
        }

        /**
         * \fn fonction qui suggère des livres en fonction d'un genre particulier
         * \param $genre
         * \param $listeEmprunter id des livres déjà emprunter du genre à rechercher
         * \param $limite nombre à afficher
         * \return $livresBD liste d'objets Livre de même genre
         */
        public function suggestionLivreGenre($genre,$listeEmprunter,$limite){
            $req = $this->getBdd()->prepare("SELECT * FROM livre WHERE genre = :genre AND id_livre NOT IN (:listeEmprunter) LIMIT :limite");
            $req->bindValue(':genre',$genre,PDO::PARAM_STR);
            $req->bindValue(':listeEmprunter',$listeEmprunter,PDO::PARAM_STR);
            $req->bindValue(':limite',$limite,PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $livresBD=null;
            foreach($result as $livre){
                $l = new Livre($livre['id_livre'],$livre['titre'],$livre['auteur'],$livre['annee_edition'],$livre['genre'],$livre['resume'],$livre['categorie']);
                $livresBD[]=$l;
            }
            return $livresBD;
        }
    
       
    
        
    
        
    }
?>