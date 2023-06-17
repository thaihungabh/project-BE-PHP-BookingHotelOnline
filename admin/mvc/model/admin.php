<?php
class Admin{
    private $adId, $adName, $adPass;

    public function __construct($adId, $adName, $adPass){
       $this->adId = $adId;
       $this->adName = $adName;
       $this->adPass = $adPass; 
    }

    public function getAdId(){
        return $this->adId;
    }
    public function setAdId($value){
        $this->adId = $value;
    }
    public function getAdName(){
        return $this->adName;
    }
    public function setAdName($value){
        $this->adName = $value;
    }
    public function getAdPass(){
        return $this->adPass;
    }
    public function setAdPass($value){
        $this->adPass = $value;
    }
}



?>