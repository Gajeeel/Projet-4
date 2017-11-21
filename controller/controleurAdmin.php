<?php

namespace Con;

require'vendor/autoload.php';

use Acme\billet;
use Acme\commentaire;
use Vue\vue;

class ControleurAdmin {

  	private $billet;
  	private $commentaire;

  	public function __construct() {

      	$this->billet = new Billet();
      	$this->commentaire = new Commentaire();

    }

    //Supprimer un article et ses commentaires
  	public function supprimer($id_news) {

        $this->billet->supp_article($id_news);
        $this->commentaire->supp_comm_article($id_news);

    }

    //Supprimer un commentaire
    public function supprimerComm($id_comm) {

        $this->commentaire->supp_comm($id_comm);

    }

    //Modifier un article avec son image
    public function modifier($contenu,$titre,$image,$id_news) {

    	$this->billet->update_article($contenu,$titre,$image,$id_news);

    }

    //Modifier un article sans son image
    public function modifier2($contenu,$titre,$id_news) {

        $this->billet->update_article2($contenu,$titre,$id_news);
        

    }

    //Affiche la page de modification d'un article
    public function update($id_news){

    	$billets = $this->billet->get_articles_by_id($id_news);
        $vue = new Vue("Update");
        $vue->generer2(array('billets' => $billets));

    }

    //Ajoute un article
    public function ajouter($titre,$contenu,$image) {
    
        $this->billet->ins_article($titre,$contenu,$image); 

    }

    //Affiche la page pour ajouter un article
    public function insert(){

        $vue = new Vue("Insert");
        $vue->generer2(array(null));

    }

    //Affiche la page d'admin
    public function admin() {

        $billets = $this->billet->get_articles();
        $commentaires = $this->commentaire->get_comm_by_sign();
        $vue = new Vue("Admin");
        $vue->generer3(array('billets' => $billets, 'commentaires' => $commentaires));

    }
}