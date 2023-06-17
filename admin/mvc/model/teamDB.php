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

    public function findById($pTeamId){
        $query = "SELECT * FROM team_details WHERE teamID = $pTeamId LIMIT 1";
        $result = $this->db->select($query);
        if($result != false){
            $value = $result->fetch_assoc();
            $member = new Team($value['teamID'],$value['name'],$value['picture']);
            return $member;
        }else{
            return false;
        }
    }

    public function deleteMember($pteamId){
        $query = "DELETE FROM team_details WHERE teamID = $pteamId";
        $value = $this->db->delete($query);
        if($value != false){
            return true;
        } else{
            return false;
        }
    }

    public function insertMember($pname,$ppicture){
        $query = "INSERT INTO team_details (name,picture) VALUES('$pname','$ppicture')";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }

}
?>