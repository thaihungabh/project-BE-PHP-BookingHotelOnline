<?php
    require_once('../model/teamDB.php');
    require_once('../helper/helper.php');


    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $teamDb = new TeamDB();
    if($action = null){
        $action = "viewTeam";
    }
    if($action = "viewTeam"){
        $members = $teamDb->getAllMember();
        include('../about.php');
    }

?>