<?php
class Room_images{
    private $srNo,$roomId,$image,$status;

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
    public function getImage(){
        return $this->image;
    }
    public function setImage($value){
        $this->image = $value;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($value){
        $this->status = $value;
    }
}
?>