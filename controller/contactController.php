<?php
    require_once('../model/contactDB.php');
    require_once('../model/messageDB.php');
    require_once('../helper/helper.php');



    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $contactDb = new ContactDB();
    $messageDb = new MessageDB();
    $helper = new Helper();


    if($action == null){
        $action = "contact";
    }
    if($action == "contact"){
        $contact = $contactDb->getContact();
        include('../contact.php');
    } else if($action == "Send"){
        $pName = $_POST['pname'];
        $pEmail = $_POST['pemail'];
        $pSubject = $_POST['psubject'];
        $pMessage = $_POST['pmessage'];

        $pName = $helper->filteration($pName);
        $pEmail = $helper->filteration($pEmail);
        $pSubject = $helper->filteration($pSubject);
        $pMessage = $helper->filteration($pMessage);
        $insertMessage = $messageDb->insertMessage($pName,$pEmail,$pSubject,$pMessage);
        if($insertMessage){
            $helper->alert("success","Message sent!");
        }else{
            $helper->alert("Error","Server down, Try again");
        }
        $contact = $contactDb->getContact();
        include('../contact.php');
    }

?>