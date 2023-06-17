<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-HOME</title>
    <?php require('../public/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <style>
        .booking-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .booking-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-light">

    <?php require('../public/header.php'); ?>

    <!-- Carousel with Swiper-->
    <div class="container-fluid px-lg-4 mt-4">
        <!-- Swiper -->
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <?php $path = CAROUSEL_IMG_PATH ?>
                <?php foreach($carousels as $carousel) :?>
                    <div class="swiper-slide">
                        <img src="<?php echo $path.$carousel->getPicture() ?>" class="w-100 d-block" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Check Booking Form -->
    <div class="container booking-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="../controller/userController.php" method="post">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" name="in_date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" name="out_date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adult</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <input type="submit" name="action" value="Search" class="btn text-white shadow-none custom-bg">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Our Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <!-- Cards -->
    <div class="container">
        <div class="row">
            <?php foreach($rooms as $room):?>
                <?php
                    $img_room = $roomDb->getRoom_imageByRoomId($room->getRId());
                    $fea_room = $roomDb->getName_Fea_roomById_room($room->getRId());
                    $faci_room = $roomDb->getName_Faci_roomById_room($room->getRId());
                ?>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <?php foreach($img_room as $img):?>
                            <img src="<?php echo ROOMS_IMG_PATH.$img->getImage()?>" alt="This Room hasn't img" class="card-img-top">
                        <?php endforeach;?>
                        <div class="card-body">
                            <h5><?php echo $room->getRName()?></h5>
                            <h6 class="mb-4">$<?php echo $room->getRPrice()?> per night</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Features</h6>
                                <?php foreach($fea_room as $feaName): ?>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        <?php echo $feaName?>
                                    </span>
                                <?php endforeach;?>                               
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <?php foreach($faci_room as $faciName):?>
                                    <span class="badge rounded-pill bg-light text-dark text-wrap">
                                        <?php echo $faciName?>
                                    </span>
                                <?php endforeach;?>                               
                            </div>
                            <div class="guests mb-4">
                                <h6 class="mb-1">Guests</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $room->getAdult()?> Adults
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $room->getChildren()?> Children
                                </span>
                            </div>
                            <!-- <div class="mb-4 text-danger">
                                <h6 class="mb-1"> Còn <?php echo $room->getQuantity()?> phòng trống.</h6>
                            </div>   -->
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-half text-warning"></i>
                                </span>
                            </div>                  
                            <div class="d-flex justify-content-evenly mb-2">
                                <?php
                                    $customer_id = "0";
                                    if(isset($_SESSION['customerId'])){
                                        $customer_id = $_SESSION['customerId'];
                                    }
                                ?>
                                <?php if($getSetting->getShutdown() == 0):?>
                                   <a href="../controller/bookingController.php?action=book&&roomId=<?php echo $room->getRId()?>&&cusId=<?php echo $customer_id?>" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                                <?php endif;?>
                                
                                <a href="../controller/accommodationController.php?action=details&&roomId=<?php echo $room->getRId()?>" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

            <div class="col-lg-12 text-center mt-5">
                <a href="../controller/accommodationController.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >></a>
            </div>
        </div>
    </div>

    <!-- Our Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <?php $path = FACILITIES_IMG_PATH ?>
            <?php foreach($facilities as $facility) :?>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow px-3 mx-3 py-4 my-3">
                    <img src="<?php echo $path.$facility->getIcon()?>" width="80px">
                    <h5 class="mt-3"><?php echo $facility->getName()?></h5>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <!-- Testimonials -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>
    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">
                <!-- Review 1 -->
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
                <!-- Review 2 -->
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
                <!-- Review 3 -->
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
                <!-- Review 4 -->
                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
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
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More >></a>
        </div>
    </div>

    <!-- Reach Us -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320px" src="<?php echo $contact->getIframe() ?>" loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call us</h5>
                    <a href="tel: <?php echo $contact->getPhoneNumber1()?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> <?php echo $contact->getPhoneNumber1() ?>
                    </a>
                    <?php if($contact->getPhoneNumber2() != 0):?>
                        <br>
                        <a href="tel: <?php echo $contact->getPhoneNumber2() ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> <?php echo $contact->getPhoneNumber2()?>
                        </a>
                    <?php endif;?>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow us</h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> <?php echo $contact->getFacebook()?>
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> <?php echo $contact->getInstagram()?>
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-tiktok me-1"></i> <?php echo $contact->getTiktok()?>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php require('../public/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>
</html>