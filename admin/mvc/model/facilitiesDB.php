<?php
include_once('../model/database.php');
include_once('../model/facilities.php');
?>
<?php
class FacilitiesDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllFacilites(){
        $query = "SELECT * FROM facilities";
        $result = $this->db->select($query);
        $facilities = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $icon = $row['icon'];
                $name = $row['name'];
                $description = $row['description'];
                $facility = new Facilities($id,$icon,$name,$description);
                $facilities[] = $facility;
            }
            return $facilities;
        } else{
            return false;
        }
    }

    public function getFacilitiesById($pId){
        $query = "SELECT * FROM facilities WHERE id = $pId LIMIT 1";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                $facility = new Facilities($value['id'],$value['icon'],$value['name'],$value['description']);
                return $facility;
            }else{
                return false;
            }
    }

    public function insertFacilites($icon,$name,$desc){
        $query = "INSERT INTO facilities (icon,name,description) VALUES('$icon','$name','$desc')";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }

    public function deleteFacilites($pid){
        // Check Nếu Facilities có trong list Room thì không cho xóa.
        $q = "SELECT * FROM room_facilities WHERE facilitiesId = $pid";
        $check = $this->db->select($q);
        if($check != false){
            return false;
        }else{
            $query = "DELETE FROM facilities WHERE id = $pid";
            $value = $this->db->delete($query);
            if($value != false){
                return true;
            } else{
                return false;
            }
        }
    }

}
?>