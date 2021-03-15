<?php
    require_once "Bdd.php";
    require_once "Livre.php";

    class LivreManager extends Bdd{
        private $livres;//tableau de Livre
    
        public function ajoutLivre($livre){
            $this->livres[] = $livre;
        }
    
        public function getLivres(){
            return $this->livres;
        }
    
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
    
        public function getLivreById($id){
            for($i=0; $i < count($this->livres);$i++){
                if($this->livres[$i]->getId() === $id){
                    return $this->livres[$i];
                }
            }
        }

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
    
       
    
        
    
        
    }
?>