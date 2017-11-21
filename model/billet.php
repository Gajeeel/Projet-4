<?php

namespace Acme;


require_once 'modele.php';


class Billet extends Modele {

    // Renvoie la liste des billets du blog
    public function get_articles(){
          
        $sql = 'SELECT *, DATE_FORMAT(datetime_post, " %e %M %Y, %k:%i") dateformate FROM articles ORDER BY articles.datetime_post DESC ';
        $data = $this->executerRequete($sql);
        $billets = array();
        foreach ($data as $element){
            $billet = new \Entities\Billet($element);

            array_push($billets,$billet);

        }

        return $billets;
        
    }
      
    // Renvoie les informations sur un billet
    public function get_articles_by_id($id_news){
          
        $sql = 'SELECT *, DATE_FORMAT(datetime_post, " %e %M %Y, %k:%i") dateformate FROM articles WHERE id = ? ';
        $data = $this->executerRequete($sql, array($id_news));
        $billets = array();
        foreach ($data as $element){
            $billet = new \Entities\Billet($element);

            array_push($billets,$billet);

        }

        return $billets;
        
    
    }

    //Supprime un billet
    public function supp_article($id_news){
          
        $sql = 'DELETE FROM articles WHERE id = ? ';
        $suppr = $this->executerRequete($sql, array($id_news));

    }

    // Insert un billet
    public function ins_article($titre,$contenu,$image){
          
        $sql = "INSERT INTO articles (titre, contenu, image, datetime_post) VALUES ( ? , ? , ? , NOW())";
        $article = $this->executerRequete($sql, array($titre,$contenu,$image));   
          
    }

    // modifie un billet
    public function update_article($contenu,$titre,$image,$id_news){
          
        $sql = 'UPDATE articles SET contenu = ? , titre = ? , image = ?, datetime_post = NOW() WHERE id = ? ';
        $update = $this->executerRequete($sql, array($contenu,$titre,$image,$id_news));
          
    }

    //modifier un billet sans l'image
    public function update_article2($contenu,$titre,$id_news){
          
        $sql = 'UPDATE articles SET contenu = ? , titre = ? , datetime_post = NOW() WHERE id = ? ';
        $update = $this->executerRequete($sql, array($contenu,$titre,$id_news));
          
    }

}