<?php
class produit{
    private $nom;
    private $description ;
    private $prix;
    private $photo;

 public function getNom(){
     return $this->nom;
 }

 public function setNom($nom){
     $this->nom = $nom ;
 }
public function getPrix(){
    return $this->prix ;

}
public function setPrix($prix){
    $this->prix= $prix ;
}

}