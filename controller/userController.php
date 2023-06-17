<?php
    require_once('../model/customerDB.php');
    require_once('../model/contactDB.php');
    require_once('../model/carouselDB.php');
    require_once('../model/roomDB.php');
    require_once('../model/bookingDB.php');
    require_once('../model/facilitiesDB.php');
    require_once('../helper/helper.php');


    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }


    $customerDb = new CustomerDB();
    $carouselDb = new CarouselDB();
    $roomDb = new RoomDB();
    $bookingDb = new BookingDB();
    $facilitiesDb = new FacilitiesDB();
    $contactDb = new ContactDB();
    $helper = new Helper();

    if($action == null){
        $action = "overview";
    }
    if($action == "overview"){
        $carousels = $carouselDb->getAllCarousel();
        $roomDb = new RoomDB();
        $rooms = $roomDb->getLimit_Room();
        $facilities = $facilitiesDb->getAllFacilites();
        $contact = $contactDb->getContact();
        
        include('../overview.php');

    } else if($action == "Search"){
        $checkin_date = $_POST['in_date'];
        $checkout_date = $_POST['out_date'];

        $carousels = $carouselDb->getAllCarousel();
        $rooms = $roomDb->getLimit_Room();
        $facilities = $facilitiesDb->getAllFacilites();
        $contact = $contactDb->getContact();

        $availableDate = $bookingDb->checkAvailableDateIn_Out($checkin_date, $checkout_date);
        if($availableDate == "In_unavailable"){
            $helper->alert("Error","Ngày nhận phòng không hợp lệ!!!");
            include('../test.php');
            exit;  
        } else if($availableDate == "Out_unavailable"){
            $helper->alert("Error","Ngày trả phòng không hợp lệ!!!");
            include('../test.php');
            exit;
        }

        $r = $roomDb->getAllRoom();
        $rooms = array();
        foreach($r as $room){
            if($room->getQuantity() < 0){
                break;
            } else{
                $rooms[] = $room;
            }
        }

        include('../overview.php');

    }
    
?>