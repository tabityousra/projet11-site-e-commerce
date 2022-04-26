<?php
 class produit {
    private $id ;
    private $nom ;
    private $detail ;
    private $prix ;

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($Nom) {
        $this->Nom = $Nom;
    }

    public function getId(){
        return $this->id ;
    }

    public function setId($nom){
        $this->id = $nom ;
    }

    public function getDetail(){
        return $this->detail ;
    }

    public function setDetail($detail){
        $this->detail = $detail ;
    }

    public function getPrix(){
        return $this->prix ;
    }

    public function setPrix(){
        $this->prix = $prix ;
    }

 }