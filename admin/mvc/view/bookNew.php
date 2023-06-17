<?php
require_once('../helper/helper.php');
$helper = new Helper();
$helper->requriedAdLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-BOOKINGS</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../controller/addBooking_controller.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-cart-fill"></i> Booking
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class=" col-lg-12 col-md-6 ps-0 mb-3">
                                            <input type="hidden" name="room_id" value="<?php echo $room->getRId()?>">

                                            <label class="form-label">Guest Name:</label>
                                            <input type="text" name="guest_name" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Guest Email:</label>
                                            <input type="email" name="guest_email" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Guest Phone:</label>
                                            <input type="number" name="guest_phone" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Number Adults:</label>
                                            <input type="number" name="num_adults" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Number Children:</label>
                                            <input type="number" name="num_children" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-in Date:</label>
                                            <input type="date" name="checkin_date" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-out Date:</label>
                                            <input type="date" name="checkout_date" class="form-control shadow-none">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Type Room:</label>
                                            <input type="text" name="room_name" value="<?php echo  $room->getRName()?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Unit Price:</label>
                                            <input type="text" name="room_price" value="<?php echo  $room->getRPrice()?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class=" col-lg-12 col-md-6 ps-0 mb-3">
                                            <label class="form-label">Quantity Room:</label>
                                            <input type="number" name="qty" class="form-control shadow-none">
                                        </div>
                                        <!-- <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Booking Code:</label>
                                            <input type="text" name="booking_code" value="<?php echo $booking['booking_code'] ?>" class="form-control shadow-none" readonly>
                                        </div> -->
                                        <!-- <div class="col-lg-12 col-md-6 ps-0 mb-3">
                                            <?php
                                            $qty = $booking['qty'];
                                            $bk_pricw = $booking['price'];
                                            $totalPrice = $qty * $bk_pricw;
                                            ?>
                                            <label class="form-label">Total Price:</label>
                                            <input type="number" name="price" value="<?php echo $totalPrice ?>" class="form-control shadow-none" readonly>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                            <input type="submit" name="action" value="Booking" class="btn btn-dark shadow-none">                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('../public/scripts.php'); ?>
</body>

</html>