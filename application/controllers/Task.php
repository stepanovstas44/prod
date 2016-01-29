<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Task extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('task_model');
        $this->load->model('user_model');
    }


    /**
     *  Create Task
     */
    public function createTaskAction() {
        $check = $this->validate([
            ['name', 'Task Name', 'required|trim|max_length[150]'],
            ['project_id', 'Project Attach', 'required|numeric|is_natural'],
            ['user_id', 'User', 'required|numeric|is_natural'],
        ]);

        if(!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {
            $data['name'] = $this->input->post('name');
            $data['project_id'] = $this->input->post('project_id');
            $data['user_id'] = $this->input->post('user_id');
            $data['creation_date'] = date('d-m-Y H:i:s');
            $data['status'] = 0;

            $this->task_model->createTask($data);

            echo $this->json([], 1);
        }
    }

    /**
     *  Get all tasks
     */
    public function getTasksAction() {

        $key = $this->session->user_info['key'];

        if(1 == $key) {
            $users = $this->user_model->getUsers();
            $response = $this->task_model->getAllTasks();
        } elseif(2 == $key) {

        } elseif(3 == $key) {

        } else {
            $response = [];
        }

        $this->load->view('js_views/common/tasks', [
            'tasks' => $response,
            'users' => $users
        ]);
    }

}















