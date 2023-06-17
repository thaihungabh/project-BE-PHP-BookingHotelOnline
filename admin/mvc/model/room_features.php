<?php
class Room_features{
    private $srNo,$roomId,$featuresId;

    public function __construct(){}

    public function getSrNo(){
        return $this->srNo;
    }
    public function setSrNo($value){
        $this->srNo = $value;
    }
    public function getRoomId(){
        return $this->roomId;
    }
    public function setRoomId($value){
        $this->roomId = $value;
    }
    public function getFeaturesId(){
        return $this->featuresId;
    }
    public function setFeaturesId($value){
        $this->featuresId = $value;
    }
}
?>