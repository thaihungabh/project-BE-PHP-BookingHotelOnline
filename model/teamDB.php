<?php
include_once('../model/database.php');
include_once('../model/team.php');

?>

<?php
class TeamDB
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMember(){
        $query = "SELECT * FROM team_details";
        $result = $this->db->select($query);
        $members = array();
        if($result !=  false){
            while($row = $result->fetch_assoc()){
                $teamId = $row['teamID'];
                $name = $row['name'];
                $picture = $row['picture'];
                $member = new Team($teamId,$name,$picture);
                $members[] = $member;
            }
            return $members;
        }else{
            return false;
        }
    }
}
?>