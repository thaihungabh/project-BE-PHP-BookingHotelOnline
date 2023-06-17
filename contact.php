<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL-CONTACT</title>
    <?php require('../public/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('../public/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
            Doloremque assumenda necessitatibus<br> hic expedita, quisquam 
            tenetur laborum quis similique rem sed.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <!-- Map -->
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact->getIframe()?>" loading="lazy"></iframe>
                    <h5>Address</h5>
                    <a href="<?php echo $contact->getGmap()?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact->getAddress()?>
                    </a>

                    <h5 class="mt-4">Call us</h5>
                    <a href="tel: <?php echo $contact->getPhoneNumber1()?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> <?php echo $contact->getPhoneNumber1()?>
                    </a>
                    <?php if($contact->getPhoneNumber2() != 0):?>    
                        <br>
                        <a href="tel: <?php echo $contact->getPhoneNumber2()?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> <?php echo $contact->getPhoneNumber2()?>
                        </a>
                    <?php endif;?>

                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact->getEmail() ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> <?php echo $contact->getEmail() ?>
                    </a>

                    <h5 class="mt-4">Follow us</h5>                   
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1"></i> <?php echo $contact->getFacebook() ?>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-instagram me-1"></i> <?php echo $contact->getInstagram() ?>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-tiktok me-1"></i> <?php echo $contact->getTiktok() ?>
                    </a>                    
                </div>
            </div>
            <!-- Message -->
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="../controller/contactController.php" method="POST">
                        <h5>Send A Message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name:</label>
                            <input type="text" name="pname" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email:</label>
                            <input type="email" name="pemail" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject:</label>
                            <input type="text" name="psubject" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message:</label>
                            <textarea name="pmessage" class="form-control shadow-none" rows="5" style="resize: none;" required></textarea>
                        </div>
                        <input type="submit" name="action" value="Send" class="btn text-white custom-bg mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require('../public/footer.php'); ?>

</body>
</html>