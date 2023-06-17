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
    <title>ADMIN-SETTINGS</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">SETTINGS</h3>

                <!-- General Setting Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">General Settings</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#general-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 fw-bold">Site Title</h6>
                        <p class="card-text"><?php echo $general_Setting->getSiteTitle(); ?></p>
                        <h6 class="card-subtitle mb-1 fw-bold">About Us</h6>
                        <p class="card-text"><?php echo $general_Setting->getSiteAbout(); ?></p>
                    </div>
                </div>

                <!-- General Setting Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../controller/dashboard_controller.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">General Settings</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <input type="hidden" name="setting_id" value="<?php echo $general_Setting->getSettingId(); ?>">
                                        <label class="form-label fw-bold">Site Title:</label>
                                        <input type="text" name="site_title" value="<?php echo $general_Setting->getSiteTitle(); ?>" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">About Us:</label>
                                        <textarea name="site_about" class="form-control shadow-none" rows="6" required><?php echo $general_Setting->getSiteAbout(); ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" name="action" onclick="site_title.value='<?php echo $general_Setting->getSiteTitle(); ?>',site_about.value='<?php echo $general_Setting->getSiteAbout(); ?>'" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    <input type="submit" name="action" value="Save" class="btn custom-bg text-white shadow-none">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Shutdown Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form action="../controller/dashboard_controller.php" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title m-0">Shutdown Website</h5>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="setting_id" value="<?php echo $general_Setting->getSettingId(); ?>">

                                    <input type="checkbox" name="shutdown_vl" value="on" class="form-check-input" id="shutdownMode-on">
                                    <label class="form-check-label" for="shutdownMode-on">On</label><br>

                                    <input type="checkbox" name="shutdown_vl" value="off" class="form-check-input" id="shutdownMode-off">
                                    <label class="form-check-label" for="shutdownMode-off">Off</label><br>

                                    <input type="submit" name="action" value="Shutdown" class="btn btn-sm btn-dark shadow-none">
                                </div>
                            </div>
                        </form>
                        <p class="card-text">
                            When shutdown mode turned on, customer will be can't book hotel room.
                        </p>
                    </div>
                </div>
                <!-- -------------------------------------------------------------------------------------------------------------- -->

                <!-- Contact details section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Contacts Settings</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#contacts-s">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Address</h6>
                                    <p class="card-text"><?php echo $contact_Setting->getAddress() ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Google Map</h6>
                                    <p class="card-text"><?php echo $contact_Setting->getGmap() ?></p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Phone Numbers</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span><?php echo $contact_Setting->getPhoneNumber1() ?></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span><?php echo $contact_Setting->getPhoneNumber2() ?></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Email</h6>
                                    <p class="card-text">
                                        <i class="bi bi-envelope-fill"></i>
                                        <span><?php echo $contact_Setting->getEmail() ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">Social Links</h6>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-facebook me-1"></i>
                                        <span><?php echo $contact_Setting->getFacebook() ?></span>
                                    </p>
                                    <p class="card-text mb-1">
                                        <i class="bi bi-instagram me-1"></i>
                                        <span><?php echo $contact_Setting->getInstagram() ?></span>
                                    </p>
                                    <p class="card-text">
                                        <i class="bi bi-tiktok me-1"></i>
                                        <span><?php echo $contact_Setting->getTiktok() ?></span>
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="card-subtitle mb-1 fw-bold">iFrame</h6>
                                    <iframe src="<?php echo $contact_Setting->getIframe() ?>" class="border p-2 w-100" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Detail Modal -->
                <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="../controller/dashboard_controller.php" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Contacts Settings</h5>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Address:</label>
                                                    <input type="hidden" name="pContact_id" value="<?php echo $contact_Setting->getContact_id() ?>">
                                                    <input type="text" name="pAddress" value="<?php echo $contact_Setting->getAddress() ?>" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Google Map Link:</label>
                                                    <input type="text" name="pGmap" value="<?php echo $contact_Setting->getGmap() ?>" class="form-control shadow-none" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Phone Number:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pPhone1" value="<?php echo $contact_Setting->getPhoneNumber1() ?>" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="number" name="pPhone2" value="<?php echo $contact_Setting->getPhoneNumber2() ?>" class="form-control shadow-none">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Email:</label>
                                                    <input type="email" name="pEmail" value="<?php echo $contact_Setting->getEmail() ?>" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Social Link:</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                                        <input type="text" name="pFb" value="<?php echo $contact_Setting->getFacebook() ?>" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                                        <input type="text" name="pInsg" value="<?php echo $contact_Setting->getInstagram() ?>" class="form-control shadow-none" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text"><i class="bi bi-tiktok"></i></span>
                                                        <input type="text" name="pTiktok" value="<?php echo $contact_Setting->getTiktok() ?>" class="form-control shadow-none" required>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-bold">Src iframe:</label>
                                                    <input type="text" name="pSrc_iframe" value="<?php echo $contact_Setting->getIframe() ?>" class="form-control shadow-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" name="action" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                                    <input type="submit" name="action" value="Changes" class="btn custom-bg text-white shadow-none">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- -------------------------------------------------------------------------------------------------------------- -->

                <!-- Management Team Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Management Team</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#team-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="row">
                            <?php foreach($members as $member) : ?>
                                <?php $path = ABOUT_IMG_PATH; ?>
                                <div class="col-md-2">
                                    <div class="card bg-dark text-white">
                                        <img src="<?php echo $path.$member->getPicture() ;?>" class="card-img" alt="...">
                                        <div class="card-img-overlay text-end">
                                            <button class="btn btn-danger btn-sm shadow-none">
                                                <i class="bi bi-trash"></i> 
                                                <a href="../controller/dashboard_controller.php?action=delete&&id=<?php echo $member->getTeamId() ?>" class="text-white text-decoration-none">
                                                    Delete</a>
                                            </button>
                                        </div>
                                        <p class="card-text text-center px-3 py-2"><?php echo $member->getName() ;?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>          
                        </div>
                    </div>
                </div>

                <!-- Management Team Modal -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="../controller/dashboard_controller.php" method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Member</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name:</label>
                                        <input type="text" name="memberName" class="form-control shadow-none" required>
                                    </div>
                                    <div class="col-md-12 p-0 mb-3">
                                        <label class="form-label fw-bold">Picture:</label>
                                        <input type="file" name="memberPicture" class="form-control shadow-none" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" name="action" onclick="memberName.value='',memberPicture.value=''" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
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