<?php


class Analisa_model extends CI_Model
{

    public function list_peternakan()
    {
        $this->db->select("*");
        $this->db->from("tbl_hasil");
        $this->db->join('tbl_penyakit', 'tbl_penyakit.nama_penyakit = tbl_hasil.nama_penyakit');
        $this->db->join('tbl_peternakan', 'tbl_peternakan.kode_peternakan = tbl_hasil.kode_peternakan');
        // $this->db->where("tbl_hasil.kode_peternakan", $this->session->userdata('KODE_PETERNAKAN'));
        return $this->db->get()->result();
    }

    public function list_analisa_gejala_lanjutan()
    {
        $this->db->select("*");
        $this->db->from("tmp_gejala");
        $this->db->join('tbl_gejala', 'tbl_gejala.kode_gejala = tmp_gejala.kode_gejala');
        $this->db->where("kode_peternakan", $this->session->userdata('KODE_PETERNAKAN'));
        $this->db->limit("3");
        return $this->db->get()->result();
    }

    public function create_peternakan()
    {
        $post = $this->input->post();
        $data = [
            'id_peternakan' => null,
            'kode_peternakan' => $post['kode_peternakan'],
            'nama_peternak' => $post['nama_peternak'],
            'nama_peternakan' => $post['nama_peternakan'],
            'alamat_peternakan' => $post['alamat_peternakan'],
            'email_peternak' => $post['email_peternak'],
        ];

        if ($this->db->insert("tbl_peternakan", $data)) {
            $this->session->set_userdata(['KODE_PETERNAKAN' => $post["kode_peternakan"]]);
            redirect(site_url("home/analisa_gejala"));
        } else {
            redirect(site_url("home/analisa_gejala"));
        }
    }


    public function create_gejala()
    {

        $kode_gejala = $this->input->post("check_list");

        foreach ($kode_gejala as $kode_gejala) {
            $data = [
                'id_tmp_gejala' => null,
                'kode_peternakan' => $this->session->userdata('KODE_PETERNAKAN'),
                'kode_gejala' => $kode_gejala,
                'bobot_gejala' => 0
            ];
            $this->db->insert("tmp_gejala", $data);
        }
        redirect(site_url("home/analisa_gejala_lanjutan"));
    }

    public function update_gejala()
    {

        $range_gejala = $this->input->post("range_gejala");
        for ($x = 0; $x <= count($range_gejala) - 1; $x++) {
            $data = [
                'bobot_gejala' => $range_gejala[$x]
            ];
            $kode_gejala = $this->input->post("kode_gejala")[$x];
            $this->db->where('kode_gejala', $kode_gejala);
            $this->db->where('kode_peternakan', $this->session->userdata('KODE_PETERNAKAN'));
            $this->db->update("tmp_gejala", $data);
        }
        redirect(site_url("home/analisa_hasil/" . $this->session->userdata('KODE_PETERNAKAN') . ""));
    }

    public function relasi_group()
    {
        $this->db->select("*");
        $this->db->from("tbl_relasi");
        $this->db->group_by("kode_penyakit");
        return $this->db->get();
    }

    public function relasi_penyakit($kode_penyakit)
    {
        $this->db->select("*");
        $this->db->from("tbl_relasi");
        $this->db->where("kode_penyakit", $kode_penyakit);
        return $this->db->get();
    }


    public function GetNilaiTmp($kode_gejala, $level_gejala, $user)
    {
        // echo $level_gejala;
        $bobot = strtolower(str_replace(" ", "_", $level_gejala));
        return $this->db->select("*")->from("tmp_gejala")->where("kode_gejala", $kode_gejala)->where("kode_peternakan", $user)->get()->row()->$bobot;
    }

    public function Agregasi($kode_peternakan)
    {
        $this->db->select("*, MAX(bobot_rules) as max, MIN(bobot_rules) as min");
        $this->db->from("tmp_rules");
        $this->db->where("kode_peternakan", $kode_peternakan);
        $this->db->where("bobot_rules >", 0.0);
        return $this->db->get();
    }

    public function kesimpulan($kode_peternakan)
    {
        $this->db->select("*");
        $this->db->from("tmp_rules");
        $this->db->join('tbl_rules', 'tbl_rules.kode_rules = tmp_rules.kode_rules');
        $this->db->where("kode_peternakan", $kode_peternakan);
        $this->db->order_by("bobot_rules DESC");
        $this->db->limit(1);
        return $this->db->get()->row();
    }
}
