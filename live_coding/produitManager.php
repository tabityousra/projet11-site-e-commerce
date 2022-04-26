<?php


 class produitManager {

    private $connection = NULL ;

    private function getConnection(){

        $this->connection = mysqli_connect('localhost' , 'yousra' , 'test123' , 'site-e-commerce');


        return $this->connection ;
    }



    

 }