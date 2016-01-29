<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * method boolean insert(array $data)
 * method boolean update(array $data,array $where,string $table)
 * method boolean delete(mixed $where)
 * method array select(string $fields, mixed $where,array $order,int $limit)
 * method array select_join(array $data)
 * method array select_like(string $fields,array $like)
 * method void set_table(string $table)
 * method array join(string $row,string $table,string $on,array $where) tufta function
 */
class User_model extends MY_Model {


    /*
     * in `user` table
     *   rows {id, role_id, name, team_id, surname}
     *
     * */


    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('user');
    }

    /** -------------------------------------
     * @param array $data
     * @return integer
     *  -------------------------------------
     */
    public function createUser($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param array $data (id)
     * @return boolean
     *  -------------------------------------
     */
    public function deleteUser($data) {
        $query = '`id` IN ('.implode(',',$data).')';
        $response = $this->delete($query);
        return $response;
    }

    /** -------------------------------------
     * @param array|boolean $data (id)
     * @return array
     *  -------------------------------------
     */
    public function getUsers($data = false) {
        if ( (is_array($data) && !empty($data)) ) {
            $where = '`id` IN ('.implode(',',$data).')';
        } else {
            $where = false;
        }
        $response = $this->select('*', $where);
        return $response;
    }

    /** -------------------------------------
     * @param array|boolean $data (id)
     * @return array
     *  -------------------------------------
     */
    public function getUsersAllInfo($data = false) {
        if ( (is_array($data) && !empty($data)) ) {
            $where = 'user.`id` IN ('.implode(',',$data).')';
            $response = $this->select_join([
                'where' => $where,
                "tables" => [
                    [
                        'name' => "user_info",
                        'fields' => "user_info.email, user_info.login",
                        'ON' => "user.id = user_info.user_id",
                    ],
                    [
                        'name' => "roles",
                        'fields' => "roles.role, roles.key",
                        'ON' => "user.role_id = roles.id",
                    ]
                ]
            ]);
        } else {
            $response = $this->select_join([
                'where' => [],
                "tables" => [
                    [
                        'name' => "user_info",
                        'fields' => "user_info.email",
                        'ON' => "user.id = user_info.user_id",
                    ],
                    [
                        'name' => "roles",
                        'fields' => "roles.role, roles.key",
                        'ON' => "user.role_id = roles.id",
                    ]
                ]
            ]);
        }
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @param mixed $where
     * @return boolean
     *  -------------------------------------
     */
    public function updateUser($data, $where) {
        $response = $this->update($data, $where);
        return $response;
    }

    /** -------------------------------------
     * @param string $login
     * @param string $pass
     * @return array
     *  -------------------------------------
     */
    public function loginUser($login, $pass) {
        $response = $this->select_join(array(
            "where" => array(
                'user_info.login' => $login,
                'user_info.password' => md5($pass),
            ),
            "tables" => array(
                array(
                    'name' => "user_info",
                    'fields' => "user_info.email, user_info.login",
                    'ON' => "user.id = user_info.user_id",
                ),
                array(
                    'name' => "roles",
                    'fields' => "roles.key",
                    'ON' => "roles.id = user.role_id",
                )
            )
        ));

        return $response;
    }

    /** -------------------------------------
     * @return array
     *  -------------------------------------
     */
    public function getTeamLeads() {
        $response = $this->select_join([
            'where' => [
                'roles.key' => 2
            ],
            'tables' => [
                [
                    'name' => 'roles',
                    'fields' => 'roles.key',
                    'ON' => 'user.role_id = roles.id'
                ]
            ]
        ]);
        return $response;
    }

    /** -------------------------------------
     * @param int $team_id
     * @return array
     *  -------------------------------------
     */
    public function getTeamWorkers($team_id) {
        $response = $this->select('*', [
            'team_id' => $team_id
        ]);

        return $response;
    }

}























