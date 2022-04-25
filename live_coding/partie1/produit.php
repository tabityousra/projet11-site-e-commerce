<?php

class productManager {
    private $connection = null ;

    private function getConnection(){
        $this->connction = mysqli_connect('localhost' , 'yousra', 'test' , 'live_codinng');

        return $this->connection;
    }
}