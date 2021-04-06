<?php
    
    require_once "Bdd.php";
    require_once "Emprunt.php";
    require_once "LivreManager.php";
    require_once "Livre.php";

    /**
     *  @class EmpruntManager EmpruntManager.php
     * Classe reliée à la base de donnée pour gérer les traitements lié à la table emprunter 
     * possède un attribut privée $emprunts qui est un tableau et contient la liste des emprunts de tout les utilisateurs
     */
    class EmpruntManager extends Bdd{
        private $emprunts; /**< attribut emprunts[] tableau qui liste les emprunts  */

       
        public function ajoutEmprunt($emprunt){
            $this->emprunts[] = $emprunt;
        }
    
        public function getEmprunts(){
            return $this->emprunts;
        }

        /**
         * @fn fonction pour charger le tableau $emprunts à partir de la base de donnée
         * 
         */
        public function chargementEmprunts(){
            $req = $this->getBdd()->prepare("SELECT * FROM emprunter");
            $req->execute();
            $mesEmpruntBD = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            // pour chaque ligne du résultat de la requête, créé un Objet Emprunt et le stock dans $emprunts
            foreach($mesEmpruntBD as $emprunt){
                $e = new Emprunt($emprunt['id_emprunt'],$emprunt['date_emprunt'],$emprunt['id_client'],$emprunt['id_livre']);
                $this->ajoutEmprunt($e);
            }
        }

        /**
         * @fn fonction qui permet d'obtenir la liste des livres populaires
         * @param $limite nombre de livres à retenir
         * @return $livresPopulaireBD liste de livres populaires
         */
        public function getIdLivresPopulaires($limite=5){
            // requête de type select en fonction de id_livre et la fréquence d'apparition de chaque livre
            $req = $this->getBdd()->prepare("SELECT id_livre, COUNT('id_livre') AS nb FROM emprunter GROUP BY id_livre ORDER BY nb DESC LIMIT :limite ");
            $req->bindValue(':limite',$limite,PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            $livreManager = new LivreManager();
            $livreManager->chargementLivres();
            $livrePopulaireBD=null;
            //charge $livrePopulairesBD avec les ($limites)premiers livres les plus populaires en fonctio nd urésultat de la rêquete 
            foreach($result as $livre){
                $l = $livreManager->getLivreById($livre['id_livre']);
                $livrePopulaireBD[]=$l;
            }
            return $livrePopulaireBD;
        }

        /**
         * @fn fonction qui retourne la liste des emprunts d'un utilisateur en particulier
         * @param $id_user
         * @return $listeEmpruntsUser
         */
        public function getEmpruntsById($id_user){
            $listeEmpruntsUser = null;
            foreach ($this->emprunts as $indexEmprunts) {
                if($indexEmprunts->getId_client() == $id_user ){
                    $listeEmpruntsUser[]=$indexEmprunts;
                }
            }
            return $listeEmpruntsUser;
        }

        /**
         * @fn Fonction qui propose 5 livres en fonction des livres emprunter de l'utilisateur
         * @param $id_user
         * @return $listePropositions liste de livre sous forme de tableau d'objet Livre
         */
        public function PropositionsLivres($id_user){
            $lManager = new LivreManager();
            $lManager->chargementLivres();
            $listeEmpruntsUser = $this->getEmpruntsById($id_user); //liste des emprunts de l'utilisateur
            $listePropositions = null; //liste de proposition vide à la base 
            
            if(count($listeEmpruntsUser)>0){ //cas où l'utilisateur possède un historique
                $listeLivresUser = null; // on fait la liste des livres que l'utilisateur à emprunter
                foreach($listeEmpruntsUser as $emprunt){
                    $l = $lManager->getLivreById($emprunt->getId_livre());
                    $listeLivresUser[]=$l;
                }
                $listeMaxParGenre = $lManager->maxByGenre($listeLivresUser); // nombre de livre par genre
                //$numb = count($listeMaxParGenre);
                $nbrPropostion = 0;
                while(current($listeMaxParGenre) && $nbrPropostion<5){ // on parcours la boucle tant qu'on a pas obtenu 5 propositions
                    $genre =  key($listeMaxParGenre);
                    $array = NULL; //list des id de livre que l'utilisateur possède déjà de la forme "id_livre, id_livre .."
                    foreach($listeLivresUser as $livre){
                        if($livre->getGenre() == $genre){
                            $array .= $livre->getId().', ';
                        }
                    }
                    $array = substr($array, 0, -2); //on enlève la dernière virgule du String
                    $result = $lManager->suggestionLivreGenre($genre,$array,5-$nbrPropostion); /*appel de la méthode de LivreManager
                    qui prend en para le genre, la liste de livres de ce genre déjà emprunter et la limite */
                    foreach($result as $livre){
                        $listePropositions[]=$livre;
                    }
                    $nbrPropostion = $nbrPropostion + count($result);

                    next($listeMaxParGenre);
                }
            }
            return $listePropositions;
        }


    }

?>