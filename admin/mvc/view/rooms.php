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
                <h3 class="mb-4">ROOMS-SETTING</h3>
                <!-- Features Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#add-rooms">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover hover text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($features != null) : ?>
                                        <?php $i = 1 ?>
                                        <?php foreach ($rooms as $room) : ?>
                                            <tr>
                                                <th scope="row"><?php echo $i ?></th>
                                                <td><?php echo $room->getRName()?></td>
                                                <td><?php echo $room->getArea()?> m²</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-light text-dark">
                                                        Adult: <?php echo $room->getAdult()?>
                                                    </span><br>
                                                    <span class="badge rounded-pill bg-light text-dark">
                                                        Children: <?php echo $room->getChildren()?>
                                                    </span>
                                                </td>
                                                <td>$ <?php echo $room->getRPrice()?></td>
                                                <td><?php echo $room->getQuantity()?></td>
                                                <?php if($room->getStatus() == 1) :?>
                                                    <td>
                                                        <a href='../controller/rooms_controller.php?action=transActive&&roomId=<?php echo $room->getRId()?>' 
                                                           class='btn btn-sm btn-dark shadow-none'>Active</a>
                                                    </td>
                                                <?php else:?>
                                                    <td>
                                                        <a href='../controller/rooms_controller.php?action=transInactive&&roomId=<?php echo $room->getRId()?>' 
                                                           class='btn btn-sm btn-warning shadow-none'>Inactive</a>
                                                    </td>
                                                <?php endif;?>
                                                
                                                <td>
                                                    <a href='../controller/rooms_controller.php?action=edit&&roomId=<?php echo $room->getRId()?>' class="btn btn-primary btn-sm shadow-none">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a href='../controller/rooms_controller.php?action=addImg&&roomId=<?php echo $room->getRId()?>' class="btn btn-info btn-sm shadow-none">
                                                        <i class="bi bi-images"></i>
                                                    </a>
                                                    <a href='../controller/rooms_controller.php?action=removeRoom&&roomId=<?php echo $room->getRId()?>' class="btn btn-danger btn-sm shadow-none">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
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

    <!-- Add-Room Modal -->
    <div class="modal fade" id="add-rooms" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="../controller/rooms_controller.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name:</label>
                                <input type="text" name="roomName" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area:</label>
                                <input type="number" name="area" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price:</label>
                                <input type="number" name="price" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity:</label>
                                <input type="number" name="quantity" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Max-Adult:</label>
                                <input type="number" name="adult" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Max-Children:</label>
                                <input type="number" name="children" min="1" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features:</label>
                                <div class="row">
                                    <?php foreach($features as $feature) : ?>
                                        <div class="col-md-3 mb-1">
                                            <label>
                                                <input type="checkbox" name="features[]" value="<?php echo $feature->getFeatureId()?>" class="form-check-input shadow-none">
                                                <?php echo $feature->getFeatureName()?>
                                            </label>
                                        </div> 
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities:</label>
                                <div class="row">
                                    <?php foreach($facilities as $facility) : ?>
                                        <div class="col-md-3 mb-1">
                                            <label>
                                                <input type="checkbox" name="facilities[]" value="<?php echo $facility->getId()?>" class="form-check-input shadow-none">
                                                <?php echo $facility->getName()?>
                                            </label>
                                        </div> 
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description:</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" name="action" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                        <input type="submit" name="action" value="Submit" class="btn custom-bg text-white shadow-none">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require('../public/scripts.php'); ?>
</body>

</html>