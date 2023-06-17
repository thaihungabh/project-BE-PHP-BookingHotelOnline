<?php
    require_once('../model/database.php');
    require_once('../model/room.php');
    require_once('../model/room_features.php');
    require_once('../model/room_facilities.php');
    require_once('../model/room_images.php');
?>
<?php
class RoomDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllRoomSetting(){
        $query = "SELECT * FROM rooms WHERE removed = 0";
        $result = $this->db->select($query);
        $rooms = array();
        if($result !=  false){
            while($row = $result->fetch_assoc()){
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
        }else{
            return false;
        }
    }

    public function getRoomById($roomId){
        $query = "SELECT * FROM rooms WHERE roomId = $roomId LIMIT 1";
        $result = $this->db->select($query);
        if($result !=  false){
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
        }else{
            return false;
        }
    }

    public function getFeature_roomById_room($roomId){
        $query = "SELECT * FROM room_features WHERE roomId = $roomId";
        $result = $this->db->select($query);
        $r_features = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $roomFeatures = new Room_features();
                $roomFeatures->setSrNo($row['srNo']);
                $roomFeatures->setRoomId($row['roomId']);
                $roomFeatures->setFeaturesId($row['featuresId']);
                $r_features[] = $roomFeatures;
            }
            return $r_features;
        } else{
            return false;
        }
    }

    public function getFacilities_roomById_room($roomId){
        $query = "SELECT * FROM room_facilities WHERE roomId = $roomId";
        $result = $this->db->select($query);
        $r_facilities = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $room_facilities = new Room_facilities();
                $room_facilities->setSrNo($row['srNo']);
                $room_facilities->setRoomId($row['roomId']);
                $room_facilities->setFacilitiesId($row['facilitiesId']);
                $r_facilities[] = $room_facilities;
            }

            return $r_facilities;
        } else{
            return false;
        }
    }

    public function updateRoom(Room $room){
        $room_id = $room->getRId();
        $name = $room->getRName();
        $area = $room->getArea();
        $price = $room->getRPrice();
        $quantity = $room->getQuantity();
        $adult = $room->getAdult();
        $children = $room->getChildren();
        $desc = $room->getDesc();
        $query = "UPDATE rooms SET name = '$name', area = $area, price = $price, 
                    quantity = $quantity, adult = $adult, children = $children
                        ,description = '$desc' WHERE roomId = $room_id ";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function updateStatusRoom($roomId,$pStatus){
        $query = "UPDATE rooms SET status = $pStatus WHERE roomId = $roomId";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function updateRoomRemoved($roomId){
        $query = "UPDATE rooms SET removed = 1 WHERE roomId = $roomId";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function updateQtyRoom($roomId,$qty){
        $query = "UPDATE rooms SET quantity = $qty WHERE roomId = $roomId";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    // Hàm vừa thực hiện insert vừa trả về id của room vừa được insert thành công
    // Để dùng roomId đó insert list check-box Feature & Facilities
    public function insertRoom(Room $room){
        $name = $room->getRName();
        $area = $room->getArea();
        $price = $room->getRPrice();
        $quantity = $room->getQuantity();
        $adult = $room->getAdult();
        $children = $room->getChildren();
        $desc = $room->getDesc();

        $query = "INSERT INTO rooms (name,area,price,quantity,adult,children,description) 
                    VALUES('$name', $area, $price, $quantity, $adult, $children, '$desc')";
        $value = $this->db->insertReturnId($query);
        if($value != false){
            return $value;
        }else{
            return false;
        }
    }

    public function insertRoom_Features($roomId,$featuresId){
        $query = "INSERT INTO room_features (roomId,featuresId) VALUES($roomId,$featuresId)";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }

    public function insertRoom_facilities($roomId,$facilitiesId){
        $query = "INSERT INTO room_facilities (roomId,facilitiesId) VALUES($roomId,$facilitiesId)";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }

    public function insertRoom_image($roomId,$image){
        $query = "INSERT INTO room_images (roomId,image) VALUES ($roomId,'$image')";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }
// Get imgRoom by roomID
    public function getRoom_imageByRoomId($roomId){
        $query = "SELECT * FROM room_images WHERE roomId =$roomId";
        $result = $this->db->select($query);
        $rooms_img = array();
        if($result !=  false){
            while($row = $result->fetch_assoc()){
                $r_img = new Room_images();
                $r_img->setSrNo($row['srNo']);
                $r_img->setRoomId($row['roomId']);
                $r_img->setImage($row['image']);
                $r_img->setStatus($row['status']);

                $rooms_img[] = $r_img;  
            }
            return $rooms_img;
        }else{
            return false;
        }
    }
// Get imgRoom by srNo
    public function getRoom_imageBySrNo($srNo){
        $query = "SELECT * FROM room_images WHERE srNo =$srNo";
        $result = $this->db->select($query);
        if($result !=  false){
            $row = $result->fetch_assoc();
                $r_img = new Room_images();
                $r_img->setSrNo($row['srNo']);
                $r_img->setRoomId($row['roomId']);
                $r_img->setImage($row['image']);
                $r_img->setStatus($row['status']);            
            return $r_img;
        }else{
            return false;
        }
    }

    public function updateStatusRoom_image($srNo,$status_vl){
        $query = "UPDATE room_images SET status = $status_vl WHERE srNo = $srNo";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function deleteRoom_Features($roomId){
        $query = "DELETE FROM room_features WHERE roomId = $roomId";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }
// Delete imgRoom by srNo
    public function deleteRoom_images($srNo){
        $query = "DELETE FROM room_images WHERE srNo = $srNo";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }
// Delete imgRoom by roomID
    public function deleteRoom_imageByRoom_id($roomId){
        $query = "DELETE FROM room_images WHERE roomId = $roomId";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }

    public function deleteRoom_facilities($roomId){
        $query = "DELETE FROM room_facilities WHERE roomId = $roomId";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }
}
?>