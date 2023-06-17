<?php

    //Front-end purpose data[đích đến cuối -view-Source hiển thị trên view]
    define('SITE_URL','http://127.0.0.1/ProjectHotelApp/');
    define('ABOUT_IMG_PATH',SITE_URL.'admin/mvc/images/about/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'admin/mvc/images/carousel/');
    define('FACILITIES_IMG_PATH',SITE_URL.'admin/mvc/images/facilities/');
    define('ROOMS_IMG_PATH',SITE_URL.'admin/mvc/images/rooms/');

    //Data for back-end upload process[Thư mục gốc]
    define('Upload_Image_Path',$_SERVER['DOCUMENT_ROOT'].'/ProjectHotelApp/admin/mvc/images/');
    define('Customer_Folder','customer/');

?>



<?php
class Helper{
    //Clean input func
    public function filteration($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        return $data;
    }
    
    public function alert($type,$message){
        $bs_class = ($type == "success") ? "alert-success" : "alert-danger";
        echo <<<alert
        <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">$message</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        alert;
    }

    public function redirect($url){
        if(!empty($url))
        header("location: {$url}");
    }

    public function requriedLogin(){
        session_start();
        if( !(isset($_SESSION['customerLogin']) && $_SESSION['customerLogin'] == true) ){
            header("location: ../controller/loginController.php");
        }
        //Hàm thay thế SessionId hiện tại và cấp mới-Mỗi khi refesh cũng cấp mới lại sessionID luôn.
        session_regenerate_id(true);
    }

    public function checkType_After_Login(){
        session_start();
        if( isset($_SESSION['customerLogin']) && $_SESSION['customerLogin'] == true){
            return true;
        } 
        return false;
        
        //Hàm thay thế SessionId hiện tại và cấp mới-Mỗi khi refesh cũng cấp mới lại sessionID luôn.
        session_regenerate_id(true);
    }
}
?>