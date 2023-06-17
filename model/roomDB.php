<?php
require_once('../model/database.php');
require_once('../model/room.php');
// require_once('../model/room_features.php');
// require_once('../model/room_facilities.php');
require_once('../model/room_images.php');
?>
<?php
class RoomDB
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllRoom()
    {
        $query = "SELECT * FROM rooms WHERE  removed = 0";
        $result = $this->db->select($query);
        $rooms = array();
        if ($result !=  false) {
            while ($row = $result->fetch_assoc()) {
                $room = new Room();
                $room->setRId($row['roomId']);
                $room->setRName($row['name']);
                $room->setArea($row['area']);
                $room->setRPrice($row['price']);
                $room->setQuantity($row['quantity']);
                $room->setAdult($row['adult']);
                $room->setChildren($row['children']);
                $room->setDesc($row['description']);
                $room->setStatus($row['status']);
                $rooms[] = $room;
            }
            return $rooms;
        } else {
            return false;
        }
    }

    public function getLimit_Room()
    {
        $query = "SELECT * FROM rooms WHERE removed = 0 ORDER BY roomId DESC LIMIT 3";
        $result = $this->db->select($query);
        $rooms = array();
        if ($result !=  false) {
            while ($row = $result->fetch_assoc()) {
                $room = new Room();
                $room->setRId($row['roomId']);
                $room->setRName($row['name']);
                $room->setArea($row['area']);
                $room->setRPrice($row['price']);
                $room->setQuantity($row['quantity']);
                $room->setAdult($row['adult']);
                $room->setChildren($row['children']);
                $room->setDesc($row['description']);
                $room->setStatus($row['status']);
                $rooms[] = $room;
            }
            return $rooms;
        } else {
            return false;
        }
    }

    public function getRoomById($roomId)
    {
        $query = "SELECT * FROM rooms WHERE roomId = $roomId LIMIT 1";
        $result = $this->db->select($query);
        if ($result !=  false) {
            $row = $result->fetch_assoc();
            $room = new Room();
            $room->setRId($row['roomId']);
            $room->setRName($row['name']);
            $room->setArea($row['area']);
            $room->setRPrice($row['price']);
            $room->setQuantity($row['quantity']);
            $room->setAdult($row['adult']);
            $room->setChildren($row['children']);
            $room->setDesc($row['description']);
            $room->setStatus($row['status']);
            return $room;
        } else {
            return false;
        }
    }

    // public function checkAvailableQty($roomId,){

    // }

    public function updateQtyRoom($roomId,$qty){
        $query = "UPDATE rooms SET quantity = $qty WHERE roomId = $roomId";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function getName_Fea_roomById_room($roomId)
    {
        $query = "SELECT f.featureName FROM features f INNER JOIN room_features rfea On f.featureId = rfea.featuresId WHERE rfea.roomId = $roomId";
        $result = $this->db->select($query);
        $features_name = array();
        if ($result != false) {
            while ($row = $result->fetch_assoc()) {
                $fea_name = $row['featureName'];
                $features_name[] = $fea_name;
            }
            return $features_name;
        } else {
            return false;
        }
    }

    public function getName_Faci_roomById_room($roomId)
    {
        $query = "SELECT fa.name FROM facilities fa INNER JOIN room_facilities rfaci On fa.id = rfaci.facilitiesId WHERE rfaci.roomId = $roomId";
        $result = $this->db->select($query);
        $facilities_name = array();
        if ($result != false) {
            while ($row = $result->fetch_assoc()) {
                $faci_name = $row['name'];
                $facilities_name[] = $faci_name;
            }
            return $facilities_name;
        } else {
            return false;
        }
    }

    public function getFacilities_roomById_room($roomId)
    {
        $query = "SELECT * FROM room_facilities WHERE roomId = $roomId";
        $result = $this->db->select($query);
        $r_facilities = array();
        if ($result != false) {
            while ($row = $result->fetch_assoc()) {
                $room_facilities = new Room_facilities();
                $room_facilities->setSrNo($row['srNo']);
                $room_facilities->setRoomId($row['roomId']);
                $room_facilities->setFacilitiesId($row['facilitiesId']);
                $r_facilities[] = $room_facilities;
            }

            return $r_facilities;
        } else {
            return false;
        }
    }

    // Get imgRoom by roomID && status = true
    public function getRoom_imageByRoomId($roomId)
    {
        $query = "SELECT * FROM room_images WHERE roomId =$roomId And status = 1";
        $result = $this->db->select($query);
        $rooms_img = array();
        if ($result !=  false) {
            while ($row = $result->fetch_assoc()) {
                $r_img = new Room_images();
                $r_img->setSrNo($row['srNo']);
                $r_img->setRoomId($row['roomId']);
                $r_img->setImage($row['image']);
                $r_img->setStatus($row['status']);

                $rooms_img[] = $r_img;
            }
            return $rooms_img;
        } else {
            return false;
        }
    }
    // Get Img For Room Details
    public function getR_imgByRoomId($roomId)
    {
        $query = "SELECT * FROM room_images WHERE roomId = $roomId";
        $result = $this->db->select($query);
        $rooms_img = array();
        if ($result !=  false) {
            while ($row = $result->fetch_assoc()) {
                $r_img = new Room_images();
                $r_img->setSrNo($row['srNo']);
                $r_img->setRoomId($row['roomId']);
                $r_img->setImage($row['image']);
                $r_img->setStatus($row['status']);

                $rooms_img[] = $r_img;
            }
            return $rooms_img;
        } else {
            return false;
        }
    }
}
?>