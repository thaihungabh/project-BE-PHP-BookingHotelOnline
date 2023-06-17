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
    <title>ADMIN-CAROUSEL</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">CAROUSEL</h3>

                <!-- Carousel Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Image</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#carousel-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="row">
                            <?php foreach($carousels as $carousel) : ?>
                                <?php $path = CAROUSEL_IMG_PATH; ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card bg-dark text-white">
                                        <img src="<?php echo $path.$carousel->getPicture();?>" class="card-img" alt="...">
                                        <div class="card-img-overlay text-end">
                                            <button class="btn btn-danger btn-sm shadow-none">
                                                <i class="bi bi-trash"></i> 
                                                <a href="../controller/carousel_controller.php?action=delete&&id=<?php echo $carousel->getCarousel_id()?>" class="text-white text-decoration-none">
                                                    Delete</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Management Team Modal -->
                <div class="modal fade" id="carousel-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../controller/carousel_controller.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Member</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">Picture:</label>
                                        <input type="file" name="carouselPicture" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" name="action" onclick="carouselPicture.value=''" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    <input type="submit" name="action" value="Submit" class="btn custom-bg text-white shadow-none">
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