<?php

namespace Entities;

class Commentaire {

    private $id;
    private $pseudo;
    private $commentaire;
    private $id_article;
    private $dateformate;
    private $signalement;

    /**
     * Billet constructor.
     */
    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $id
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * @param mixed $contenu
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @return mixed
     */
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id
     */
    public function setId_article($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getDateformatee()
    {
        return $this->dateformatee;
    }

    /**
     * @param mixed $datetime_post
     */
    public function setDateformatee($dateformatee)
    {
        $this->dateformatee = $dateformatee;
    }

    /**
     * @return mixed
     */
    public function getSignalement()
    {
        return $this->signalement;
    }

    /**
     * @param mixed $id
     */
    public function setSignalement($signalement)
    {
        $this->signalement = $signalement;
    }

    public function hydrate($data){
        foreach ($data as $key => $value){
            $method = "set".ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

}