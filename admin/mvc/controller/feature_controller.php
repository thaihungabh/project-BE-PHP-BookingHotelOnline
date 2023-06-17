<?php
    require_once('../model/featureDB.php');
    require_once('../model/facilitiesDB.php');
    require_once('../helper/helper.php');


    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }
    if($action == null){
        $action = "viewFeatures";
    }

    $featureDb = new FeatureDB();
    $facilitiesDb = new FacilitiesDB();
    $helper = new Helper();

    if($action == "viewFeatures"){

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/feature_facilities.php');

    } else if($action == "Ok"){
        $fName = $_POST['featureName'];
        $fName = $helper->filteration($fName);
        if($featureDb->addFeature($fName)){
            $helper->alert("success","Add Feature Success!");
        } else{
            $helper->alert("Error","Server Down!");
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/feature_facilities.php');

    } else if($action == "delete"){
        $fId = $_GET['pid'];
        if($featureDb->deleteFeature($fId)){
            $helper->alert("success","Feature Deleted!");
        } else{
            $helper->alert("Error","Room Added This Feature. Remove This In Room First!");
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/feature_facilities.php');

    } else if($action == "Submit"){
        $facilityName = $_POST['facilityName'];
        $icon = $_FILES['facilityIcon']; 
        $facilityDesc = $_POST['facilityDesc'];


        $facilityName = $helper->filteration($facilityName);
        $facilityDesc = $helper->filteration($facilityDesc);

        $img_r = $helper->uploadSVGImage($icon,Facilities_Folder);
        if($img_r == "Invalid Image Or Format"){
            $helper->alert("Error","Only SVG Allow!");
        } 
        else if($img_r == "Invalid Size"){
            $helper->alert("Error","Only Allow Size Less Than 1MB!");
        }
        else if($img_r == "Upload Failed"){
            $helper->alert("Error","Upload Failed!!");
        }
        else{
            $insertMember = $facilitiesDb->insertFacilites($img_r,$facilityName,$facilityDesc);
           if($insertMember){
            $helper->alert("success","Add Facilities Success!");
           }
           else{
            $helper->alert("Error","Add Falied!");
           }
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/feature_facilities.php');

    } else if($action == "removeFacilities"){
        $pId = $_GET['pid'];

        $facility = $facilitiesDb->getFacilitiesById($pId);
        $iconName = $facility->getIcon();
        if($facilitiesDb->deleteFacilites($pId)){
            if($helper->deleteImage($iconName,Facilities_Folder)){
                $helper->alert("success","Facilities Removed!");
            }else{
                $helper->alert("Error","Remove Icon Fail!");
            }
        }else{
            $helper->alert("Error","Room Added This Facilities. Remove This In Room First!");
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/feature_facilities.php');
    }

?>