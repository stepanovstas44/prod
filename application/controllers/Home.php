<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->set_css_data(['css/home']);
        $this->set_js_data(['js/home_scripts', 'js/role_scripts', 'js/workers_script', 'js/project_script', 'js/task_scripts']);
    }

    /**
     *  Open dashboard for every user
     */
    public function indexAction()
    {
        $this->status();

        $this->load->model('roles_model');

        switch($this->session->user_info['key']){
            case 1: {
                $this->data['projects'] = null;
                $this->data['users'] = null;
                $this->data['roles'] = $this->roles_model->getRoles();
                $this->load->back_view('home/admin', $this->data);
                break;
            }
            case 2: {
                $this->load->back_view('home/admin', $this->data);
                break;
            }
            case 3: {
                $this->load->back_view('home/admin', $this->data);
                break;
            }
            default: {
                break;
            }
        }
    }

    public function testAction() {
        $this->load->model('project_model');
    }

    public function test1Action() {
         $this->load->view('tab_views/tab_content');
    }
}











