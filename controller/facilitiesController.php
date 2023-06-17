<?php
    require_once('../model/facilitiesDB.php');
    require_once('../helper/helper.php');



    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $facilitiesDb = new FacilitiesDB();

    if($action == null){
        $action = "viewFacilities";
    }
    if($action == "viewFacilities"){
        $facilities = $facilitiesDb->getAllFacilites();
        include('../facilities.php');
    }

?>