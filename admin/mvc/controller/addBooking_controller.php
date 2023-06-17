<?php
    require_once('../model/roomDB.php');
    require_once('../model/bookingDB.php');
    require_once('../helper/helper.php');
    
    

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    if($action == null){
        $action = "addBooking";
    }

    $roomDb = new RoomDB();
    $bookingDb = new BookingDB();
    $helper = new Helper();

    if($action == "addBooking"){
        $rooms = $roomDb->getAllRoomSetting();
        include('../view/addBooking.php');
    } else if($action == "Search"){
        $checkin_date = $_POST['in_date'];
        $checkout_date = $_POST['out_date'];

        $availableDate = $bookingDb->checkAvailableDateIn_Out($checkin_date, $checkout_date);
        if($availableDate == "In_unavailable"){
            $helper->alert("Error","Ngày nhận phòng không hợp lệ!!!");
            include('../view/addBooking.php');
            exit;  
        } else if($availableDate == "Out_unavailable"){
            $helper->alert("Error","Ngày trả phòng không hợp lệ!!!");
            include('../view/addBooking.php');
            exit;
        }

        $r = $roomDb->getAllRoomSetting();
        $checkBookingAvailable = $bookingDb->checkAvailableBookingRoom($checkin_date, $checkout_date);
        $rooms = array();
        foreach($r as $room){
            if(!($checkBookingAvailable)&&$room->getQuantity() > 0 || $checkBookingAvailable){
                $rooms[] = $room;
            }
        }

        include('../view/addBooking.php');

    } else if($action == "book"){
        $room_id = $_GET['roomId'];
        $room = $roomDb->getRoomById($room_id);

        include('../view/bookNew.php');

    } else if($action == "Booking"){
        $room_id = $_POST['room_id'];
        $guest_name = $_POST['guest_name'];
        $guest_email = $_POST['guest_email'];
        $guest_phone = $_POST['guest_phone'];
        $num_adults = $_POST['num_adults'];
        $num_children = $_POST['num_children'];
        $checkin_date = $_POST['checkin_date'];
        $checkout_date = $_POST['checkout_date'];
        $qty = $_POST['qty'];
        $rPrice = $_POST['room_price'];


        // $room = $roomDb->getRoomById($room_id);

        $availableDate = $bookingDb->checkAvailableDateIn_Out($checkin_date, $checkout_date);
        if($availableDate == "In_unavailable"){
            $helper->alert("Error","Ngày nhận phòng không hợp lệ!!!");
            include('../view/bookNew.php');
            exit;  
        } else if($availableDate == "Out_unavailable"){
            $helper->alert("Error","Ngày trả phòng không hợp lệ!!!");
            include('../view/bookNew.php');
            exit;
        }

        // Chuyển đổi chuỗi thành đối tượng DateTime trong PHP
        // Return Date()
        $checkin_dateObj = DateTime::createFromFormat('d/m/Y', $checkin_date);
        $checkout_dateObj = DateTime::createFromFormat('d/m/Y', $checkout_date);

        // Format lại cho trùng với database mới ss đc.(Return string_format)
        // Sử dụng $date_mysql_format để so sánh với giá trị trong cơ sở dữ liệu
        if($checkin_dateObj != false){
            $checkin_date = $checkin_dateObj->format('Y-m-d');
        }
        if($checkout_dateObj != false){
            $checkout_date = $checkout_dateObj->format('Y-m-d');
        }

        $room = $roomDb->getRoomById($room_id);
        $checkBookingAvailable = $bookingDb->checkAvailableBookingRoom($checkin_date, $checkout_date);
        
        if((!($checkBookingAvailable) && $room->getQuantity() >= $qty) || $checkBookingAvailable){
            $current_quantityRoom = $room->getQuantity() - $qty;
            $max_capacity = ($room->getAdult() + $room->getChildren()) * $qty;
            // Check max capacity
            if($max_capacity < ($num_adults + $num_children)){
                $helper->alert("Error","Số lượng người vượt mức cho phép của loại phòng này");
            } 
            else {
                // Random unduplicate BK code
                $bookingCode = uniqid('MDP_');
    
                $bk = new Booking();
                $bk->setR_id($room_id);
                $bk->setCustomer_id(13);
                $bk->setCheckin($checkin_date);
                $bk->setCheckout($checkout_date);
                $bk->setQuantity($qty);
                $bk->setPrice($rPrice);
                $bk->setBooking_code($bookingCode);
    
                $lastBookingInser = $bookingDb->addBooking($bk);
                if($lastBookingInser != false) {
                    // Update qty after bookroom
                    $roomDb->updateQtyRoom($room_id, $current_quantityRoom);

                    $bk_details = new Booking_details();
                    $bk_details->setBooking_id($lastBookingInser);
                    $bk_details->setCus_name($guest_name);
                    $bk_details->setCus_email($guest_email);
                    $bk_details->setCus_phone($guest_phone);
                    $bk_details->setNum_adults($num_adults);
                    $bk_details->setNum_children($num_children);
    
                    $add_bookingDetails = $bookingDb->addBooking_Details($bk_details);
                    if($add_bookingDetails){
                        $helper->redirect('../controller/booking_controller.php');
                    }
                }
            }
        } else{
            $helper->alert("Error","Loại phòng này hiện nay số lượng phòng trống không đủ.");
        }
        include('../view/bookNew.php');
    }
?>
