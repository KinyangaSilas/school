<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Career_Model extends CI_Model {

protected static  $table  = "careers";

	function dbfields () {
		return $this->db->list_fields(self::$table);
	}
	public function get_all() {
        return $this->db->get(self::$table)
                        ->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where(self::$table, array('id' => $id))
                        ->row();
    }

    public function get_where($where) {
        return $this->db->where($where)
                        ->get(self::$table)
                        ->result();
    }

    public function save($data) {
        return $this->db->insert(self::$table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update(self::$table, $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete(self::$table);
    }
}
?>