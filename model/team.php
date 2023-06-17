<?php
class Team{
    private $teamId, $name, $picture;

    public function __construct($teamId, $name, $picture){
        $this->teamId = $teamId;
        $this->name = $name;
        $this->picture = $picture; 
     }

    public function getTeamId(){
        return $this->teamId;
    }
    public function setTeamId($value){
        $this->teamId = $value;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($value){
        $this->name = $value;
    }
    public function getPicture(){
        return $this->picture;
    }
    public function setPicture($value){
        $this->picture = $value;
    }
}
?>