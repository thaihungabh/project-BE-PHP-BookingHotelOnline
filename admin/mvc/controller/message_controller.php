<?php
    require_once('../model/messageDB.php');
    require_once('../helper/helper.php');




    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }
    if($action == null){
        $action = "viewMessageList";
    }

    $messageDb = new MessageDB();
    $helper = new Helper();

    if($action == "viewMessageList"){
        $messages = $messageDb->getAllMessage();
        include('../view/message.php');
    } else if($action == "seen"){
        $pId = $_GET['pid'];
        if($messageDb->updateMarkAsRead($pId)){
            $helper->alert("success","Message Read!");
        }else{
            $helper->alert("Error","Server down");
        }
        $messages = $messageDb->getAllMessage();
        include('../view/message.php');
    } else if($action == "delete"){
        $pId = $_GET['pid'];
        if($messageDb->deleteMessage($pId)){
            $helper->alert("success","Message Deleted!");
        }else{
            $helper->alert("Error","Server down");
        }
        $messages = $messageDb->getAllMessage();
        include('../view/message.php');
    } else if($action == "seenAll"){
        if($messageDb->upAllMarkAsRead()){
            $helper->alert("success","All Message read!");
        } else{
            $helper->alert("Error","Server Down!");
        }
        $messages = $messageDb->getAllMessage();
        include('../view/message.php');
    } else if($action == "deleteAll"){
        if($messageDb->deleteAllMessage()){
            $helper->alert("success","Message Null");
        } else{
            $helper->alert("Error","Serverdown");
        }
        $messages = $messageDb->getAllMessage();
        include('../view/message.php');
    }

?>