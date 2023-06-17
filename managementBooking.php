<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-BOOKING MANAGEMENT</title>
    <?php require('public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('public/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">BOOKING MANAGEMENT</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../controller/bookingController.php" method="POST">
                            <?php if($bookings != null):?>
                            <?php foreach($bookings as $booking):?>
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <!-- <i class="bi bi-cart-fill"></i> Booking Details -->
                                </h5>
                            </div>
                            <div class="modal-body">
                                
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class=" col-lg-12 col-md-6 ps-0 mb-2">
                                            <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']?>">
                                            <input type="hidden" name="room_id" value="<?php echo $booking['room_id'] ?>">
                                        </div>
                                        <div class="col-md-6 ps-0 mb-2">
                                            <label class="form-label">Room Type:</label>
                                            <input type="text" name="room_name" value="<?php echo $booking['name']?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-2">
                                            <label class="form-label">Quantity:</label>
                                            <input type="number" name="qty" value="<?php echo $booking['qty']?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-2">
                                            <label class="form-label">Check-in Date:</label>
                                            <input type="date" name="checkin_date" value="<?php echo $booking['check_indate'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-2">
                                            <label class="form-label">Check-out Date:</label>
                                            <input type="date" name="checkout_date" value="<?php echo $booking['check_outdate'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-2">
                                            <label class="form-label">Booking Code:</label>
                                            <input type="text" name="booking_code" value="<?php echo $booking['booking_code'] ?>" class="form-control shadow-none" readonly>
                                        </div>
                                        <div class="col-lg-12 col-md-6 ps-0 mb-2">
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
                                    <a class="btn btn-dark shadow-none" href="../controller/userController.php">
                                        Confirm
                                    </a>                                    
                                    <a class="btn btn-dark shadow-none" href="../controller/bookingController.php?action=bkcancel&&rId=<?php echo $booking['room_id'] ?>&&bkId=<?php echo $booking['booking_id']?>">
                                        Cancel Booking
                                    </a>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <?php else: ?>
                                <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    HIỆN TẠI BẠN CHƯA CÓ ĐẶT PHÒNG NÀO.
                                </h5>
                            </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('public/footer.php'); ?>

</body>

</html>