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
}
?>