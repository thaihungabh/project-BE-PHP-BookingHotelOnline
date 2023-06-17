<?php
    require_once('../model/roomDB.php');
    require_once('../model/customerDB.php');
    require_once('../model/bookingDB.php');
    require_once('../helper/helper.php');

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $roomDb = new RoomDB();
    $customerDb = new CustomerDB();
    $bookingDb = new BookingDB();
    $helper = new Helper();

    if($action == "book"){
        $roomId = $_GET['roomId'];
        $customer_id = $_GET['cusId'];
        
        $customer = $customerDb->getCustomerById($customer_id);
        $room = $roomDb->getRoomById($roomId);
    
        include('../booking.php');

    } else if($action == "Booking"){
        $room_id = $_POST['roomId'];
        $customer_id = $_POST['customer_id'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $num_adults = $_POST['num_adults'];
        $num_children = $_POST['num_children'];
        $checkin_date = $_POST['checkin_date'];
        $checkout_date = $_POST['checkout_date'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];

        $customer = $customerDb->getCustomerById($customer_id);
        $room = $roomDb->getRoomById($room_id);

        $availableDate = $bookingDb->checkAvailableDateIn_Out($checkin_date, $checkout_date);
        if($availableDate == "In_unavailable"){
            $helper->alert("Error","Ngày nhận phòng không hợp lệ!!!");
            include('../booking.php');
            exit;  
        } else if($availableDate == "Out_unavailable"){
            $helper->alert("Error","Ngày trả phòng không hợp lệ!!!");
            include('../booking.php');
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
                $bk->setCustomer_id($customer_id);
                $bk->setCheckin($checkin_date);
                $bk->setCheckout($checkout_date);
                $bk->setQuantity($qty);
                $bk->setPrice($price);
                $bk->setBooking_code($bookingCode);
    
                $lastBookingInser = $bookingDb->addBooking($bk);
                if($lastBookingInser != false) {
                    // Update qty if bookroom
                    $roomDb->updateQtyRoom($room_id, $current_quantityRoom);

                    $bk_details = new Booking_details();
                    $bk_details->setBooking_id($lastBookingInser);
                    $bk_details->setCus_name($user_name);
                    $bk_details->setCus_email($user_email);
                    $bk_details->setCus_phone($user_phone);
                    $bk_details->setNum_adults($num_adults);
                    $bk_details->setNum_children($num_children);
    
                    $add_bookingDetails = $bookingDb->addBooking_Details($bk_details);
                    if($add_bookingDetails){
                        $helper->redirect('../controller/bookingController.php?action=bkDetails&&bkId='.$lastBookingInser);
                    }
                }
            }
        } else{
            $helper->alert("Error","Loại phòng này hiện nay số lượng phòng trống không đủ.");
        }

        include('../booking.php');
    } else if($action == "bkDetails"){
        $booking_id = $_GET['bkId'];
        $booking = $bookingDb->getBookingBy_BookingId($booking_id);
        $bkDetails = $bookingDb->getBookingDetailsBy_BookingId($booking_id);

        include('../bookingDetails.php'); 

    } else if($action == "bkcancel"){
        $roomId = $_GET['rId'];
        $booking_id = $_GET['bkId'];

        $room = $roomDb->getRoomById($roomId);
        $booking = $bookingDb->getBookingBy_BookingId($booking_id);
        include('../cancelBooking.php'); 
        
    } else if($action == "Cancel Booking"){
        $room_id = $_POST['room_id'];
        $booking_id = $_POST['booking_id'];
        $qtyRoom_booking = $_POST['bk_qty'];
        $booking_code = $_POST['booking_code'];

        $room = $roomDb->getRoomById($room_id);
        $quantity_room = $room->getQuantity()+$qtyRoom_booking;
        $booking = $bookingDb->getBookingBy_BookingId($booking_id);

        if($bookingDb->checkBookingCode($booking_id, $booking_code)){
            if($roomDb->updateQtyRoom($room_id,$quantity_room) && 
                        $bookingDb->changeStatusBooking($booking_id,1)){
                $helper->alert("success","Bạn đã hủy đặt phòng thành công, hẹn bạn vào dịp khác.");
                include('../cancelBooking.php');
            }
        }else{
            $helper->alert("Error","Mã đặt phòng không chính xác");
        }

        include('../cancelBooking.php');
    } else if($action == "bkManagement"){
        $customerId = $_GET['customerId'];
        
        $bookings = $bookingDb->getBookingBy_CustomerId($customerId);

        include('../managementBooking.php');

    }
  

?>