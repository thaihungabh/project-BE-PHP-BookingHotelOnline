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
    <title>ADMIN-ADD_BOOKING</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">ADD-BOOKING</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-start mb-4">
                            <form action="../controller/addBooking_controller.php" method="post">
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
                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover hover text-center">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity-Current</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>                                        
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($rooms != null) : ?>
                                        <?php $i = 1 ?>
                                        <?php foreach ($rooms as $room) : ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i ?></th>
                                                    <td><?php echo $room->getRName() ?></td>
                                                    <td><?php echo $room->getQuantity() ?></td>
                                                    <td><?php echo $room->getArea() ?> m²</td>
                                                    <td>
                                                        <span class="badge rounded-pill bg-light text-dark">
                                                            Adult: <?php echo $room->getAdult() ?>
                                                        </span><br>
                                                        <span class="badge rounded-pill bg-light text-dark">
                                                            Children: <?php echo $room->getChildren() ?>
                                                        </span>
                                                    </td>
                                                    <td>$ <?php echo $room->getRPrice() ?></td>                                                
                                                    <td>
                                                        <a href='../controller/addBooking_controller.php?action=book&&roomId=<?php echo $room->getRId() ?>' class="btn btn-primary btn-sm shadow-none">
                                                            <i class="bi bi-pencil-square"></i> Book
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

    <?php require('../public/scripts.php'); ?>
</body>

</html>