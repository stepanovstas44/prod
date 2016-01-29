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
class Task_message_model extends MY_Model {

    /*
     * in task_message table
     *   rows {id, task_id, message, user_id, creation_date}
     *
     * */


    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('task_message');
    }

    /** -------------------------------------
     * @param array $data (name, project_id, creation_date, status)
     * @return int
     *  -------------------------------------
     */
    public function createMessage($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param array $data (id)
     * @return boolean
     *  -------------------------------------
     */
    public function deleteMessage($data) {
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
    public function updateMessage($data, $where) {
        $response = $this->update($data, $where);
        return $response;
    }

    /** -------------------------------------
     * @param int $task_id
     * @return array|boolean
     *  -------------------------------------
     */
    public function getMessages($task_id) {
        $response = $this->select('*', ['task_id' => $task_id]);
        return $response;
    }

}
















