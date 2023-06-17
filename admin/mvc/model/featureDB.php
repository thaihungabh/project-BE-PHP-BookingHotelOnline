<?php
include_once('../model/database.php');
include_once('../model/feature.php');
?>
<?php
class FeatureDB
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllFeature(){
        $query = "SELECT * FROM features";
        $result = $this->db->select($query);
        $features = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $fId = $row['featureId'];
                $fName = $row['featureName'];
                $feature = new Feature($fId,$fName);
                $features[] = $feature;
            }
            return $features;
        } else{
            return false;
        }
    }

    public function addFeature($featureName){
        $query = "INSERT INTO features (featureName) VALUES('$featureName')";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }

    public function deleteFeature($featureId){
        // Check Nếu Features có trong list Room thì không cho xóa.
        $q = "SELECT * FROM room_features WHERE featuresId = $featureId";
        $check = $this->db->select($q);
        if($check != false){
            return false;
        } else {
            $query = "DELETE FROM features WHERE featureId = $featureId";
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