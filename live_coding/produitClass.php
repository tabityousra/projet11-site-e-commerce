<?php
class produit {

    private $nom ;
    private $prix;
    private $id ;


    public function getNom(){
        return $this->nom ;
    }
    public function setNom($nom){
        $this->nom = $nom ;
    }

    public function getPrix(){
        return $this->prix ;
    }


}