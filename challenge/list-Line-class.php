<?php
    class listeLine{
        private $idCartLine;
        private $idProduct;
        private $idCart;
        private $product ;

        function setIdCartLine($idCartLine){

            $this->idCartLine = $idCartLine;
        }

        function getIdCartLine(){
            return $this->idCartLine;
        }

        function setIdProduct($idProduct){

            $this->idProduct = $idProduct;
        }

        function getIdProduct(){
            return $this->idProduct;
        }

        function setIdCart($idCart){

            $this->idCart = $idCart;
        }

        function getIdCart(){
            return $this->idCart;
        }


        function setProduct($product){
            $this->product= $product;
        }

        function getProduct(){
           return $this->product;
        }
    }
?> 