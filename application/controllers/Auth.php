<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * Check user
     * @return void
     */
    public function indexAction()
    {
        $login = $this->input->post('login');
        $pass = $this->input->post('password');

        $valid = $this->validate([
            ['login', 'login', 'required'],
            ['password', 'password', 'required']
        ]);

        if(!$valid) {
            $this->load->front_view('index', $this->data);
        } else {
            $response = $this->user_model->loginUser($login, $pass);

            if ($response) {
                $this->session->set_userdata('user_info', $response[0]);
                redirect('home/index');
            } else {
                redirect('/');
            }
        }


    }

    public function logoutAction() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}