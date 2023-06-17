<?php


class Rules_model extends CI_Model
{

    public function TotalRules()
    {
        $this->db->select("*");
        $this->db->from("tbl_rules");
        return $this->db->get()->num_rows();
    }

    public function TmpRulesByID($kode_peternakan)
    {
        $this->db->select("*");
        $this->db->from("tmp_rules");
        $this->db->where("kode_peternakan", $kode_peternakan);
        return $this->db->get();
    }


    public function list()
    {
        $this->db->select("*");
        $this->db->from("tbl_rules");
        $this->db->order_by("id_rules DESC");
        return $this->db->get()->result();
    }

    public function show($id_rules)
    {
        $this->db->select("*");
        $this->db->from("tbl_rules");
        $this->db->where("id_rules", $id_rules);
        return $this->db->get()->row();
    }

    public function create()
    {
        $post = $this->input->post();
        $data = [
            'id_rules' => null,
            'kode_rules' => $post['kode_rules'],
            'kode_gejala1' => $post['kode_gejala1'],
            'level_gejala1' => $post['level_gejala1'],
            'kode_gejala2' => $post['kode_gejala2'],
            'level_gejala2' => $post['level_gejala2'],
            'kode_gejala3' => $post['kode_gejala3'],
            'level_gejala3' => $post['level_gejala3'],
            'kode_gejala4' => $post['kode_gejala4'],
            'level_gejala4' => $post['level_gejala4'],
            'kode_gejala5' => $post['kode_gejala5'],
            'level_gejala5' => $post['level_gejala5'],
            'nama_penyakit' => $post['penyakit'],
        ];
        if ($this->db->insert("tbl_rules", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect(site_url("rules"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
            redirect(site_url("rules"));
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $id_rules = $post["id_rules"];
        $data = [
            'kode_penyakit' => $post['kode_penyakit'],
            'nama_penyakit' => $post['nama_penyakit'],
            'definisi_penyakit' => $post['definisi_penyakit'],
            'solusi_penyakit' => $post['solusi_penyakit'],
        ];
        $this->db->where('id_rules', $id_rules);
        if ($this->db->update("tbl_rules", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect(site_url("penyakit/edit/$id_rules"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
            redirect(site_url("penyakit/edit/$id_rules"));
        }
    }


    public function delete()
    {
        $post = $this->input->post();
        $id_rules = $post["id_rules"];
        if ($this->db->delete("tbl_rules", array("id_rules" => $id_rules))) {
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