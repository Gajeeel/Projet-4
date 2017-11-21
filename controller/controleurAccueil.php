<?php

namespace Con;

require'vendor/autoload.php';
use Acme\billet;
use Vue\vue;

class ControleurAccueil {

    private $billet;

    public function __construct() {

        $this->billet = new Item();
        
    }

  // Affiche la liste de tous les billets du blog
    public function accueil() {

        $billets = $this->billet->get_articles();

        $vue = new Vue("Accueil");
        $vue->generer(array('billets' => $billets));

    }
}