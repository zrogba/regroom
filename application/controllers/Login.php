<?php
/**
 * Created by PhpStorm.
 * User: geraldezeude
 * Date: 27.12.2019
 * Time: 0.15
 */

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_m');
    }

    //  this  is  the  first thing that runs
    public function index()
    {
        //if post then form is submitted, login the  user
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            return $this->loginPost();
        }

        //else it's a get request, show the login page
        return $this->loginGet();
    }

    private function loginGet()
    {
        $this->load->view('login.php');
    }


    private function loginPost()
    {
        if(!$this->validateLoginPostRequest())
        {
            return $this->loginValidationErrorMessage();
        }

        return $this->loginUser();
    }

    //the  actual login  that  happens if validations are successful
    private function loginUser()
    {
        //get all  the necessary request object
        $userObj = (object) [
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        ];

        // go to the  model and perform all logic there
        $user = $this->login_m->loginUser($userObj);
        print_r($userObj);die();
    }

    //validation for incoming request
    private function validateLoginPostRequest()
    {
        //write out the  form validation rules
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // run the  validation and return true or false
        return $this->form_validation->run();

    }

    // custom error that user gets
    private function loginValidationErrorMessage()
    {
        $data = [
            'emailErr' => true,
            'email' => $this->input->post('email')
        ];
        if(empty($this->input->post('password')))
            $data['passwordErr'] = true;

        $this->load->view('login.php', $data);
    }
}