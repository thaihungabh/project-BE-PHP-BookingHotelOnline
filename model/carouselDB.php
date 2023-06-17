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
}
?>