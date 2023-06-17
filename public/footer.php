<?php
    require_once('../model/contactDB.php');
    $contactDb = new ContactDB();
    $contact = $contactDb->getContact();
?>

<div class="container-fluid bg-white mt-5">
    <div class="row">
        <div class="col-lg-4 p-4">
            <h3 class="h-font fw-bold fs-3 mb-2">TN HOTEL</h3>
            <p>
                The Internet is rapidly becoming the dominant user decision making tool for the hotel accommodation purchase process.
                This paper critically reviews online hotel accommodation purchase processes literature and proposes
                a literature framework analysis of online hotel accommodation process factors.
                The objective of this research is to propose a statistically based framework based on clickstream/log
                file analytics of both the internal and external influencers of the process.
            </p>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Links</h5>
            <a href="../controller/userController.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
            <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
            <a href="../controller/facilitiesController.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
            <a href="../controller/contactController.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
            <a href="../controller/aboutController.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a>
        </div>
        <div class="col-lg-4 p-4">
            <h5 class="mb-3">Follow us</h5>
            <a href="<?php echo $contact->getFacebook()?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-facebook me-1"></i> <?php echo $contact->getFacebook()?>
            </a><br>
            <a href="<?php echo $contact->getInstagram()?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-instagram me-1"></i> <?php echo $contact->getInstagram()?>
            </a><br>
            <a href="<?php echo $contact->getTiktok()?>" class="d-inline-block text-dark text-decoration-none mb-2">
                <i class="bi bi-tiktok me-1"></i> <?php echo $contact->getTiktok()?>
            </a>
        </div>
    </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Project PHP >>Developed By T.H<< </h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>