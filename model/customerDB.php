<?php
include_once('../model/database.php');
include_once('../model/customer.php');

?>

<?php
class CustomerDB
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLoginCustomer($user_email,$user_pass){
        
        $user_email = mysqli_real_escape_string($this->db->connect, $user_email);
        $user_pass = mysqli_real_escape_string($this->db->connect, $user_pass);

        if(empty($user_email) || empty($user_pass)){
            return false;
        } else{
            $query = "SELECT * FROM customer WHERE email = '$user_email' 
                                                AND password = '$user_pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result != false){
                $value = $result->fetch_assoc();
                return $value; 
            } else{
                return false;
            }
        }
    }

    public function getAllCustomer()
    {
        $query = "SELECT * FROM customer";
        $result = $this->db->select($query);
        $customers = array();
        if ($result != false) {
            while($value = $result->fetch_assoc()){
                $customer = new Customer();

                $customer->setCustomer_id($value['customerId']);
                $customer->setName($value['name']);
                $customer->setEmail($value['email']);
                $customer->setP_number($value['phone_number']);
                $customer->setAddress($value['address']);
                $customer->setPostCode($value['postcode']);
                $customer->setBirthDay($value['birthday']);
                $customer->setPass($value['password']);
                
                $customers[] = $customer;
            }  
            return $customers;
        } else {
            return false;
        }
    }

    public function getCustomerById($customer_id){
        $query = "SELECT * FROM customer WHERE customerId = $customer_id";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
                $customer = new Customer();

                $customer->setCustomer_id($value['customerId']);
                $customer->setName($value['name']);
                $customer->setEmail($value['email']);
                $customer->setP_number($value['phone_number']);
                $customer->setAddress($value['address']);
                $customer->setPostCode($value['postcode']);
                $customer->setBirthDay($value['birthday']);
                $customer->setPass($value['password']);
             
            return $customer;
        } else {
            return false;
        }
    }

    public function insertCustomer(Customer $customer){
        $name = $customer->getName();
        $email = $customer->getEmail();
        $phone = $customer->getP_number();
        $address = $customer->getAddress();
        $postCode = $customer->getPostCode();
        $dob = $customer->getBirthDay();
        $pass = $customer->getPass();

        $query = "INSERT INTO customer (name,email,phone_number,address,postcode,birthday,password) 
                    VALUES('$name', '$email', '$phone', '$address', $postCode, '$dob', '$pass')";
        $value = $this->db->insert($query);
        if($value != false){
            return true;
        }else{
            return false;
        }
    }
}
?>