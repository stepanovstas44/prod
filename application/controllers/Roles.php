<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:33
 */
class Roles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('roles_model');
    }

    /**
     * Create Role
    */
    public function createRoleAction() {
        $check = $this->validate([
            ['role_name', 'Role Name','trim|required|alpha_dash|max_length[25]' ],
            ['role_key', 'Role key','trim|required|numeric' ],
        ]);

        if ($check) {
            $data = [
                'role' => $this->input->post('role_name'),
                'key' => $this->input->post('role_key')
            ];
            $response = $this->roles_model->createRole($data);
            if($response) {
                echo $this->json([], 1);
            } else {
                $message = 'Cannot insert into database';
                echo $this->json([], 0, $message);
            }
        } else {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        }
    }

    /**
     *
    */
    public function getRolesAction() {
        $response = $this->roles_model->getRoles();

        $this->load->view('js_views/admin/all_roles', ['roles' => $response]);
    }

    /**
     * @param int $role_id
    */
    public function getModalContentAction($role_id) {
        $id = (int)$role_id;

        $response = $this->roles_model->getRoleById($id);

        $this->load->view('js_views/admin/roles_edit_modal_content', ['role' => $response]);
    }


    /**
     * Update Roles
    */
    public function updateRoleAction() {
        $check = $this->validate([
            ['role', 'Role Name','trim|required|alpha_dash|max_length[25]' ],
            ['id', 'Role Id','trim|required|numeric'],
        ]);

        if ($check) {
            $data = [
                'role' => $this->input->post('role'),
            ];
            $response = $this->roles_model->updateRole($data, ['id' => $this->input->post('id')]);
            if($response) {
                echo $this->json([$data['role']], 1, "Please refresh site to view the updates");
            } else {
                $message = 'Cannot Update into database';
                echo $this->json([], 0, $message);
            }
        } else {
            $message = validation_errors();
            echo $this->json([], 0, $message);
        }


    }


    /**
     * Delete Roles
     * @param int $id
     *
     */
    public function deleteRoleAction($id) {

        $id = (int)$id;

        $response = $this->roles_model->deleteRoles([$id]);

        if($response) {
            echo $this->json([$response], 1, "Deleted");
        } else {
            $message = 'Cannot Delete in database';
            echo $this->json([], 0, $message);
        }
    }
}


















