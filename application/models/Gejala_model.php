<?php


class Gejala_model extends CI_Model
{

    public function TotalGejala()
    {
        $this->db->select("*");
        $this->db->from("tbl_gejala");
        return $this->db->get()->num_rows();
    }


    public function list()
    {
        $this->db->select("*");
        $this->db->from("tbl_gejala");
        $this->db->order_by("id_gejala DESC");
        return $this->db->get()->result();
    }

    public function show($id_gejala)
    {
        $this->db->select("*");
        $this->db->from("tbl_gejala");
        $this->db->where("id_gejala", $id_gejala);
        return $this->db->get()->row();
    }


    public function create()
    {
        $post = $this->input->post();
        $data = [
            'id_gejala' => null,
            'kode_gejala' => $post['kode_gejala'],
            'desc_gejala' => $post['desc_gejala'],
        ];
        if ($this->db->insert("tbl_gejala", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect(site_url("gejala"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
            redirect(site_url("gejala"));
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $id_gejala = $post["id_gejala"];
        $data = [
            'kode_gejala' => $post['kode_gejala'],
            'desc_gejala' => $post['desc_gejala'],
        ];
        $this->db->where('id_gejala', $id_gejala);
        if ($this->db->update("tbl_gejala", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect(site_url("gejala/edit/$id_gejala"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
            redirect(site_url("gejala/edit/$id_gejala"));
        }
    }


    public function delete()
    {
        $post = $this->input->post();
        $id_gejala = $post["id_gejala"];
        if ($this->db->delete("tbl_gejala", array("id_gejala" => $id_gejala))) {
            $output = array(
                "error_code" => 200,
                "status" => "success",
                "message" => "Data berhasil dihapus",
            );
        } else {
            $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => "Data gagal dihapus",
            );
        }
        echo json_encode($output);
    }
}
