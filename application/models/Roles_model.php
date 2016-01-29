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
class Roles_model extends My_model {
    /*
     * in roles table
     *   rows {id, role, key}
     * */

    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('roles');
    }

    /** -------------------------------------
     * @param array $data (role, key)
     * @return int
     *  -------------------------------------
     */
    public function createRole($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @return boolean
     *  -------------------------------------
     */
    public function deleteRoles($data) {
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
    public function updateRole($data, $where) {
        $response = $this->update($data, $where);
        return $response;
    }

    /** -------------------------------------
     * @return array|boolean
     *  -------------------------------------
     */
    public function getRoles() {
        $response = $this->select();
        return $response;
    }

    /** -------------------------------------
     * @param int $id
     * @return array|boolean
     *  -------------------------------------
     */
    public function getRoleById($id) {
        $response = $this->select('*',['id' => $id]);
        return $response;
    }


}
















