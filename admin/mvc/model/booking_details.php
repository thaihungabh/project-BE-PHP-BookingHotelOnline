<?php
class Booking_details{
    private $bookingDetails_id, $booking_id, $cus_name, $cus_email, $cus_phone, $num_adults, $num_children;

    public function __construct(){}
    

    public function getBookingDetails_id(){
        return $this->bookingDetails_id;
    }
    public function setBookingDetails_id($value){
        $this->bookingDetails_id = $value;
    }

    public function getBooking_id(){
        return $this->booking_id;
    }
    public function setBooking_id($value){
        $this->booking_id = $value;
    }
    
    public function getCus_name(){
        return $this->cus_name;
    }
    public function setCus_name($value){
        $this->cus_name = $value;
    }
    public function getCus_email(){
        return $this->cus_email;
    }
    public function setCus_email($value){
        $this->cus_email = $value;
    }
    public function getCus_phone(){
        return $this->cus_phone;
    }
    public function setCus_phone($value){
        $this->cus_phone = $value;
    }
    public function getNum_adults(){
        return $this->num_adults;
    }
    public function setNum_adults($value){
        $this->num_adults = $value;
    }
    public function getNum_children(){
        return $this->num_children;
    }
    public function setNum_children($value){
        $this->num_children = $value;
    }
}
?>