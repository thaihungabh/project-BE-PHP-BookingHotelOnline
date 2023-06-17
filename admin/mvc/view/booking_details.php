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
    <title>ADMIN-BOOKINGS DETAILS</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../controller/bookingController.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-cart-fill"></i> Booking Details
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class=" col-lg-12 col-md-6 ps-0 mb-3">
                                            <!-- <input type="hidden" name="bk_detailsId" value="<?php echo $bkDetails->getBookingDetails_id() ?>">
                                            <input type="hidden" name="booking_id" value="<?php echo $bkDetails->getBooking_id() ?>">
                                            <input type="hidden" name="room_id" value="<?php echo $booking['room_id'] ?>"> -->

                                            <label class="form-label">Customer Name:</label>
                                            <input type="text" name="user_name" value="<?php echo $bkDetails->getCus_name() ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Customer Email:</label>
                                            <input type="email" name="user_email" value="<?php echo $bkDetails->getCus_email() ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Customer Phone:</label>
                                            <input type="number" name="user_phone" value="<?php echo $bkDetails->getCus_phone() ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Number Adults:</label>
                                            <input type="number" name="num_adults" value="<?php echo $bkDetails->getNum_adults() ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Number Children:</label>
                                            <input type="number" name="num_children" value="<?php echo $bkDetails->getNum_children() ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-in Date:</label>
                                            <input type="date" name="checkin_date" value="<?php echo $booking['check_indate'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-out Date:</label>
                                            <input type="date" name="checkout_date" value="<?php echo $booking['check_outdate'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Type Room:</label>
                                            <input type="text" name="room_name" value="<?php echo $booking['name'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Quantity Room:</label>
                                            <input type="number" name="qty" value="<?php echo $booking['qty'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Booking Code:</label>
                                            <input type="text" name="booking_code" value="<?php echo $booking['booking_code'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-lg-12 col-md-6 ps-0 mb-3">
                                            <?php
                                            $qty = $booking['qty'];
                                            $bk_pricw = $booking['price'];
                                            $totalPrice = $qty * $bk_pricw;
                                            ?>
                                            <label class="form-label">Total Price:</label>
                                            <input type="number" name="price" value="<?php echo $totalPrice ?>" class="form-control shadow-none" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                    <a class="btn btn-dark shadow-none" href="../controller/booking_controller.php">
                                        Back
                                    </a>                                    
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