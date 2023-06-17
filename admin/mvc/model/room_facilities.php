<?php
class Room_facilities{
    private $srNo,$roomId,$facilitiesId;

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
    public function getFacilitiesId(){
        return $this->facilitiesId;
    }
    public function setFacilitiesId($value){
        $this->facilitiesId = $value;
    }
}
?>