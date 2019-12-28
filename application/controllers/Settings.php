<?php
/**
 * Created by PhpStorm.
 * User: geraldezeude
 * Date: 28.12.2019
 * Time: 18.58
 */

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_m');
    }

    public function reset_password()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            return $this->resetPasswordPost();
        }

        $this->load->view('reset_password');
    }

    private function resetPasswordPost()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if(!$this->form_validation->run())
        {
            $data = [
                'emailErr' => true,
                'email' => $this->input->post('email')
            ];
            $this->load->view('reset_password', $data);
        }
        else
        {
            $userObj = (object) [
                'email' => $this->input->post('email')
            ];
            $this->settings_m->sendResetEmail($userObj);

            redirect(base_url());
        }
    }
}