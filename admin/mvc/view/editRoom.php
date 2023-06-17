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
    <title>ADMIN-ROOMS</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">EDIT ROOM</h3>
                <!-- Edit-Room Modal -->            
                    <div class="modal-dialog modal-lg">
                        <form action="../controller/rooms_controller.php" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Room</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="hidden" name="roomId" value="<?php echo $room->getRId()?>">
                                            <label class="form-label fw-bold">Name:</label>
                                            <input type="text" name="roomName" value="<?php echo $room->getRName()?>" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Area:</label>
                                            <input type="number" name="area" value="<?php echo $room->getArea()?>" min="1" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Price:</label>
                                            <input type="number" name="price" value="<?php echo $room->getRPrice()?>" min="1" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Quantity:</label>
                                            <input type="number" name="quantity" value="<?php echo $room->getQuantity()?>" min="1" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Max-Adult:</label>
                                            <input type="number" name="adult" value="<?php echo $room->getAdult()?>" min="1" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label fw-bold">Max-Children:</label>
                                            <input type="number" name="children" value="<?php echo $room->getChildren()?>" min="1" class="form-control shadow-none" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Features:</label>
                                            <div class="row">
                                                <?php foreach ($features as $feature) : ?>
                                                    <?php $check = "";?>
                                                    <?php if($roomFeatures != null) :?>
                                                        <?php foreach($roomFeatures as $r_features) :?>
                                                            <?php 
                                                                if($feature->getFeatureId() == $r_features->getFeaturesId()){
                                                                    $check = "checked";
                                                                    break;
                                                                }
                                                            ?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <div class="col-md-3 mb-1">
                                                        <label>
                                                            <input type="checkbox" <?php echo $check?> name="features[]" value="<?php echo $feature->getFeatureId() ?>" class="form-check-input shadow-none">
                                                            <?php echo $feature->getFeatureName() ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Facilities:</label>
                                            <div class="row">
                                                <?php foreach ($facilities as $facility) : ?>
                                                    <?php $check=""?>
                                                    <?php if($roomFacilities != null) :?>
                                                        <?php foreach($roomFacilities as $r_facilities) :?>
                                                            <?php
                                                                if($facility->getId() == $r_facilities->getFacilitiesId()){
                                                                    $check = "checked";
                                                                    break;
                                                                }  
                                                            ?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    <div class="col-md-3 mb-1">
                                                        <label>
                                                            <input type="checkbox" <?php echo $check?> name="facilities[]" value="<?php echo $facility->getId() ?>" class="form-check-input shadow-none">
                                                            <?php echo $facility->getName() ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label fw-bold">Description:</label>
                                            <textarea name="desc" rows="4" class="form-control shadow-none" required><?php echo $room->getDesc()?></textarea> 
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="action" value="Save" class="btn custom-bg text-white shadow-none">
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>

    <?php require('../public/scripts.php'); ?>
</body>

</html>