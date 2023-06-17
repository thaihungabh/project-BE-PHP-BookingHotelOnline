<?php
class Facilities{
    private $id,$icon,$name,$description;

    public function __construct($id, $icon,$name,$description){
        $this->id = $id;
        $this->icon = $icon;
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
    }
    public function getIcon(){
        return $this->icon;
    }
    public function setIcon($value){
        $this->icon = $value;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($value){
        $this->name = $value;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($value){
        $this->description = $value;
    }
}
?>