<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky- top">
    <h3 class="mb-0 h-font">MANAGEMENT PANEL</h3>
    <a href="../controller/admin_controller.php?action=logout" class="btn btn-light btn-sm">LOGOUT</a>
</div>

<div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2 text-light">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../view/dashboard.php"><i class="bi bi-bar-chart-line-fill"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/rooms_controller.php"><i class="bi bi-hospital-fill"></i> Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/booking_controller.php"><i class="bi bi-wallet2"></i> Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/carousel_controller.php"><i class="bi bi-card-image"></i> Carousel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/feature_controller.php"><i class="bi bi-diamond-half"></i> Features & Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/message_controller.php"><i class="bi bi-envelope-fill"></i> Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../controller/dashboard_controller.php?action=settings"><i class="bi bi-gear-fill"></i> Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>