<?php
/**
 * Created by PhpStorm.
 * User: geraldezeude
 * Date: 28.12.2019
 * Time: 18.59
 */

class Settings_m extends CI_Model
{

    public function sendResetEmail(object $user): bool
    {
        $sql = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $res = $this->db->query($sql, [$user->email])->result();

        if(!empty($res[0]))
        {
            $res = $res[0];
            $this->load->library('email_lib');

            $emailData = (object)[
                'email' => $res->email,
            ];
             return $this->email_lib->sendEmail($emailData);
        }

        return true;
    }
}