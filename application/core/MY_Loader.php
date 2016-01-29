<?php
class MY_Loader extends CI_Loader {

    public function __construct(){
        parent::__construct();

        $CI = & get_instance();
        $CI->load = $this;
    }

    public function front_view($view, $data = [])
    {
        if (!$view) {
            die("Can not find the file");
        } else {
            $this->view("layouts/frontend/header", array('css' => $data['css'] ));
            $this->view($view, $data);
            $this->view("layouts/frontend/footer", array('js' => $data['js'] ));
        }
    }

    public function back_view($view, $data = [])
    {
        if (!$view) {
            die("Can not find the file");
        } else {
            $this->view("layouts/backend/header", array('css' => $data['css'] ));
            $this->view($view, $data);
            $this->view("layouts/backend/footer", array('js' => $data['js'] ));
        }
    }
}
?>