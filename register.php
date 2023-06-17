<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <?php require('../public/links.php'); ?>
   
</head>

<body class="bg-light">

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form action="../controller/loginController.php" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title d-flex align-items-center">
                                        <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                                    </h5>
                                    <!-- Reset in4 when user close modal-login -->
                                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                                        Note: Your details must match with your ID(CCCD, Passport, etc.)
                                        that will be required during check-in.
                                    </span>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6 ps-0 mb-3">
                                                <label class="form-label">Name:</label>
                                                <input type="text" name="user_name" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 p-0 mb-3">
                                                <label class="form-label">Email:</label>
                                                <input type="email" name="user_email" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 ps-0 mb-3">
                                                <label class="form-label">Phone Number:</label>
                                                <input type="number" name="user_phone" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-12 p-0 mb-3">
                                                <label class="form-label">Address:</label>
                                                <textarea name="user_address" class="form-control shadow-none" rows="1" required></textarea>
                                            </div>
                                            <div class="col-md-6 ps-0 mb-3">
                                                <label class="form-label">PostCode:</label>
                                                <input type="number" name="user_Postcode" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 p-0 mb-3">
                                                <label class="form-label">Date of birth:</label>
                                                <input type="date" name="user_birthDay" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 ps-0 mb-3">
                                                <label class="form-label">Password:</label>
                                                <input type="password" name="user_pass" class="form-control shadow-none" required>
                                            </div>
                                            <div class="col-md-6 ps-0 mb-3">
                                                <label class="form-label">Confirm Password:</label>
                                                <input type="password" name="user_confirmPass" class="form-control shadow-none" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center my-1">
                                        <input type="submit" name="action" value="Submit" class="btn btn-dark shadow-none">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>


    <!-- <?php require('../public/footer.php'); ?> -->

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

</body>

</html>