<?php
class Room{
    private $rId,$rName,$area,$rPrice,$quantity,$adult,$children,$desc,$status,$removed;

    public function __construct()
    {
    }

    public function getRId(){
        return $this->rId;
    }
    public function setRId($value){
        $this->rId = $value;
    }
    public function getRName(){
        return $this->rName;
    }
    public function setRName($value){
        $this->rName = $value;
    }
    public function getArea(){
        return $this->area;
    }
    public function setArea($value){
        $this->area = $value;
    }
    public function getRPrice(){
        return $this->rPrice;
    }
    public function setRPrice($value){
        $this->rPrice = $value;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($value){
        $this->quantity = $value;
    }
    public function getAdult(){
        return $this->adult;
    }
    public function setAdult($value){
        $this->adult = $value;
    }
    public function getChildren(){
        return $this->children;
    }
    public function setChildren($value){
        $this->children = $value;
    }
    public function getDesc(){
        return $this->desc;
    }
    public function setDesc($value){
        $this->desc = $value;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($value){
        $this->status = $value;
    }
    public function getRemoved(){
        return $this->removed;
    }
    public function setRemoved($value){
        $this->removed = $value;
    }
}
?>