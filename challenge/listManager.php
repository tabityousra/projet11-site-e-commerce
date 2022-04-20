<?php
include "video-class.php";
include "liste-class.php";
include "list-Line-class.php";


class listeManager {

    public $name ;

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'yousra', 'test123', 'e-commerce');
           
         
       
        
        return $this->Connection;
    }


  public function initCode() {
    if(!isset($_COOKIE['cartCookie']))
    {
        $expire=time() + (86400 * 30);//however long you want
        $cookieId = uniqid();
        setcookie('cartCookie', $cookieId, $expire);
        $_SESSION["product"] = array();
        $_SESSION["product"] = array();
        $this->addCartCookie($cookieId);
    }

 }
    
    // Add product to cart
    public function addProduct($cart, $product, $quantity){
        $cartId = $cart->getId();
        $productId = $product->getId();
        $sql = "INSERT INTO cart_line(idProduct,idCart) VALUES('$productId', '$cartId')";
        $result = mysqli_query($this->getConnection(), $sql);
        if($result){
            $this->getConnection()->close();
        }

    }

    public function getCartLine($id){
        $sql = "SELECT * FROM cart_line INNER JOIN produit on produit.id_produit=cart_line.idProduct WHERE idCart='$id'";
        $query = mysqli_query($this->getConnection(), $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
       
        $cartLineList = array();
        foreach($result as $value){
            $product = new Video();
            $cartLine = new listeLine();
            $cartLine->setIdCartLine($value['idCartLine']);
            $cartLine->setIdCart($value['idCart']);
            $cartLine->setIdProduct($value['idProduct']);
            $product->setId($value['id_produit']);
            $product->setName($value['nom_produit']);
            $cartLine->setProduct($product);
            array_push($cartLineList, $cartLine);
        }
        return $cartLineList;
    }
    
    // pour ajouter session
    public function set($cart, $product, $quantity){
        session_start();
        $_SESSION["cart"] = $cart;
        array_push($_SESSION["product"], $product);
        if(!isset($_SESSION["quantity"])){
            $_SESSION["quantity"] = 0;
        }
        $_SESSION["quantity"] += $quantity; 

    }

      // afficher session

      public function getCartProducts($cartId){

        $sql = "SELECT * FROM cart_line INNER JOIN produit on cart_line.idCartLine = produit.id_produit WHERE idCart = $cartId";
        $query = mysqli_query($this->getConnection(), $sql);
        $result =  mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $result;
        $product = new Video();
        $productsList = array();
        foreach ($result as $value_Data) {
            $product->setId($value_Data['id_produit']);
            $product->setName($value_Data['nom_produit']);
            array_push($productsList, $product);
        }
          return $productsList;
        // if(isset($_SESSION["product"])){
        //     return $_SESSION["product"];
        // }

      }

      public function getCartQuantity(){
          if(isset($_SESSION["quantity"])){
              return $_SESSION["quantity"];
          }
      }

          //supprimer session
    public function delete($id){
        if(isset($_SESSION["paniers"]["products"][$id])){
            unset($_SESSION["paniers"]["products"][$id]);
        }
    }

    
    // pour afficher  session 
    public function getProductCart($idCartLine){
        $sql = "SELECT * FROM cart_line INNER JOIN produit on cart_line.idProduct = produit.id_produit WHERE idCartLine = $idCartLine";
        $query = mysqli_query($this->getConnection(),$sql);
        $result = mysqli_fetch_assoc($query);

        $cartLine = new listeLine();
        $cartLine->setIdCartLine($result['idCartLine']);
        $cartLine->setIdCart($result['idCart']);
        $cartLine->setIdProduct($result['idProduct']);
        
        $product = new Video();
        $product->setId($result['id_produit']);
        $product->setName($result['nom_produit']);
        $cartLine->setProduct($product);

        return $cartLine;
    }

    // Edit  cart line
    public function editCartLine($idCartLine, $quantity){
        $sql = "UPDATE cart_line SET productCartQuantity = '$quantity' WHERE idCartLine=$idCartLine";
        mysqli_query($this->getConnection(), $sql);
        
    }

  

// afficher  les produits : page index
    public function afficher(){
        $SelctRow = 'SELECT *  FROM produit';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ($produits_data as $value_Data) {
            $product = new Video();
            $product->setId($value_Data['id_produit']);
            $product->setName($value_Data['nom_produit']);
            array_push($TableData, $product);
        }
          return $TableData;
 
        }
  
 
        
// afficher  les produits : page panier

        public function afficherProduit($id){
            $SelctRow = "SELECT * FROM produit WHERE id_produit =$id";
            $query = mysqli_query($this->getConnection() ,$SelctRow);
            $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
            $product = new Video();

            
            foreach ($produits_data as $value) {
            $product->setId($value['id_produit']);
            $product->setName($value['nom_produit']);
               
            }
              return $product;
        }
      
 

        function compteur(){ 
        if(isset($_SESSION["paniers"]) != null){
                $compteur = count($_SESSION["paniers"]["products"]) ;
            
            }else {
                $compteur = 0;
            
            }
            return $compteur;
        }

        function addCartCookie($cookie){
            $sql = "INSERT INTO carts(userReference) VALUES('$cookie')";
            mysqli_query($this->getConnection(), $sql);
        }

        function getCart($userRefe){
            $sql = "SELECT * from carts WHERE userReference = '$userRefe'";
            $query = mysqli_query($this->getConnection(), $sql);
            $result = mysqli_fetch_assoc($query);

            
            $cart = new Liste();
            $cart->setId($result["id"]);
            $cart->setUserReference($result["userReference"]);

            $cartLine = $this->getCartLine($cart->getId());
            $cart->setCartLineList($cartLine);
            return $cart;
        }
    }
