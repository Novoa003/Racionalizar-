<?php
class LoginController{
    private $_method;
    private $_data;
    
    function __construct($method, $data){
        $this->_method = $method;
        $this->_data = $data !=0 ? $data : "";
    }

    public function index(){
        switch ($this->_method) {
            case "POST":
                $credencials = UserModel::login($this->_data);
                $result=[];
                if (!empty($credencials)){
                    $result["credencials"] = $credencials;
                    
                }
                echo json_encode($result);
                return;
            default:
                $json = array(
                    "ruta:"=>"not found"
                );
                echo json_decode($json,true);
                return;    
        }
    }
}
?>