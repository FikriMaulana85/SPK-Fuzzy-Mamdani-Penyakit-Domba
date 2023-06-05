<?php


class Dashboard_model extends CI_Model
{

    public function TotalPeternakan()
    {
        $this->db->select("*");
        $this->db->from("tbl_peternakan");
        return $this->db->get()->num_rows();
    }
}
