<?php
class Booking{
    private $booking_id,$r_id,$customer_id,$checkin,$checkout,
        $quantity,$price,$booking_code,$booking_date,$status;

    public function __construct(){}

    public function getBooking_id(){
        return $this->booking_id;
    }
    public function setBooking_id($value){
        $this->booking_id = $value;
    }
    public function getR_id(){
        return $this->r_id;
    }
    public function setR_id($value){
        $this->r_id = $value;
    }
    public function getCustomer_id(){
        return $this->customer_id;
    }
    public function setCustomer_id($value){
        $this->customer_id = $value;
    }
    public function getCheckin(){
        return $this->checkin;
    }
    public function setCheckin($value){
        $this->checkin = $value;
    }
    public function getCheckout(){
        return $this->checkout;
    }
    public function setCheckout($value){
        $this->checkout = $value;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($value){
        $this->quantity = $value;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($value){
        $this->price = $value;
    }
    public function getBooking_code(){
        return $this->booking_code;
    }
    public function setBooking_code($value){
        $this->booking_code = $value;
    }
    public function getBooking_date(){
        return $this->booking_date;
    }
    public function setBooking_date($value){
        $this->booking_date = $value;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($value){
        $this->status = $value;
    }
}
?>