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
    <title>ADMIN-MESSAGE</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">MESSAGE</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="../controller/message_controller.php?action=seenAll" class="btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all"></i> Mark all read</a>
                            <a href="../controller/message_controller.php?action=deleteAll" class="btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash"></i> Delete all</a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($messages != null) :?>
                                        <?php $count = 0 ?>
                                        <?php foreach ($messages as $message) : ?>
                                            <?php $count +=1 ?>
                                            <tr>
                                                <th scope="row"><?php echo $count?></th>
                                                <td><?php echo $message->getName() ?></td>
                                                <td><?php echo $message->getEmail() ?></td>
                                                <td><?php echo $message->getSubject() ?></td>
                                                <td><?php echo $message->getMessage() ?></td>
                                                <td><?php echo $message->getDate() ?></td>
                                                <td>
                                                    <?php if($message->getSeen() != 1) :?>
                                                        <a href ='../controller/message_controller.php?action=seen&&pid=<?php echo $message->getId() ?>'  class ='btn btn-sm rounded-pill btn-primary'>Mark as read</a>
                                                    <?php endif; ?>
                                                    <a href ='../controller/message_controller.php?action=delete&&pid=<?php echo $message->getId() ?>'  class ='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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