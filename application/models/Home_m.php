<?php

/**
 * Created by PhpStorm.
 * User: X3D
 * Date: 12/26/2019
 * Time: 12:57 AM
 */
class Home_m extends CI_Model
{
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $res = $this->db->query($sql)->result();
        print_r($res);die();
    }
}