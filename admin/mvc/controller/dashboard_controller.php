<?php
    require_once('../model/settingDB.php');
    require_once('../model/contactDB.php');
    require_once('../model/teamDB.php');
    require_once('../helper/helper.php');



    $action = filter_input(INPUT_GET, 'action');
    if(!isset($action)){
        $action = filter_input(INPUT_POST, 'action');
    }

    $settingDb = new SettingDB();
    $contactDb = new ContactDB();
    $teamDb = new TeamDB();
    $helper = new Helper();

    if($action == "settings"){
        $general_Setting = $settingDb->getGeneralSetting();
        $contact_Setting = $contactDb->getContact();
        $members = $teamDb->getAllMember();

        if($general_Setting != false && $contact_Setting != false && $members != false){
            include('../view/settings.php');
        }
    } else if($action == "Cancel"){
        $general_Setting = $settingDb->getGeneralSetting();
        $contact_Setting = $contactDb->getContact();
        $members = $teamDb->getAllMember();
        include('../view/settings.php');
    } else if($action == "Save"){
        $pSettingId = $_POST['setting_id'];
        $pSiteTitle = $_POST['site_title'];
        $pSiteAbout = $_POST['site_about'];

        $pSettingId = $helper->filteration($pSettingId);
        $pSiteTitle = $helper->filteration($pSiteTitle);
        $pSiteAbout = $helper->filteration($pSiteAbout);

        $rowUpdate = $settingDb->updateGeneralSetting($pSettingId, $pSiteTitle, $pSiteAbout);
        if($rowUpdate){
            $helper->alert("success","Update Successfully!");
            // View data after update
            $general_Setting = $settingDb->getGeneralSetting();  
            $contact_Setting = $contactDb->getContact();
            $members = $teamDb->getAllMember();
            include('../view/settings.php');
        }else{
            $helper->alert("Error","Update Failed!");
            include('../view/settings.php');
        }
    } else if($action == "Shutdown"){
        $pSettingId = $_POST['setting_id'];
        $pShutdown_vl = ($_POST['shutdown_vl']);
        
        if($pShutdown_vl == "on"){
            $pShutdown_vl = 1;
        }else if($pShutdown_vl == "off"){
            $pShutdown_vl = 0;
        }        

        $general_Setting = $settingDb->getGeneralSetting();
        $contact_Setting = $contactDb->getContact();
        $members = $teamDb->getAllMember();
        $shutdownUpd = $settingDb->updateShutdown($pSettingId,$pShutdown_vl);
        if($shutdownUpd){
            if($pShutdown_vl == 1){
                $helper->alert("success","Website Have Been Shutdown");
            }else{
                $helper->alert("success","Shutdown Mode Off");
            }
            include('../view/settings.php');
        }else{
            $helper->alert("Error","Shutdown Failed!");
            include('../view/settings.php');
        }
        
    } else if($action == "Changes"){
        $pContact_id = $_POST['pContact_id'];
        $pAddress = $_POST['pAddress'];
        $pGmap = $_POST['pGmap'];
        $pn1 = $_POST['pPhone1'];
        $pn2 = $_POST['pPhone2'];
        $pEmail = $_POST['pEmail'];
        $pFb = $_POST['pFb'];
        $pInsg = $_POST['pInsg'];
        $pTiktok = $_POST['pTiktok'];
        $pSrc_iframe = $_POST['pSrc_iframe'];

        $changeContact = $contactDb->updateContact($pContact_id,$pAddress,$pGmap,$pn1,$pn2,
                                        $pEmail,$pFb,$pInsg,$pTiktok,$pSrc_iframe);
        
        if($changeContact){
            $helper->alert("success","Save Changes!");
            $general_Setting = $settingDb->getGeneralSetting();
            $contact_Setting = $contactDb->getContact();
            $members = $teamDb->getAllMember();
            include('../view/settings.php');
        }else{
            $helper->alert("Error","Changes Failed!");
            include('../view/settings.php');
        }
    } else if($action == "Submit"){
        $memberName = $_POST['memberName'];
        $image = $_FILES['memberPicture'];        

        $memberName = $helper->filteration($memberName);

        $img_r = $helper->uploadImage($image,About_Folder);
        if($img_r == "Invalid Image Or Format"){
            $helper->alert("Error","Only Allow JPG & PNG!");
        } 
        else if($img_r == "Invalid Size"){
            $helper->alert("Error","Only Allow Size Less Than 2MB!");
        }
        else if($img_r == "Upload Failed"){
            $helper->alert("Error","Upload Failed!!");
        }
        else{
            $insertMember = $teamDb->insertMember($memberName,$img_r);
           if($insertMember){
            $helper->alert("success","Add Member Success!");
           }
           else{
            $helper->alert("Error","Add Falied!");
           }
        }
        $general_Setting = $settingDb->getGeneralSetting();
        $contact_Setting = $contactDb->getContact();
        $members = $teamDb->getAllMember();
        include('../view/settings.php');
    } else if($action == "delete"){
        $id = $_GET['id'];
        $member = $teamDb->findById($id);
        if($member != false){
            $imgName = $member->getPicture();
            if($helper->deleteImage($imgName,About_Folder)){
                $teamDb->deleteMember($id);
                $helper->alert("success","Member Removed!");
            }else{
                $helper->alert("Error","Server Down");
            }
        }else{
            $helper->alert("Error","Falied!");
        }
        $general_Setting = $settingDb->getGeneralSetting();
        $contact_Setting = $contactDb->getContact();
        $members = $teamDb->getAllMember();
        include('../view/settings.php');
    }



?>