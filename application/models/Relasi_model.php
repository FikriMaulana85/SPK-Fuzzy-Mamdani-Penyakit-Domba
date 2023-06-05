<?php


class Relasi_model extends CI_Model
{
    public function list($kode_penyakit)
    {
        $this->db->select("*");
        $this->db->from("tbl_relasi");
        $this->db->join('tbl_gejala', 'tbl_gejala.kode_gejala = tbl_relasi.kode_gejala');
        $this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_relasi.kode_penyakit');
        $this->db->where("tbl_relasi.kode_penyakit", $kode_penyakit);
        $this->db->order_by("tbl_relasi.id_relasi DESC");
        return $this->db->get()->result();
    }

    public function show($id_relasi)
    {
        $this->db->select("*");
        $this->db->from("tbl_relasi");
        $this->db->join('tbl_gejala', 'tbl_gejala.kode_gejala = tbl_relasi.kode_gejala');
        $this->db->join('tbl_penyakit', 'tbl_penyakit.kode_penyakit = tbl_relasi.kode_penyakit');
        $this->db->where("id_relasi", $id_relasi);
        return $this->db->get()->row();
    }

    public function create()
    {
        $post = $this->input->post();;
        $data = [
            'id_relasi' => null,
            'kode_gejala' => explode(" | ", $post["kode_gejala"])[0],
            'kode_penyakit' => explode(" | ", $post["kode_penyakit"])[0],
            'bobot' => $post['bobot'],
        ];
        if ($this->db->insert("tbl_relasi", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil disimpan</div>');
            redirect(site_url("relasi"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');
            redirect(site_url("relasi"));
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $id_relasi = $post["id_relasi"];
        $data = [
            'id_relasi' => null,
            'kode_gejala' => explode(" | ", $post["kode_gejala"])[0],
            'kode_penyakit' => explode(" | ", $post["kode_penyakit"])[0],
            'bobot' => $post['bobot'],
        ];
        $this->db->where('id_relasi', $id_relasi);
        if ($this->db->update("tbl_relasi", $data)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data berhasil diubah</div>');
            redirect(site_url("relasi/edit/$id_relasi"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal diubah</div>');
            redirect(site_url("relasi/edit/$id_relasi"));
        }
    }

    public function delete()
    {
        $post = $this->input->post();
        $id_relasi = $post["id_relasi"];
        if ($this->db->delete("tbl_relasi", array("id_relasi" => $id_relasi))) {
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