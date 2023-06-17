<?php
 include_once('../helper/configdb.php');
?>
<?php
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $connect;
    public $error;

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        $this->connect = new mysqli($this->host, $this->user, $this->pass, 
                                                                    $this->dbname);
        if(!$this->connect){
            $this->error = "Connection Fail".$this->connect->connect_error;
            return false;
        }
    }

    //Select data
    // Note: __LINE__ đc gọi là hằng số ma thuật (constant magic)
    // chúng giống như những hằng số khác nhưng có thể thay đổi giá trị tùy theo ngữ cảnh
    public function select($query){
        $result = $this->connect->query($query) or
         die($this->connect->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        } else{
            return false;
        }
    }

    //Insert data
    public function insert($query){
        $insert_row = $this->connect->query($query) or
         die($this->connect->error.__LINE__);
        if($insert_row){
            return $insert_row;
        } else{
            return false;
        }
    }

    // Hàm vừa thực hiện insert vừa trả về id của query vừa được insert thành công
    public function insertReturnId($query){
        $insert_row = $this->connect->query($query) or
         die($this->connect->error.__LINE__);
        if($insert_row){
            return $this->connect->insert_id;
        } else{
            return false;
        }
    }

    

    //Update data
    public function update($query){
        $update_row = $this->connect->query($query) or
         die($this->connect->error.__LINE__);
        if($update_row){
            return $update_row;
        } else{
            return false;
        }
    }

    //Delete data
    public function delete($query){
        $delete_row = $this->connect->query($query) or
         die($this->connect->error.__LINE__);
        if($delete_row){
            return $delete_row;
        } else{
            return false;
        }

    }

}
?>