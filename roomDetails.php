<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-Room Details</title>
    <?php require('public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('public/header.php'); ?>


    <div class="container">
        <div class="row">

            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold h-font text-center"><?php echo  $room->getRName() ?> Room</h2>
                <div style="font-size: 14px">
                    <a href="../controller/userController.php" class="text-secondary text-decoration-none">Home</a>
                    <span class="text-secondary"> > </span>
                    <a href="../controller/accommodationController.php" class="text-secondary text-decoration-none">Accommodations</a>
                </div>
            </div>

            <!-- Img Carousel -->
            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php if ($img_r != false) : ?>
                            <!-- Cho img đầu tiên mang thuộc tính active-những cái sau đóng vai trò là item -->
                            <?php foreach ($img_r as $index => $img) : ?>
                                <div class="carousel-item <?php echo $index == 0 ? 'active' : '' ?>">
                                    <img src="<?php echo ROOMS_IMG_PATH . $img->getImage() ?>" class="d-block w-100 rounded">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h4 class="mb-4">$<?php echo $room->getRPrice() ?> per night</h4>

                        <div class="rating mb-3">
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </span>
                        </div>

                        <div class="mb-3">
                            <h6 class="mb-1">Features</h6>
                            <?php foreach ($fea_r as $fea_name) : ?>
                                <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                    <?php echo $fea_name ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="mb-3">
                            <h6 class="mb-1">Facilities</h6>
                            <?php foreach ($faci_r as $faci_name) : ?>
                                <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                    <?php echo $faci_name ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <div class="guests mb-3">
                            <h6 class="mb-1">Guests</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $room->getAdult() ?> Adults
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                <?php echo $room->getChildren() ?> Children
                            </span>
                        </div>

                        <!-- <div class="mb-4 text-danger">
                            <h6 class="mb-1"> Còn <?php echo $room->getQuantity()?> phòng trống.</h6>
                        </div>  -->

                        <div class="mb-3">
                            <h6 class="mb-1">Area</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap me-1 mb-1">
                                <?php echo $room->getArea() ?>m²
                            </span>
                        </div>

                        <?php
                            $customer_id = "0";
                            if (isset($_SESSION['customerId'])) {
                                $customer_id = $_SESSION['customerId'];
                            }
                        ?>

                        <?php if ($getSetting->getShutdown() == 0) : ?>
                            <a href="../controller/bookingController.php?action=book&&roomId=<?php echo $room->getRId() ?>&&cusId=<?php echo $customer_id ?>" class="btn w-100 text-white custom-bg shadow-none mb-1">Book Now</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Filter Value -->
            <div class="col-12 mt-4 px-4">
                <div class="mb-4">
                    <h5>Description</h5>
                    <p>
                        <?php echo $room->getDesc() ?>
                    </p>
                </div>
                <div>
                    <h5 class="mb-3">Reviews & Rating</h5>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <img src="images/feature/black-star-icon.svg" width="30px" />
                            <h6 class="m-0 ms-2">Random user1</h6>
                        </div>
                        <p>
                            The Internet is rapidly becoming the dominant user decision making tool for the hotel accommodation purchase process.
                            This paper critically reviews online hotel accommodation purchase processes literature and proposes
                            a literature framework analysis of online hotel accommodation process factors.
                            The objective of this research is to propose a statistically based framework based on clickstream/log
                            file analytics of both the internal and external influencers of the process.
                        </p>
                        <div class="rating">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require('public/footer.php'); ?>

</body>

</html>