<?php
class Mcrud extends CI_Model
{
    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }
    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function delete($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->delete($tabel, $data);
    }
    public function get_all_data_3table($table1, $table2, $table3, $data1, $data2, $data3, $data4)
    {
        $this->db->select("idBiayaKirim,b.namaKota,c.namaKota AS 'Kota Tujuan',a.namaKurir,biaya ");
        $this->db->from($table1); // this is first table name
        $this->db->join($table2 . ' AS a', $table1 . '.' . $data2 . '=' . 'a' . '.' . $data2); // this is second table name with both table ids
        $this->db->join($table3 . ' AS b', $table1 . '.' . $data1 . '=' . 'b' . '.' . $data3); // this is second table name with both table ids
        $this->db->join($table3 . ' AS c', $table1 . '.' . $data4 . '=' . 'c' . '.' . $data3); // this is second table name with both table ids
        return $this->db->get();
    }
}
