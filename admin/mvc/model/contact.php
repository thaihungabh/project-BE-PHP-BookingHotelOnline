<?php
class Contact{
    private $contact_id,$address, $gmap, $phoneNumber1, $phoneNumber2,$email,$facebook,$instagram,$tiktok,$iframe;

    public function __construct($contact_id,$address, $gmap, $phoneNumber1, $phoneNumber2,$email,
                                                    $facebook,$instagram,$tiktok,$iframe)
    {
        $this->contact_id = $contact_id;
        $this->address = $address;
        $this->gmap = $gmap;
        $this->phoneNumber1 = $phoneNumber1;
        $this->phoneNumber2 = $phoneNumber2;
        $this->email = $email;
        $this->facebook = $facebook;
        $this->instagram = $instagram;
        $this->tiktok = $tiktok;
        $this->iframe = $iframe;
    }  

    public function getContact_id(){
        return $this->contact_id;
    }
    public function setContact_id($value){
        $this->contact_id = $value;
    }
    public function getAddress(){
        return $this->address;
    }
    public function setAddress($value){
        $this->address = $value;
    }
    public function getGmap(){
        return $this->gmap;
    }
    public function setGmap($value){
        $this->gmap = $value;
    }
    public function getPhoneNumber1(){
        return $this->phoneNumber1;
    }
    public function setPhoneNumber1($value){
        $this->phoneNumber1 = $value;
    }
    public function getPhoneNumber2(){
        return $this->phoneNumber2;
    }
    public function setPhoneNumber2($value){
        $this->phoneNumber2 = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getFacebook(){
        return $this->facebook;
    }
    public function setFacebook($value){
        $this->facebook = $value;
    }
    public function getInstagram(){
        return $this->instagram;
    }
    public function setInstagram($value){
        $this->instagram = $value;
    }
    public function getTiktok(){
        return $this->tiktok;
    }
    public function setTiktok($value){
        $this->tiktok = $value;
    }
    public function getIframe(){
        return $this->iframe;
    }
    public function setIframe($value){
        $this->iframe = $value;
    }
}
?>