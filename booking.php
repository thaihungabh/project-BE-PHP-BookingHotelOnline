<?php
require_once('../helper/helper.php');
$helper = new Helper();
$helper->requriedLogin();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-BOOKING</title>
    <?php require('public/links.php'); ?>
</head>

<body class="bg-light">
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">BOOKING ROOM</h2>
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
                                    <i class="bi bi-cart-fill"></i> <?php echo $room->getRName()?> Room
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class=" col-lg-12 col-md-6 ps-0 mb-3">
                                            <input type="hidden" name="roomId" value="<?php echo $room->getRId()?>">
                                            <input type="hidden" name="customer_id" value="<?php echo $customer->getCustomer_id()?>">
                                            
                                            <label class="form-label">Name:</label>
                                            <input type="text" name="user_name" value="<?php echo $customer->getName()?>" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Email:</label>
                                            <input type="email" name="user_email" value="<?php echo $customer->getEmail()?>" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Phone Number:</label>
                                            <input type="number" name="user_phone" value="<?php echo $customer->getP_number()?>" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Adults:</label>
                                            <input type="number" name="num_adults" min="1" max="10" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Children:</label>
                                            <input type="number" name="num_children" min="1" max="10" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-in Date:</label>
                                            <input type="date" name="checkin_date" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Check-out Date:</label>
                                            <input type="date" name="checkout_date" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Quantity:</label>
                                            <input type="number" name="qty" min="1" max="25" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 ps-0 mb-3">
                                            <label class="form-label">Unit-Price:</label>
                                            <input type="number" name="price" value="<?php echo $room->getRPrice()?>" class="form-control shadow-none" readonly>
                                        </div>
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

    <?php require('public/footer.php'); ?>

</body>

</html>