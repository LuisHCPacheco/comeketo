<?php

class conexao extends mysqli {

    var $host = "162.221.185.250";
    var $user = "comeketo_luis";
    var $pass = "paçoca123";
    var $db = "comeketo_comeketo";

    public function __construct()  {
        try {
            parent::__construct($this->host, $this->user, $this->pass, $this->db);
            if (!$this) {
                throw new Exception("Erro ao conectar!");
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function __destruct() {
        if (mysqli_connect_errno() == 0) {
            $this->close();
        }
    }

}

?>