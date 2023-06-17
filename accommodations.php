<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-ACCOMMODATIONS</title>
    <?php require('public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('public/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Filter -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 ps-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <!-- <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button> -->
                        <form action="../controller/accommodationController.php" method="post">
                            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                                <!-- Check Date-Room -->
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                    <label class="form-label">Check-in</label>
                                    <input type="date" name="indate" class="form-control shadow-none mb-3">
                                    <label class="form-label">Check-out</label>
                                    <input type="date" name="outdate" class="form-control shadow-none">
                                </div>
                                <!-- Choose Type Room -->
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">Type-Room</h5>
                                    <?php foreach ($rooms as $room) : ?>
                                        <div class=" form-check mb-2">
                                            <input type="radio" name="room_id" value="<?php echo $room->getRId() ?>" id="t1" class="form-check-input shadow-none me-1">
                                            <label class="form-check-label" for="t1"><?php echo $room->getRName() ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- Choose quantity Guests -->
                                <div class="border bg-light p-3 rounded mb-3">
                                    <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <label class="form-label">Adults</label>
                                            <input type="number" class="form-control shadow-none">
                                        </div>
                                        <div>
                                            <label class="form-label">Children</label>
                                            <input type="number" class="form-control shadow-none">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-lg-3 mt-2">
                                    <input type="submit" name="action" value="Check" class="btn text-white shadow-none custom-bg">
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
            <!-- Filter Value -->
            <div class="col-lg-9 col-md-12 px-4">
                <?php $path = ROOMS_IMG_PATH ?>
                <?php foreach ($rooms as $room) : ?>
                    <?php
                    $img_room = $roomDb->getRoom_imageByRoomId($room->getRId());
                    $fea_room = $roomDb->getName_Fea_roomById_room($room->getRId());
                    $faci_room = $roomDb->getName_Faci_roomById_room($room->getRId());
                    ?>
                    <div class="card mb-4 border-0 shadow">
                        <div class="row g-0 p-3 align-items-center">
                            <?php if ($img_room != false) : ?>
                                <?php foreach ($img_room as $img) : ?>
                                    <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                        <img src="<?php echo $path . $img->getImage() ?>" alt="This is image of room" class="img-fluid rounded">
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="#" alt="No Image" class="img-fluid rounded">
                                </div>
                            <?php endif; ?>

                            <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                <h5 class="mb-3"><?php echo $room->getRName() ?></h5>
                                <div class="features mb-3">
                                    <h6 class="mb-1">Features</h6>
                                    <?php foreach ($fea_room as $fea_name) : ?>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                            <?php echo $fea_name ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="facilities mb-3">
                                    <h6 class="mb-1">Facilities</h6>
                                    <?php foreach ($faci_room as $faci_name) : ?>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                            <?php echo $faci_name ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                                <div class="guests">
                                    <h6 class="mb-1">Guests</h6>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        <?php echo $room->getAdult() ?> Adults
                                    </span>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        <?php echo $room->getChildren() ?> Children
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                <h6 class="mb-4">$<?php echo $room->getRPrice() ?> per night</h6>
                                <!-- <h6 class=" text-danger mb-2"> Còn <?php echo $room->getQuantity() ?> phòng trống.</h6> -->
                                <?php
                                $customer_id = "0";
                                if (isset($_SESSION['customerId'])) {
                                    $customer_id = $_SESSION['customerId'];
                                }
                                ?>
                                <?php if ($getSetting->getShutdown() == 0) : ?>
                                    <a href="../controller/bookingController.php?action=book&&roomId=<?php echo $room->getRId() ?>&&cusId=<?php echo $customer_id ?>" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                                <?php endif; ?>

                                <a href="../controller/accommodationController.php?action=details&&roomId=<?php echo $room->getRId() ?>" class="btn btn-sm btn-outline-dark w-100 shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <?php require('public/footer.php'); ?>

</body>

</html>