<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-FACILITIES</title>
    <?php require('public/links.php'); ?>
    <style>
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">

    <?php require('public/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Doloremque assumenda necessitatibus<br> hic expedita, quisquam 
            tenetur laborum quis similique rem sed.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach($facilities as $facility) : ?>
                <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                        <div class="d-flex align-items-center mb-2">
                            <img src="<?php echo FACILITIES_IMG_PATH.$facility->getIcon() ?>" width="40px">
                            <h5 class="m-0 ms-3"><?php echo $facility->getName()?></h5>
                        </div>
                        <p>
                            <?php echo $facility->getDescription()?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require('public/footer.php'); ?>

</body>
</html>