<?php
include_once('../model/database.php');
include_once('../model/booking.php');
include_once('../model/booking_details.php');
?>

<?php
class BookingDB{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkAvailableDateIn_Out($date_checkin, $date_checkout){
        $checkin_dateObj = DateTime::createFromFormat('Y-m-d', $date_checkin);
        $checkout_dateObj = DateTime::createFromFormat('Y-m-d', $date_checkout);

        $currentDate = new DateTime();
        $check = "";
        if($checkin_dateObj < $currentDate){
            $check = "In_unavailable";
        } 
        else if($checkout_dateObj <= $checkin_dateObj){
            $check = "Out_unavailable";
        }
        return $check;
    }

    public function checkDate_checkout(){
        $query = "SELECT  DATEDIFF(check_outdate, CURDATE()) AS days_checkOut FROM booking WHERE status = 0";
        $result = $this->db->select($query);
        $checkout_days = array();
        if ($result !=  false) {
            while($row = $result->fetch_assoc()){
                $checkout_days[] = $row;
            }
            
            return $checkout_days;
        } else {
            return false;
        }
    }

    // Time nằm trong khoảng time có người thuê mới truy vấn đc nha ^^
    public function checkAvailableBookingRoom($date_checkin, $date_checkout){
        $sql = "SELECT * FROM booking
            WHERE status = 0 AND ((check_indate >= '$date_checkin' AND check_indate < '$date_checkout')   
                OR (check_outdate > '$date_checkin' AND check_outdate <= '$date_checkout')
                    OR (check_indate < '$date_checkin' AND check_outdate > '$date_checkout'))";
        $value = $this->db->select($sql);
        if($value != false){
            return false; //Truy vấn ra được thì có nghĩa là phòng có người thuê trong thời gian đó rồi. 
                        //Nhưng cần kiểm tra bên controller về số lượng phòng thì mới biết là khả dụng hay không?
        }else{
            return true;
        }
                
    }

    public function checkBookingCode($booking_id,$booking_code){
        $query = "SELECT booking_code FROM booking WHERE booking_id = $booking_id AND booking_code = '$booking_code'";
        $result = $this->db->select($query);
        if ($result !=  false) { 
            return true;
        } else {
            return false;
        }
    }

    public function getAllBooking(){
        $query = "SELECT b.booking_id, b.room_id, b.customer_id, b.check_indate, 
                            b.check_outdate, b.qty, b.price, b.booking_code, b.booking_date, r.name FROM booking b 
                                INNER JOIN rooms r on b.room_id = r.roomId
                                    WHERE b.status = 0 ORDER BY b.booking_id DESC";
        $result = $this->db->select($query);
        $bookings = array();
        if ($result !=  false) {
            while($row = $result->fetch_assoc()){
                $bookings[] = $row;
            }
            
            return $bookings;
        } else {
            return false;
        }
    }

    public function getBookingBy_CustomerId($customer_id){
        $query = "SELECT b.booking_id, b.room_id, b.customer_id, b.check_indate, 
                            b.check_outdate, b.qty, b.price, b.booking_code, r.name FROM booking b 
                                INNER JOIN rooms r on b.room_id = r.roomId
                                    WHERE b.status = 0 AND b.customer_id = $customer_id ORDER BY b.booking_id";
        $result = $this->db->select($query);
        $bookings = array();
        if ($result !=  false) {
            while($row = $result->fetch_assoc()){
                $bookings[] = $row;
            }
            
            return $bookings;
        } else {
            return false;
        }
    }

    public function getBookingBy_BookingId($booking_id){
        $query = "SELECT b.booking_id, b.room_id, b.customer_id, b.check_indate, 
                            b.check_outdate, b.qty, b.price, b.booking_code, r.name FROM booking b 
                                INNER JOIN rooms r on b.room_id = r.roomId
                                    WHERE b.status = 0 AND b.booking_id = $booking_id";
        $result = $this->db->select($query);
        if ($result !=  false) {
            $row = $result->fetch_assoc();
            
            return $row;
        } else {
            return false;
        }
    }

    public function changeStatusBooking($booking_id,$status){
        $query = "UPDATE booking SET status = $status WHERE booking_id = $booking_id";
        $result = $this->db->update($query);
        if($result != false){
            return true;
        }else{
            return false;
        }
    }

    public function addBooking(Booking $booking){
        $room_id = $booking->getR_id();
        $customer_id = $booking->getCustomer_id();
        $inDate = $booking->getCheckin();
        $outDate = $booking->getCheckout();
        $qty = $booking->getQuantity();
        $price = $booking->getPrice();
        $booking_code = $booking->getBooking_code();

        $query = "INSERT INTO booking (room_id,customer_id,check_indate,check_outdate,qty,price,booking_code) 
                    VALUES($room_id,$customer_id,'$inDate','$outDate',$qty,$price,'$booking_code')";
        $id_lastInsert = $this->db->insertReturnId($query);
        if($id_lastInsert != false){
            return $id_lastInsert;
        }else{
            return false;
        }
    }

    public function getBookingDetailsBy_BookingId($booking_id){
        $query = "SELECT * FROM booking_details WHERE booking_id = $booking_id";
        $result = $this->db->select($query);
        if ($result !=  false) {
            $row = $result->fetch_assoc();
            $bookingDetails = new Booking_details();
            $bookingDetails->setBookingDetails_id($row['bookingDetails_id']);
            $bookingDetails->setBooking_id($row['booking_id']);
            $bookingDetails->setCus_name($row['customer_name']);
            $bookingDetails->setCus_email($row['customer_email']);
            $bookingDetails->setCus_phone($row['customer_phone']);
            $bookingDetails->setNum_adults($row['num_adults']);
            $bookingDetails->setNum_children($row['num_children']);
            return $bookingDetails;
        } else {
            return false;
        }
    }

    public function addBooking_Details(Booking_details $bk_details){
        $booking_id = $bk_details->getBooking_id();
        $customer_name = $bk_details->getCus_name();
        $customer_email = $bk_details->getCus_email();
        $customer_phone = $bk_details->getCus_phone();
        $num_adults = $bk_details->getNum_adults();
        $num_children = $bk_details->getNum_children();

        $query = "INSERT INTO booking_details (booking_id, customer_name, customer_email, 
                                    customer_phone, num_adults, num_children) 
                    VALUES ($booking_id,'$customer_name','$customer_email',
                                    '$customer_phone',$num_adults,$num_children)";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }
    
}
?>