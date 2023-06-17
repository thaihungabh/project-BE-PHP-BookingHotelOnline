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
    <title>ADMIN-FEATURES_FACILITIES</title>
    <?php require('../public/links.php'); ?>
</head>

<body class="bg-light">

    <?php require('../view/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">FEATURES & FACILITIES</h3>
                <!-- Features Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Features</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#features-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($features != null) : ?>
                                        <?php $count = 0 ?>
                                        <?php foreach ($features as $feature) : ?>
                                            <?php $count += 1 ?>
                                            <tr>
                                                <th scope="row"><?php echo $count ?></th>
                                                <td><?php echo $feature->getFeatureName()?></td>
                                                <td>                                                     
                                                    <a href='../controller/feature_controller.php?action=delete&&pid=<?php echo $feature->getFeatureId()?>' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <!-- Facility Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title m-0">Facilities</h5>
                            <button type="button" class="btn btn-dark btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#facility-s">
                                <i class="bi bi-plus-square"></i> Add
                            </button>
                        </div>
                        <div class="table-responsive-md" style="height: 350px; overflow-y: scroll;">
                            <table class="table table-hover hover">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" width="40%" >Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($facilities != null) : ?> 
                                        <?php 
                                            $i = 1;
                                            $path = FACILITIES_IMG_PATH;
                                        ?>
                                        <?php foreach ($facilities as $facility) : ?>
                                            <tr class="align-middle">
                                                <th scope="row"><?php echo $i ?></th>
                                                <td> <img src="<?php echo $path.$facility->getIcon() ?>" width="30px" ></td>
                                                <td><?php echo $facility->getName() ?></td>
                                                <td><?php echo $facility->getDescription() ?></td>
                                                <td>                                                     
                                                    <a href='../controller/feature_controller.php?action=removeFacilities&&pid=<?php echo $facility->getId() ?>' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>
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

    <!-- Features Modal -->
    <div class="modal fade" id="features-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="../controller/feature_controller.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name:</label>
                            <input type="text" name="featureName" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" name="action" value="Cancel" class="btn text-secondary shadow-none" data-bs-dismiss="modal">
                        <input type="submit" name="action" value="Ok" class="btn custom-bg text-white shadow-none">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Facility Modal -->
    <div class="modal fade" id="facility-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="../controller/feature_controller.php" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Name:</label>
                            <input type="text" name="facilityName" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Icon:</label>
                            <input type="file" name="facilityIcon" accept=".svg" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description:</label>
                            <textarea name="facilityDesc" class="form-control shadow-none" rows="3"></textarea>
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