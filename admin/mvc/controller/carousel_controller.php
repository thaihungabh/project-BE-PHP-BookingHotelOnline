<?php
    require_once('../model/carouselDB.php');
    require_once('../helper/helper.php');

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    if($action == null){
        $action = "carousel";
    }
    $carouselDb = new CarouselDB();
    $helper = new Helper();

    if($action == "carousel"){
        $carousels = $carouselDb->getAllCarousel();
        include('../view/carousel.php');
    } else if($action == "Submit"){
        $picture = $_FILES['carouselPicture'];

        $picture_r = $helper->uploadImage($picture,Carousel_Folder);
        if($picture_r == "Invalid Image Or Format"){
            $helper->alert("Error","Only Allow JPG & PNG!");
        } 
        else if($picture_r == "Invalid Size"){
            $helper->alert("Error","Only Allow Size Less Than 2MB!");
        }
        else if($picture_r == "Upload Failed"){
            $helper->alert("Error","Upload Failed!!");
        }
        else{
            $insertCarousel = $carouselDb->insertCarousel($picture_r);
           if($insertCarousel){
            $helper->alert("success","Add Image Carousel Success!");
           }
           else{
            $helper->alert("Error","Add Falied!");
           }
        }
        $carousels = $carouselDb->getAllCarousel();
        include('../view/carousel.php');
    } else if($action == "delete"){
        $carousel_id = $_GET['id'];
        $carousel = $carouselDb->findImgById($carousel_id);
        if($carousel != false){
            $imgName = $carousel->getPicture();
            if($helper->deleteImage($imgName,Carousel_Folder)){
                $carouselDb->deleteCarousel($carousel_id);
                $helper->alert("success","Picture Removed!");
            }else{
                $helper->alert("Error","Server Down");
            }
        }else{
            $helper->alert("Error","Falied!");
        }
        $carousels = $carouselDb->getAllCarousel();
        include('../view/carousel.php');
    }

?>