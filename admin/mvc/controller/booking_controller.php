<?php
require_once('../model/roomDB.php');
    require_once('../model/bookingDB.php');
    require_once('../helper/helper.php');
    
    

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    if($action == null){
        $action = "viewBookingRooms";
    }

    $roomDb = new RoomDB();
    $bookingDb = new BookingDB();
    $helper = new Helper();

    if($action == "viewBookingRooms"){
        $bookings = $bookingDb->getAllBooking();
        include('../view/bookings.php');

    } else if($action == "viewDetails"){
        $booking_id = $_GET['bkId'];

        $booking = $bookingDb->getBookingBy_BookingId($booking_id);
        $bkDetails = $bookingDb->getBookingDetailsBy_BookingId($booking_id);

        include('../view/booking_details.php'); 
    } else if($action == "checkOut"){
        $booking_id = $_GET['bkId'];
        $booking = $bookingDb->getBookingBy_BookingId($booking_id);

        $room_id = $booking['room_id'];
        $room = $roomDb->getRoomById($room_id);
        $quantity_room = $room->getQuantity() + $booking['qty'];

        if($roomDb->updateQtyRoom($room_id,$quantity_room) && 
                        $bookingDb->changeStatusBooking($booking_id,1)){
                $helper->alert("success","CheckOuted"); 
            }

        $bookings = $bookingDb->getAllBooking();
        $dateCheckout = $bookingDb->checkDate_checkout();
        include('../view/booking_details.php');
         
    }
?>
