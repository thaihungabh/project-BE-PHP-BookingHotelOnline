<?php
include_once('../model/database.php');
include_once('../model/carousel.php');
?>

<?php
class CarouselDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllCarousel(){
        $query = "SELECT * FROM carousel";
        $result = $this->db->select($query);
        $carousels = array();
        if($result != false){
            while($row = $result->fetch_assoc()){
                $carousel_id = $row['carousel_id'];
                $picture = $row['picture'];
                $carousel = new Carousel($carousel_id,$picture);
                $carousels[] = $carousel;
            }
            return $carousels;
        } else{
            return false;
        }
    }

    public function findImgById($carousel_id){
        $query = "SELECT * FROM carousel WHERE carousel_id = $carousel_id LIMIT 1";
        $result = $this->db->select($query);
        if($result != false){
            $value = $result->fetch_assoc();
            $carousel = new Carousel($value['carousel_id'],$value['picture']);
            return $carousel;
        }else{
            return false;
        }
    }

    public function insertCarousel($image){
        $query = "INSERT INTO carousel (picture) VALUES ('$image')";
        $insert_row = $this->db->insert($query);
        if($insert_row != false){
            return true;
        }else{
            return false;
        }
    }

    public function deleteCarousel($carousel_id){
        $query = "DELETE FROM carousel WHERE carousel_id = $carousel_id";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }
}
?>