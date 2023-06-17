<?php
class Customer{
    private $customer_id,$name,$email,$p_number,$image,$address,
        $postCode,$birthDay,$pass,$is_verify,$status,$date_created;

    public function __construct(){}

    public function getCustomer_id(){
        return $this->customer_id;
    }
    public function setCustomer_id($value){
        $this->customer_id = $value;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($value){
        $this->name = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getP_number(){
        return $this->p_number;
    }
    public function setP_number($value){
        $this->p_number = $value;
    }
    public function getImage(){
        return $this->image;
    }
    public function setImage($value){
        $this->image = $value;
    }
    public function getAddress(){
        return $this->address;
    }
    public function setAddress($value){
        $this->address = $value;
    }
    public function getPostCode(){
        return $this->postCode;
    }
    public function setPostCode($value){
        $this->postCode = $value;
    }
    public function getBirthDay(){
        return $this->birthDay;
    }
    public function setBirthDay($value){
        $this->birthDay = $value;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setPass($value){
        $this->pass = $value;
    }
    public function getIs_verify(){
        return $this->is_verify;
    }
    public function setIs_verify($value){
        $this->is_verify = $value;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($value){
        $this->status = $value;
    }
    public function getDate_created(){
        return $this->date_created;
    }
    public function setDate_created($value){
        $this->date_created = $value;
    }
}
?>