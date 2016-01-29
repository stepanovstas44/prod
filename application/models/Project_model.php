<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * boolean insert(array $data)
 * boolean update(array $data,array $where,string $table)
 * boolean delete(mixed $where)
 * array select(string $fields, mixed $where,array $order,int $limit)
 * array select_join(array $data)
 * array select_like(string $fields,array $like)
 * void set_table(string $table)
 * array join(string $row,string $table,string $on,array $where) tufta function
 */
class Project_model extends My_model {

    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('project');
    }

    /** -------------------------------------
     * @param mixed $id default false
     * @param boolean $task default false
     * @return array|boolean
     *  -------------------------------------
     */
    public function getAllProjects($task = false) {
        if (false !== $task) {
            $response = $this->_getAllProjectsWithTask();
        } else {
            $response = $this->_getAllProjectsWithoutTask();
        }

        return $response;
    }

    /** -------------------------------------
     * @param int $user_id default false
     * @param boolean $task default false
     * @return array|boolean
     *  -------------------------------------
     */
    public function getAllProjectsByUserId($user_id,$task = false) {
        if (false !== $task) {
            $response = $this->_getAllProjectsWithTask_User($user_id);
        } else {
            $response = $this->_getAllProjectsWithoutTask_User($user_id);
        }
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @return int
     *  -------------------------------------
     */
    public function createProject($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @return boolean
     *  -------------------------------------
     */
    public function deleteProjects($data) {
        $query = '`id` IN ('.implode(',',$data).')';
        $response = $this->delete($query);
        return $response;
    }


    /** -------------------------------------
     * @param array $data
     * @param int $id
     * @return boolean
     *  -------------------------------------
     */
    public function updateProject($data, $id) {
        $response = $this->update($data, [
            'id' => $id
        ]);
        return $response;
    }

    /** -------------------------------------
     * @param int $project_id
     * @return array|boolean
     *  -------------------------------------
     */
    public function getDescription($project_id) {
        $response = $this->select('description', [
            'id' => $project_id
        ]);
        return $response;
    }

    /** -------------------------------------
     * @return array|boolean
     *  -------------------------------------
     */
    private function _getAllProjectsWithTask() {
        $response = $this->select_join(array(
                "tables" => array(
                    array(
                        'name' => "task",
                        'fields' => "`task`.`*`",
                        'ON' => "task.`project_id` = project.`id`",
                    )
                )
            )
        );
        return $response;
    }

    /** -------------------------------------
     * @return array|boolean
     *  -------------------------------------
     */
    private function _getAllProjectsWithoutTask() {
        $response = $this->select_join([
            'where' => [],
            'tables' => [
                [
                    'name' => 'project_dependence',
                    'fields' => 'project_dependence.user_id',
                    'ON' => 'project_dependence.project_id = project.id'
                ]
            ]
        ]);
        return $response;
    }

    /** -------------------------------------
     * @param int $user_id
     * @return array|boolean
     *  -------------------------------------
     */
    private function _getAllProjectsWithTask_User($user_id) {
        $response = $this->select_join(array(
                'where' => array(
                    'project_dependence.user_id' => $user_id
                ),
                "tables" => array(
                    array(
                        'name' => "task",
                        'fields' => "`task`.`*`",
                        'ON' => "task.`project_id` = project.`id`",
                    ),
                    array (
                        'name' => "project_dependence",
                        'fields' => "",
                        'ON' => "project_dependence.`project_id` = project.`id`",
                    )
                )
            )
        );
        return $response;
    }

    /** -------------------------------------
     * @param int $user_id
     * @return array|boolean
     *  -------------------------------------
     */
    private function _getAllProjectsWithoutTask_User($user_id) {
        $response = $this->select_join(array(
                'where' => array(
                    'project_dependence.user_id' => $user_id
                ),
                "tables" => array(
                    array (
                        'name' => "project_dependence",
                        'fields' => "",
                        'ON' => "project_dependence.`project_id` = project.`id`",
                    )
                )
            )
        );
        return $response;
    }

}
















