<?php

class Login_model extends CI_Model
{


    private $_user = "tbl_users";

    public function login()
    {
        $post = $this->input->post();
        $this->db->where('username', $post["username"]);
        $user = $this->db->get($this->_user)->row();
        $this->db->where('username', $post["username"]);
        if ($user) {
            if (password_verify($post["password"], $user->password)) {
                $this->session->set_userdata(['SES-FUZZY' => $post["username"]]);
                redirect(site_url("dashboard"));
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                redirect(site_url("login"));
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User tidak terdaftar !</div>');
            redirect(site_url("login"));
        }
    }

    public function isNotLogin()
    {
        return $this->session->userdata('SES-FUZZY') == null;
    }

    public function getUserbySeS()
    {
        $this->db->select("*");
        $this->db->from("tbl_users");
        $this->db->where('username', $this->session->userdata('SES-FUZZY'));
        return $this->db->get()->row();
    }
}
