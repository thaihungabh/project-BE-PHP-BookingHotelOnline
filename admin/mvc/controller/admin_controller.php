<?php
    require_once('../model/adminDB.php');
    include_once('../helper/helper.php');
    
$action = filter_input(INPUT_GET, 'action');
if(!isset($action)){
    $action = filter_input(INPUT_POST, 'action');
}

if($action == null){
    include('../view/adminLogin.php');
}

$helper = new Helper();
if($action == "login"){
    $adminDB = new AdminDB();
    $admin_name = $_POST['admin_name'];
    $admin_pass = $_POST['admin_pass'];

    $admin_name = $helper->filteration($admin_name);
    $admin_pass = $helper->filteration($admin_pass);

    $check_login = $adminDB->getLoginAdmin($admin_name,$admin_pass);
    if($check_login != false ){
        session_start();
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $check_login['adminId'];
        $_SESSION['adminName'] = $check_login['adminName'];
        $helper->redirect('../view/dashboard.php');
    } else {
        $helper->alert("Error","Login Failed - Invalid Credentials!");
        include('../view/adminLogin.php');
    }
}
if($action == "logout"){
    session_start();
    session_destroy();
    $helper->redirect('../view/index.php');
}
?>