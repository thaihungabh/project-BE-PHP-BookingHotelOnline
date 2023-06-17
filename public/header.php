<?php  
    require_once('../helper/helper.php');
    $helper = new Helper();
    $type_input = $helper->checkType_After_Login();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="../controller/userController.php">TN HOTEL</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link me-2" href="../controller/userController.php">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../controller/facilitiesController.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../controller/accommodationController.php">Accommodations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="#">Dining</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../controller/contactController.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="../controller/aboutController.php">About</a>
                </li>
            </ul>
            <div class="d-flex">
                <form action="../controller/loginController.php" method="POST">
                    <?php if($type_input):?>
                        <input type="text" value="Hello: <?php echo $_SESSION['customerName']?>" class="btn btn-success shadow-none" readonly>
                        <a href="../controller/bookingController.php?action=bkManagement&&customerId=<?php echo $_SESSION['customerId']?>" class="btn btn-success shadow-none">
                            Management Booking
                        </a>
                        <input type="submit" name="action" value="LogOut" class="btn btn-outline-dark shadow-none">
                    <?php else:?>
                        <input type="submit" name="action" value="Login" class="btn btn-outline-dark shadow-none me-2 me-lg-3">
                        <input type="submit" name="action" value="Register" class="btn btn-outline-dark shadow-none">
                    <?php endif;?>  
                </form>
            </div>
        </div>
    </div>
</nav>

<!-- Modal Login-->
<!-- <div class="modal fade" id="loginFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- Modal Register-->
<!-- <div class="modal fade" id="registerFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="../controller/registerController.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i> User Registration
                        </h5>
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
                            <input type="submit" name="action" value="REGISTER" class="btn btn-dark shadow-none">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div> -->
