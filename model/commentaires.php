<?php

namespace Acme;

require'vendor/autoload.php';
require'Entities/commentaires.php';

use Acme\billet;
use Acme\modele;

require_once 'modele.php';

class Commentaire extends Modele {

  // Renvoie la liste des commentaires associés à un billet
  	public function get_comm($id_news){
        
        $sql = 'SELECT * , DATE_FORMAT(date_time_post, " %e %M %Y, %k:%i") AS dateformatee FROM commentaires WHERE id_article = ? ORDER BY dateformatee DESC ';
    	  $data = $this->executerRequete($sql, array($id_news));
          $commentaires = array();
            foreach ($data as $element){
            $commentaire = new \Entities\Commentaire($element);

            array_push($commentaires,$commentaire);

        }
          return $commentaires;

  	}	

    //inserer un commentaire
  	public function ins_comm($pseudo,$commentaires,$id_news){
        
        $sql = 'INSERT INTO commentaires (pseudo, commentaire, id_article, date_time_post, signalement) VALUES (?,?,?, NOW(),0)';
        $commentaire = $this->executerRequete($sql, array($pseudo,$commentaires,$id_news));

    }

    //afficher les commentaires par signalement
    public function get_comm_by_sign(){
        
        $sql = 'SELECT * , DATE_FORMAT(date_time_post, " %e %M %Y, %k:%i") AS dateformatee FROM commentaires ORDER BY signalement DESC ';
    	  $data = $this->executerRequete($sql);
    	  $commentaires = array();
            foreach ($data as $element){
            $commentaire = new \Entities\Commentaire($element);

            array_push($commentaires,$commentaire);

        }
          return $commentaires;

  	}

    //Supprimer les commentaires d'un article
  	public function supp_comm_article($id_news){
        
        $sql = 'DELETE FROM commentaires WHERE id_article = ? ';
        $supp = $this->executerRequete($sql, array($id_news));

    }

    //Supprimer un commentaire précis
    public function supp_comm($id_comm){
        
        $sql = 'DELETE FROM commentaires WHERE id = ? ';
        $supp = $this->executerRequete($sql, array($id_comm));

    }

    //Signaler un commentaire
    public function signal($id_comm){
        
        $sql = 'UPDATE commentaires SET signalement = 1 WHERE id = ? ';
        $signalement = $this->executerRequete($sql, array($id_comm));
  
    }

}