<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Index extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->set_css_data(['css/login.css']);
        $this->set_css_data(['js/login.js']);
    }

    /**
     * Open login page
     * @return void
    */
    public function indexAction()
    {
        $this->load->front_view('index', $this->data);
    }

}