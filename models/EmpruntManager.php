<?php
    require_once "Bdd.php";
    require_once "Emprunt.php";
    require_once "LivreManager.php";

    class EmpruntManager extends Bdd{
        private $emprunts;

        public function ajoutEmprunt($emprunt){
            $this->emprunts[] = $emprunt;
        }
    
        public function getEmprunts(){
            return $this->emprunts;
        }

        public function chargementEmprunts(){
            $req = $this->getBdd()->prepare("SELECT * FROM emprunter");
            $req->execute();
            $mesEmpruntBD = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
    
            foreach($mesEmpruntBD as $emprunt){
                $e = new Emprunt($emprunt['id_emprunt'],$emprunt['date_emprunt'],$emprunt['id_client'],$emprunt['id_livre']);
                $this->ajoutEmprunt($e);
            }
        }

        public function getIdLivresPopulaires($limite=5){
            $req = $this->getBdd()->prepare("SELECT id_livre, COUNT('id_livre') AS nb FROM emprunter GROUP BY id_livre ORDER BY nb DESC LIMIT :limite ");
            $req->bindValue(':limite',$limite,PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $livreManager = new LivreManager();
            $livreManager->chargementLivres();
            $livrePopulaireBD=null;
            foreach($result as $livre){
                $l = $livreManager->getLivreById($livre['id_livre']);
                $livrePopulaireBD[]=$l;
            }
            return $livrePopulaireBD;
        }


    }

?>