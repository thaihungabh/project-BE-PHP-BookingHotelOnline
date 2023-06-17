<?php
class Message{
    private $id,$name,$email,$subject,$message,$date,$seen;

    public function __construct($id,$name,$email,$subject,$message,$date,$seen){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->date = $date;
        $this->seen = $seen;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
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
    public function getSubject(){
        return $this->subject;
    }
    public function setSubject($value){
        $this->subject = $value;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setMessage($value){
        $this->message = $value;
    }
    public function getDate(){
        return $this->date;
    }
    public function getSeen(){
        return $this->seen;
    }    
}
?>
