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

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">BOOKINGS</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                        <a href="../controller/addBooking_controller.php" class="btn btn-dark btn-sm shadow-none">
                            <i class="bi bi-plus-square"></i> Add New Booking
                        </a>                            
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover hover text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Room-type</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Checkin-date</th>
                                        <th scope="col">Checkout-date</th>
                                        <th scope="col">Booking-code</th>
                                        <th scope="col">Booking-time</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($bookings != null) : ?>
                                        <?php $i = 1 ?>
                                        <?php foreach ($bookings as $bk) : ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $bk['name'] ?></td>
                                                <td><?php echo $bk['qty'] ?></td>
                                                <td><?php echo $bk['check_indate']?></td>
                                                <td><?php echo $bk['check_outdate']?></td>
                                                <td><?php echo $bk['booking_code']?></td>
                                                <td><?php echo $bk['booking_date']?></td>
                                                <td>
                                                    <a href='../controller/booking_controller.php?action=viewDetails&&bkId=<?php echo $bk['booking_id'] ?>' class="btn btn-primary btn-sm shadow-none">
                                                        <i class="bi bi-pencil-square"></i> Details
                                                    </a>
                                                    <?php
                                                        $checkout_date = new DateTime($bk['check_outdate']);  
                                                        $checkout_date->setTime(0, 0, 0, 0); // Đặt giờ, phút, giây và micro giây về 0                                                     
                                                        $getCurrent = new DateTime();
                                                        $getCurrent->setTime(0, 0, 0, 0); // Đặt giờ, phút, giây và micro giây về 0
                                                        $number_day = $checkout_date->diff($getCurrent);
                                                        $days = $number_day->days;
                                                    ?>
                                                    <?php if($days <= 1) :?>
                                                        <a href='../controller/booking_controller.php?action=checkOut&&bkId=<?php echo $bk['booking_id'] ?>' class="btn btn-danger btn-sm shadow-none">
                                                            <i class="bi bi-bag-check-fill"></i> CheckOut
                                                        </a>
                                                    <?php endif;?>                                                                                                                                       
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('../public/scripts.php'); ?>
</body>

</html>