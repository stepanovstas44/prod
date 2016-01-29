<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Project extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('project_model');
        $this->load->model('project_dependence_model');
        $this->load->model('user_model');
    }


    /**
     *  Create project
     */
    public function createProjectAction() {
        $check = $this->validate([
            ['name', 'Project Name', 'required|trim|max_length[50]'],
            ['description', 'Description', 'required|trim|max_length[800]'],
            ['user_id', 'User', 'required|trim|numeric'],
        ]);

        if(!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {
            $data['name'] = $this->input->post('name');
            $data['description'] = $this->input->post('description');
            $data['creation_date'] = date('d-m-Y H:i:s');
            $data['status'] = 0;

            $project_id = $this->project_model->createProject($data);
            $user_id = $this->input->post('user_id');
            $this->project_dependence_model->attachProject($project_id, $user_id);

            echo $this->json([], 1);
        }
    }

    /**
     *  Get all projects
     * @param int $task
     */
    public function getProjectsAction($task = 0) {

        $key = $this->session->user_info['key'];

        if(1 == $key) {
            $users = $this->user_model->getUsers();
            $response = $this->project_model->getAllProjects();
        } elseif(2 == $key) {

        } elseif(3 == $key) {
            $response = $this->project_model->getAllProjectsByUserId($this->session->user_info['id']);
        } else {
            $response = [];
        }

        if ($task) {
            $this->load->view('js_views/common/projects_list_for_task', [
                'projects' => $response
            ]);
        } else {
            $this->load->view('js_views/common/projects', [
                'projects' => $response,
                'users' => $users
            ]);
        }
    }


    /**
     *  Get Description by Project_id
     */
    public function getDescriptionAction() {

        $project_id = $this->input->post('project_id');

        $response = $this->project_model->getDescription($project_id);

        echo $response[0]['description'];
    }

    /**
     * Edit Description
    */
    public function editDescriptionAction() {
        $check = $this->validate([
            ['description', 'Description', 'max_length[800]'],
            ['project_id', 'Project Id', 'required|numeric|is_natural']
        ]);

        if(!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {
            $data['description'] = $this->input->post('description');
            $data['creation_date'] = date('d-m-Y H:i:s');
            $id = $this->input->post('project_id');

            $this->project_model->updateProject($data, $id);

            echo $this->json([], 1);
        }

    }

    public function editProjectUserAndStatusAction() {
        $check = $this->validate([
            ['change_user_id', 'User', 'required|numeric|is_natural'],
            ['status', 'Status', 'required|numeric|is_natural'],
            ['project_id', 'Project', 'required|numeric|is_natural']
        ]);

        if(!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {

            $this->project_model->updateProject([
                'status' => $this->input->post('status')
            ], $this->input->post('project_id'));

            $this->project_dependence_model->replaceProjectUser(
                $this->input->post('project_id'),
                $this->input->post('change_user_id')
            );

            echo $this->json([], 1);
        }
    }



}













