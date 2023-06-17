<?php
class Setting{
    private $settingId, $siteTitle, $siteAbout, $shutdown;

    public function __construct($settingId, $siteTitle, $siteAbout, $shutdown){
        $this->settingId = $settingId;
        $this->siteTitle = $siteTitle;
        $this->siteAbout = $siteAbout; 
        $this->shutdown = $shutdown; 
     }

    public function getSettingId(){
        return $this->settingId;
    }
    public function setSettingId($value){
        $this->settingId = $value;
    }
    public function getSiteTitle(){
        return $this->siteTitle;
    }
    public function setSiteTitle($value){
        $this->siteTitle = $value;
    }
    public function getSiteAbout(){
        return $this->siteAbout;
    }
    public function setSiteAbout($value){
        $this->siteAbout = $value;
    }
    public function getShutdown(){
        return $this->shutdown;
    }
    public function setShutdown($value){
        $this->shutdown = $value;
    }
}



?>