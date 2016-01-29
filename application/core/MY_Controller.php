<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {

    protected $data = [];

    /**
     * ---------------------------------------
     * Call the parent class constructor
     * ---------------------------------------
     */
    public function __construct() {
        parent::__construct();
        $this->data['css'] = [];
        $this->data['js'] = [];
    }

    /**
     * ---------------------------------------
     * @param array
     * @param int (default 1)
     * @param string (default success saved)
     * @return array (JSON)
     * ---------------------------------------
     */
    public function json($data, $status= 1, $message = "success saved" ) {

        return json_encode([
            'response' => $data,
            'status' => $status,
            'message' => $message
        ]);
    }

    public function validate($data) {
        $this->load->library('form_validation');
        $count = count($data);
        for($i = 0; $i < $count; $i++){
            $this->form_validation->set_rules($data[$i][0],$data[$i][1],$data[$i][2]);
        }
        return $this->form_validation->run();
    }


    /**
     * ---------------------------------------
     * @param array
     * ---------------------------------------
     */
    protected function set_js_data($js) {
        $this->data['js'] = $js;
    }

    /**
     * ---------------------------------------
     * @param array
     * ---------------------------------------
     */
    protected function set_css_data($css) {
        $this->data['css'] = $css;
    }

    /**
     * ---------------------------------------
     *  Check user logged or no
     * ---------------------------------------
     */
    public function status() {
        if ($this->session->has_userdata('user_info')) {
            return true;
        } else {
            redirect('/');
        }
        return false;
    }

    /**
     * ---------------------------------------
     *  Check Admin
     * ---------------------------------------
     */
    public function statusAdmin() {
        $this->status();
        if($this->session->user_info['key'] !== 1) {
            redirect('/');
        }
    }

    /**
     * ---------------------------------------
     *  Check Team Lead
     * ---------------------------------------
     */
    public function statusLead() {
        $this->status();
        if($this->session->user_info['key'] !== 2) {
            redirect('/');
        }
    }

    /**
     * ---------------------------------------
     *  Check Team Lead
     * ---------------------------------------
     */
    public function statusWorker() {
        $this->status();
        if($this->session->user_info['key'] !== 3) {
            redirect('/');
        }
    }

    /**
     * ---------------------------------------
     *
     * ---------------------------------------
     */
    public function _remap($method, $params = array())
    {
        $method = $method.'Action';
        if (method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        show_404();
    }
}