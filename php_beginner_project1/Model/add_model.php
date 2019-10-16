<?php

class AddModel
{
    private $username;
    function AddModel($username)
    {  //constructor
        $this->username = $username;
    }

    function get_username()
    {        //getter
        return $this->username;
    }

    function set_username($username) {//setter
        return $this->username=$username;
    }
}

?>





