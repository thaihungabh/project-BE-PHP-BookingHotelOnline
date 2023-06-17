<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-CANCEL BOOKING</title>
    <?php require('public/links.php'); ?>
</head>

<body class="bg-light">

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CANCEL BOOKING</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="../controller/bookingController.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title d-flex align-items-center">
                                    <i class="bi bi-cart-fill"></i> See you againt
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        
                                            <div class=" col-lg-12 col-md-6 ps-0 mb-3">
                                                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']?>">
                                                <input type="hidden" name="room_id" value="<?php echo $room->getRId()?>">
                                                <input type="hidden" name="bk_qty" value="<?php echo $booking['qty'] ?>">
                                        
                                                <label class="form-label">Booking Code:</label>
                                                <input type="text" name="booking_code" class="form-control shadow-none" required>
                                            </div>
                                       
                                    </div>
                                </div>
                                <div class="text-center my-1">
                                    <a class="btn btn-dark shadow-none" href="../controller/userController.php">Return Homepage</a>
                                    <input type="submit" name="action" value="Cancel Booking" class="btn btn-dark shadow-none">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('public/footer.php'); ?>

</body>

</html>