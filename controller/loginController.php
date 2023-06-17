<?php
    require_once('../model/customerDB.php');
    require_once('../helper/helper.php');

    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $customerDb = new CustomerDB();
    $helper = new Helper();

    if($action == ""){
        $action = "Login";
    }

    if($action == "Register"){
        include('../register.php');

    } else if($action == "Submit"){
        $u_name = $_POST['user_name'];
        $u_email = $_POST['user_email'];
        $u_phone = $_POST['user_phone'];
        $u_address = $_POST['user_address'];
        $u_Postcode = $_POST['user_Postcode'];
        $u_birthDay = $_POST['user_birthDay'];
        $u_pass = $_POST['user_pass'];
        $u_confirmPass = $_POST['user_confirmPass'];
        
        if($u_pass != $u_confirmPass){
            $helper->alert("Error","Confirm Password Not Match");
            exit;
        }

        $customers = $customerDb->getAllCustomer();
        $check = false;
        foreach($customers as $customer){
            if($customer->getEmail() == $u_email || $customer->getP_number() == $u_phone){
                $check = true;
                break;
            }
        }
        if($check){
            $helper->alert("Error","Email Or Phone Number Already Exists");
        } else{
            $customer = new Customer();
            $customer->setName($u_name);
            $customer->setEmail($u_email);
            $customer->setP_number($u_phone);
            $customer->setAddress($u_address);
            $customer->setPostCode($u_Postcode);
            $customer->setBirthDay($u_birthDay);
            $customer->setPass($u_pass);
    
            $insert_customer = $customerDb->insertCustomer($customer);
            if($insert_customer){
                $helper->redirect('../controller/loginController.php?action=Login');
            }else{
                $helper->alert("Error","Server Down");
                include('../test.php');
            }
        }
        
    } else if($action == "Login"){
        include('../login.php');
    } else if($action == "OK"){
        $user_email = $_POST['login_email'];
        $user_pass = $_POST['login_pass'];

        $user_email = $helper->filteration($user_email);
        $user_pass = $helper->filteration($user_pass);
        $check_login = $customerDb->getLoginCustomer($user_email,$user_pass);
        if($check_login != false ){
            session_start();
            $_SESSION['customerLogin'] = true;
            $_SESSION['customerId'] = $check_login['customerId'];
            $_SESSION['customerName'] = $check_login['name'];
            $helper->redirect('../controller/userController.php');
        } else {
            $helper->alert("Error","Login Failed - Invalid Credentials!");
            include('../login.php');
        }
    }
    else if($action == "LogOut"){
        session_start();
        session_destroy();
        $helper->redirect('../controller/userController.php');
    }

?>