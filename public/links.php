<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="../css/common.css">

<?php 
    require_once('../model/settingDB.php');
    require_once('../helper/helper.php');

    $settingDb = new SettingDB();
    $getSetting = $settingDb->getGeneralSetting();
    if($getSetting->getShutdown() == 1){
        echo<<<alertbar
            <div class="bg-danger text-center p-2 fw-bold">
                Bookings are closed!
            </div
        alertbar;
    }


?>