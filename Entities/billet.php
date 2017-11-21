<?php

namespace Entities;

class Billet {

    private $id;
    private $titre;
    private $contenu;
    private $dateformate;
    private $image;

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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getDateformate()
    {
        return $this->dateformate;
    }

    /**
     * @param mixed $datetime_post
     */
    public function setDateformate($dateformate)
    {
        $this->dateformate = $dateformate;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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