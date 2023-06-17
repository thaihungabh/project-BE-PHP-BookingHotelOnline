<?php
    include_once('../model/database.php');
    // include_once('../helper/helper.php');
    include_once('../model/admin.php');
    
?>

<?php
class AdminDB{
    private $db;
    // private $fm;

    public function __construct()
    {
        $this->db = new Database();
        // $this->fm = new Helper();
    }

    public function getLoginAdmin($admin_name,$admin_pass){
        // $admin_name = $this->fm->filteration($admin_name);
        // $admin_pass = $this->fm->filteration($admin_pass);

        //Lọc dữ liệu lần cuối với hàm below trước khi truy vấn.
        //Hàm giúp loại bỏ ký tự đặc biệt nếu có.
        $admin_name = mysqli_real_escape_string($this->db->connect, $admin_name);
        $admin_pass = mysqli_real_escape_string($this->db->connect, $admin_pass);

        if(empty($admin_name) || empty($admin_pass)){
            return false;
        } else{
            $query = "SELECT * FROM admin WHERE adminName = '$admin_name' 
                                                AND adminPassword = '$admin_pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                return $value; 
            } else{
                return false;
            }
        }
    }
}
?>