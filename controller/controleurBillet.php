<?php

namespace Con;

require'vendor/autoload.php';
require'model/commentaires.php';

use Acme\billet;
use Acme\commentaire;
use Vue\vue;

class ControleurBillet {

    private $billet;
    private $commentaire;

    public function __construct() {

        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        
    }

    // Affiche les détails sur un billet
    public function billet($id_news) {

        $billets = $this->billet->get_articles_by_id($id_news);
        $commentaires = $this->commentaire->get_comm($id_news);
        $vue = new Vue("Article");
        $vue->generer2(array('billets' => $billets, 'commentaires' => $commentaires));

    }

    //Signal un commentaire
    public function signaler($id_comm) {

      $this->commentaire->signal($id_comm);

    }

    // Ajoute un commentaire à un billet
    public function commenter($pseudo,$commentaires,$id_news) {

        $this->commentaire->ins_comm($pseudo,$commentaires,$id_news); 

    }

}