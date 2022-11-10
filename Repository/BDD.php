<?php

class BDD {
    private $host 	= 'localhost';
    private $bdd 	= 'boutique';
    private $user 	= 'root';
    private $pwd 	= '';

    protected $co 	= false;

    public function __construct(){
        // Si on n'est pas connecté
        if(!$this->co){
            try{
                $this->co = new PDO('mysql:host='.$this->host.';dbname='.$this->bdd, $this->user, $this->pwd);
                $this->co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e){
                echo($e->getMessage());
            }
        }
    }
}
