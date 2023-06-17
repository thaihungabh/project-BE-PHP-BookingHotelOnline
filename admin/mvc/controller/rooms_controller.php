<?php
    require_once('../model/featureDB.php');
    require_once('../model/facilitiesDB.php');
    require_once('../model/roomDB.php');
    require_once('../helper/helper.php');
    
    

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    if($action == null){
        $action = "viewSettingRooms";
    }

    $featureDb = new FeatureDB();
    $facilitiesDb = new FacilitiesDB();
    $roomDb = new RoomDB();
    $helper = new Helper();

    if($action == "viewSettingRooms"){
        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();
        include('../view/rooms.php');

    } else if($action == "Submit"){
        $rName = $_POST['roomName'];
        $rArea = $_POST['area'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $adult = $_POST['adult'];
        $children = $_POST['children'];
        $desc = $_POST['desc'];

        // Array check-box
        $features = $_POST['features'];
        $facilities = $_POST['facilities'];
        

        $rName = $helper->filteration($rName);
        $desc = $helper->filteration($desc);

        $room = new Room();
        $room->setRName($rName);
        $room->setArea($rArea);
        $room->setRPrice($price);
        $room->setQuantity($quantity);
        $room->setAdult($adult);
        $room->setChildren($children);
        $room->setDesc($desc);

        // Hàm vừa thực hiện insert-vừa trả về id của room vừa được insert thành công
        $insert_row = $roomDb->insertRoom($room);
        
        // Insert room->insert lần lượt 2 bảng facilities&features
        if($insert_row != false){
            $roomId = $insert_row;
            // Duyệt check-box để insert data ở 2 table
            foreach($features as $featuresId){
                $addRoom_Features = $roomDb->insertRoom_Features($roomId,$featuresId);
            }
            foreach($facilities as $facilitiesId){
                $addRoom_Facilities = $roomDb->insertRoom_facilities($roomId,$facilitiesId);
            }
            if($addRoom_Features && $addRoom_Facilities){
                $helper->alert("success","Add Room Success");
            }

        } else{
            $helper->alert("Error","Server Down!");
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();

        include('../view/rooms.php');

    } else if($action == "transActive"){
        $roomId = $_GET['roomId'];
        $pStatus = 0;
        if($roomDb->updateStatusRoom($roomId,$pStatus)){
            $helper->alert("success","Changed Status");
        }else{
            $helper->alert("Error","Changed Status Fail");
        }
        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();

        include('../view/rooms.php');

    } else if($action == "transInactive"){
        $roomId = $_GET['roomId'];
        $pStatus = 1;
        if($roomDb->updateStatusRoom($roomId,$pStatus)){
            $helper->alert("success","Changed Status");
        }else{
            $helper->alert("Error","Changed Status Fail");
        }
        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();

        include('../view/rooms.php');
    } else if($action == "edit"){
        // Lấy các tham số cần thiết và điều hướng sang page Edit
        $roomId = $_GET['roomId'];
        $room = $roomDb->getRoomById($roomId);
        $roomFeatures = $roomDb->getFeature_roomById_room($roomId);
        $roomFacilities = $roomDb->getFacilities_roomById_room($roomId);

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        include('../view/editRoom.php');

    } else if($action == "Save"){

        $r_id = $_POST['roomId'];
        $r_name = $_POST['roomName'];
        $r_area = $_POST['area'];
        $r_price = $_POST['price'];
        $r_quantity = $_POST['quantity'];
        $r_adult = $_POST['adult'];
        $r_children = $_POST['children'];
        $r_desc = $_POST['desc'];
        // Array check-box
        $r_features = $_POST['features'];
        $r_facilities = $_POST['facilities'];

        // Reset list r_features& r_facilities.Prepare for update(insert again).
        $reset_room_features = $roomDb->deleteRoom_Features($r_id);
        $reset_room_facilities = $roomDb->deleteRoom_facilities($r_id);

        $r = new Room();
        $r->setRId($r_id);
        $r->setRName($r_name);
        $r->setArea($r_area);
        $r->setRPrice($r_price);
        $r->setQuantity($r_quantity);
        $r->setAdult($r_adult);
        $r->setChildren($r_children);
        $r->setDesc($r_desc);
        
        $update_room = $roomDb->updateRoom($r);
        if($update_room){
            if($reset_room_features && $reset_room_facilities){
                // Insert data lại cho hai bảng khi đã reset.
                foreach($r_features as $r_featuresId){
                    $addRoom_Features = $roomDb->insertRoom_Features($r_id, $r_featuresId);
                }
                foreach($r_facilities as $r_facilitiesId){
                    $addRoom_Facilities = $roomDb->insertRoom_facilities($r_id, $r_facilitiesId);
                }
            } else{
                $helper->alert("Error","Edit Room Features Or Facilities Fail");
            }
            
            $helper->alert("success","Room Edited");
        } else{
            $helper->alert("Error","Server Down");
        }

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();
        include('../view/rooms.php');

    } else if($action == "addImg"){
        // Lấy các tham số cần thiết và điều hướng sang page management Img of Room
        $roomId = $_GET['roomId'];


        $room = $roomDb->getRoomById($roomId);
        $rooms_img = $roomDb->getRoom_imageByRoomId($roomId);
        
        include('../view/managementRoomImg.php');

    } else if($action == "Add"){
        $roomId = $_POST['roomId'];
        $imgFiles = $_FILES['roomImg'];

        $img_r = $helper->uploadImage($imgFiles,Rooms_Folder);
        if($img_r == "Invalid Image Or Format"){
            $helper->alert("Error","Only Allow WEBP, JPEG, JPG OR PNG!");
        } 
        else if($img_r == "Invalid Size"){
            $helper->alert("Error","Only Allow Size Less Than 2MB!");
        }
        else if($img_r == "Upload Failed"){
            $helper->alert("Error","Upload Failed!!");
        }
        else{
            $insert_img_room = $roomDb->insertRoom_image($roomId,$img_r);
           if($insert_img_room){
            $helper->alert("success","Image Room Added!");
           }
           else{
            $helper->alert("Error","Add Falied!");
           }
        }

        $rooms_img = $roomDb->getRoom_imageByRoomId($roomId);
        $room = $roomDb->getRoomById($roomId);

        include('../view/managementRoomImg.php');

    } else if($action == "removeImg"){
        $srNo = $_GET['srNo'];
        $roomId = $_GET['roomId'];

        $rooms_img = $roomDb->getRoom_imageBySrNo($srNo);
        $imgName = $rooms_img->getImage();
        if($helper->deleteImage($imgName,Rooms_Folder)){
            if($roomDb->deleteRoom_images($srNo)){
                $helper->alert("success","Image Room Removed!");
            } else{
                $helper->alert("Error","Not yet Remove in Database");
            }
        } else{
            $helper->alert("Error","Server Down");
        }

        $rooms_img = $roomDb->getRoom_imageByRoomId($roomId);
        $room = $roomDb->getRoomById($roomId);

        include('../view/managementRoomImg.php');
    } else if($action == "changeStImg"){
        $srNo = $_GET['srNo'];
        $roomId = $_GET['roomId'];

        $room_image = $roomDb->getRoom_imageBySrNo( $srNo);
        if($room_image->getStatus() == 0){
            $change_status = $roomDb->updateStatusRoom_image($srNo,1);
            if($change_status){
                $helper->alert("success","Changed!");
            } else{
                $helper->alert("Error","Serverdown");
            }
        } else {
            $change_status = $roomDb->updateStatusRoom_image($srNo,0);
            if($change_status){
                $helper->alert("success","Changed!");
            } else{
                $helper->alert("Error","Serverdown");
            }
        }

        $rooms_img = $roomDb->getRoom_imageByRoomId($roomId);
        $room = $roomDb->getRoomById($roomId);

        include('../view/managementRoomImg.php');

    } else if($action == "removeRoom"){
        $roomId = $_GET['roomId'];

        $rooms_img = $roomDb->getRoom_imageByRoomId($roomId);
        if($rooms_img != false){
            $delete_in_server = false;
            foreach($rooms_img as $value){
                $imgName = $value->getImage();
                if($helper->deleteImage($imgName,Rooms_Folder)){
                    $delete_in_server = true;
                }
            }  
        }

        $rm_imgRoom = $roomDb->deleteRoom_imageByRoom_id($roomId);
        $rm_features = $roomDb->deleteRoom_Features($roomId);
        $rm_facilities = $roomDb->deleteRoom_facilities($roomId);

        if($rm_imgRoom && $delete_in_server && $rm_facilities && $rm_features){
            if($roomDb->updateRoomRemoved($roomId)){
                $helper->alert("success","Room Removed!");
            }
        } else{
            $helper->alert("Error","Removed Fail");
        }
        

        $features = $featureDb->getAllFeature();
        $facilities = $facilitiesDb->getAllFacilites();
        $rooms = $roomDb->getAllRoomSetting();
        include('../view/rooms.php');

    }
?>