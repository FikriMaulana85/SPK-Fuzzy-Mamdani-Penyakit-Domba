<?php


class Penyakit_model extends CI_Model
{

    public function TotalPenyakit()
    {
        $this->db->select("*");
        $this->db->from("tbl_penyakit");
        return $this->db->get()->num_rows();
    }


    public function list()
    {
        $this->db->select("*");
        $this->db->from("tbl_penyakit");
        $this->db->order_by("id_penyakit DESC");
        return $this->db->get()->result();
    }

    public function show($id_penyakit)
    {
        $this->db->select("*");
        $this->db->from("tbl_penyakit");
        $this->db->where("id_penyakit", $id_penyakit);
        return $this->db->get()->row();
    }


    public function create()
    {
        $post = $this->input->post();
        $data = [
            'id_penyakit' => null,
            'kode_penyakit' => $post['kode_penyakit'],
            'nama_penyakit' => $post['nama_penyakit'],
            'definisi_penyakit' => $post['definisi_penyakit'],
            'solusi_penyakit' => $post['solusi_penyakit'],
        ];
        if ($this->db->insert("tbl_penyakit", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect(site_url("penyakit"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
            redirect(site_url("penyakit"));
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $id_penyakit = $post["id_penyakit"];
        $data = [
            'kode_penyakit' => $post['kode_penyakit'],
            'nama_penyakit' => $post['nama_penyakit'],
            'definisi_penyakit' => $post['definisi_penyakit'],
            'solusi_penyakit' => $post['solusi_penyakit'],
        ];
        $this->db->where('id_penyakit', $id_penyakit);
        if ($this->db->update("tbl_penyakit", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect(site_url("penyakit/edit/$id_penyakit"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
            redirect(site_url("penyakit/edit/$id_penyakit"));
        }
    }


    public function delete()
    {
        $post = $this->input->post();
        $id_penyakit = $post["id_penyakit"];
        if ($this->db->delete("tbl_penyakit", array("id_penyakit" => $id_penyakit))) {
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