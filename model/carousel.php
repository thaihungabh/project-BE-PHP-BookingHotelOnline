<?php
class Carousel{
    private $carousel_id,$picture;

    public function __construct($carousel_id, $picture){
        $this->carousel_id = $carousel_id;
        $this->picture = $picture;
     }

    public function getCarousel_id(){
        return $this->carousel_id;
    }
    public function setCarousel_id($value){
        $this->carousel_id = $value;
    }
    public function getPicture(){
        return $this->picture;
    }
    public function setPicture($value){
        $this->picture = $value;
    }
}
?>