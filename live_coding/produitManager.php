<?php


 class produitManager {

    private $connection = NULL ;

    private function getConnection(){

        $this->connection = mysqli_connect('localhost' , 'yousra' , 'test123' , 'site-e-commerce');


        return $this->connection ;
    }


    public function afficher(){

        $selectRow = 'SELECT * FROM produit';
        $query = mysqli_query($this->getConnection() , $selectRow) ;
        $produit_data = mysqli_fetch_all($query , MYSQLI_ASSOC);
        $TableData = array();
        foreach ($produit_data as $value_data){
            $produit = new produit();
            $produit->setId($value_data['id_produit']);
            $produit->setNom($value_data['nom_produit']);
            $produit->setPrix($value_data['prix']) ;

            array_push($TableData , $produit);

        }

        return $TableData ;

    }

    public function afficherProduit($id){
        $selectRow ="SELECT * FROM produit WHERE id =$id" ;
        
    }

    

 }