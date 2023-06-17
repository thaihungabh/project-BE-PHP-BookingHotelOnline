<?php
include_once('../model/database.php');
include_once('../model/contact.php');

?>

<?php
class ContactDB
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getContact()
    {
        $query = "SELECT * FROM contacts WHERE contact_id = 1";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();

            $contactId = $value['contact_id'];
            $address = $value['address'];
            $gmap = $value['gmap'];
            $pn1 = $value['phoneNumber1'];
            $pn2 = $value['phoneNumber2'];
            $email = $value['email'];
            $fb = $value['facebook'];
            $insg = $value['instagram'];
            $tiktok = $value['tiktok'];
            $src_iframe = $value['iframe'];
            $contact = new Contact($contactId,$address,$gmap,$pn1,$pn2,$email,$fb,$insg,$tiktok,$src_iframe);
            
            return $contact;
        } else {
            return false;
        }
    }   
}
?>