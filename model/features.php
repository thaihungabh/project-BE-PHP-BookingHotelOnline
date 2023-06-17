<?php
class Features{
    private $featureId,$featureName;

    public function __construct($featureId, $featureName){
        $this->featureId = $featureId;
        $this->featureName = $featureName;
    }

    public function getFeatureId(){
        return $this->featureId;
    }
    public function setFeatureId($value){
        $this->featureId = $value;
    }
    public function getFeatureName(){
        return $this->featureName;
    }
    public function setFeatureName($value){
        $this->featureName = $value;
    }
}
?>