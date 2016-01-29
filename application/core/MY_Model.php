<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    /**
     * Working with this table
     * @var string $_table
     */
    protected $_table = '';

    public function __construct($table = false) {
        parent::__construct();

        if($table) {
            $this->_table = $table;
            $this->set_table($table);
        }

        $this->load->database();
    }


    /** -------------------------------------
     *  @param array
     *  @return boolean
     *  -------------------------------------
     */
    public function insert($data) {


        if($this->db->insert($this->_table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }


    /** -------------------------------------
     *  @param array
     *  @param mixed
     *  @return boolean
     * --------------------------------------
     */
    public function update($data, $where = false) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->update($this->_table, $data);

        $effectedRow = $this->db->affected_rows();
        if($effectedRow) {
            return true;
        }
        return false;
    }


    /** -------------------------------------
     *  @param mixed $where
     *  @return boolean
     * -------------------------------------
     */
    public function delete($where = false) {

        if($where) {
            $this->db->where($where);
        }

        $this->db->delete($this->_table);


        $affectedRow = $this->db->affected_rows();
        if($affectedRow) {
            return true;
        }
        return false;
    }


    /** -------------------------------------
     *  @param string $fields (default *)
     *  @param mixed $where (default false)
     *  @param array $order (default false)
     *  @param int $limit(default false)
     *  @return array
     *  -------------------------------------
     */
    public function select($fields ="*", $where = false, $order = false, $limit = false) {

        $this->db->select($fields);
        $this->db->from($this->_table);

        if($where) {
            $this->db->where($where);
        }


        if($order) {
            $this->db->order_by($order['by'], $order['type']);
        }
        if($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();

        if ($query -> num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }

    /** -------------------------------------
     *  @param array|string $data
     *  @return array
     *  -------------------------------------
     */
    protected function select_join($data) {

        /*      Example
         * array(
                "where" => array(
                    'users.username' => $this->session->username,
                    'users.id' => $this->session->user_id,
                ),
                "tables" => array(
                    array(
                        'name' => "users_info",
                        'fields' => "users_info.lastName, users_info.firstName",
                        'ON' => "table.id = users_info.user_id",
                    )
                )
            )
        */

        $fields = '';

        foreach($data['tables'] as $table) {
            $fields = $fields.','.$table['fields'];
        }

        $this->db->select("$this->_table.* $fields ");
        $this->db->from($this->_table);

        foreach($data['tables'] as $table) {
            $this->db->join($table["name"], $table['ON']);
        }

        if ($data['where']) {
            $this->db->where($data['where']);
        }

        $query = $this->db->get();

        if ($query -> num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /** -------------------------------------
     *  @param string
     *  @param array (default false)
     *  @return array
     *  -------------------------------------
     */
    protected function select_like($fields = "*", $like = false) {

        $this->db->select($fields);
        $this->db->from($this->_table);

        if($like) {
            $this->db->like($like);
        }

        $query = $this->db->get();

        if ($query -> num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }

    /** -------------------------------------
     *  @param string
     *  -------------------------------------
     */
    protected function set_table($table) {
        $this->_table = $table;
    }

    /** -------------------------------------
     *  @param string
     *  @param string
     *  @param string
     *  @param array
     *  @return array
     *  -------------------------------------
     */
    protected function join($row, $table, $on, $where = null) {
        $this->db->select($row);
        $this->db->from($this->_table);
        $this->db->join($table, $on);

        if ($where) {
            $this->db->where($where);
        }
        $response = $this->db->get();

        return $response->result_array();
    }

}