<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Workers extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('user_info_model');
    }

    /**
     * Create Worker
     */
    public function createWorkerAction() {

        $validation = [
            ['name', 'Name', 'required|trim|alpha|max_length[20]'],
            ['surname', 'Surname', 'required|trim|max_length[45]'],
            ['email', 'Email', 'required|trim|valid_email'],
            ['login', 'Login', 'required|trim|max_length[45]|min_length[6]'],
            ['password', 'Password', 'required|trim|max_length[45]|min_length[6]'],
            ['role_id', 'Role', 'required|numeric|is_natural'],
        ];

        if($this->input->post('team_id')) {
            $validation[] = ['team_id', 'Team', 'required|numeric|is_natural'];
        }

        $check = $this->validate($validation);

        if (!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {
            if ((strpos($this->input->post('name'), 'rvand') && (11 == $this->input->post('role_id')))) {
                echo $this->json([], 0, "<h1>ԳԺՎԵԼ ԵՍ?</h1>");
            } else {
                $data['name'] = $this->input->post('name');
                $data['surname'] = $this->input->post('surname');
                $data['role_id'] = $this->input->post('role_id');

                if($this->input->post('team_id')) {
                    $data['team_id'] = $this->input->post('team_id');
                }
                $user_id = $this->user_model->createUser($data);

                $data1['user_id'] = $user_id;
                $data1['login'] = $this->input->post('login');
                $data1['password'] = md5($this->input->post('password'));
                $data1['email'] = $this->input->post('email');

                $this->user_info_model->createUserInfo($data1);

                echo $this->json([], 1);
            }
        }
    }


    /**
     * Get Workers
     */
    public function getWorkersAction() {
        $response = $this->user_model->getUsersAllInfo();
        $team_lead = $this->user_model->getTeamLeads();

        $this->load->view('js_views/admin/all_workers', ['workers' => $response, 'leads' => $team_lead]);
    }

    /**
     * Get Workers list for attach project
     */
    public function getWorkersListAction() {
        $response = $this->user_model->getUsersAllInfo();

        $this->load->view('js_views/common/workers_list_to_attach', ['workers' => $response]);
    }

    /**
     * Delete Roles
     * @param int $id
     *
     */
    public function deleteWorkerAction($id) {

        $id = (int)$id;

        $response = $this->user_model->deleteUser([$id]);

        if($response) {
            echo $this->json([$response], 1, "Deleted");
        } else {
            $message = 'Cannot Delete in database';
            echo $this->json([], 0, $message);
        }
    }

    /**
     * Get team leaders id
     */
    public function getTeamLeadsAction() {
        $response = $this->user_model->getTeamLeads();

        $this->load->view('js_views/admin/select_team_lead', ['team_leads' => $response]);
    }

    /**
     * Get team leaders id
     */
    public function getTeamLeadsForWorkersAction() {
        $response = $this->user_model->getTeamLeads();

        $this->load->view('js_views/admin/team_leads_tbl', ['team_leads' => $response]);
    }

    /**
     * Get workers by team lead id
     * @param int $team_id
     */
    public function getWorkersForTeamLeadAction($team_id) {
        $team_id = (int)$team_id;

        $response = $this->user_model->getTeamWorkers($team_id);

        $this->load->view('js_views/admin/team_workers_tbl', ['workers' => $response]);
    }

    /**
     * Get workers by team lead id
     * @param int $id
     * @return void
     */
    public function getWorkerInfoEditAction($id) {
        $this->load->model('roles_model');
        $id = (int)$id;
        $response = $this->user_model->getUsersAllInfo([$id]);
        $roles = $this->roles_model->getRoles();
        $team_leads = $this->user_model->getTeamLeads();
        $this->load->view('js_views/admin/worker_edit_modal_content', [
            'worker' => $response,
            'roles' => $roles,
            'team_lead' => $team_leads
        ]);
    }

    /**
     * Edit Workers for admin
     */
    public function editUserInfoAction() {
        $validation = [
            ['login', 'Login', 'required|trim|max_length[45]|min_length[6]'],
            ['password', 'Password', 'trim|max_length[45]|min_length[6]'],
            ['role_id', 'Role', 'required|numeric|is_natural'],
            ['edit_user', 'User Id', 'required|numeric|is_natural'],
            ['edit_team_id', 'Team Id', 'numeric|is_natural'],
        ];

        $check = $this->validate($validation);

        if (!$check) {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        } else {
            $data['login'] = $this->input->post('login');
            $data['password'] = md5($this->input->post('password'));

            $data1['role_id'] = $this->input->post('role_id');

            if($this->input->post('edit_team_id')) {
                $data1['team_id'] = $this->input->post('edit_team_id');
            } else {
                $data1['team_id'] = 0;
            }


            $this->user_model->updateUser($data1, ['id' => $this->input->post('edit_user')]);

            $this->user_info_model->updateUserInfo($data, ['user_id' => $this->input->post('edit_user')]);

            echo $this->json([], 1);
        }
    }

}


















