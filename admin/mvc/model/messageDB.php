<?php
include_once('../model/database.php');
include_once('../model/message.php');
?>
<?php
class MessageDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMessage(){
        $query = "SELECT * FROM user_message";
        $result = $this->db->select($query);
        $messages = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $pid = $row['id'];
                $pname = $row['name'];
                $pemail = $row['email'];
                $psubject = $row['subject'];
                $pmessage = $row['message'];
                $pdate = $row['date'];
                $pseen = $row['seen'];
                
                $message = new Message($pid,$pname,$pemail,$psubject,$pmessage,$pdate,$pseen);
                $messages[] = $message;
            }
            return $messages;
        }else{
            return false;
        }
    }

    public function updateMarkAsRead($id){
        $query = "UPDATE user_message SET seen = 1 WHERE id = $id";
        $update_row = $this->db->update($query);
        if($update_row != false){
            return true;
        } else{
            return false;
        }
    }

    public function upAllMarkAsRead(){
        $query = "UPDATE user_message SET seen = 1";
        $updateAll = $this->db->update($query);
        if($updateAll != false){
            return true;
        } else{
            return false;
        }
    }

    public function deleteMessage($id){
        $query = "DELETE FROM user_message WHERE id = $id";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }

    public function deleteAllMessage(){
        $query = "DELETE FROM user_message";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }
}
?>