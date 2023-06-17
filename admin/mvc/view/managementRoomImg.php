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
    <title>ADMIN-ROOM-IMG</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">MANAGEMENT ROOM IMG</h3>
                <!-- Management IMG-Room Modal -->
                <div class="modal-dialog modal-lg">
                    <form action="../controller/rooms_controller.php" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo  $room->getRName()?></h5>
                            </div>
                            <div class="modal-body">
                                <div class="border-bottom border-3 pb-3 mb-3">
                                    <label class="form-label fw-bold">Add Image</label>
                                    <input type="file" name="roomImg" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none mb-3" required>

                                    <div class="modal-footer">
                                        <input type="hidden" name="roomId" value="<?php echo  $room->getRId()?>">
                                        <input type="submit" name="action" value="Add" class="btn custom-bg text-white shadow-none">
                                    </div>
                                </div>
                    </form>
                                <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                                    <table class="table table-hover hover text-center">
                                        <thead class="sticky-top">
                                            <tr class="bg-dark text-light">
                                                <th scope="col" width="60%">Image</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($rooms_img != null) :?>
                                                <?php $path = ROOMS_IMG_PATH?>
                                                <?php foreach($rooms_img as $img) :?>
                                                    <tr class="align-middle">
                                                        <td><img src="<?php echo $path.$img->getImage()?>" class="img-fluid"></td>
                                                        <td>
                                                            <?php $btn = "btn-secondary" ?>
                                                            <?php if($img->getStatus() == 1) :?>
                                                                <?php $btn = "btn-success" ?>                                                               
                                                            <?php endif;?>
                                                            <a href='../controller/rooms_controller.php?action=changeStImg&&srNo=<?php echo $img->getSrNo()?>&&roomId=<?php echo $img->getRoomId()?>' class="btn <?php echo $btn?> btn-sm shadow-none">
                                                                <i class="bi bi-check"></i>                                                                
                                                            </a>                                                            
                                                        </td>
                                                        <td>
                                                            <a href='../controller/rooms_controller.php?action=removeImg&&srNo=<?php echo $img->getSrNo()?>&&roomId=<?php echo $img->getRoomId()?>' class="btn btn-danger btn-sm shadow-none">
                                                                <i class="bi bi-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>
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