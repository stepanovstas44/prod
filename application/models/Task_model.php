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
class Task_model extends MY_Model {

    /*
     * in task table
     *   rows {id, project_id, user_id, name, creation_date, status }
     *
     * */

    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('task');
    }

    /** -------------------------------------
     * @param array $data (name, project_id, creation_date, status)
     * @return int
     *  -------------------------------------
     */
    public function createTask($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param array $data (id)
     * @return boolean
     *  -------------------------------------
     */
    public function deleteTasks($data) {
        $query = '`id` IN ('.implode(',',$data).')';
        $response = $this->delete($query);
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @param mixed $where
     * @return boolean
     *  -------------------------------------
     */
    public function updateTask($data, $where) {
        $response = $this->update($data, $where);
        return $response;
    }


    /** -------------------------------------
     * @return array
     *  -------------------------------------
     */
    public function getAllTasks() {
        $response = $this->select('*', false, [
            'by' => 'user_id',
            'type' => 'desc'
        ]);
        return $response;
    }

    /** -------------------------------------
     * @param int $project_id
     * @return array|boolean
     *  -------------------------------------
     */
    public function getAllProjectTasks($project_id) {
        $response = $this->select('*', ['project_id' => $project_id]);
        return $response;
    }

    /** -------------------------------------
     * @param int $user_id
     * @return array|boolean
     *  -------------------------------------
     */
    public function getAllUserTasks($user_id) {
        $response = $this->select('*', ['user_id' => $user_id]);
        return $response;
    }

    /** -------------------------------------
     * @param int|bool $task_id (default false)
     * @return array|boolean
     *  -------------------------------------
     */
    public function getTaskWithMessages($task_id = false) {

        if ( (is_array($task_id) && !empty($task_id)) ) {
            $where = ['task.id' => $task_id];
        } else {
            $where = false;
        }

        $response = $this->select_join([
            'where' => $where,
            'tables' => [
                [
                    'name' => "task_messages",
                    'fields' => "task_messages.*",
                    'ON' => "task.id = task_messages.task_id",
                ]
            ]
        ]);

        return $response;
    }

}
















