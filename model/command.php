<?php
class command{
    private $id=NULL;
    private $user_id=NULL;
    private $date=NULL;
    private $prix_total=NULL;
    private $etat=NULL;

    function __construct($id,$user_id,$date,$prix_total,$etat)
    {
       $this->id = $id;
       $this->user_id = $user_id;
       $this->date = $date;
       $this->prix_total = $prix_total;
       $this->etat = $etat;
    }
    function getId(){
        return $this->id;
    }
    function setId(int $t){
        $this->id = $t;
    }
    function getUserId(){
        return $this->user_id;
    }
    function setUserId(int $t){
        $this->user_id = $t;
    }
    function getprix_total(){
        return $this->prix_total;
    }
    function setprix_total(float $prix_total){
        $this->prix_total = $prix_total;
    }
    function getEtat(){
        return $this->etat;
    }
    function setEtat(string $t){
        $this->etat = $t;
    }
    function getDate(){
        return $this->date;
    }
    function setDate(date $t){
        $this->date = $t;
    }
 
}
?>