<?php
require_once('../model/roomDB.php');
require_once('../model/bookingDB.php');
require_once('../helper/helper.php');

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    if($action == null){
        $action = "viewRooms";
    }

    $roomDb = new RoomDB();
    $bookingDb = new BookingDB();
    $helper = new Helper();


    if($action == "viewRooms"){
        $rooms = $roomDb->getAllRoom();
        $roomDb = new RoomDB();
        
        include('../accommodations.php');

    } else if($action == "details"){
        $r_id = $_GET['roomId'];

        $room = $roomDb->getRoomById($r_id);
        $img_r = $roomDb->getR_imgByRoomId($r_id);
        $fea_r = $roomDb->getName_Fea_roomById_room($r_id);
        $faci_r = $roomDb->getName_Faci_roomById_room($r_id);
        
        include('../roomDetails.php');

    } else if($action == "Check"){
        $checkin_date = $_POST['indate'];
        $checkout_date = $_POST['outdate'];
        $room_id = $_POST['room_id'];

        $room = $roomDb->getRoomById($room_id);
        $img_r = $roomDb->getR_imgByRoomId($room_id);
        $fea_r = $roomDb->getName_Fea_roomById_room($room_id);
        $faci_r = $roomDb->getName_Faci_roomById_room($room_id);

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

        if($room->getQuantity() < 0){
            $helper->alert("Error","Loại phòng này không còn phòng trống!!!");
            include('../test.php');
            exit;
        } 

        include('../roomDetails.php');

    }

?>