<?php

class dbconnection
{

    //public $host = "localhost:3307";
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db = "laundrymgt";

    public function connection()
    {
        //Connection string
        $con = new mysqli($this->host, $this->user, $this->password, $this->db);
        return $con;
    }
}
