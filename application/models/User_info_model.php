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
class User_info_model extends MY_Model {


    /*
     * in `user_info` table
     *   rows {id, login, email, password, token_code, user_id}
     *
     * */


    /** -------------------------------------
     *
     *  -------------------------------------
     */
    public function __construct () {
        parent::__construct('user_info');
    }

    /** -------------------------------------
     * @param array $data
     * @return integer
     *  -------------------------------------
     */
    public function createUserInfo($data) {
        $response = $this->insert($data);
        return $response;
    }

    /** -------------------------------------
     * @param int $user_id
     * @return array
     *  -------------------------------------
     */
    public function getUserInfo($user_id) {
        $response = $this->select('*', ['user_id' => $user_id]);
        return $response;
    }

    /** -------------------------------------
     * @param array $data
     * @param mixed $where
     * @return boolean
     *  -------------------------------------
     */
    public function updateUserInfo($data, $where) {
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
                )
            )
        ));

        return $response;
    }


}