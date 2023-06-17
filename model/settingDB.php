<?php
     include_once('../model/database.php');
     include_once('../model/setting.php');

?>

<?php
class SettingDB{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getGeneralSetting(){
        $query = "SELECT * FROM settings WHERE settingID = 1";
        $result = $this->db->select($query);
        if($result != false){

            $value = $result->fetch_assoc();

            $settingId = $value['settingID'];
            $siteTitle = $value['siteTitle'];
            $siteAbout = $value['siteAbout'];
            $shutdown = $value['shutdown'];
            $general_setting = new Setting($settingId, $siteTitle, $siteAbout, $shutdown);
            return $general_setting;
        } else{
            return false;
        }
    }
}

?>