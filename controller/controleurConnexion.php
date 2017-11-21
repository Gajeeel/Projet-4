<?php

namespace Con;

use Vue\vue;

class ControleurConnexion {

	//Affiche la page de connexion
    public function connexion(){

        $vue = new Vue("Connexion");
        $vue->generer2(array(null));

    }

    public function deconnexion(){

    	session_start();
    	session_destroy();
    	header('Location: index.php');

    }
}