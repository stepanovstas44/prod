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
class Project_dependence_model extends My_model {

    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('project_dependence');
    }

    /** -------------------------------------
     * @param int $project_id
     * @param int $user_id
     * @return int
     *  -------------------------------------
     */
    public function attachProject($project_id, $user_id) {
        $response = $this->insert([
            'project_id' => $project_id,
            'user_id' => $user_id
        ]);

        return $response;
    }

    /** -------------------------------------
     * @param int $project_id
     * @param int $user_id
     * @return boolean
     *  -------------------------------------
     */
    public function detachProject($project_id, $user_id) {
        $response = $this->delete([
            'project_id' => $project_id,
            'user_id' => $user_id
        ]);

        return $response;
    }

    /** -------------------------------------
     * @param int $project_id
     * @param int $new_user_id
     * @return boolean
     *  -------------------------------------
     */
    public function replaceProjectUser($project_id, $new_user_id) {
        $data = [
            'user_id' => $new_user_id
        ];
        $where = [
            'project_id' => $project_id,
        ];
        $response = $this->update($data, $where);
        return $response;
    }
}
















