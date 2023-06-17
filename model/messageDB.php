<?php
    include_once('../model/database.php');
?>
<?php
class MessageDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function insertMessage($name,$email,$subject,$message){
        $query = "INSERT INTO user_message (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";
        $insert_row = $this->db->insert($query);
        if($insert_row != false){
            return true;
        }else{
            return false;
        }
    }
    
}
?>