<?php
include 'listManager.php';
session_start();

$cartManager = new listeManager();

$cartManager->initCode();
$cart = $cartManager->getCart($_COOKIE['cartCookie']);

?>
<!-- CSS only -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>challenge</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
           <h1>Play_liste</h1>
        </nav>

<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    
            
            
            <?php 

            
              $cartLineList = $cart->getCartLineList()[0];
             
              foreach($cartLineList as $value){
                ?>
             <div class="row border-top border-bottom">
            
                <div class="row main align-items-center">

              
                <iframe width="560" height="315" src="https://www.youtube.com/embed/GiYI7BjO1E0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>                            <!-- Product details-->
                    <div class="col">
                        <div class="row text-muted"><?= $value->getProduct()->getName() ?></div>
                        
                        <div class="row"><?= $value->getProduct()->getDescription()?></div>
                    </div>
                    <div class="col"><?= $value->getProduct()->getPrice() ?>   <a class="close" href="supprimer.php?id=<?= $value->getIdCartLine()  ?>"> &#10005;</a></div>
                    <!-- <div class="col"><?= $value->getProduct()->getPrice() ?>   <a class="close" href="supprimer.php?id=<?= $value->getIdCartLine()  ?>"> &#10005;</a></div> -->

                </div>
                  
            </div>
            
            <?php } ?>
                
        </div>
        
     </div>
     
</div>
<div class="back-to-shop"><a href="index.php">&leftarrow;</a><span class="text-muted">Retourner</span></div>
       
 