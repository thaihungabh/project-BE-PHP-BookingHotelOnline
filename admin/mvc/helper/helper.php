<?php

    //Front-end purpose data[đích đến cuối -view-Source hiển thị trên view]
    define('SITE_URL','http://127.0.0.1/ProjectHotelApp/');
    define('ABOUT_IMG_PATH',SITE_URL.'admin/mvc/images/about/');
    define('CAROUSEL_IMG_PATH',SITE_URL.'admin/mvc/images/carousel/');
    define('FACILITIES_IMG_PATH',SITE_URL.'admin/mvc/images/facilities/');
    define('ROOMS_IMG_PATH',SITE_URL.'admin/mvc/images/rooms/');

    //Data for back-end upload process[Thư mục gốc]
    define('Upload_Image_Path',$_SERVER['DOCUMENT_ROOT'].'/ProjectHotelApp/admin/mvc/images/');
    define('About_Folder','about/');
    define('Carousel_Folder','carousel/');
    define('Facilities_Folder','facilities/');
    define('Rooms_Folder','rooms/');


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

    public function requriedAdLogin(){
        session_start();
        if( !(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true) ){
            header("location: index.php");
        }
        //Hàm thay thế SessionId hiện tại và cấp mới-Mỗi khi refesh cũng cấp mới lại sessionID luôn.
        session_regenerate_id(true);
    }

//Upload work with files img
    public function uploadImage($image,$folder){
        $allowtypes = array('jpg', 'png', 'jpeg');
        //Lấy đuôi của file để xử lý
        $imageFileType = pathinfo($image['name'],PATHINFO_EXTENSION);
        
        if(!in_array($imageFileType,$allowtypes)){
            return "Invalid Image Or Format";
        }
        elseif (($image['size']/(1024*1024)) > 2) {
            return "Invalid Size"; // Size > 2mb
        }
        else{            
            $rname = 'IMAGE_'.random_int(11111,99999).".$imageFileType"; //EX: IMAGE_87265.png

            $image_path = Upload_Image_Path.$folder.$rname;

        // Sau khi xử lý File-Image từ người upload thì lưu nơi đường dẫn mới.
        // Đường dẫn đc chỉ định ở đây nằm trong>>$_SERVER['DOCUMENT_ROOT']<< là httdocs/[projectName]
        // Hàm move_uploaded_file() Dùng Dể Di Chuyển Tập Tin Dược Tải Lên Vào Một Nơi Dược Chỉ Dịnh.
        //Di chuyển thành công thì trả lại cái tên ảnh sau khi random name để lưu trong SQL
            if(move_uploaded_file($image['tmp_name'],$image_path)){
                return $rname;
            }else{
                return "Upload Failed";
            }
        }
    }

//Delete work with imgName
    public function deleteImage($imgName,$folder){
        if(unlink(Upload_Image_Path.$folder.$imgName)){
            return true;
        }else{
            return false;
        }
    }
    
//Upload Icon
    public function uploadSVGImage($image,$folder){
        $allowtypes = array('svg');
        $imageFileType = pathinfo($image['name'],PATHINFO_EXTENSION);
        
        if(!in_array($imageFileType,$allowtypes)){
            return "Invalid Image Or Format";
        }
        elseif (($image['size']/(1024*1024)) > 1) {
            return "Invalid Size"; // Size > 1mb
        }
        else{            
            $rname = 'IMAGE_'.random_int(11111,99999).".$imageFileType"; //EX: IMAGE_87265.png

            $image_path = Upload_Image_Path.$folder.$rname;

            if(move_uploaded_file($image['tmp_name'],$image_path)){
                return $rname;
            }else{
                return "Upload Failed";
            }
        }
    }
}
?>