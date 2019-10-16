<?php

class UserModel {
    private $username;

    function UserModel($username) {  //constructor
        $this->username = $username;
    }

    function get_username() {        //getter
        return $this->username;
    }

    function set_username($username) {//setter
        return $this->username=$username;
    }
}

?>





